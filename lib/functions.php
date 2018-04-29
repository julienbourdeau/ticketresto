<?php

require_once 'DBTools.php';


function get_table($table){
	$req = "SELECT * FROM ".$table;
	return query_safe($req);
}

function get_clients_ordered(){
	$req = "SELECT * FROM clients ORDER BY nom ASC";
	return query_safe($req);
}

function add_client($nom, $prenom, $adresse, $email, $telephone, $commentaire, $valticket, $solde) {
	if(is_null($solde)) $solde = 0;
	
	$req = sprintf("INSERT INTO clients (nom, prenom, adresse, email, telephone, commentaire, valticket, solde, timestamp) VALUES ('%s' ,'%s', '%s', '%s' ,'%s','%s','%F', '%F', '%F')",
		s($nom),
		s($prenom),
		s($adresse),
		s($email),
		s($telephone),
		s($commentaire),
		s($valticket),
		round($solde, 2),
		time() );
	
	$res = query_safe($req);

	if($res){
		return mysql_fetch_array( query_safe("SELECT LAST_INSERT_ID()") );
	}
}

function update_client($id, $nom, $prenom, $adresse, $email, $telephone, $commentaire, $valticket) {
	
	$req = sprintf("UPDATE clients SET nom='%s' , prenom='%s' , adresse='%s', email='%s' , telephone='%s' , commentaire='%s' , valticket='%F' WHERE id=%F",
		s($nom),
		s($prenom),
		s($adresse),
		s($email),
		s($telephone),
		s($commentaire),
		s($valticket),
		s($id) );

	return query_safe($req);
}

function get_by_nom($nom) {
	$req = "SELECT * FROM clients WHERE nom LIKE '%" . s($nom) ."%'";
	return query_safe($req);
}

function get_by_id($id) {
	$req = "SELECT * FROM clients WHERE id='".s($id)."'";
	return mysql_fetch_array(query_safe($req));
}

function update_solde($id, $newsolde){
	$timestamp = time();
	//$newsolde = $newsolde * 1;
	//var_dump($newsolde); die();
	//var_dump(round($newsolde, 2)); die();

	$req = "UPDATE clients SET solde='".round($newsolde, 2)."', timestamp='$timestamp' WHERE id='$id'";
	query_safe($req);
}

function count_by_nom($nom){
	$req = "SELECT COUNT(nom) FROM clients WHERE nom LIKE '%" .s($nom). "%'";
	return mysql_fetch_array(query_safe($req));
}

function delete_client_by_id($id) {
	$req = "DELETE FROM clients WHERE id=".s($id);
	return query_safe($req);
}

function delete_historique_by_id_client($id) {
	$req = "DELETE FROM historique WHERE client=".s($id);
	return query_safe($req);
}

function get_historique_by_client($idClient){
	$req = sprintf("SELECT timestamp, modif, prevsolde, newsolde FROM historique WHERE client = %F ORDER BY timestamp DESC LIMIT 6", $idClient);
	return query_safe($req);
}

function add_action_historique($idClient, $prevsolde, $newsolde) {
	$req = sprintf("INSERT INTO historique (client, modif, prevsolde, newsolde, timestamp) VALUES (%F, %F, %F, %F, %F)",
	$idClient,
	$newsolde - $prevsolde,
	$prevsolde,
	$newsolde,
	time() );

	query_safe($req);
}

function update_option($key, $val){
	$req = "UPDATE options SET opt_val='$val' WHERE opt_key='$key' ";
	query_safe($req);
}

//DEFINE all options from the options table
//void
function define_all_options(){
	$req = "SELECT opt_key, opt_val FROM options";
	$res = mysql_query($req);
	
	while($opts = mysql_fetch_array($res)) {
		define($opts['opt_key'], $opts['opt_val']);
	}	
}


