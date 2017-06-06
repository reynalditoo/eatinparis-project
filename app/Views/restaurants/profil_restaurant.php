<?php $this->layout('layout_principal', ['title' => 'PROFIL RESTAURANT']) ?>

<?php $this->start('main_content') ?>

<div class="row">
	<div class="nom_resto col-sm-offset-2 col-sm-8 col-xs-12">
		<p style="color: white;"><?= $resto['nom'] ?></p>
	</div>	
</div>

<div class="row">
		<!-- // Réglage Class Responsive - Jek -->
		<article class="infos_resto col-sm-6 col-xs-12"> <!-- col-sm-offset-1 -->
			<p> <span>ADRESSE :</span> <?= $resto['adresse'] ?></p>
			<p> <span>CODE POSTAL :</span> <?= $resto['cp'] ?></p>
			<!-- <p> <span>VILLE :</span> <?= $resto['ville'] ?></p> -->
			<p> <span>TELEPHONE :</span> <?= $resto['tel'] ?></p>
			<p> <span>SITE INTERNET :</span> <?= $resto['site'] ?></p>
			<p> <span>SPECIALITE CULINAIRE :</span> <?= $resto['categorie'] ?></p>
			<p> <span>A PROPOS :</span> <?= $resto['description'] ?></p>
			<p> <span>HORAIRES :</span>
			<?php if($resto['hmo'] != null && $resto['hmf'] != null) : ?>
			<?= substr($resto['hmo'], 0, 5); ?> / <?= substr($resto['hmf'], 0, 5);?> -
			<?php endif; ?> 

			<?= substr($resto['hso'], 0, 5); ?> / <?= substr($resto['hsf'], 0, 5); ?></p>
			<p> <span>FERMETURE :</span> <?= $resto['fermeture'] ?></p>
			<!--<p> <span>INFORMATIONS :</span> <?= $resto['informations'] ?></p> -->
			<!-- <p> <span>NOTE MOYENNE :</span> <?= $resto['note_resto'] ?>/5</p> -->
		</article>

		<aside class="photo_resto col-sm-6 col-xs-12 ">
			<img class="img-thumbnail" src="<?= $this->assetUrl("img/restos/" . $resto['photo']) ?>"><br /><br />
			<p style="color: white; margin-left: 121px;"> <span><b>NOTE MOYENNE :</span> <?= $resto['note_resto'] ?>/5</b></p>
		</aside>

</div>

<div class="row api_gmap">
	<div class="col-sm-offset-3 col-sm-6 col-xs-12">
		<div id="map"></div>
	</div>
</div>

<div class="row">
	<div class="col-sm-offset-4 col-sm-4 col-xs-12">
			<a href="<?= $this->url('reservation_form', ['id' => $resto['id']]) ?>"><input style="width: 100%;
    font-size: 24px;" type="submit" class="btn btn-default" value="FAIRE UNE RESERVATION" href="<?= $this->url('reservation_form', ['id' => $resto['id']]) ?>"></a>
	</div>
</div>

<div class="row" style="margin-bottom: 50px;">
	<div class="col-xs-12">
		<!-- Affichage des commentaires: -->		
	
		<h3 style="color: white; margin-left: 20px;"><b> Commentaires :</b></h3>
		<br />
		<ul>
			
			<?php foreach ($commentaires as $commentaire) : ?>
				<li style="color: white;"><b><?= $commentaire['pseudo']; ?> ( <?= $commentaire['date_post']; ?> )</b> : <?= $commentaire['commentaire']; ?>
				</li>
			<?php endforeach; ?>
		</ul>

		<?php if($commentaires == null) : ?>
	
    		<p style="color: white; font-size: 15px; margin-left: 20px;">
    			<em>(aucun commentaire n'a encore été posté concernant ce restaurant)</em>
    		</p>
		 
	    <?php endif; ?>

	</div>
</div>

<!-- div class="row">
		<article class="infos_resto col-sm-offset-2 col-sm-4 col-xs-6">
			<p><span>ADRESSE :</span> < ?= $resto['adresse'] ?></a></p>
			<p><span>CODE POSTAL :</span> < ?= $resto['cp'] ?></p>
			<p><span>VILLE :</span> < ?= $resto['ville'] ?></p>
			<p><span>TELEPHONE :</span> < ?= $resto['tel'] ?></p>
			<p><span>SITE INTERNET :</span><a href="mailto:< ?= $resto['adresse'] ?>"> < ?= $resto['site'] ?></a></p>
			<p><span>SPECIALITE CULINAIRE :</span> < ?= $resto['categorie'] ?></p>
			<p><span>A PROPOS :</span> < ?= $resto['description'] ?></p>
			<p><span>NOTE MOYENNE :</span> < ?= $resto['note_resto'] ?>/5</p>
		</article>

		<aside class="photo_resto col-sm-4 col-xs-6">
			<img class="img-thumbnail" src="< ?= $this->assetUrl("img/restos/" . $resto['photo']) ?>"><br /><br />
			<p> <span><b>NOTE MOYENNE :</span> < ?= $resto['note_resto'] ?>/5</b></p></center>
		</aside>
	
</div-->


    <script type="text/javascript">

		function initMap() {
		  var myLatLng = {lat: <?= $resto['latitude'] ?>, lng: 	
		<?= $resto['longitude'] ?>};

		  var map = new google.maps.Map(document.getElementById('map'), {
		    zoom: 15,
		    center: myLatLng
		  });

		  var marker = new google.maps.Marker({
		    position: myLatLng,
		    map: map,
		    title: 'Hello World!'
		  });
		}


    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8-lLSNW8u6Bbw6vZmeTVimRzBEfUvK-Y&callback=initMap">
    </script>


<?php $this->stop('main_content') ?>