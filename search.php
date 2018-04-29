
	<?php include('head.php'); ?>
	<?php include('header.php'); ?>
	
	
	<div id="content">
	
		<?php if(isset($nom)) echo '<p class="alert">Aucune personne trouvé avec le nom "'.$nom.' ".</p>'; ?>
	
		<h2>Rechercher par nom</h2>
		
		<form method="post" action="find.php">
		
			<input type="text" name="nom" id="searchbyname" class="largeinput" /><br />
			
			<input type="submit" value="Rechercher" />
		
		</form>
		
			
		
	</div>
	
	
	<?php include('footer.php'); ?>
	

