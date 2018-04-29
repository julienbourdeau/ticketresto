<?php


	require_once('lib/DBTools.php');
	require_once('lib/functions.php');
	
	if(isset($_POST['action'])) {
		$action = $_POST['action'];
		$id = $_POST['id']; //$id correspond a l'id du client
		$prevsolde = $_POST['solde'];
		
		if($action == "majsolde"){
			$newsolde = $_POST['newsolde'];
			update_solde($id, $newsolde);
			$modif = $newsolde - $prevsolde;
			add_action_historique($id, $modif, $prevsolde);
			$data = get_by_id($id);
			include('fiche.php');
		}
		if($action == "calcul"){
			$montant = $_POST['montant'];
			$nombre = $_POST['nombre'];
			$valeur = $_POST['valeur'];
			$data = get_by_id($id);
			  $solde = $data['solde'];
			//calcul et mise a jour
			$newsolde = $solde + ($nombre*$valeur) - $montant;
			update_solde($id, $newsolde);
			$modif = $newsolde - $prevsolde;
			add_action_historique($id, $modif, $prevsolde);
			$data = get_by_id($id);
			include('fiche.php');
		}
		if($action == "ajout"){
			$nombre = $_POST['nombre'];
			$valeur = $_POST['valeur'];
			$data = get_by_id($id);
			  $solde = $data['solde'];
			//calcul et mise a jour
			$newsolde = $solde + ($nombre*$valeur);
			update_solde($id, $newsolde);
			$modif = $newsolde - $prevsolde;
			add_action_historique($id, $modif, $prevsolde);
			$data = get_by_id($id);
			include('fiche.php');
		}
		
	}
	
?>
		