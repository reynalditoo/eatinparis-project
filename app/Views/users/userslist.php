<?php $this->layout('layout_principal',['title' => 'Liste des utilisateurs ']) ?>


<?php $this->start('main_content') ?>

<body style="background-image: none">
	

		<table border="2">
		<tr>
		<th> Id </th>
		<th> Nom </th>
		<th> Prenom </th>
		<th> Email </th>
		<th> Pseudo </th>
		<th> Role </th>
		<th> Cp </th>
		<th> Ville </th>
		<th> Adresse </th>
		<th> Tel </th>
		<th>Avatar</th>
		<th colspan="2"> Action</th>
		
		</tr>

		<?php foreach($utilisateurs as $valeur) :?>
			<tr>

				<?php foreach($valeur as $indice2 => $valeur2) :?>

				<?php	
					if($indice2 != 'mdp'){
						if($indice2 == 'avatar'){
							echo '<td><img src="' .$this->assetUrl("img/avatars/" . $valeur['avatar']). '" width="100px", height="80px" /></td>';
						} else {
							echo '<td>' . $valeur2 . '</td>';
						}
					}
				
				?>

		<?php endforeach; ?>

				<td>
					<a href="<?php echo $this->url('modifier_user_form', ['id' => $valeur['id']]); ?>">
						<img width="25px" src="<?php echo $this->assetUrl('img/modifier.jpg'); ?>" />
					</a>
				</td>
				<td>
					<a href="<?php echo $this->url('supprimer_user', ['id' => $valeur['id']]); ?>">
						<img width="25px" src="<?php echo $this->assetUrl('img/supprimer.jpg'); ?>" />
					</a>
				</td>

			</tr>
		


		<?php endforeach; ?>

		</table>
</body>


<?php $this->stop('main_content') ?>