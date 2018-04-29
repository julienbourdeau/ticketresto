

<div id="header">
	
		<div class="pagetitle">
			<p class="ptitle">
            	<img src="img/ticket-resto-banner.png" />
            </p>
				<div id="save" class="headerbutton">
					<a class="button" href="save.php"><span>Sauvegarder</span></a>
				</div>
                
                <?php // Affiche en cas de mise a jour requise
					if(UPDATE_REQUIRED){ ?>
                        <div id="update" class="headerbutton">
                            <a class="button" href="maj.php"><span>Mettre &agrave; jour</span></a>
                        </div>
                <?php } ?>
		</div>
		
		
		
		<div class="clear"></div>
	
		<div class="navcontainer">
				<ul class="navlist clearfix">
					<li><a href="index.php">Accueil</a></li>
					<li><a href="search.php">Rechercher</a></li>
					<li><a href="add.php">Ajouter</a></li>
					<li><a href="modifylist.php">Modifier</a></li>
					<li><a href="stats.php">Statistiques</a></li>
				</ul>
                
                <div id="lastupdate">
                	Derniere sauvegarde: <strong><?php echo LAST_BACKUP; ?></strong>
                </div>
                
		</div>
	
</div>

<?php // Affiche en cas de mise a jour requise
	if(UPDATE_REQUIRED){ ?>
		
		<p class="note">
			Une mise &agrave; jour est requise, consulte la page d'accueil pour plus d'information.	
		</p>
		
<?php } ?>