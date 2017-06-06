<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\PlatsModel;


class GestionPlatsController extends Controller {

	public function listeplats($id){

		$this->allowTo('Admin');

		$PlatModel = new PlatsModel;

		$plat = $PlatModel->findPlats($id);


		$this->show('plats/listeplats', ['plats'=>$plat, 'idResto' => $id]);
		
	}

	public function ajoutPlatForm(){

		$this->show('Plats/ajoutplatform');
	
	}


	public function supprimerPlat($id, $resto){

		$this->allowTo('Admin');

		$PlatModel = new PlatsModel();
		$plats = $PlatModel->deletePlats($id);

		//$this->redirectToRoute('liste_plats');
	}


		//debug($_GET);
}
