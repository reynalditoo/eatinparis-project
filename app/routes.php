<?php
	
	$w_routes = array(
		

		//Affichage liste Users
		//['GET', '/users', 'Users#userslist', 'users_userslist']

		['GET', '/', 'Home#affichage', 'home'],
		['POST', '/', 'Restaurants#searchRestoByPlat', 'plats_search'],

		// FICHE RESTO
		['GET', '/restaurant/[:slug]/[:id]', 'Restaurants#profil', 'restaurant_profil'],
		/*['POST', '/restaurant/[:slug]/[:id]', 'Commentaires#post_comment', 'post_comment'],*/

		// INSCRIPTION
		['GET', '/inscription', 'Users#registerForm', 'registerForm'],
		['POST', '/inscription', 'Users#addUser', 'addUser'],

		// LOGIN
		['GET', '/login', 'Users#loginForm', 'loginForm'],
		['POST', '/login', 'Users#login', 'login'],

		// LOGOUT
		['GET', '/logout', 'Users#logout', 'logout'],


		// => 5 controllers : Home, Plats, Restaurants, Commentaires, Users,
        
        // FICHE USER --------------------------------------------------- Reynald
		['GET', '/profil', 'Users#profil', 'user_profil'],
		['GET', '/profil/modifier', 'Users#modificationForm', 'modification_form'],
		['POST', '/profil/modifier', 'Users#modification', 'modification'],
		['GET', '/profil/suppression/[:id]', 'Users#supprimerProfil', 'supprimer_profil'],
		//----------------------------------------------------------------------

		// FICHE USER -> COMMENTAIRE a partir des RESERVATIONS du USER ----------------- Jek-25
		['GET', '/reservations/[:id]', 'Reservations#listeReservations', 'reservations_liste'],
		//----------------------------------------------------------------------

		// FICHE RESTAURANT -> RESERVATION -------------------------------------------- Jek 26
		['GET', '/reservation/[:id]', 'Reservations#reservationForm', 'reservation_form'],
		['POST', '/reservation/', 'Reservations#ajouterReservation', 'ajouter_reservation'],

		// COMMENTAIRES ---------------------------------------------------- Jek 24
		//RAPPEL:	url 				CtrlR # Méthode				NomRouteAlias
		['GET', '/commentaire/[:id]', 'Commentaire#commentaireForm', 'commentaire_form'],
		// avertissement modérateur
		['POST', '/commentaire', 'Commentaire#ajouterCommentaire', 'ajouter_commentaire'],
		//----------------------------------------------------------------------


	// BACK OFFICE 

		// GESTION DES RESTAURANTS

		// liste restaurants ------------------------------------------ Mourtada
		['GET', '/gestion-restaurants', 'GestionRestaurants#listeRestaurants', 'restaurants_liste'],
		//ok

		// formulaire ajouter restaurant
		['GET', '/ajout-restaurants', 'GestionRestaurants#addRestaurantForm', 'ajouter_restaurant_form'],

		['POST', '/ajout-restaurants', 'GestionRestaurants#addRestaurants', 'ajouter_restaurant'],
		//ok

		['GET', '/details-restaurant/[:slug]/[:id]', 'GestionRestaurants#details', 'details_restaurant'],
		//ok

		//formulaire modification restaurants
		['GET', '/modifier-restaurant/[:id]', 'GestionRestaurants#modifRestaurantForm', 'modifier_restaurant_form'],
		//ok

		['POST', '/modifier-restaurant/[:id]', 'GestionRestaurants#modifRestaurant', 'modifier_restaurant'],

		//supprimer restaurants
		['GET', '/supprimer-restaurants/[:id]', 'GestionRestaurants#supprimerRestaurant', 'supprimer_restaurant'],
		// ok
		//----------------------------------------------------------------------


		//GESTION DES PLATS

		['GET', '/gestion-plats/[:id]', 'GestionPlats#listePlats', 'liste_plats'],
		['GET', '/ajout-plat', 'GestionPlats#ajoutPlatForm', 'ajout_plat_form'],
		['POST', '/ajout-plats', 'GestionPlats#addPlat', 'ajouter_plat'],

		//supprimer plat
		['GET', '/supprimer-plat/[:id]/[:resto]', 'GestionPlats#supprimerPlat', 'supprimer_plat'],


		//GESTION DES COMMENTAIRES
		['GET', '/gestion-commentaires/[:id]', 'GestionCommentaires#listeCommentaires', 'commentaires_liste'],
		//supprimer commentaire
		['GET', '/supprimer-commentaires/[:id]', 'GestionCommentaires#supprimerCommentaire', 'supprimer_commentaire'],


// GESTION DES USERS
		//Affichage liste Users
		['GET', '/gestion-utilisateurs', 'GestionUsers#utilisateursListe', 'utilisateurs_liste'],
//VU

		//FORMULAURE MODIF USER
		['GET', '/modifier-user/[:id]', 'GestionUsers#modifUserForm', 'modifier_user_form'],
		//ok
		['POST', '/modifier-user/[:id]', 'GestionUsers#modifUser', 'modifier_user'],
		//pas ok

		//supprimer Users
		['GET', '/supprimer-user/[:id]', 'GestionUsers#supprimerUser', 'supprimer_user']

	);
