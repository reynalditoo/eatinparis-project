<?php
namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;
use \Model\ReservationsModel;
use \W\Security\AuthentificationModel;
use \Respect\Validation\Validator as v;



class UsersController extends Controller {

	// AFFICHE LE FORMULAIRE D'INSCRIPTION
	public function registerForm() {
		/*debug($_SERVER);*/
		$this->show('users/inscription');
	}

	// AJOUTE UN NOUVEL UTILISATEUR
	public function addUser() {

		//Instanciation d'un objet du la class "UsersModel" pour l'accès à la BDD
		$userTable = new UsersModel();
		$auth = new AuthentificationModel();
		$errors = [];
		        /* On vérifie si un champ est vide---------------------------------
        ** Une façon de faire radicale : si un seul champ est vide,
        ** => on renvoie un message d'erreur       */
		if(trim($_POST['email'] == '') || trim($_POST['pseudo'] == '') || trim($_POST['mdp'] == '') ) {
			$message ='Tous les champs sont requis !';
			$errors[] = $message;
			//$auth->setFlash($message, 'error');
			//$this -> redirectToRoute('registerForm');
            //$this->show('users/inscription');
		}
	 	
        // Respect validator (Respect\Validation\Validator)---------
        $is_length_login = v::stringType()->length(3, 15)->validate($_POST['pseudo']); //true
        if($is_length_login == false) {
        	$message = 'Le pseudo doit faire entre 3 et 15 caractères maximum';
        	$errors[] = $message;
			//$auth->setFlash($message, 'error');
			//$this -> redirectToRoute('registerForm');
        }

        $is_email = v::email()->validate($_POST['email']); // true
        if($is_email == false) {
        	$message = 'Merci de renseigner un Email valide';
			$errors[] = $message;
			//$auth->setFlash($message, 'error');
			//$this -> redirectToRoute('registerForm');
        }

        $is_length_password = v::stringType()->length(5, 15)->validate($_POST['mdp']); //true
        if($is_length_password == false) {
        	$message = 'Le Mot de passe doit faire entre 5 et 15 caractères maximum';
			$errors[] = $message;
			//$auth->setFlash($message, 'error');
			//$this -> redirectToRoute('registerForm');
			//$this->redirectToRoute('user_register_form');
        }//----------------------------------------------------------------
		 /* 
        ** On vérifie que l'Email et le Username ne sont pas déjà utilisés avant d'insérer les données.
        ** Si l'Email ou le Username sont déjà utilisés, on redirige l'utilisateur vers la page du formulaire d'inscription avec le message d'erreur.
        */
		if($userTable->emailExists($_POST['email'])){
			$errors[] = 'Cet Email existe déjà, utilisez un autre Email';
			//$this-> redirectToRoute('registerForm');
		}

		if($userTable->usernameExists($_POST['pseudo'])){
			$errors[] = 'Ce pseudo existe déjà, utilisez un autre pseudo';
			//$this-> redirectToRoute('registerForm');// (utilisez le nom de la route pour afficher VOTRE formulaire)
		}
	
		if(empty($errors)) {
			/* 
	        ** Si l'Email et le Username n'existent pas alors on peut ajouter le nouvel utilisateur en BDD
	        */

			//$_FILES est une superglobale (ARRAY multidimentionnel) qui récupère les infos de chaque fichier "uploadé", Pour chacun, on récupère le nom, le type, l'emplacement temporaire, erreur (1,2,3,4,6,7,8, cf la doc PHP.net), et la taille en octets.
			
			// Vérifications des données
			
			// traitement sur les photos :
			$nom_photo = 'default.jpg';
			
			// Si je suis dans le cadre d'une modification de produit, alors, il doit y avoir un champs photo actuelle dans le formulaire. Donc $nom_photo va prendre la valeur de la photo actuelle pour la ré-enregistrer telle qu'elle est ! 
			if(isset($_POST['avatar'])){
				$nom_photo = $_POST['avatar'];
			}	
			if(!empty($_FILES['avatar']['name'])){ // Si l'utilisateur nous a transmis une photo
				if($_FILES['avatar']['error'] == 0){	
					$ext = explode('/', $_FILES['avatar']['type']); // enlève le slash entre le nom de l'avatar et son extension
					$ext_autorisee = array('jpeg', 'jpg', 'gif', 'png');		
					if(in_array($ext[1], $ext_autorisee)){ // vérifie si l'extension de l'avatar ($ext[1]) est présente dans $ext_autorisee
						if($_FILES['avatar']['size'] < 1000000){
					
							// On renomme la photo pour éviter les doublons dans le dossier photo/
							$nom_avatar = $_POST['pseudo'] . '_' . $_FILES['avatar']['name'];
							$nom_avatar = utf8_decode($nom_avatar);
							// enregistrer la photo dans le dossier photo/
							$chemin_avatar = '/kunden/homepages/12/d676269006/htdocs/eatinparis/public/assets/img/avatars/' . $nom_avatar;
							copy($_FILES['avatar']['tmp_name'], $chemin_avatar); // La fonction copy() permet de copier/coller un fichier d'un emplacement à un autre. Elle attend 2 args : 1/ L'emplacement du fichier à copier et 2/ l'emplacement définitif de la copie. 
							
						}
						else{
							$message = 'Taille maximum des images';
							$errors[] = $message;
						}
					}
					else{
						$message = 'Extensions autorisées : PNG, JPG, JPEG, GIF';
						$errors[] = $message;
					}
				}
				else{
					$message = 'Veuillez sélectionner une nouvelle image';
					$errors[] = $message;
				}
			}


			$newUser = array(
				'pseudo' => htmlentities($_POST['pseudo']),
				'mdp' => $auth->hashPassword($_POST['mdp']),
				'nom' => $_POST['nom'],
				'prenom' => $_POST['prenom'],
				'avatar' => $nom_avatar,
				'email' => $_POST['email'],
				'adresse' => $_POST['adresse'],
				'ville' => $_POST['ville'],
				'cp' => $_POST['cp'],
				'tel' =>$_POST['tel'],
				'role' => 'user'
				);
			//debug($_POST);
			//ajout de l'utilisateur avec la fonction insert() dispo dans W/Model/Model.php
			if($userTable->insert($newUser)) {
				// Si l'enregistrement est OK on affiche la page d'acceuil avec le message de succès
				$auth->setFlash('Ok vous êtes inscrit', 'success');
				$this->redirectToRoute('loginForm');
			} else {
				$auth->setFlash('Probleme serveur, veuillez réessayer plutard', 'error');
				// Sinon on reste sur la page et on affiche le message d'erreur		
				$this->redirectToRoute('home');
			}
		} else {
			$auth->setFlash(implode('<br>', $errors), 'error');
			$this->show('users/inscription');
		}

		
	}

