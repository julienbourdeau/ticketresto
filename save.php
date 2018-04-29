
	<?php include('head.php'); ?>
	<?php include('header.php'); ?>

	
    <?php
		
		dumpMySQL('localhost', 'root', '', 'piggybox', 3);
		
		sleep(1);
		
	?>
    

	<div id="content" class="container">

		<div class="row">
			<div class="span12">
	
	
		    	<?php backup_filelist(); ?>
		        
		        <p>
		            Pour ajouter un fichier à la sauvegarde automatique, il suffit d'ajouter 
		            son chemin complet Windows (par exemple: ) dans le fichier 'file-to-save.txt' 
		            qui se trouve dans le dossier racine de l'application (localhost/ticketresto).<br />
		            Attention le fichier doit IMPERATIVEMENT terminer par un retour à la ligne !
		        </p>
		        

        	</div>
        </div>
    	
	</div>
	
	<?php include('footer.php'); ?>