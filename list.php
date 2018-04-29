
	<?php include('head.php'); ?>
	<?php include('header.php'); ?>
	
	
	<div id="content" class="container">
		<div class="row">
			<div class="span10 offset1">
	
				<h2><?php echo $c['0']; ?> personnes trouvées</h2>
				
				
				<table class="table table-striped table-bordered">
				  <tr>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Solde</th>
					<th>Commentaire</th>
				  </tr>
			
		    <?php
					while( $data = mysql_fetch_array($res) ) : 
			?>
				
				
						<tr class="" onclick="window.location.href='fiche.php?id=<?php echo $data['id']; ?>';">
							<td class="uppercase"><?php echo $data['nom']; ?></td>
							<td class="caps"><?php echo $data['prenom']; ?></td>
							<td><?php echo $data['solde']; ?></td>
							<td><?php echo $data['commentaire']; ?></td>
						</tr>
				  
			<?php
					endwhile;
			?>
				  
				</table>
			
			</div>
		</div>
		
	</div>
	
	
	<?php include('footer.php'); ?>