	// FORMULAIRE DE CONNEXION
	public function loginForm() {
		$this->show('users/connexion');
	}

	// TRAITEMENT DE LA CONNEXION
	public function login() {
		//debug($_SESSION);

		$auth = new AuthentificationModel();		
			
		//vérification login/password
		if($auth->isValidLoginInfo(htmlentities($_POST['pseudo']), $_POST['mdp'])) {
				//récupération d'un "modèle" Utilisateur
				$util = new UsersModel();
				$user = $util -> getUserByUsernameOrEmail($_POST['pseudo']);
				//debug($user);
				//connexion de l'utilisateur
				$auth->logUserIn($user);
				//Affichage
				$auth->setFlash('Vous étes connecté(e)', 'success');
				$this->redirectToRoute('home');
				debug($_SESSION);	
			}
			else{

				$auth->setFlash('Login ou mot de passe erroné. Réessayez', 'error');
				$this-> redirectToRoute('loginForm');
			}
	}

	// DECONNEXION
	public function logout() {
		$auth = new AuthentificationModel;
		$auth->logUserOut();
		$auth->setFlash('Ok vous êtes déconnecté', 'info');
		$this->redirectToRoute('loginForm');		
	}

	// AFFICHE LE PROFIL D'UN UTILISATEUR CONNECTé
	public function profil() {
		/*echo "<pre>";
		print_r($_SESSION['user']);
		echo "</pre>";*/
		$infos_profil = new UsersModel;
		$profil = $infos_profil->find($_SESSION['user']['id']);
		
        // AFFICHAGE DES RESERVATIONS DU PROFIL ---- Jek
        $resas_profil = new ReservationsModel;
        // findWithReservations() ? Voir ds ReservationsModel
        $reservations = $resas_profil->findWithReservations($_SESSION['user']['id']);

        /*echo '<h4>UsersController:</4>';
        echo '<pre>';
        print_r($profil);
        print_r($reservations);
        echo '</pre>';*/

        $this->show('users/profil', ['infos' => $profil, 'resas' => $reservations]);	
    }