function get_updated_stats() {

	$count_entries_clients = mysql_fetch_array(query_safe("SELECT COUNT(*) FROM clients"));
	$sum = mysql_fetch_array(query_safe("SELECT SUM(solde) AS total FROM clients"));
	$null_value_nb = mysql_fetch_array(query_safe("SELECT count(*) FROM clients WHERE solde=0"));
	$neg_value_nb = mysql_fetch_array(query_safe("SELECT count(*) FROM clients WHERE solde<0"));
	$gt10_value_nb = mysql_fetch_array(query_safe("SELECT count(*) FROM clients WHERE solde>=10"));
	$st5_value_nb = mysql_fetch_array(query_safe("SELECT count(*) FROM clients WHERE solde>0 AND solde<5"));
	$gt5_value_nb = mysql_fetch_array(query_safe("SELECT count(*) FROM clients WHERE solde>=5 AND solde<10"));


	$stats_global = array(
					'TOTAL_ENTRIES_CLIENTS' => $count_entries_clients[0],
					'TOTAL_VALUE' => round($sum[0], 2),
					'NULL_VALUE_NB' => $null_value_nb[0],
					'NEG_VALUE_NB' => $neg_value_nb[0],
					'GT10_VALUE_NB' => $gt10_value_nb[0],
					'ST5_VALUE_NB' => $st5_value_nb[0],
					'GT5_VALUE_NB' => $gt5_value_nb[0]
			);

	update_option('STATS_GLOBAL', serialize($stats_global));

	//var_dump($stats_global);
	//die();
	return $stats_global;

}

function get_updated_stats_client() {

	$greater_client = mysql_fetch_array(query_safe("SELECT * FROM clients WHERE solde = (SELECT MAX(solde) FROM clients)"));


	$stats_client = array(
					'GREATER_AMOUNT' => $greater_client['solde'],
					'GREATER_AMOUNT_NAME' => $greater_client['prenom'] . ' ' . $greater_client['nom'],
					'GREATER_AMOUNT_ID' => $greater_client['id']
			);

	update_option('STATS_CLIENT', serialize($stats_client));

	return $stats_client;

}

function get_list_client_negative(){
	return query_safe("SELECT * FROM clients WHERE solde<0");
}



function calc_time_diff($timestamp, $unit = NULL, $show_unit = TRUE) {
	if($timestamp != 0){
		$days = round((time() - $timestamp) / 60 / 60 / 24); // How many hours have elapsed
    	return "Il y a <strong>$days jours</strong>";
	} else {
		return "N'est venue qu'une fois!";
	}
    
}






function backup_filelist(){
	
	//init variables
	$listfile =  "files-to-save.txt";
	$list = fopen($listfile, 'r');
	$backupdir = 'backup';
	$error = false;
	
	//loop to init $files
	while($file = fgets($list)) {
		//strip final '\n'
		$file = substr($file, 0, -1);
		
		//create filenames
		$pos1 = strrpos($file, '.');
		$extention = substr($file, $pos1+1);
		$filename = substr($file, 0, $pos1);
		
		$pos2 = strrpos($file, '\\');
		$filename = substr($filename, $pos2+1);
		
		$newfile = "$backupdir/$filename - " . date("Y-M-d") . ".$extention";
		
		//copy
		if (!copy($file, $newfile)) {

			echo '<div class="alert alert-error">';
			  echo '<button class="close" data-dismiss="alert">×</button>';
			  echo '<strong>Attention!</strong> La copie d\'un fichier a échoué...';
			echo '</div>';

			$error = true;
		}
		
	}
		
	//display final message
	if(!$error){
		echo '<div class="alert alert-success">';
		  echo '<button class="close" data-dismiss="alert">×</button>';
		  echo '<strong>Bravo!</strong> Tous les fichiers ont été sauvegardé sans problème.';
		echo '</div>';
	}
	
	//close file
	fclose($list);
	
}



/*******************************************************************
			 ADD SOME CONFIG OPTIONS 
 *******************************************************************/
 
 require_once 'config.php';
 
	