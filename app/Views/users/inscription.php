<?php $this->layout('layout_principal', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>

			
<div class="contenu">
	<img src="../public/assets/img/front/connexion.jpg" class="fonddecran">

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-sm-offset-3 col-sm-6 col-xs-12" style="margin-top: 30px; margin-bottom: 30px; padding: 20px">
                <div class="form-wrap">
                <h1>INSCRIPTION</h1>

					<form role="form" method="POST" enctype="multipart/form-data" action="<?= $this->url('addUser') ?>" id="login-form" autocomplete="off">
						<div class="row">
							<div class="form-group">
					       	    <label for="nom">Nom :</label>
							    <input type="text" value="<?= (isset($_POST['nom'])) ? $_POST['nom'] : '' ?>" name="nom" class="form-control" id="nom" placeholder="<?= (isset($_POST['nom'])) ? $_POST['nom'] : '' ?>">
						    </div>
						</div>
						<div class="row">
							<div class="form-group">
					       	    <label for="prenom">Prénom :</label>
							    <input type="text" value="<?= (isset($_POST['prenom'])) ? $_POST['prenom'] : '' ?>" name="prenom" class="form-control" id="prenom" placeholder="<?= (isset($_POST['prenom'])) ? $_POST['prenom'] : '' ?>">
						    </div>
						</div>
						<div class="row">
						    <div class="form-group">
						        <label for="pseudo">Pseudo :</label>
						        <input type="text" value="<?= (isset($_POST['pseudo'])) ? $_POST['pseudo'] : '' ?>" name="pseudo" class="form-control" id="pseudo" placeholder="<?= (isset($_POST['pseudo'])) ? $_POST['pseudo'] : '' ?>">
						    </div>
						</div>
						<div class="row">
						    <div class="form-group">
						        <label for="avatar">Avatar :</label>
						        <input type="file" name="avatar" class="form-control" id="avatar">
						    </div>
						</div>
						<div class="row">
						    <div class="form-group">
						        <label for="email">Adresse e-mail :</label>
						        <input type="email" value="<?= (isset($_POST['email'])) ? $_POST['email'] : '' ?>" name="email" class="form-control" id="email" placeholder="<?= (isset($_POST['email'])) ? $_POST['email'] : '' ?>">
						    </div>
						</div>
						<div class="row">
						    <div class="form-group">
						        <label for="pwd">Mot de passe :</label>
						        <input type="password" value="<?= (isset($_POST['mdp'])) ? $_POST['mdp'] : '' ?>" name="mdp" class="form-control" id="pwd" placeholder="<?= (isset($_POST['mdp'])) ? $_POST['mdp'] : '' ?>">
						    </div>
						</div>
						<div class="row">
							<div class="form-group">
					       	    <label for="adresse">Adresse :</label>
							    <input type="text" value="<?= (isset($_POST['adresse'])) ? $_POST['adresse'] : '' ?>" name="adresse" class="form-control" id="adresse" placeholder="<?= (isset($_POST['adresse'])) ? $_POST['adresse'] : '' ?>">
						    </div>
						</div>
						<div class="row">
							<div class="form-group">
					       	    <label for="cp">Code postal :</label>
							    <input type="text" value="<?= (isset($_POST['cp'])) ? $_POST['cp'] : '' ?>" name="cp" class="form-control" id="cp" placeholder="<?= (isset($_POST['cp'])) ? $_POST['cp'] : '' ?>">
						    </div>
						</div>
						<div class="row">
							<div class="form-group">
					       	    <label for="ville">Ville :</label>
							    <input type="text" value="<?= (isset($_POST['ville'])) ? $_POST['ville'] : '' ?>" name="ville" class="form-control" id="ville" placeholder="<?= (isset($_POST['ville'])) ? $_POST['ville'] : '' ?>">
						    </div>
						</div>
						<div class="row">
							<div class="form-group">
					       	    <label for="telephone">Téléphone :</label>
							    <input type="tel" value="<?= (isset($_POST['telephone'])) ? $_POST['telephone'] : '' ?>" name="tel" class="form-control" id="telephone" placeholder="<?= (isset($_POST['telephone'])) ? $_POST['telephone'] : '' ?>">
						    </div>
						</div>
						  	<br>
					  	<div class="row">
					    	<button type="submit" class="btn btn-default col-sm-offset-3 col-sm-6 col-xs-12">S'INSCRIRE</button>
					    </div>
					</form>

				</div>
			</div>
		</div>
	</div>
</section>

</div>


<?php $this->stop('main_content') ?>

