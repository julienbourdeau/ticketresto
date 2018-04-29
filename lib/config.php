<?php

	//ce fichier est appelé a la fin de 'functions.php' via require_once
	
	//setlocale(LC_ALL, 'fr_FR', 'french', 'fr', 'fr_FR.ISO8859-1');
	setlocale(LC_TIME, 'fr_FR', 'french', 'fr', 'fr_FR.ISO8859-1');

	//define("UPDATE_REQUIRED", 1);
	
	//define_all_options();

	define("MESSAGE10", "<div class='alert alert-success'>Le client a bien été ajouté </div>");
	define("MESSAGE11", "<div class='alert alert-success'>Le client a bien été modifié </div>");
	define("MESSAGE13", "<div class='alert alert-success'>Le client a bien été supprimé </div>");
	define("MESSAGE19", "<div class='alert alert-success'>Les modifications ont bien été effectuées </div>");



	define("MESSAGE40", "<div class='alert alert-danger'>Le client n'a pas pu être ajouté </div>");
	define("MESSAGE41", "<div class='alert alert-danger'>Le client n'a pas pu être modifié </div>");
	define("MESSAGE43", "<div class='alert alert-danger'>Le client n'a pas pu être supprimé </div>");
	define("MESSAGE44", "<div class='alert alert-danger'>Le client n'existe pas ou n'a pas pu etre retrouvé </div>");
