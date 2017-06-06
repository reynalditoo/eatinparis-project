<?php $this->layout('layout_principal', ['title' => 'ACCUEIL']) ?>

<?php $this->start('main_content') ?>
	

	
<div id="home">

	<div id="myCarousel" class="carousel_search slide row" data-ride="carousel">
	  
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
	    <div class="item active">
	      <img src="<?= $this->assetUrl('img/carrousel/spaghettis.jpg')?>" alt="spaghettis">
	    </div>

	    <div class="item">
	      <img src="<?= $this->assetUrl('img/carrousel/paella.jpg')?>" alt="paella">
	    </div>

	    <div class="item">
	      <img src="<?= $this->assetUrl('img/carrousel/couscous.jpg')?>" alt="couscous">
	    </div>

	    <div class="item">
	      <img src="<?= $this->assetUrl('img/carrousel/sushis.jpg')?>" alt="sushis">
	    </div>

	    <div class="item">
	      <img src="<?= $this->assetUrl('img/carrousel/tacos.jpg')?>" alt="tacos">
	    </div>

	    <div class="item">
	      <img src="<?= $this->assetUrl('img/carrousel/mafe.jpg')?>" alt="mafe">
	    </div>

	    <div class="item">
	      <img src="<?= $this->assetUrl('img/carrousel/boeuf-bourguignon.jpg')?>" alt="boeuf-bourguignon">
	    </div>
	  </div>

	</div>

	<div id="home_search" class="row home_search_2" style="top: 90px;">

		<form method="POST" action="<?= $this->url('plats_search') ?>">
			<div class="form-group col-sm-offset-2 col-sm-3 col-xs-12">
				<label>Une envie ?</label>
					<select class="form-control" name="plat" value="<?= $_POST['plat'] ?>">
						<option value="<?= $_POST['plat'] ?>"><?= $_POST['plat'] ?></option>
						<option value="couscous">Couscous</option>
						<option value="Baiser antillais">Baiser antillais</option>
						<option value="Burritos">Burritos</option>
						<option value="sushis">Sushis</option>
						<option value="riz cantonnais">Riz cantonnais</option>
						<option value="poulet tikka massala">Poulet tikka massala</option>
					</select>
			</div>

			<div class="form-group col-sm-3 col-xs-12">
				<label>Un lieu ?</label>
					<select class="form-control" name="cp">
						<option value="<?= $_POST['cp'] ?>"><?= $_POST['cp'] ?></option>
						<option value="75001">75001</option>
						<option value="75005">75005</option>
						<option value="75006">75006</option>
						<option value="75009">75009</option>
						<option value="75013">75013</option>
						<option value="75014">75014</option>
						<option value="75015">75015</option>
						<option value="75016">75016</option>
						<option value="75018">75018</option>
					</select>
			</div>

			<div id="bouton" class="col-sm-2 col-xs-12" style="top: 59px">
				<input id="btn" class="btn btn-default" type="submit" value="GO !">
			</div>
		</form>

		<?php if($restos == null) : ?>

			<div class=" col-sm-offset-2 col-sm-7 col-xs-12">
		    	<div style="height: 50px; width: 100%; background-color: red; border-radius: 10px">
		    		<p style="color: white; text-align: center; font-size: 17px;">
		    			Oops, la recherche n'a retourné aucun résultat...   <i class="em em-eyes"></i>
		    		</p>
		    	</div>
	    	</div>

	    <?php endif; ?>
	
	</div>


	<div class="row vignette">

		<?php foreach ($restos as $resto) : ?>
					
		   <div class="col-md-3 col-sm-4 col-xs-6">
		      
	        <a href="<?= $this->url('restaurant_profil', ['id' => $resto['id'], 'slug' => $resto['slug'] ]) ?>"><img class="img-thumbnail" src="<?= $this->assetUrl("img/restos/" . $resto['photo']) ?>"></a>
	        <p><?= $resto['nom'] ?></p>
		   </div>

		<?php endforeach; ?>


	</div>

</div>

<?php $this->stop('main_content') ?>