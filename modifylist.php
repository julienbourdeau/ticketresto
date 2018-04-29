
	<?php include('head.php'); ?>
	<?php include('header.php'); ?>
	
	<?php 
			$res = get_clients_ordered();
			
	?>
	
	<div id="content">
	
		<h2>Modifier les informations d'un client</h2>
		
        <div id="letterlink">
			<?php //generate letterlinks
            $arr = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y');
            foreach($arr as $letter){
                echo '<a href="#'.$letter.'">'.$letter.'</a> | ';
            }
			echo '<a href="#Z">Z</a>';		
            ?>
        </div>
		
		<table border="0" cellspacing="0">
		  <tr>
			<th scope="col" width="150px">NOM</th>
			<th scope="col" width="150px">PRENOM</th>
			<th scope="col" width="80px">SOLDE</th>
			<th scope="col" width="400px">COMMENTAIRE</th>
			<th scope="col" width="20px"></th>
		  </tr>
          
          <tr class="black"><td colspan="5"><a name="A">A</a></td></tr>
		  
		<?php $i = 0; $letterPrev = 'a';
			while( $data = mysql_fetch_array($res) ) { 
			
				$letterCur = substr($data['nom'],0,1);
				if(strcasecmp($letterCur, $letterPrev)){
				?>
                	<tr class="black"><td colspan="5"><a name="<?php echo strtoupper($letterCur); ?>"><?php echo strtoupper($letterCur); ?></a></td></tr>
                <?php
					$letterPrev = $letterCur;
				}
				
		?>
		
		
		  <tr height="32px" class="<?php if($i%2) echo "even"; else echo "odd"; ?> highlight" onclick="window.location.href='modify.php?id=<?php echo $data['id']; ?>';">
			<td><?php echo $data['nom']; ?></td>
			<td><?php echo $data['prenom']; ?></td>
			<td><?php echo $data['solde']; ?></td>
			<td><?php echo $data['commentaire']; ?></td>
			<td><a class="confirm" href="delete.php?type=client&id=<?php echo $data['id']; ?>" style="background:none;" ><img src="img/delete.png" /></a></td>
		  </tr>
		  
	<?php	$i++;
		 }
	?>
		</table>
		
		
        <script type="text/javascript">
        $(".confirm").easyconfirm({locale: {
									title: 'Etes-vous sûr?',
									text: 'Etes-vous sûr de vouloir supprimer ce client?',
									button: ['Annuler',' Confirmer'],
									closeText: 'fermer'
									}});
		$("#alert").click(function() {
			alert("You approved the action");
		});
        </script>
		
	</div>
	
	
	<?php include('footer.php'); ?>