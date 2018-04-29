
<?php 
	//if fiche.php do not display #branding
	$is_fiche = 0;
	if ( preg_match('/fiche.php/', $_SERVER['SCRIPT_NAME']) ) {
		$is_fiche = 1;
	}
?>
<header id="header" class="container">
	
	<?php if( ! $is_fiche ): ?>
		<div id="branding" class="row">
			<div class="span12">

            	<div class="pull-right"><br /><img src="img/logos.png" /></div>
            	<a href="search.php"></a> 

			</div>
        </div>
    <?php endif; ?>
                
		
		<div class="clear"></div>
	

		<div class="navbar">
			<div class="navbar-inner">
				<div class="container">
					<ul class="nav">
						<li><a href="search.php">Rechercher</a></li>
						<li><a href="addForm.php">Ajouter</a></li>
						<li><a href="modifylist.php">Modifier</a></li>
						<li><a href="stats.php">Statistiques</a></li>
					</ul>

					<form class="navbar-search pull-right" action="find.php" method="post">
						<input type="text" name="nom" class="search-query" placeholder="Rechercher...">
					</form>

					<a href="save.php" style="margin-right: 36px;" class="btn btn-info pull-right"><i class="icon-download-alt icon-white"></i> Sauvegarder</a>

				</div>
			</div>
		</div>
		

        <?php 
        	if (isset($_GET['notif'])) : 
       	?>
	        	<div id="notification" class="row">
		        	<div class="span12">
		        		<?php echo constant( "MESSAGE" . $_GET['notif'] ); ?>
					</div>
				</div>
				
        <?php endif ?>
        

</header>
