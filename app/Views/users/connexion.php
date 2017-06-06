<?php $this->layout('layout_principal', ['title' => 'Connexion']) ?>

<?php $this->start('main_content') ?>



<div class="contenu">
	<img src="../public/assets/img/front/connexion.jpg" class="fonddecran">


<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-4 col-md-4 col-xs-12">
                <div class="form-wrap" style="margin-top: 30px; margin-bottom: 30px">
                <h1>CONNEXION</h1>

                    <form role="form" action="<?= $this->url('login') ?>" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="pseudo" class="sr-only">Pseudo</label>
                            <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="<?= (isset($_POST['pseudo'])) ? $_POST['pseudo'] : '' ?>">
                        </div>

                        <div class="form-group">
                            <label for="mdp" class="sr-only">Mot de passe</label>
                            <input type="password" name="mdp" id="mdp" class="form-control" placeholder="Votre mot de passe">
                        </div>

                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="SE CONNECTER">


			            <div class="row"> <!-- Partie réseaux sociaux -->
			                <div class="col-sm-6 col-sm-offset-3 social-login">
			                    <h3>Ou connectez-vous avec :</h3>

			                    
			                    <nav class="reseauxsociaux">
			                    	<ul>
			                    		<li><a class="btn btn-link-2" href="https://fr-fr.facebook.com/"><i class="fa fa-facebook"></i> Facebook</a></li>

				                        <li><a class="btn btn-link-2" href="https://twitter.com/?lang=fr"><i class="fa fa-twitter"></i> Twitter</a></li>

				                        <li><a class="btn btn-link-2" href="https://plus.google.com/collections/featured?hl=fr"><i class="fa fa-google-plus"></i> Google Plus</a></li>
				                    </ul>
			                    </nav>
			  
			                </div>

			            </div>

			        </form>
                     <!--<a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a> -->
                    <hr>
                </div>
            </div> <!-- /.col-xs-12 -->

 


        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

</div> <!-- / Fin de contenu -->

<?php $this->stop('main_content') ?>