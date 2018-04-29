<?php
	
	require_once 'lib/DBTools.php';
	require_once 'lib/functions.php'; 
	
	$total_value = TOTAL_VALUE;
	$total_entries_clients = TOTAL_ENTRIES_CLIENTS;
	
	/* if(isset($_GET['action'])){
		$action =$_GET['action'];
			/* ACTION LIST
				u - update infos
				  - 
			*/
		
	/*	if($action == "u"){
			$data = update_infos();
			$total_value = $data['total_value'];
			$total_entries_clients = $data['total_entries_clients'];
		}
		
	} */
?>


	<?php include('head.php'); ?>    
	<?php include('header.php'); ?>
	
	
	<div id="content">
	
		<div id="homeleft" class="left">
		
        
        		<?php // Affiche en cas de mise a jour requise
					if(UPDATE_REQUIRED){ ?>
                        
                        <p class="info">
                        	MISE A JOUR REQUISE<br /><br />

                        	Une mise &agrave; jour est requise, il suffit de cliquer une fois sur le bouton 'mettre a jour' en haut a droite.<br /><br />

							<strong>ATTENTION</strong> il faut absolument attendre le message annoncant la fin de la mise a jour avant de quitter ou changer de fenetre!	
                        </p>
                        
                <?php } ?>
	
			<h1>Gestion des tickets restaurant</h1>
			
			<p>Cette application a été réalisé dans le but de simplifier la gestion des avoirs sur les tickets restaurant.
			</p>
			
			<h2>Explications</h2>
			
			<h3>Trouver un client</h3>
			
			<p>Pour accéder à la fiche d'un client il suffit de se rendre sur l'onglet "<em>Rechercher</em>" et d'entrer son nom. <br />
			<strong>La recherche n'est effectué que sur le nom de famille.</strong> S'il n'existe qu'un seul client avec ce nom, on arrive directement sur sa fiche. S'il en existe plusieurs, un tableau s'affiche, il faut cliquer sur le bon. </p>
			
			<h3>Ajouter un client</h3>
			
			<p>L'onglet "<em>Ajouter</em>" permet d'ajouter un client (un seul à la fois). Aucun champs n'est controlé,<strong> il n'y a pas de verification</strong> sur les données entrées.
			Les adresses emails ne sont donc pas verifi&eacute; et les caract&egrave;res sp&eacute;ciaux ne sont pas supprim&eacute;s.</p>
			<p>Pour modifier les &eacute;l&eacute;ments d'un clients (son nom, son adresse,...) il faut ouvrir l'onglet &quot;<em>Divers</em>&quot; et s&eacute;l&eacute;ctionner le client dans la liste de tous les clients. Pour rechercher il est possible d'utiliser les fonctionnalit&eacute;s du navigateur: <strong>CTRL + F</strong>.</p>
			<h3>Modifier le solde</h3>
			<p>Il existe 3 mani&egrave;res de modifier un solde dans la fiche client.</p>
			<ul>
				<li>Entrer directement un nouveau solde</li>
				<li>Entrer le nombre de ticket donn&eacute; par le client et leur valeur. Le compte sera cr&eacute;diter de la valeur totale.</li>
				<li>Entrer le nombre de ticket donn&eacute; par le client et leur valeur ainsi que le montant de ses achats. Le compte sera mis &agrave; jour en deduisant la valeur de ses courses du jour: <small>[ SOLDE + NB_TICKET x VALEUR) - MONTANT ]</small></li>
			</ul>
			
			
			
		
		</div>
		
        
		<div id="homeright" class="left">
			<h2>Informations</h2>
			
            <ul>
              <li>Valeur totale: <br /><strong><?php echo $total_value; ?> €</strong></li>
              <li>Nombre de clients:  <br /><strong><?php echo $total_entries_clients; ?></strong></li>
              <li>Dernière sauvegarde:  <br /><strong><?php echo LAST_BACKUP; ?></strong></li>
              <li>Dernière mise à jour:  <br /><strong><?php echo LAST_UPDATE; ?></strong></li>
            </ul>
            
            <?php /* ?><a class="button" href="index.php?action=u"><span>Rafraichir</span></a><?php */ ?>
            
		</div>
		
		<div style="clear: both;"></div>
	
	</div>
	
	
	<?php include('footer.php'); ?>
	

