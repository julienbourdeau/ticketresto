<?php

	require_once('lib/DBTools.php');
	require_once('lib/functions.php');
	
	if(isset($_POST['nom'])) {
		$nom = $_POST['nom'];
		$res = get_by_nom($nom);
		$c = count_by_nom($nom);
		//echo $c['0'];
		
		if($c['0'] < 1) {
			header("Location: search.php?notif=44");
		}
		if($c['0'] == 1) {
			$data = mysql_fetch_array($res);
			header("Location: fiche.php?id=".$data['id']);
		}
		if($c['0'] > 1) {
			include('list.php');
		}
		
	}	