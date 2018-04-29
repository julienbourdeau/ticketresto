
	<?php include('head.php'); ?>
	<?php include('header.php'); ?>
	
	
	<div id="content">
	
		<h2><?php echo $c['0']; ?> éléments trouvés</h2>
		
		
		<table border="0" cellspacing="0">
		  <tr>
			<th scope="col" width="150px">NOM</th>
			<th scope="col" width="150px">PRENOM</th>
			<th scope="col" width="80px">SOLDE</th>
			<th scope="col" width="420px">COMMENTAIRE</th>
		  </tr>
	
    <?php $i = 0;
			while( $data = mysql_fetch_array($res) ) { ?>
		
		
		  <tr height="32px" class="<?php if($i%2) echo "even"; else echo "odd"; ?> highlight" onclick="window.location.href='fiche.php?id=<?php echo $data['id']; ?>';">
			<td><?php echo $data['nom']; ?></td>
			<td><?php echo $data['prenom']; ?></td>
			<td><?php echo $data['solde']; ?></td>
			<td><?php echo $data['commentaire']; ?></td>
		  </tr>
		  
	<?php	$i++;
	}
	?>
		  
		</table>
			
		
	</div>
	
	
	<?php include('footer.php'); ?>