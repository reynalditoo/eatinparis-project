<?php $this->layout('layout_principal',['title' => 'Liste des commentaires']) ?>


<?php $this->start('main_content') ?>

<body style="background-image: none">
	
	<table border="1">
		<tr>
		<th> Pseudo </th>
		<th> Date de Post </th>
		<th> Note Resto </th>
		<th> Commentaire </th>
		<th colspan="3"> Action </th>
		</tr>

<?php
//debug($commentaire);
	echo '<h2> liste des commentaires</h2>';
	foreach($commentaire as $valeur){
		
	/*echo '<pre>';
	print_r($valeur);
	echo '</pre>';*/

		echo '<td>' . $valeur['pseudo']. '</td>';
		echo '<td>' . $valeur['date_post']. '</td>';
		echo '<td>' . $valeur['note_resto']. '</td>';
		echo '<td>' . $valeur['commentaire']. '</td>';
		echo '<td> <a href="'.$this->url('supprimer_commentaire', ['id' => $valeur['id']]).'"><img width="45px" src="'. $this->assetUrl('img/supprimer.jpg').'" /></td>';
		echo '</tr>';
	}

	echo '</table>';
	
?>

</body>

<?php $this->stop('main_content') ?>