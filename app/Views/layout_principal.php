<?php 

// Traitement message flash et session user
if(isset($_SESSION['message'])) { 
  $class_alert = $_SESSION['type'];
  $message = $_SESSION['message']; 

  if ($class_alert == 'error') {
  	$class_alert = 'danger';
  }

  unset($_SESSION['message']);
  unset($_SESSION['type']); 
}
else {
  $message = null;
} // FIN traitement du message Flash
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<!-- Pour internet Explorer : s'assurer qu'il utilise la dernière version du moteur de rendu -->
    <meta http-equiv="X-UA-Compatible" content="IE-edge">

    <!-- Bloquer le zoom sur les mobiles (car le site est responsive donc zoom inutile) -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--BOOTSTRAP-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!--CSS-->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css')?>">

	<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">

	<!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Macondo" rel="stylesheet">

	<!-- FONT AWESOME -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<!-- HTML5 chiv -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" integrity="sha256-3Jy/GbSLrg0o9y5Z5n1uw0qxZECH7C6OQpVBgNFYa0g=" crossorigin="anonymous"></script>

</head>


<body>

	<div class="container-fluid">


		<header>

			<nav class="navbar navbar-inverse navbar-static-top" role="navigation">

			    <div class="container-fluid">

					<div class="navbar-header">
					   <a class="navbar-brand" href="<?= $this->url('home') ?>" style="font-family: 'Macondo', cursive; font-size: 26px"><em>EATin' PARIS</em></a>
						
		      		   <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			       		  <span class="sr-only">Toggle navigation</span>
			        	  <span class="icon-bar"></span>
			        	  <span class="icon-bar"></span>
			           <span class="icon-bar"></span>
		      	       </button>
		    		</div>

		    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						
						<ul class="nav navbar-nav">
						    <li>
						    	<a href="<?= $this->url('home') ?>">RECHERCHER UN RESTO</a>
					    	</li>
						</ul>

						<ul class="nav navbar-nav navbar-right">
						<?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'Admin') : ?>					 
					    	<li><a href="<?= $this->url('restaurants_liste') ?>">Gestion des restaurants</a></li>
					    	<li><a href="<?= $this->url('utilisateurs_liste') ?>">Gestion des utilisateurs</a></li>	    	
				    	<?php endif ?>
						<!-- si utilisateur connecté -->
				      	<?php if(isset($_SESSION['user'])) : ?>				      						      	
		 					<li><a href="<?= $this->url('user_profil') ?>">Bonjour <span style="text-decoration: underline;"><?= $_SESSION['user']['pseudo'] ?></span> !</a></li>
					      	<li><a href="<?= $this->url('logout') ?>">Déconnexion</a></li>					    					   				  
					    <!-- si utilisateur non connecté ou déconnecté -->
				        <?php else : ?>        
				        	<li><a href="<?= $this->url('registerForm') ?>"><span class="glyphicon glyphicon-user"></span> INSCRIPTION</a></li>
					        <li><a href="<?= $this->url('loginForm') ?>"><span class="glyphicon glyphicon-log-in"></span> CONNEXION</a></li>				      	
				        <?php endif ?>
							
						</ul>
					</div>

				</div>
			
			</nav>	

		</header>

		

		<section>

		<!-- Affichage du message flash -->
			<?php if($message!=null) : ?>
    		<div class="alert alert-<?php echo $class_alert; ?>" style="margin-top: 52px; margin-bottom: 0; margin-right: -15px;"> <?= $message ?></div>
			<?php endif ?>
			<!-- FIN Affichage du message flash -->
			<?= $this->section('main_content') ?>
		</section>

		
			<div class="footer_du_haut row">
				<div class="gmap col-sm-4 col-xs-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10502.59078211048!2d2.336699997721844!3d48.845858368579115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb2bbd365849898f2!2sWebforce3!5e0!3m2!1sfr!2sfr!4v1488038947825" width="100%" height="190px" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                
                <!-- Formulaire de Newsletter -->
                <div class="newsletter col-sm-4 col-xs-12">
                    <form name="newsletter" action="" method="POST">
                        
                            <legend style="color: white; text-align: center;">Newsletter</legend>
                            	                      
                            <div class="row">
                            	<div class="form-group col-sm-offset-1 col-sm-10 col-xs-12">
                            		<input type="text" class="form-control" name="pseudo" placeholder="Pseudo" />
                            	</div >
                            </div>
                            <div class="row">
                            	<div class="form-group col-sm-offset-1 col-sm-10 col-xs-12">
                            		<input type="email" class="form-control" name="email" placeholder="Adresse Email...">
                            	</div>
                            </div>

                            	<input type="submit" style="margin-top: -3px;" class="btn btn-default col-sm-offset-4 col-sm-4" value="M'inscrire !" />	                                                                                               
                    </form>
                </div>
                
                <div class="contact col-sm-4 col-xs-12">
                    <h3>Contactez-nous</h3>
                    <address>
                        <strong>EATin' PARIS</strong><br />
                        <i class="fa fa-mobile" aria-hidden="true"></i> <a href="tel:+33684935093" title="Téléphone"><i class="telephone" aria-hidden="true"></i> 06 84 93 50 93</a><br />
                        <a href="mailto:find_my_food@gmail.com" title="Adresse Email"><i class="e-mail" aria-hidden="true"></i> eatinparis@gmail.com</a><br />
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        3 rue Webforce<br />
                        PARIS<br />
                        FRANCE
                    </address>
                </div>
			</div> <!--FIN footer_du_haut-->

			<div class="ftr row">
				<footer class="footer_du_bas col-xs-12">
					<p><em>EATin' PARIS</em> &copy; <?= date('Y') ?> </p>
				</footer>
			</div>

		

	<script src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous">			  	
	</script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		
	</div>
</body>
</html>