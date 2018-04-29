<?php 
	
	require_once 'lib/DBTools.php';
	require_once 'lib/functions.php'; 
	
	$stats_global = get_updated_stats();
	$stats_client = get_updated_stats_client();
	$list_neg_clients = get_list_client_negative();
?>


	<?php include('head.php'); ?>    
	<?php include('header.php'); ?>
	
	
	<div id="content" class="container">
		<div class="row">
			<div class="span12">
				<h2>Quelques statistiques</h2>

				<div class="row">

					<div class="well span2 center">
						<span class="bignumbers"><?php echo $stats_global['TOTAL_VALUE'] . ' &euro;'; ?></span>
						<br />
						Avoir en cours
					</div>

					<div class="well span2 center">
						<span class="bignumbers"><?php echo $stats_global['TOTAL_ENTRIES_CLIENTS']; ?></span>
						<br />
						Nombre de clients
					</div>

					<div class="well span4 offset1 center">
						<span class="bignumbers"><?php echo $stats_client['GREATER_AMOUNT'] . ' &euro;'; ?></span>
						<br />
						Plus gros avoir: <a href="<?php echo $stats_client['GREATER_AMOUNT_ID']; ?>"><?php echo $stats_client['GREATER_AMOUNT_NAME']; ?></a>
					</div>

				</div>

				<h2>Vos clients</h3>

				<div class="row">

					<div class="well span3 center">
						<span class="bignumbers"><?php echo $stats_client['GREATER_AMOUNT'] . ' &euro;'; ?></span>
						<br />
						Plus gros avoir: <a href="fiche.php?id=<?php echo $stats_client['GREATER_AMOUNT_ID']; ?>"><?php echo $stats_client['GREATER_AMOUNT_NAME']; ?></a>
					</div>

					<div class="span4 offset1">
						<h3>Clients à solde négatif</h3>

						<ul>
							<?php while($data = mysql_fetch_array($list_neg_clients)): ?>
								<li><a href="fiche.php?id=<?php echo $data['id']; ?>">
										<span class="caps"><?php echo $data['prenom']; ?></span>
										<span class="uppercase"><?php echo $data['nom']; ?></span>:
									</a>
									<?php echo $data['solde']; ?> &euro;
								</li>
							<?php endwhile; ?>
						</ul>
					</div>

				</div>

				<h2>Representation graphique des soldes</h2>
			
				    <div id="vis_div2" style="width: 800px; height: 500px;"></div>
				    <div id="vis_div" style="width: 800px; height: 500px;"></div>
			
			</div>
		</div>
	
	</div>
	
			<?php if($_SERVER['SCRIPT_NAME'] == '/ticketresto2/stats.php'): ?>
		
		    <script type="text/javascript" src="lib/google-jsapi.js"></script>
		    <script type="text/javascript">
		      google.load('visualization', '1');   // Don't need to specify chart libraries!
		      google.setOnLoadCallback(drawVisualization);

		      function drawVisualization() {
		      	  var data = new google.visualization.DataTable();
					  data.addColumn('string', 'Tranche');
					  data.addColumn('number', 'Nombre de personnes');
					  data.addRows(5);
					  data.setValue(0, 0, 'Inferieur a 0');
					  data.setValue(0, 1, <?php echo $stats_global['NEG_VALUE_NB'] ; ?>);
					  data.setValue(1, 0, 'Egale a 0');
					  data.setValue(1, 1, <?php echo $stats_global['NULL_VALUE_NB'] ; ?>);
					  data.setValue(2, 0, 'Entre 0 et 5');
					  data.setValue(2, 1, <?php echo $stats_global['ST5_VALUE_NB'] ; ?>);
					  data.setValue(3, 0, 'Entre 5 et 10');
					  data.setValue(3, 1, <?php echo $stats_global['GT5_VALUE_NB'] ; ?>);
					  data.setValue(4, 0, 'Superieur a 10');
					  data.setValue(4, 1, <?php echo $stats_global['GT10_VALUE_NB'] ; ?>);

		        var wrapper = new google.visualization.ChartWrapper({
		          chartType: 'PieChart',
		          dataTable: data,
		          options: {'title': 'Repartition des Soldes', 'backgroundColor': '#FFF'},
		          containerId: 'vis_div'
		        });
		        wrapper.draw();

		        var wrapper2 = new google.visualization.ChartWrapper({
		          chartType: 'ColumnChart',
		          dataTable: [['', 'Inferieur a 0', 'Egale a 0', 'Entre 0 et 5', 'Entre 5 et 10', 'Superieur a 10'],
		                      ['', <?php echo $stats_global['NEG_VALUE_NB'] ; ?>, <?php echo $stats_global['NULL_VALUE_NB'] ; ?>, <?php echo $stats_global['ST5_VALUE_NB'] ; ?>, <?php echo $stats_global['GT5_VALUE_NB'] ; ?>, <?php echo $stats_global['GT10_VALUE_NB'] ; ?>]],
		          options: {'title': 'Soldes', 'backgroundColor': '#FFF'},
		          containerId: 'vis_div2'
		        });
		        wrapper2.draw();
		      }
		    </script>
		<?php endif; ?>
	
	<?php include('footer.php'); ?>
	

