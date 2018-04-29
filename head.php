<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">

<?php	require_once('lib/DBTools.php');
		require_once('lib/functions.php'); ?>
		
	<head>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<meta http-equiv="content-language" content="fr" />
		<meta name="author" lang="fr" content="Julien Bourdeau" />
		<meta name="copyright" lang="fr" content="Julien Bourdeau" />
		<meta name="description" content="Un systeme de gestion des tickets Resto" />

		<meta name="robots" content="noindex" />
		<link rel="stylesheet" media="screen" type="text/css" href="css/style.css" />  
        
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/blitzer/jquery-ui.css" type="text/css" />
		<script src="lib/jquery.easy-confirm-dialog.js"></script>
        
        <style type="text/css">
			.ui-dialog { font-size: 11px; }
			body {
				font-family: Tahoma;
				font-size: 12px;
			}
			#question {
				width: 300px!important;
				height: 60px!important;
				padding: 10px 0 0 10px;
			}
			#question img {
				float: left;
			}
			#question span {
				float: left;
				margin: 20px 0 0 10px;
			}
		</style>
            
		<title> Gestion des avoirs des Tickets Resto </title>


		<?php if($_SERVER['SCRIPT_NAME'] == '/ticketresto/stats.php'): ?>
		
		    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
		    <script type="text/javascript">
		      google.load('visualization', '1');   // Don't need to specify chart libraries!
		      google.setOnLoadCallback(drawVisualization);

		      function drawVisualization() {
		      	  var data = new google.visualization.DataTable();
					  data.addColumn('string', 'Tranche');
					  data.addColumn('number', 'Nombre de personnes');
					  data.addRows(5);
					  data.setValue(0, 0, 'Inferieur a 0');
					  data.setValue(0, 1, <?php echo NEG_VALUE_NB ; ?>);
					  data.setValue(1, 0, 'Egale a 0');
					  data.setValue(1, 1, <?php echo NULL_VALUE_NB ; ?>);
					  data.setValue(2, 0, 'Entre 0 et 5');
					  data.setValue(2, 1, <?php echo ST5_VALUE_NB ; ?>);
					  data.setValue(3, 0, 'Entre 5 et 10');
					  data.setValue(3, 1, <?php echo GT5_VALUE_NB ; ?>);
					  data.setValue(4, 0, 'Superieur a 10');
					  data.setValue(4, 1, <?php echo GT10_VALUE_NB ; ?>);

		        var wrapper = new google.visualization.ChartWrapper({
		          chartType: 'PieChart',
		          dataTable: data,
		          options: {'title': 'Repartition des Soldes', 'backgroundColor': '#F9F9F9'},
		          containerId: 'vis_div'
		        });
		        wrapper.draw();

		        var wrapper2 = new google.visualization.ChartWrapper({
		          chartType: 'ColumnChart',
		          dataTable: [['', 'Inferieur a 0', 'Egale a 0', 'Entre 0 et 5', 'Entre 5 et 10', 'Superieur a 10'],
		                      ['', <?php echo NEG_VALUE_NB ; ?>, <?php echo NULL_VALUE_NB ; ?>, <?php echo ST5_VALUE_NB ; ?>, <?php echo GT5_VALUE_NB ; ?>, <?php echo GT10_VALUE_NB ; ?>]],
		          options: {'title': 'Soldes', 'backgroundColor': '#F9F9F9'},
		          containerId: 'vis_div2'
		        });
		        wrapper2.draw();
		      }
		    </script>
		<?php endif; ?>



	</head>
	
<body>

<div id="toolbox">

	<a href="#"><img src="img/top.png" /></a><br /><br />
    <a href="search.php"><img src="img/search.png" /></a>

</div>

<div id="maincontainer">