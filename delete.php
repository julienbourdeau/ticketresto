<?php
	
	require_once 'lib/DBTools.php';
	require_once 'lib/functions.php';
	
	//Create Var
	$type = $_GET['type'];
	$id = $_GET['id'];
	
	switch($type){
		
		case 'client':
			$h = delete_historique_by_id_client($id);
			$c = delete_client_by_id($id);
			if($h && $c) {
				header('location: http://localhost/ticketresto/modifylist.php');
				exit;
			} else {
				echo "Une erreur s'est produite lors de la suppression d'un client.";
			}
		
		default: 
			break;	
		
	}