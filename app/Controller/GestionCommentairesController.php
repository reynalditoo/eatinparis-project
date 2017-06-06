<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\CommentaireModel;
use \W\Model\UsersModel;



class GestionCommentairesController extends Controller{
	
	public function listeCommentaires($id){

		$this->allowTo('Admin');

		$CommentaireModel = new CommentaireModel;

		$commentaires = $CommentaireModel->findComments($id);
	/*	debug($commentaires);*/

		$this->show('commentaire/listecommentaires', ['commentaire'=> $commentaires,]);
		
	}


	public function supprimerCommentaire($id){

		$this->allowTo('Admin');
		//debug($_GET);

		$CommentaireModel = new CommentaireModel();
		$commentaire = $CommentaireModel->delete($id);

		$this->redirectToRoute('commentaires_liste');
		//debug($_GET);

	}

}