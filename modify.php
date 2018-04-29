
	<?php include('head.php'); ?>
	<?php include('header.php'); ?>
	
	
	<div id="content">
	
		<?php 
		
			if(isset($_GET['id'])) {
				$data = get_by_id($_GET['id']);
			}
			
			if(isset($_POST['nom'])) {
				update_client($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['email'], $_POST['commentaire']);
				$data = get_by_id($_POST['id']);
			}
		?>
		
		<h2>Ajouter un client</h2>
		
		<form method="post" action="modify.php">
		
			<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
			
			<label for="nom">Nom *</label>
			<input type="text" name="nom" value="<?php echo $data['nom']; ?>" /><br />
			
			<label for="prenom">Prenom *</label>
			<input type="text" name="prenom" value="<?php echo $data['prenom']; ?>" /><br />
			
			<label for="adresse">Adresse</label>
			<input type="text" name="adresse" value="<?php echo $data['adresse']; ?>" /><br />
			
			<label for="email">Email</label>
			<input type="text" name="email" value="<?php echo $data['email']; ?>" /><br />
			
			<label for="commentaire">Commentaire</label>
			<textarea name="commentaire"><?php echo $data['commentaire']; ?></textarea><br />
			
			<label></label>
			<input type="submit" value="Modifier" />
			
		
		</form>
		
			
		
	</div>
	
	
	<?php include('footer.php'); ?>
	

