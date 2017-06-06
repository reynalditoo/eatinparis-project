<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\CommentaireModel;
use \Model\RestaurantsModel;
use \W\Model\UsersModel;
use \W\Model\ConnectionModel;
use \W\Security\AuthentificationModel;


class CommentaireController extends Controller {

	// AFFICHER LE FORM COMMENTAIRE A PARTIR DU PROFIL USER:-------------Jek - 27
	public function commentaireForm($id){ 
		//ProfilUser => AfficherFormCommentaire
		$this->show('commentaire/commentaire_form', ['id' => $id]); 
	}

	public function ajouterCommentaire(){ //FormCommentaire => Ajouter1CmtR
		// Uniquement accessible pr les Users et Admin connectés
        $this->allowTo(['User','Admin']);
        // Instance d'objet de la classe "UsersModel" pr l'accès à la BDD
		$commentaire = new CommentaireModel();
		
		// Récupération d'un objet de la classe AuthentificationModel
		$auth = new AuthentificationModel;

		$loggedUser = $this->getUser();
		//var_dump($loggedUser); die();

		// Si le commentaire n'est pas vide alors on l'ajoute en BDD
		$datePost=date("Y-m-d");	// Date d'ajout du commentaire
		$newComment = array(
			
			'id_user' => $loggedUser['id'],
			'id_resto' => $_POST['idResto'],
			'commentaire' => htmlentities($_POST['commentaire']),
			'note_resto' => $_POST['noteResto'],
			'date_post' => $datePost,
			'id_plat' => $_POST['idPlat'],
			'note_plat' => $_POST['notePlat']
		);

		//var_dump($commentaire->insert($newComment));die;

		// Ajout du user avec la fonction insert() dispo dans W/Model/Model.php
		if($commentaire->insert($newComment)) {
			// Si l'enregistrement est OK on affiche la page d'acceuil avec le message de succès
			$title = 'Ajout de commentaire';
			$message = "Merci pour votre commentaire !";
			$auth->setFlash($message, 'success');
			
			// MàJ de la moy. du resto grace aux notes des commentaires: ---- Jek 27
			$commentaire->updateNote($_POST['idResto']);
			//----------------------------------------------------------------------

			$this->redirectToRoute('user_profil', ['slug'=>$_POST['slug'], 'id'=>$_POST['id_user']]);
		}else{
			// Sinon on reste sur la page et on affiche le message d'erreur
			$title = 'Profil';
			$message = "Un problème est survenu lors de l'enregistrement de votre commmentaire. Réessayez ultérieurement";
			$auth-> setFlash($message, 'error');
			$this->redirectToRoute('user_profil', ['slug'=>$_POST['slug'], 'id'=>$_POST['id_user']]);
		}

	}
	 
	/*public function listeRestaurants(){

		$RestaurantModel = new RestaurantsModel;

		$restaurants = $RestaurantModel->findAll();*/

		/*echo '<pre>';
		print_r($restaurants);
		echo '</pre>';*/

		/*$this->show('restaurants/listerestaurants', ['restos'=>$restaurants]);
	}

	public function addRestaurantForm(){

		$this->show('restaurants/addrestaurantform');
	}

	public function addRestaurants(){
		debug($_POST);


		$tableRestaurants = new RestaurantsModel();
		$auth = new AuthentificationModel();*/

		/* 
        ** Si l'Email et le Username n'existent pas alors on peut ajouter le nouvel utilisateur en BDD
        */

		/*$newRestaurants = array(
			'slug' => $_POST['slug'],
			'nom' => htmlentities($_POST['nom']),
			'adresse' => $_POST['adresse'],
			'cp' => $_POST['email'],
			'ville' => $_POST['cp'],
			'tel' => $_POST['tel'],
			'site' => $_POST['site'],
			'categorie' => $_POST['categorie'],
			'description' => $_POST['description'],
			'note_resto' => $_POST['note_resto'],
			'photo' => $_POST['photo'],
			'gmap' => $_POST['gmap'],
			);

		//debug($_POST);

		//ajout de l'utilisateur avec la fonction insert() dispo dans W/Model/Model.php
		if($tableRestaurants-> insert($newRestaurants)) {
			// Si l'enregistrement est OK on affiche la page d'acceuil avec le message de succès
			$auth->setFlash('le Nouveau restaurant a été ajouté avec succès ', 'success');
			$this -> redirectToRoute('restaurants_liste');
		} else {
			$auth->setFlash('Probleme serveur, veuillez réessayer plutard', 'error');
			// Sinon on reste sur la page et on affiche le message d'erreur
			
			$this->redirectToRoute('restaurants_liste');
		}
	}*/
	
}	