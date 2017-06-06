<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\RestaurantsModel;
use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;


class GestionRestaurantsController extends Controller {
	
	public function listeRestaurants(){

		$RestaurantModel = new RestaurantsModel;

		$restaurants = $RestaurantModel->findAll();

		/*echo '<pre>';
		print_r($restaurants);
		echo '</pre>';
*/
		$this->show('restaurants/listerestaurants', ['restos'=>$restaurants]);
		//$this->show('restaurants/modifier', ['restos'=>$restaurants]);
	}

	public function addRestaurantForm(){

		$this->show('restaurants/addrestaurantform');
	}


	public function addRestaurants(){
		//debug($_POST);


		$tableRestaurants = new RestaurantsModel();
		$auth = new AuthentificationModel();

	
		/* 
        ** Si l'Email et le Username n'existent pas alors on peut ajouter le nouvel utilisateur en BDD
        */

		$newRestaurants = array(
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
			'latitude' => $_POST['latitude'],
            'longitude' => $_POST['longitude'],
            'hmo' => $_POST['hmo'],
            'hmf' => $_POST['hmf'],
            'hso' => $_POST['hso'],
            'hsf' => $_POST['hsf'],
            'fermeture' => $_POST['fermeture'],
            'informations' => $_POST['informations'],
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
	}

	/*public function details($id){

		$RestaurantModel  = new RestaurantsModel;

		$restaurant = $RestaurantModel ->find($id);

		
		//debug($restaurant);
		$this->show('restaurants/details', ['resto' => $restaurant]);
	}*/

	public function details($slug, $id) {

		$RestaurantModel = new RestaurantsModel();
		$restaurant = $RestaurantModel->findWithComments($id);

	    //debug($restaurant);
		$this->show('restaurants/details', [
			'id' => $restaurant['resto']['id'], 
			'nom' => $restaurant['resto']['nom'],
			'commentaire' => $restaurant['commentaires']
			
		]);
	
	}

	public function modifRestaurantForm($id){

		$RestaurantModel = new RestaurantsModel();
		$restaurant = $RestaurantModel->find($id);

	    /*debug($restaurant);*/
		$this->show('restaurants/modifrestaurantform', ['restaurant' => $restaurant, 'id' => $id]);

		//$this->show('restaurants/modifrestaurantform');
	}

	public function modifRestaurant($id){

		$this->allowTo('Admin');
		//debug($_POST);
		$tableRestaurants = new RestaurantsModel();
		$auth = new AuthentificationModel();

		$modifRestaurant = array(
        
			
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
			'gmap' => $_POST['gmap']
		);

		//debug($_POST);
		//debug($_GET);
		
		

		if($tableRestaurants->update($modifRestaurant, $id)){
			$auth->setFlash('Le restaurant a été modifié avec succès', 'succes');
			$this->redirectToRoute('restaurants_liste');

		} else {
			$auth->setFlash('Probleme serveur, veuillez réessayer plus tard', 'error');

			$this->redirectToRoute('restaurants_liste');
		}
	}
    
    public function supprimerRestaurant($id){
		debug($_GET);

		$RestaurantModel = new RestaurantsModel();
		$restaurant = $RestaurantModel->delete($id);

		$this->redirectToRoute('restaurants_liste');
		//debug($_GET);
	}

}	