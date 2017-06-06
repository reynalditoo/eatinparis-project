<?php
namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationModel;
use \Model\RestaurantsModel;
use \Model\CommentaireModel;

class RestaurantsController extends Controller {

	// AFFICHE LA LISTE DES RESTAURANTS DANS LE CODE POSTAL INDIQUé AYANT AU MENU LE PLAT SELECTIONNé
	public function searchRestoByPlat() {

		/* Récupérer les $idPlat et $codePostal à partir du $_POST */
        $RestaurantsModel = new RestaurantsModel;

		$idPlat = htmlentities($_POST['plat']);
		$codePostal = htmlentities($_POST['cp']);
		

		$restaurants = $RestaurantsModel->findRestoByPlat($idPlat, $codePostal);
		/*echo '<pre>';
		print_r($restaurants);
		echo '</pre>';*/
		$this->show('home/home_search_results', ['restos' => $restaurants]);	
	}

	// AFFICHE LE PROFIL DU RESTAURANT SELECTIONNé ---- Jek 27
    public function profil($slug, $id) {
		// Fiche Resto echo $id; die();
		$infos_profil = new RestaurantsModel;
		$profil = $infos_profil->findWithComments($id);
        $resto = $profil['resto'];
        $commentaires = $profil['commentaires'];
		// Commentaires sur le resto:
//		$commentaires = new CommentaireModel;

		/*echo '<pre>';
		print_r($profil);
		echo '</pre>';*/

		$this->show('restaurants/profil_restaurant', [
            'resto' => $resto,
            'commentaires' => $commentaires
        ]);	
	}

}