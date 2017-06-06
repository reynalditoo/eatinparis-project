<?php


namespace Model;
use \W\model\model;
use \W\model\ConnectionModel;

class PlatsModel extends Model {

	public function __construct(){
		$this->setTable('restaurants');

		$this->dbh = ConnectionModel::getDbh();
	}


	public function findPlats($id)
	{
		// 1 . Requête pour récupérer le film d'après son id
		//     On utilise ici la fonction find($id) disponible dans W/Model/model.php
		$restaurant = Model::find($id);

//var_dump($id);
		// 4 . Requête SQL pour récupérer les commentaires associés au film
		$sql_plats = $this->dbh->prepare("SELECT p.nom AS Plats, p.ingredients AS Ingrédients, p.origine AS Origine, p.id
			FROM restaurants r, resto_plats rp,  plats p
			WHERE p.id = rp.id_plat
			AND r.id = rp.id_resto
			AND r.id = :id");
		$sql_plats->execute(array('id' => $id));
		$plats = $sql_plats-> fetchAll();

		/*echo '<pre>';
		print_r($plats);
		echo '</pre>';*/

		// 5 . Nous retournons les données compactées dans un seul array avec array_merge()
		//return $plats;
		return $plats;
	}


	/*public function deletePlats($id, $resto) {

		$restaurant = model::find($id);
		debug($restaurant);

		$sql_plats = "
			DELETE 
			FROM resto_plats rp
			WHERE rp.id_resto = ' . $resto . '
			AND rp.id_plat = ' . $id .'
		

		$sql_plats->execute(array('id' => $id));
		$plats = $sql_plats-> fetchAll();
		

		debug($plats);

		return $plats;
	}*/
}