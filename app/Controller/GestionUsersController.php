<?php
namespace Controller;

use \W\Controller\Controller;
use \W\Model\Model;
use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;
use \Respect\Validation\Validator as v;
use W\Security\AuthorizationModel;



class GestionUsersController extends Controller {


	public function modifUserForm($id){

		$this->allowTo('Admin');

		$UserModel = new UsersModel;

		$user = $UserModel->find($id);
		$this->show('users/modifuserform', ["user" => $user, 'id'=>$id]);

	}


	public function modifuser($id){

		$this->allowTo('Admin');
		//debug($_POST);
		$tableUsers = new UsersModel();
		$auth = new AuthentificationModel();

		$modifUser = array(
			
			
			'nom' => htmlentities($_POST['nom']),
			'prenom' => $_POST['prenom'],
			'email' => $_POST['email'],
			'pseudo' => $_POST['pseudo'],
			'role' => $_POST['role'],
			'cp' => $_POST['email'],
			'ville' => $_POST['cp'],
			'adresse' => $_POST['adresse'],
			'tel' => $_POST['tel']
		);

		//debug($_POST);
		//debug($_GET);
			

		if($tableUsers->update($modifUser, $id)){
			$auth->setFlash('Le user a été modifié avec succès', 'succes');
			$this->redirectToRoute('utilisateurs_liste');

		} else {
			$auth->setFlash('Probleme serveur, veuillez réessayer plus tard', 'error');

			$this->redirectToRoute('utilisateurs_liste');
		}
	}


	public function supprimerUser($id){

		$this->allowTo('Admin');

		$UserModel = new UsersModel();
		$user = $UserModel->delete($id);
		

	
		$this->redirectToRoute('utilisateurs_liste');
		//debug($_GET);

	}

	public function utilisateursListe(){

		$this->allowTo('Admin');

		$UserModel = new UsersModel;

		$users = $UserModel->findAll();

		/*echo '<pre>';
		print_r($users);
		echo '</pre>';*/

		$this->show('users/userslist', ['utilisateurs'=>$users]);
	}

}