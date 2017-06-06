<?php $this->layout('layout_principal',['title' => 'PROFIL']) ?>


<?php $this->start('main_content') ?>


<div class="contenu">
	<img src="../public/assets/img/front/connexion.jpg" class="fonddecran">

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-sm-offset-3 col-sm-6 col-xs-12" style="margin-top: 30px; margin-bottom: 30px; padding: 20px">
                <div class="form-wrap">
                <h1>MODIFICATION DE PROFIL</h1>

					<form role="form" method="POST" enctype="multipart/form-data" action="<?= $this->url('modification') ?>" id="login-form" autocomplete="off">
						<div class="row">
							<div class="form-group col-xs-12">
					       	    <label for="nom">Nom :</label>
							    <input type="text" value="<?= (isset($_SESSION['user']['nom'])) ? $_SESSION['user']['nom'] : '' ?>" name="nom" class="form-control" id="nom">
						    </div>
						</div>
						<div class="row">
							<div class="form-group col-xs-12">
					       	    <label for="prenom">Prénom :</label>
							    <input type="text" value="<?= (isset($_SESSION['user']['prenom'])) ? $_SESSION['user']['prenom'] : '' ?>" name="prenom" class="form-control" id="prenom">
						    </div>
						</div>
						<div class="row">
						    <div class="form-group col-xs-12">
						        <label for="pseudo">Pseudo :</label>
						        <input type="text" value="<?= (isset($_SESSION['user']['pseudo'])) ? $_SESSION['user']['pseudo'] : '' ?>" name="pseudo" class="form-control" id="pseudo">
						    </div>
						</div>
						<div class="row">
						    <div class="form-group col-xs-12">
						        <label for="mdp">Mot de passe :</label>
						        <input type="text" value="<?= (isset($_SESSION['user']['mdp'])) ? $_SESSION['user']['mdp'] : '' ?>" name="mdp" class="form-control" id="pseudo">
						    </div>
						</div>
						<!-- <div class="row">
						<div class="form-group col-xs-12">
						        <label for="avatar">Avatar :</label>
						        <input type="file" name="avatar" class="form-control" id="avatar">
						    </div>
						</div> -->
						<div class="row">
						    <div class="form-group col-xs-12">
						        <label for="email">Adresse e-mail :</label>
						        <input type="email" value="<?= (isset($_SESSION['user']['email'])) ? $_SESSION['user']['email'] : '' ?>" name="email" class="form-control" id="email">
						    </div>
						</div>
						<div class="row">
							<div class="form-group col-xs-12">
					       	    <label for="adresse">Adresse :</label>
							    <input type="text" value="<?= (isset($_SESSION['user']['adresse'])) ? $_SESSION['user']['adresse'] : '' ?>" name="adresse" class="form-control" id="adresse">
						    </div>
						</div>
						<div class="row">
							<div class="form-group col-xs-12">
					       	    <label for="cp">Code postal :</label>
							    <input type="text" value="<?= (isset($_SESSION['user']['cp'])) ? $_SESSION['user']['cp'] : '' ?>" name="cp" class="form-control" id="cp">
						    </div>
						</div>
						<div class="row">
							<div class="form-group col-xs-12">
					       	    <label for="ville">Ville :</label>
							    <input type="text" value="<?= (isset($_SESSION['user']['ville'])) ? $_SESSION['user']['ville'] : '' ?>" name="ville" class="form-control" id="ville">
						    </div>
						</div>
						<div class="row">
							<div class="form-group col-xs-12">
					       	    <label for="telephone">Téléphone :</label>
							    <input type="tel" value="<?= (isset($_SESSION['user']['tel'])) ? $_SESSION['user']['tel'] : '' ?>" name="tel" class="form-control" id="telephone">
						    </div>
						</div>
						  	<br>
						<div class="row">
					    	<button type="submit" class="btn btn-default col-sm-offset-3 col-sm-6 col-xs-12">MODIFIER</button>
					    </div>
					</form>

				</div>
			</div>
		</div>
	</div>
</section>

</div>

<?php $this->stop('main_content') ?>