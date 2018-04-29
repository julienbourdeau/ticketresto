
	<?php include('head.php'); ?>
	<?php include('header.php'); ?>

	
    <?php
		
		update_option("LAST_BACKUP", date('D d F Y'));
		
		
		dumpMySQL('localhost', 'root', '', 'ticketresto', 3);


		update_infos();

		
		sleep(1);
		
	?>
    
	<div id="content">
	
    	<?php //backup_filelist(); ?>
        
        <p>
            Pour ajouter un fichier à la sauvegarde automatique, il suffit d'ajouter 
            son chemin complet Windows (par exemple: ) dans le fichier 'file-to-save.txt' 
            qui se trouve dans le dossier racine de l'application (localhost/ticketresto).<br />
            Attention le fichier doit IMPERATIVEMENT terminer par un retour à la ligne !
        </p>
    	
	</div>
	
	<?php include('footer.php'); ?>