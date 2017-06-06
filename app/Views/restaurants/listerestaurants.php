<?php $this->layout('layout_principal',['title' => 'Liste des restaurants']) ?>


<?php $this->start('main_content') ?>

<body style="background-image: none">

	<h2><a href="<?= $this->url('ajouter_restaurant_form') ?>">Ajouter un restaurant</a></h2>


	<table border="1">
		<tr>
		<th> Id resto</th>
		<th> Slug </th>
		<th> Nom </th>
		<th> Adresse </th>
		<th> Code postal </th>
		<th> Ville </th>
		<th> Tel </th>
		<th> Email </th>
		<th> Site </th>
		<th> Categorie </th>
		<th> Description </th>
		<th> Note resto</th>
		<th> Photo</th>
		<th colspan="3"> Action </th>
		</tr>


<?php
		foreach($restos as $valeur){
			echo '<tr>';

		/*echo '<pre>';
		print_r($valeur);
		echo '</pre>';*/

		foreach($valeur as $indice2 => $valeur2){
			if($indice2 == 'photo'){

				echo '<td><img src="' .$this->assetUrl("img/restos/" . $valeur['photo']). '" width="150px", height="100px" /></td>';
			}
			else if($indice2 != 'gmap'){
				echo '<td>' . $valeur2 . '</td>';
			}
		}
		echo '<td><a href="' .$this->url('details_restaurant', ['slug' => $valeur['slug'], 'id' => $valeur['id'] ]) . '"><img width="45px" src="'. $this->assetUrl('img/details.png').'" /></a></td>';

		echo '<td><a href="'.$this->url('modifier_restaurant_form', ['id' => $valeur['id']]).'"><img width="45px" src="'. $this->assetUrl('img/modifier.jpg').'" /></a></td>';

		echo '<td><a href="'.$this->url('supprimer_restaurant', ['id' => $valeur['id']]).'"><img width="45px" src="'. $this->assetUrl('img/supprimer.jpg').'" /></a></td>';			

	echo '</tr>';
}

echo '</table>';
		
?>

</body>

<?php $this->stop('main_content') ?>
