<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;



class HomeController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function affichage()
	{
		/*debug($_SERVER);*/
		$this->show('home/home');
	}

}