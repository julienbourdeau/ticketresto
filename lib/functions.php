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

function update_client($id, $nom, $prenom, $adresse, $email, $commentaire){
	$req = "UPDATE clients SET nom='".s($nom)."' , prenom='".s($prenom)."' , adresse='".s($adresse)."' , email='".s($email)."' , commentaire='".s($commentaire)."' WHERE id='".s($id)."'";
	
	$result = mysql_query($req);
	if($result) {
		echo '<p class="ok">Le client &laquo; '.stripslashes($nom).' &raquo; a bien été modifié</p><br>';
	} else {
		echo "Requete invalide : ".mysql_error();
	}
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
	$date = date("d-M-y");

	$req = "UPDATE clients SET solde='".round($newsolde, 2)."', timestamp='$timestamp', date='$date' WHERE id='$id'";
	query_safe($req);
}

function count_by_nom($nom){
	$req = "SELECT COUNT(nom) FROM clients WHERE nom LIKE '%" .s($nom). "%'";
	return mysql_fetch_array(query_safe($req));
}

function add_client($nom, $prenom, $adresse, $email, $commentaire, $solde) {
	if(is_null($solde)) $solde = 0;
	
	$req = "INSERT INTO clients (nom, prenom, adresse, email, commentaire, date, timestamp,  solde) VALUES ('";
	$req .= s($nom)."', '";
	$req .= s($prenom)."', '";
	$req .= s($adresse)."', '";
	$req .= s($email)."', '";
	$req .= s($commentaire)."', '";
	$req .= date("d-M-y")."', '";
	$req .= time()."', '";
	$req .= round($solde, 2)."')";
	
	$result = mysql_query($req);
	if($result) {
		echo '<p class="ok">Le client &laquo; '.stripslashes($nom).' &raquo; a bien été ajouté</p><br>';
	} else {
		echo "Requete invalide : ".mysql_error();
	}
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
	$req = sprintf("SELECT date, modif, prevsolde FROM historique WHERE client = %F ORDER BY timestamp DESC LIMIT 6", $idClient);
	return query_safe($req);
}

function add_action_historique($idClient, $modif, $prevsolde) {
	$date = date("d-M-y");
	$timestamp = time();

	$req = sprintf("INSERT INTO historique (client, date, modif, prevsolde, timestamp) VALUES (%F, '%s', %F, %F, %F)",
	$idClient,
	$date,
	$modif,
	$prevsolde,
	$timestamp);
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


function update_infos() {
	$count_entries_clients = mysql_fetch_array(query_safe("SELECT COUNT(*) FROM clients"));
	update_option("TOTAL_ENTRIES_CLIENTS", $count_entries_clients['0']);	
	
	$sum = mysql_fetch_array(query_safe("SELECT SUM(solde) AS total FROM clients"));
	update_option("TOTAL_VALUE", $sum['0']);

	$null_value_nb = mysql_fetch_array(query_safe("SELECT count(*) FROM clients WHERE solde=0"));
	update_option("NULL_VALUE_NB", $null_value_nb['0']);

	$neg_value_nb = mysql_fetch_array(query_safe("SELECT count(*) FROM clients WHERE solde<0"));
	update_option("NEG_VALUE_NB", $neg_value_nb['0']);

	$gt10_value_nb = mysql_fetch_array(query_safe("SELECT count(*) FROM clients WHERE solde>=10"));
	update_option("GT10_VALUE_NB", $gt10_value_nb['0']);

	$st5_value_nb = mysql_fetch_array(query_safe("SELECT count(*) FROM clients WHERE solde>0 AND solde<5"));
	update_option("ST5_VALUE_NB", $st5_value_nb['0']);

	$gt5_value_nb = mysql_fetch_array(query_safe("SELECT count(*) FROM clients WHERE solde>=5 AND solde<10"));
	update_option("GT5_VALUE_NB", $gt5_value_nb['0']);

	$query2 = "SELECT COUNT(*) FROM clients WHERE timestamp = 0";
	$res2 = mysql_fetch_array(query_safe($query2));

	$query = "SELECT COUNT(*) FROM clients WHERE NOT EXISTS (SELECT client FROM historique WHERE historique.id = clients.id)";
	$res = mysql_fetch_array(query_safe($query));


	//var_dump($res);
	//var_dump($res2);
	//die();
	
	//return array("total_value" => $sum['0'],
	//			 "total_entries_clients" => $count_entries_clients['0']);
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
			echo "<p class='alert'>La copie du fichier a échoué...</p>\n";
			$error = true;
		}
		
	}
		
	//display final message
	if(!$error){
		echo "<p class='info'>Tous les fichiers ont été sauvegardé sans problème.</p>";
	}
	
	//close file
	fclose($list);
	
}



function calc_time_diff($timestamp, $unit = NULL, $show_unit = TRUE) {
	if($timestamp != 0){
		$days = round((time() - $timestamp) / 60 / 60 / 24); // How many hours have elapsed
    	return "Il y a <strong>$days jours</strong>";
	} else {
		return "N'est venue qu'une fois!";
	}
    
}



/*******************************************************************
			 ADD SOME CONFIG OPTIONS 
 *******************************************************************/
 
 require_once 'config.php';
 
	