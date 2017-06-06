<?php $this->layout('layout_principal',['title' => 'PROFIL']) ?>


<?php $this->start('main_content') ?>


<div class="row">
	<div class="nom_resto col-sm-offset-2 col-sm-8 col-xs-12">
		<p style="color: white"><?= $infos['prenom'] . ' ' . $infos['nom'] ?></p>
	</div>	
</div>

<div class="row">
	
		<article class="infos_resto col-sm-offset-2 col-sm-4 col-xs-6">
			<p><span>EMAIL :</span><a href="mailto:<?= $infos['email'] ?>" style="color: white"> <?= $infos['email'] ?></a></p>
			<p><span>PSEUDO :</span> <?= $infos['pseudo'] ?></p>
			<p><span>ADRESSE :</span> <?= $infos['adresse'] ?></p>
			<p><span>CP :</span> <?= $infos['cp'] ?></p>
			<p><span>VILLE :</span> <?= $infos['ville'] ?></p>
			<p><span>TEL :</span> <?= $infos['tel'] ?></p>
		</article>

		<aside class="photo_resto col-sm-4 col-xs-6">
			<img class="img-thumbnail" src="<?= $this->assetUrl("img/avatars/" . $infos['avatar']) ?>">
		</aside>

</div>

<div class="btn_modif_profil row">
	<div class="form-group col-sm-offset-4 col-sm-4 col-xs-12">
		<a href="<?= $this->url('modification_form', ['id' => $_SESSION['user']['id']]) ?>"><button class="form-control">MODIFIER VOTRE PROFIL</button></a>
	</div>
</div>

<div class="btn_modif_profil row">
	<div class="form-group col-sm-offset-4 col-sm-4 col-xs-12">
		<a href="<?= $this->url('supprimer_profil', ['id' => $_SESSION['user']['id']]) ?>"><button class="form-control">SUPPRIMER VOTRE PROFIL</button></a>
	</div>
</div>

<br />
<h4 style="color: white;"><b> Liste des réservations :</b></h4>
<br />
	<?php foreach ($resas['reservations'] as $resa) { ?>

			<li style="color: white;"><?= $resa['Pseudo']; ?> : <?= $resa['Réservation']; ?> - <?= $resa['Restaurant']; ?> - <?= $resa['Plat']; ?> <a href="<?= $this->url('commentaire_form', ['id' => $resa['id_resto']]) ?>" style="color: white;" ><b> => Faire un commentaire ... </b></a></li>	<!-- IdResto: < ?= $resa['id_resto'] ?> -->
	 <?php } ?>

	 <?php if($resas['reservations'] == null) : ?>
	
		<p style="color: white; font-size: 15px; margin-left: 20px;">
			<em>(aucune réservation n'a encore été effectuée)</em>
		</p>
	 
    <?php endif; ?>


<?php $this->stop('main_content') ?>