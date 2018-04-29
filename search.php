
	<?php include('head.php'); ?>
	<?php include('header.php'); ?>
	
	
	<div id="content" class="container">

		<div class="row">
			<div class="span12">
	
			
				<h2>Rechercher par nom</h2>
				
				<form class="span10 offset1" method="post" action="find.php">
				
					<input type="text" name="nom" id="searchbyname" class="span6" />
					
					<button type="submit" id="searchbynamebtn" class="btn btn-large"><i class='icon-search'></i> Rechercher</button>
				
				</form>
		
			</div>
		</div>
		
	</div>
	
	
	<?php include('footer.php'); ?>
