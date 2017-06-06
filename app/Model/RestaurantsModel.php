<?php

namespace Model;
use \W\Model\Model;
use \W\Model\ConnectionModel;
use PDO;


class RestaurantsModel extends Model {
 
    public function __construct(){
		$this->setTable('restaurants');

		$this->dbh = ConnectionModel::getDbh();
	}



	public function findWithComments($id)
	{
		// 1 . Requête pour récupérer le film d'après son id
		//     On utilise ici la fonction find($id) disponible dans W/Model/model.php
        /*$restaurant = Model::find($id);*/
		$restaurant = $this->find($id);		//Model::find()


		// 4 . Requête SQL pour récupérer les commentaires associés au film
		$sql_commentaires = $this->dbh->prepare("SELECT commentaire, id_resto, id_user, users.pseudo, date_post 
		FROM commentaires 
		LEFT JOIN users ON commentaires.id_user = users.id 
		WHERE commentaires.id_resto = :id 
		ORDER BY commentaires.id DESC");

		$sql_commentaires->execute(array('id' => $id));
		
		$comments = $sql_commentaires-> fetchAll();

		// 5 . Nous retournons les données compactées dans un seul array avec array_merge()
		return array(
			'resto'=> $restaurant, 
			'commentaires' => $comments, 
			 );
	}

	public function findRestoByPlat($plat = null, $codePostal = null) {

		$dbh = ConnectionModel::getDbh();
		/*$sql = "
	    SELECT r.* 
		FROM restaurants r +
		WHERE r.cp = :cp
		AND r.id 
		IN (SELECT rp.id_resto 
		FROM plats p, resto_plats rp 
		WHERE p.id=rp.id_plat 
		AND p.id=:id)
		";*/
		if($plat !== null) {
			$sql = 'select id, nom from plats where nom like :plat limit 1';
			/*$sth = $dbh->prepare($sql);*/
            $sth = $this->dbh->prepare($sql);

			$sth->bindValue(':plat', "%$plat%");
			$sth->execute();
			$infoPlat = $sth->fetch(PDO::FETCH_ASSOC);
			$_SESSION['plat'] = $infoPlat;
			//var_dump($_SESSION['plat']);
		}

		$sql = "SELECT r.* 
		FROM restaurants r";

		if($plat !== null || $codePostal !== null) {
			$sql .= ' WHERE ';
		}

		if($codePostal !== null) {
			$sql .= 'r.cp = :cp ';
		}

		if($plat !== null && $codePostal !== null) {
			$sql .= ' AND ';
		}

		if($plat !== null) {
			$sql .= ' r.id 
		IN (SELECT rp.id_resto 
		FROM resto_plats rp 
		WHERE rp.id_plat = :plat) ';
        
        /*IN (SELECT rp.id_resto 
		FROM plats p, resto_plats rp 
		WHERE p.id=rp.id_plat 
		AND p.nom=:plat) ';*/
		
		}

		
		$sth = $dbh->prepare($sql);
		$sth->bindValue(':cp', $codePostal);
		$sth->bindValue(':plat', $_SESSION['plat']['id']);
		$sth->execute();

		$resultat = $sth->fetchAll(PDO::FETCH_ASSOC);

		return $resultat;

   
	}


}