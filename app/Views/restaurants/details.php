<?php $this->layout('layout_principal',['title' => 'Details du restaurants']) ?>


<?php $this->start('main_content') ?>

<body style="background-image: none">

<h1><?= $nom ?></h1>	

	<h2><a href="<?= $this->url('liste_plats', ['id'=> $id]) ?>"> Afficher les plats</a></h2>	
		
	<h2><a href="<?= $this->url('commentaires_liste', ['id'=> $id]) ?>"> Afficher les commentaires</a></h2>	

</body>		

<?php $this->stop('main_content') ?>