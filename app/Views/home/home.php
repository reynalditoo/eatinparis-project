<?php $this->layout('layout_principal', ['title' => 'ACCUEIL']) ?>

<?php $this->start('main_content') ?>
	
<div id="home">

	<div id="myCarousel" class="carousel slide row" data-ride="carousel">
	  
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



	<div id="home_search" class="row">

		<div class="row col-xs-12 slogan">
			<p>Paris, vue de l'estomac</p>
		</div>

		<form method="POST" action="<?= $this->url('plats_search') ?>">
			<div class="form-group col-sm-offset-2 col-sm-3 col-xs-12">
				<label>Une envie ?</label>
				<!-- <input type="text" name="plat" class="form-control" placeholder="Entrez un plat"> -->
				<select class="form-control" name="plat">
				<option></option>
				<option value="couscous" selected>Couscous</option>
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
				<option></option>
				<option value="75001">75001</option>
				<option value="75005">75005</option>
				<option value="75006">75006</option>
				<option value="75009">75009</option>
				<option value="75013">75013</option>
				<option value="75014" selected>75014</option>
				<option value="75015">75015</option>
				<option value="75016">75016</option>
				<option value="75018">75018</option>
				</select>
			</div>

			<div class="col-sm-2 col-xs-12" style="top: 59px">
				<input id="btn" class="btn btn-default" type="submit" value="GO !">
			</div>
		</form>

		

	</div>

</div>

<?php $this->stop('main_content') ?>
