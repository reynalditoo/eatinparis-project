<?php

namespace Model;
use \W\model\model;

class UsersModel extends Model {
 
	/*public function findWithReservation($id)
	{
		// 1 . Requête pour récupérer le profil d'après son id
		//     On utilise ici la fonction find($id) disponible dans W/Model/model.php
		$profil = $this->find($id);		//Model::find()


		// 4 . Requête SQL pour récupérer les réservations associées au profil utilisateur.
		$sql_reservations = $this->dbh->prepare("SELECT u.nom AS Utilisateurs, resa.date_resa AS Reservations, rest.nom AS Restaurants, p.nom AS Plat 
			FROM users u, reservations resa, restaurants rest, plats p 
			WHERE u.id = resa.id_user AND rest.id = resa.id_resto AND p.id = resa.id_plat AND u.id = :id");

		$sql_reservations->execute(array('id' => $id));
		
		$reservations = $sql_reservations -> fetchAll();

		// 5 . Nous retournons les données compactées dans un seul array avec array_merge()
		return array(
			'profil'=> $profil, 
			'reservations' => $reservations, 
			 );
	}*/
      
}