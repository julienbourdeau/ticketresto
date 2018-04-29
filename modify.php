<?php
	
	require_once 'lib/functions.php';

	if(isset($_POST['action'])){
		switch ($_POST['action']) {

			case 'create':
				$id = add_client(		
								$_POST['nom'], 
								$_POST['prenom'], 
								$_POST['adresse'], 
								$_POST['email'], 
								$_POST['telephone'], 
								$_POST['commentaire'], 
								$_POST['valticket'], 
								$_POST['solde']
							);
				if ($id) {
					header( "Location: fiche.php?notif=10&id=" . $id['LAST_INSERT_ID()'] );
					exit();
				} else {
					header( "Location: addForm.php?notif=40" );
					exit();
				}
				
				break;
			

			case 'update':
				update_client(	$_POST['id'], 
								$_POST['nom'], 
								$_POST['prenom'], 
								$_POST['adresse'], 
								$_POST['email'], 
								$_POST['telephone'], 
								$_POST['commentaire'], 
								$_POST['valticket']
							);
				header("Location: fiche.php?notif=11&id=" . $_POST['id']);
				exit();
				break;
			

			case 'delete':
				$id = $_POST['id'];
				$h = delete_historique_by_id_client($id);
				$c = delete_client_by_id($id);
				if($h && $c) {
					header( "location: search.php?notif=13" );
					exit();
				} else {
					header( "location: modifyForm.php?notif=41&id=" . $id);
					exit();
				}
				break;
			
			default:
				# code...
				break;
		}
	}