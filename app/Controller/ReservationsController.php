<?php
namespace Controller;

use \W\Controller\Controller;
/*use \W\Model\UsersModel;*/
use \Model\ReservationsModel;
use \W\Security\AuthentificationModel;


// LISTE DES RESERVATIONS DE L'UTILISATEUR:
class ReservationsController extends Controller {

	// Profil User - liste des réservations -------------Jek - 27
	public function listeReservations($id){

		$reservationsModel = new ReservationsModel;

		$reservations = $reservationsModel->findReservations($id);
		/*findAll();*/

		/*echo '<pre>';
		//print_r($reservations);
		echo '</pre>';*/
		
		$this->show('users/profilcomments', ['resas'=>$reservations]);
		/*$this->show('reservations/profil', ['resas'=>$reservations]);*/
	}

	// AFFICHER LE FORM COMMENTAIRE A PARTIR DU PROFIL USER:-------------Jek - 27
	public function reservationForm($id){ 
		// Uniquement accessible pr les Users et Admin connectés
        $this->allowTo(['User','Admin']);

		//ProfilResto => AfficherFormReservation
		$this->show('reservation/reservation_form', ['id' => $id]); 
	}

	public function ajouterReservation(){ //view => Ajouter1Avis
		// Uniquement accessible pr les Users connectés et les Admin
        $this->allowTo(['User','Admin']);
        // Instance d'objet de la classe "UsersModel" pr l'accès à la BDD
		$reservation = new ReservationsModel();
		
		// Récupération d'un objet de la classe AuthentificationModel
		$auth = new AuthentificationModel;

		$loggedUser = $this->getUser();
		//var_dump($loggedUser); die();

		// Si la résa n'est pas vide alors on l'ajoute en BDD
		$dateEnr=date("Y-m-d");	// Date d'enr. de la réservation
		$newResa = array(
			
			'id_user' => $loggedUser['id'],
			'id_resto' => $_POST['idResto'],
			'id_plat' => $_POST['idPlat'],
			'nb_pers' => $_POST['nbPers'],
			'date_resa' => $_POST['dateResa'],
			'date_enr' => $dateEnr,
			'infos' => htmlentities($_POST['infos'])
		);

		//var_dump($commentaire->insert($newComment));die;
		
		// Ajout du user avec la fonction insert() dispo dans W/Model/Model.php
		if($reservation->insert($newResa)) {
			// Si l'enregistrement est OK on affiche la page d'acceuil avec le message de succès
			$title = 'Ajout de reservation';
			$message = "Merci pour votre reservation !";
			$auth->setFlash($message, 'success');
			
			$this->redirectToRoute('user_profil', ['slug'=>$_POST['slug'], 'id'=>$_POST['id_user']]);
		}else{
			// Sinon on reste sur la page et on affiche le message d'erreur
			$title = 'Profil';
			$message = "Un problème est survenu lors de l'enregistrement de votre réservation. Réessayez ultérieurement";
			$auth-> setFlash($message, 'error');
			$this->redirectToRoute('user_profil', ['slug'=>$_POST['slug'], 'id'=>$_POST['id_user']]);
		}

	}


}