

	<?php include('head.php'); ?>
	<?php include('header.php'); ?>
	
	
<?php
		
	if(isset($_GET['id'])){
		$data = get_by_id($_GET['id']);
	}
	$historique = get_historique_by_client($data['id']);	

?>
	
	
	<div id="content">
	
		<div id="solde" class="
			<?php if($data['solde'] <0) {
					echo "negative";
				} else {
					echo "positive";
				} ?>
		">
			<?php echo number_format($data['solde'], 2, ',', ' '); ?> €

            <div id="lasttime" class=""><?php echo calc_time_diff($data['timestamp']); ?></div>

		</div>


		
		<div id="client">
			
			<table>
				<tr>
					<td class="td1">Nom</td>
					<td><?php echo $data['nom']; ?> </td>
				</tr>
				<tr>
					<td class="td1">Prénom</td>
					<td><?php echo $data['prenom']; ?> </td>
				</tr>
				<tr>
					<td class="td1">Adresse</td>
					<td><?php echo $data['adresse']; ?> </td>
				</tr>
				<tr>
					<td class="td1">email</td>
					<td><?php echo $data['email']; ?> </td>
				</tr>
				<tr>
					<td class="td1">Commentaire</td>
					<td><?php echo $data['commentaire']; ?> </td>
				</tr>
			</table>
			
		</div>

        
		
		<div class="clear"></div>
        
        <div class="left400">
		
            <div id="" class="modification">
            
                <fieldset>
                <legend>Entierement payé en ticket restaurant</legend>
                
                <form method="post" action="update.php">
                
                    <input type="hidden" name="action" value="calcul" />
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                    <input type="hidden" name="solde" value="<?php echo $data['solde']; ?>" />
                
                    <label for="montant">Montant Du</label>
                    <input type="text" id="montant" name="montant" /> <small>(en euros)</small><br />
                
                    <label for="nombre">Nombre de ticket</label>
                    <input type="text" id="nombre" name="nombre" /><br />
                    
                    <label for="valeur">Valeur d'un ticket</label>
                    <input type="text" id="valeur" name="valeur" /> <small>(en euros)</small><br />
                    
                    <label for=""></label>
                    <input type="submit" value="Modifier" />
                
                </form>
                
                </fieldset>
            </div>
            
            
            <div id="" class="modification">
            
                <fieldset>
                <legend>Créditer son compte</legend>
                
                <form method="post" action="update.php">
                
                    <input type="hidden" name="action" value="ajout" />
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                    <input type="hidden" name="solde" value="<?php echo $data['solde']; ?>" />
                
                    <label for="nombre">Nombre de ticket</label>
                    <input type="text" id="nombre" name="nombre" /><br />
                    
                    <label for="valeur">Valeur d'un ticket</label>
                    <input type="text" id="valeur" name="valeur" /> <small>(en euros)</small><br />
                    
                    <label for=""></label>
                    <input type="submit" value="Modifier" />
                
                </form>
                
                </fieldset>
            </div>
            
        </div>
        
		
        <div class="left400">
        
            <div id="" class="modification">
                
                <fieldset>
                <legend>Entrez le nouveau solde</legend>
                
                <form method="post" action="update.php">
                
                    <input type="hidden" name="action" value="majsolde" />
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                    <input type="hidden" name="solde" value="<?php echo $data['solde']; ?>" />
                
                    <label for="newsolde">Nouveau solde</label>
                    <input type="text" id="newsolde" name="newsolde" /> <small>(en euros)</small><br />
                    
                    <label for=""></label>
                    <input type="submit" value="Modifier" />
                
                </form>
                
                </fieldset>
                
            </div>
            
    		<div class="clear"></div>
            
            <div id="historique" class="">
                
            <table border="0" cellspacing="0" width="330px">
              <tr align="center">
                <td class="black" width="110px">Date</th>
                <td class="black" width="110px">Ancien Solde</th>
                <td class="black" width="110px">Modification</th>
              </tr>
        
        <?php $i = 0;
                while( $hdata = mysql_fetch_array($historique) ) { ?>
            
            
              <tr height="32px" class="<?php if($i%2) echo "even"; else echo "odd"; ?> highlight" align="center">
                <td><?php echo $hdata['date']; ?></td>
                <td><strong><?php echo $hdata['prevsolde']; ?> €</strong></td>
                <td><?php echo $hdata['modif']; ?> €</td>
              </tr>
              
        <?php	$i++;
                }
        ?>
            </table>
                
            </div>
            
        </div>
        
        
        <div class="clear"></div>
			
		
	</div>
	
	
	<?php include('footer.php'); ?>	