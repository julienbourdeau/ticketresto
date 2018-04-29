<?php


	
require_once '../lib/DBTools.php';
require_once '../lib/functions.php';

mysql_select_db("piggybox");


	function alter_table_clients(){

		$add_cols_in_clients = "ALTER TABLE clients ADD telephone varchar(16) AFTER adresse; ";
		$res = query_safe($add_cols_in_clients);
		
		$add_cols_in_clients = "ALTER TABLE clients ADD valticket double AFTER commentaire; ";
		$res = query_safe($add_cols_in_clients);
		
		$add_cols_in_clients = "ALTER TABLE clients ADD timestamp int";
		$res = query_safe($add_cols_in_clients);

		return $res;
	}


	function alter_table_historique(){

		$add_cols_in_historique = "ALTER TABLE historique ADD timestamp int";
		$res = query_safe($add_cols_in_historique);

		$add_cols_in_historique = "ALTER TABLE historique ADD newsolde double AFTER prevsolde";
		$res3 = query_safe($add_cols_in_historique);


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

		if ($res3) {
			$all_entries = query_safe("SELECT * FROM historique");

			while ($entry = mysql_fetch_array($all_entries)) {
				$newsolde = $entry['prevsolde'] + $entry['modif'];
				$id = $entry['id'];

				$query = "UPDATE historique SET newsolde='$newsolde' WHERE id='$id'";
				$res2 = query_safe($query);
				
			}

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
			
			$query = "UPDATE clients SET timestamp='$timestamp' WHERE id='$c_id'";
			$res2 = query_safe($query);
			
		}
	}


alter_table_clients();
echo "alter_table_clients()... <br />";

alter_table_historique();
echo "alter_table_historique()... <br />";

update_clients_last_purchase();
echo "update_clients_last_purchase()... <br />";

echo "done";