	// FORMULAIRE DE MODIFICATION DU PROFIL DE L'UTILISATEUR 
	public function modificationForm() {
		$this->show('users/modification_form');
	}

	// TRAITEMENT DE LA MODIFICATION
	public function modification() {

		/*debug($_POST);*/

		$usemod = new UsersModel;
		$auth = new AuthentificationModel;
		$errors = [];

		        /* On vérifie si un champ est vide---------------------------------
        ** Une façon de faire radicale : si un seul champ est vide,
        ** => on renvoie un message d'erreur       */
		if(trim($_POST['email'] == '') || trim($_POST['pseudo'] == '') || trim($_POST['mdp'] == '') ) {
			$message ='Tous les champs sont requis !';
			$errors[] = $message;
            //$this->show('user/register_form', ['input'=>$_POST]);
		}
	 	
        // Respect validator (Respect\Validation\Validator)---------
        $is_length_login = v::stringType()->length(3, 15)->validate($_POST['pseudo']); //true
        if($is_length_login == false) {
        	$message = 'Le pseudo doit faire entre 3 et 15 caractères maximum';
			$errors[] = $message;
        }

        $is_email = v::email()->validate($_POST['email']); // true
        if($is_email == false) {
        	$message = 'Merci de renseigner un Email valide';
			$errors[] = $message;
        }

        $is_length_password = v::stringType()->length(5, 15)->validate($_POST['mdp']); //true
        if($is_length_password == false) {
        	$message = 'Le Mot de passe doit faire entre 5 et 15 caractères maximum';
			$errors[] = $message;
			//$this->redirectToRoute('user_register_form');
        }//----------------------------------------------------------------
		 /* 
        ** On vérifie que l'Email et le Username ne sont pas déjà utilisés avant d'insérer les données.
        ** Si l'Email ou le Username sont déjà utilisés, on redirige l'utilisateur vers la page du formulaire d'inscription avec le message d'erreur.
        */
		if($usemod->emailExists($_POST['email']) && $_POST['email'] != $_SESSION['user']['email']){
			$message = 'Cet Email existe déjà, utilisez un autre Email';
			$errors[] = $message;
		}

		if($usemod->usernameExists($_POST['pseudo']) && $_POST['pseudo'] != $_SESSION['user']['pseudo']){
			$message = 'Ce pseudo existe déjà, utilisez un autre pseudo';
			$errors[] = $message;
		}

		if(empty($errors)) 
		{
			/* 
	        ** Si l'Email et le Username n'existent pas alors on peut ajouter le nouvel utilisateur en BDD
	        */

			//$_FILES est une superglobale (ARRAY multidimentionnel) qui récupère les infos de chaque fichier "uploadé", Pour chacun, on récupère le nom, le type, l'emplacement temporaire, erreur (1,2,3,4,6,7,8, cf la doc PHP.net), et la taille en octets.
			
			// Vérifications des données
			
			// traitement sur les photos :
			$nom_photo = 'default.jpg';
			
			// Si je suis dans le cadre d'une modification de produit, alors, il doit y avoir un champs photo actuelle dans le formulaire. Donc $nom_photo va prendre la valeur de la photo actuelle pour la ré-enregistrer telle qu'elle est ! 
			if(isset($_POST['avatar'])){
				$nom_photo = $_POST['avatar'];
			}	
			if(!empty($_FILES['avatar']['name'])){ // Si l'utilisateur nous a transmis une photo
				if($_FILES['avatar']['error'] == 0){	
					$ext = explode('/', $_FILES['avatar']['type']); // enlève le slash entre le nom de l'avatar et son extension
					$ext_autorisee = array('jpeg', 'jpg', 'gif', 'png');		
					if(in_array($ext[1], $ext_autorisee)){ // vérifie si l'extension de l'avatar ($ext[1]) est présente dans $ext_autorisee
						if($_FILES['avatar']['size'] < 1000000){
					
							// On renomme la photo pour éviter les doublons dans le dossier photo/
							$nom_avatar = $_POST['pseudo'] . '_' . $_FILES['avatar']['name'];
							$nom_avatar = utf8_decode($nom_avatar);
							// enregistrer la photo dans le dossier photo/
							$chemin_avatar = '/kunden/homepages/12/d676269006/htdocs/eatinparis/public/assets/img/avatars/' . $nom_avatar;
							copy($_FILES['avatar']['tmp_name'], $chemin_avatar); // La fonction copy() permet de copier/coller un fichier d'un emplacement à un autre. Elle attend 2 args : 1/ L'emplacement du fichier à copier et 2/ l'emplacement définitif de la copie. 						
						}
						else{
							$message = 'Taille maximum des images';
							$errors[] = $message;
						}
					}
					else{
						$message = 'Extensions autorisées : PNG, JPG, JPEG, GIF';
						$errors[] = $message;
					}
				}
				else{
					$message = 'Veuillez sélectionner une nouvelle image';
					$errors[] = $message;
				}
			}
		

			$user_infos = array(
				'pseudo' => htmlentities($_POST['pseudo']),
				'nom' => $_POST['nom'],
				'prenom' => $_POST['prenom'],
				'email' => $_POST['email'],
				'mdp' => $auth->hashPassword($_POST['mdp']),
				'avatar' => $nom_avatar,
				'adresse' => $_POST['adresse'],
				'ville' => $_POST['ville'],
				'cp' => $_POST['cp'],
				'tel' =>$_POST['tel'],
				'role' => 'user'
				);

				if($usemod->update($user_infos, $_SESSION['user']['id'])) {
					// Si l'enregistrement est OK on affiche la page d'acceuil avec le message de succès
					$auth->setFlash('Profil modifié avec succès !', 'success');
					$this->redirectToRoute('user_profil');
				}
		} // fin if(empty($errors)) 
		else 
			{
			$auth->setFlash('Erreur lors de la soumission du formulaire.', 'error');
			// Sinon on reste sur la page et on affiche le message d'erreur
			$this->redirectToRoute('modification_form');
			}
	}

	// TRAITEMENT DE LA SUPPRESSION D'UN UTILISATEUR
	public function supprimerProfil($id) {
		$auth = new AuthentificationModel;
		$usersModel = new UsersModel;

		if($usemod = $usersModel->delete($id)) {
			$auth->logUserOut();
			$auth->setFlash('Votre compte a bien été supprimé', 'info');
			$this->redirectToRoute('home');
		}
	}

	// AFFICHE LA LISTE DES UTILISATEURS COTE BACK OFFICE
	public function utilisateursListe(){

		$UserModel = new UsersModel;

		$users = $UserModel->findAll();

		/*echo '<pre>';
		print_r($users);
		echo '</pre>';*/

		$this->show('users/userslist', ['utilisateurs'=>$users]);
	}


}