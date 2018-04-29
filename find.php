<?php

	require_once('lib/DBTools.php');
	require_once('lib/functions.php');
	
	if(isset($_POST['nom'])) {
		$nom = $_POST['nom'];
		$res = get_by_nom($nom);
		$c = count_by_nom($nom);
		//echo $c['0'];
		
		if($c['0'] < 1) {
			include('search.php');
		}
		if($c['0'] == 1) {
			$data = mysql_fetch_array($res);
			include('fiche.php');
		}
		if($c['0'] > 1) {
			include('list.php');
		}
		
	}
	
?>
		