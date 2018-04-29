
	<?php include('head.php'); ?>
	<?php include('header.php'); ?>
	
	<?php 
			$res = get_clients_ordered();
			
	?>
	
	<div id="content" class="container">
		<div class="row">
			<div class="span12">
	
				<h2>Modifier les informations d'un client</h2>

				<div class="subnav">
					<ul class="nav nav-pills">

						<?php //generate letterlinks
			            $arr = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
			            foreach($arr as $letter){
			                echo '<li><a href="#'.$letter.'">'.$letter.'</a></li>';
			            }	
			            ?>

			        </ul>
				</div>

				<table class="table table-condensed table-striped" style="margin-top: 24px;">

				  <tr>
					<th scope="col" width="150px">NOM</th>
					<th scope="col" width="150px">PRENOM</th>
					<th scope="col" width="80px">SOLDE</th>
					<th scope="col" width="400px">COMMENTAIRE</th>
				  </tr>
		          
		          <tr class="header"><td colspan="5"><a name="A"></a>A</td></tr>
				  
				<?php 

					$letterPrev = 'a';
					while( $data = mysql_fetch_array($res) ):  
					
						$letterCur = substr($data['nom'],0,1);

						if(strcasecmp($letterCur, $letterPrev)):
				?>
		                	<tr class="header"><td colspan="4"><a name="<?php echo strtoupper($letterCur); ?>"></a> <?php echo strtoupper($letterCur); ?></td></tr>
		        <?php
							$letterPrev = $letterCur;
						endif;
				?>
				
				
						<tr class="" onclick="window.location.href='modifyForm.php?id=<?php echo $data['id']; ?>';">
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