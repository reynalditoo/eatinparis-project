<?php               /* app/Model/CommentaireModel.php */

namespace Model;

use \W\Model\Model;
use \W\model\ConnectionModel;

class CommentaireModel extends Model 
{
     // ---------- Jek 27 (Constructeur supprimé)
    protected $table = 'commentaires';

	public function findComments($id) {

		$restaurant = Model::find($id);

		//var_dump($id);
		// 4 . Requête SQL pour récupérer les commentaires associés au film
		$sql_commentaire = $this->dbh->prepare("SELECT c.commentaire, c.id, c.note_resto, c.date_post, u.pseudo
			FROM commentaires c,restaurants r, users u
			WHERE r.id = c.id_resto
			AND u.id = c.id_user
			AND r.id = :id");
		$sql_commentaire->execute(array('id' => $id));
		$commentaires = $sql_commentaire-> fetchAll();

		return $commentaires;
	}
    

	public function updateNote($idResto) // ---------- Jek 27
	{
		$stmt = $this->dbh->prepare("UPDATE restaurants SET note_resto = (SELECT (sum(note_resto)/count(note_resto)) AS Moyenne FROM `commentaires` WHERE id_resto = :id) WHERE id = :id");

		$stmt->bindValue(':id', $idResto);
		$stmt->execute();
	}

}