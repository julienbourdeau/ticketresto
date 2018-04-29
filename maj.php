<?php
	//CREER LES TABLES
	//AJOUTER LES OPTIONS
			//UPDATE_REQUIRED  __NOT IN TALBLE
			//LAST_BACKUP
	
	require_once 'lib/DBTools.php';
	require_once 'lib/functions.php';

	function alter_table_clients(){
		$add_cols_in_clients = "ALTER TABLE clients ADD date varchar(12), ADD timestamp int";
		$res = query_safe($add_cols_in_clients);
		return $res;
	}

	function alter_table_historique(){
		$add_cols_in_historique = "ALTER TABLE historique ADD timestamp int";
		$res = query_safe($add_cols_in_historique);

		if ($res) {
			$all_entries = query_safe("SELECT * FROM historique");

			while ($entry = mysql_fetch_array($all_entries)) {
				$timestamp = strtotime($entry['date']);
				$id = $entry['id'];

				$query = "UPDATE historique SET timestamp='$timestamp' WHERE id='$id'";
				$res2 = query_safe($query);
				
			}

		} else {
			# code...
		}
		
	}


	function update_clients_last_purchase(){
		$get_clients = "SELECT id FROM clients";
		$clients_ids = query_safe($get_clients);

		while($client = mysql_fetch_array($clients_ids)){
			$c_id = $client['id'];

			$req = sprintf("SELECT timestamp FROM historique WHERE client = %F ORDER BY timestamp DESC LIMIT 1", $c_id);
			$data = mysql_fetch_array(query_safe($req));

			$timestamp = $data['timestamp'];
			$date = date("d-M-y", $timestamp);
			
			$query = "UPDATE clients SET timestamp='$timestamp', date='$date' WHERE id='$c_id'";
			$res2 = query_safe($query);
			
		}
	}


alter_table_clients();
alter_table_historique();
update_clients_last_purchase();

echo "done";