
	<?php include('head.php'); ?>
	<?php include('header.php'); ?>
	
	
	<div id="content">
	
		<?php 
			if(isset($_POST['nom'])) {
				$nom = $_POST['nom'];
				$prenom = $_POST['prenom'];
				$adresse = $_POST['adresse'];
				$email = $_POST['email'];
				$commentaire = $_POST['commentaire'];
				$solde = $_POST['solde'];
				
				add_client($nom, $prenom, $adresse, $email, $commentaire, $solde);
			}
		?>
		
		<h2>Ajouter un client</h2>
		
		<form method="post" action="add.php">
		
			<label for="nom">Nom *</label>
			<input type="text" name="nom" /><br />
			
			<label for="prenom">Prenom *</label>
			<input type="text" name="prenom" /><br />
			
			<label for="adresse">Adresse</label>
			<input type="text" name="adresse" /><br />
			
			<label for="email">Email</label>
			<input type="text" name="email" /><br />
			
			<label for="commentaire">Commentaire</label>
			<textarea name="commentaire"></textarea><br />
			
			<label for="solde">solde</label>
			<input type="text" name="solde" /><br />
			
			
			<label></label>
			<input type="submit" value="Ajouter" />
			
		
		</form>
		
			
		
	</div>
	
	
	<?php include('footer.php'); ?>
	

