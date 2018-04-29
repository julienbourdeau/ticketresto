<?php

	require_once('lib/DBTools.php');
	require_once('lib/functions.php');


	if(isset($_POST['action'])) {

		$id_client = $_POST['id'];
		$prevsolde = $_POST['solde'];


		switch ($_POST['action']) {

			case 'raz':

				//calcul et mise a jour
				update_solde($id_client, 0);
				add_action_historique($id_client, $prevsolde, 0);

				header("Location: fiche.php?notif=19&id=".$id_client);
				break;


			case 'updatesolde':

				$newsolde = $_POST['newsolde'];

				update_solde($id_client, $newsolde);
				add_action_historique($id_client, $prevsolde, $newsolde);
				
				header("Location: fiche.php?notif=19&id=".$id_client);
				exit();
				break;


			
			case 'calcul':

				$montant = $_POST['montant'];
				$nombre = $_POST['nombre'];
				$valeur = $_POST['valeur'];

				//calcul et mise a jour
				$newsolde = $prevsolde + ($nombre*$valeur) - $montant;
				update_solde($id_client, $newsolde);
				add_action_historique($id_client, $prevsolde, $newsolde);

				header("Location: fiche.php?notif=19&id=".$id_client);
				exit();
				break;



			case 'addcredit':

				$nombre = $_POST['nombre'];
				$valeur = $_POST['valeur'];

				//calcul et mise a jour
				$newsolde = $prevsolde + ($nombre*$valeur);
				update_solde($id_client, $newsolde);
				add_action_historique($id_client, $prevsolde, $newsolde);

				header("Location: fiche.php?notif=19&id=".$id_client);
				exit();
				break;


			default:
				# code...
				break;
		}
		
	}