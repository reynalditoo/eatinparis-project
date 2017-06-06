<?php           /* app/Model/ReservationsModel.php */

namespace Model;

use \W\Model\Model;
use \W\Model\UserModel;
/*use \Model\ReservationsModel;*/
use \W\Model\ConnectionModel;
use PDO;

class ReservationsModel extends Model {

	public function __construct(){
		$this->setTable('reservations');

		$this->dbh = ConnectionModel::getDbh();
	}


	// Jek => UserProfil + Liste des Réservations du user
	public function findWithReservations($id){

		/*print_r($id);*/

		/*sql="SELECT u.nom AS Utilisateurs, resa.date_resa AS Reservations, rest.nom AS Restaurants, p.nom AS Plat
FROM users u, reservations resa, restaurants rest, plats p 
WHERE u.id = resa.id_user AND rest.id = resa.id_resto AND p.id = resa.id_plat AND u.id = :idUser";*/

	// 1 . Requête pour récupérer le user d'après son id
		//     On utilise ici la fonction find($id) disponible dans W/Model/model.php
		/*$userProfil = Model::find($id);	//this->find($id);*/
		/*$userProfil = ReservationsModel::findWithReservations($id);	//this->find($id);*/

		// 4 . Requête SQL pour récupérer les réservations associés au reservations
		$sql_reservations = $this->dbh->prepare("SELECT u.pseudo AS Pseudo, resa.date_resa AS Réservation, rest.nom AS Restaurant, p.nom AS Plat, resa.id_resto
			FROM users u, reservations resa, restaurants rest, plats p 
			WHERE u.id = resa.id_user AND rest.id = resa.id_resto AND p.id = resa.id_plat AND u.id = :id
			ORDER BY resa.date_resa DESC");
		$sql_reservations->execute(array('id' => $id));
		$reservations = $sql_reservations-> fetchAll();

		/*debug($userProfil);*/
		/*debug($reservations);*/

		// 5 . Nous retournons les données compactées dans un seul array avec array_merge()
		return array(
			/*'infos'=> $userProfil,*/
			'reservations' => $reservations 
			 );

	}

	// Fiche Restaurant -> Bouton RESERVER
	public function reservationForm($id){
		/* GET: Afficher le formulaire de réservation */
	}

	// Form Faire une Réservation 
	public function ajouterReservation($id){
		/* POST: Ajouter la réservation */
	}
}