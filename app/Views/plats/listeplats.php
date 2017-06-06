<?php $this->layout('layout_principal',['title' => 'Liste des plats']) ?>


<?php $this->start('main_content') ?>

<body style="background-image: none">

	<h2><a href="<?= $this->url('ajout_plat_form') ?>">Ajouter un plat</a></h2>
				

	<table border="1">
		<tr>
		<th> Nom </th>
		<th> Ingredients </th>
		<th> origine </th>
		<th> Action </th>
		</tr>
<?php

		foreach($plats as $valeur){
			echo '<tr>';

				foreach($valeur as $indice2 => $valeur2){
					if($indice2 !== 'id'){
					
						echo '<td>' . $valeur2 . '</td>';
						}
					}
					echo '<td><a href="'.$this->url('supprimer_plat', ['id' => $valeur['id'], 'resto' => $idResto]).'"><img width="45px" src="'. $this->assetUrl('img/supprimer.jpg').'"></td>';
					echo '</tr>';
				}
			echo '</table>';

			//debug($valeur);
?>
	
</body>	

<?php $this->stop('main_content') ?>
