<?php

    require_once 'lib/functions.php';
        
    if(isset($_GET['id'])){

        $data = get_by_id($_GET['id']);
        if ($data) {
            $historique = get_historique_by_client($data['id']);
        } else {
            header("Location: search.php?notif=44");
        }
        
    } else {
        header("Location: search.php");
    }   

?>



	<?php include('head.php'); ?>
	<?php include('header.php'); ?>
	

	
	<div id="content" class="container">

        <div class="row">

    		<div id="client" class="span8">


                <a href="modifyForm.php?id=<?php echo $data['id']; ?>" class="btn pull-right"><i class="icon-pencil"></i> Modifier</a> 
                <h2><span class="caps"><?php echo $data['prenom']; ?></span> <span class="uppercase"><?php echo $data['nom']; ?></span></h2>


                <?php

                    if($data['valticket']){
                    ?>
                        <div class='marged'>
                        <span class="label label-inverse">Info</span> 
                        Valeur d'un ticket:
                        <strong> <?php echo $data['valticket'] ?> &euro; </strong> 
                        <small><a href="modifyForm.php?id=<?php echo $data['id']; ?>">Modifier</a></small>
                        </div>

                    <?php
                    } else {
                    ?>

                        <div class='marged'>
                            <div class="alert alert-warning">
                                <a class="close" data-dismiss="alert">&times;</a>
                                <span class="label label-warning">Attention</span> Valeur inconnue 
                                <small><a href="modifyForm.php?id=<?php echo $data['id']; ?>">Renseigner</a></small>
                            </div>
                        </div>

                    <?php

                    /* ------- TEMP ----------*/

                        if ( ! $data['valticket']) {
                            $data['valticket'] = 1;
                        }
                        
                    }

                ?>
    			
                <ul class="unstyled userinfo">
                    <li title='Email'><i class='icon-envelope'></i>
                        <a href='mailto:<?php echo $data['email']; ?>'>
                        <?php echo $data['email']; ?>
                        </a>
                    </li>

                     <li title='Téléphone'>&#9742;
                        <?php echo $data['telephone']; ?>
                    </li>

                    <li>
                        <i class="icon-home"></i>
                        <?php echo $data['adresse']; ?>
                    </li>

                <?php if( $data['commentaire'] ): ?>
                    <li title='A propos'><i class='icon-tag'></i>
                        <?php echo $data['commentaire']; ?>
                    </li>
                <?php endif; ?>

                </ul>



                 
 


    			
    		</div>

            <div class="span3 offset1">
                <div class="well">

                    <div id="solde" class="<?php
                         if($data['solde'] <0) {
                                echo "negative";
                            } else {
                                echo "positive";
                            } 
                    ?>">
                        <span id="thesolde"><?php echo number_format($data['solde'], 2, ',', ' '); ?></span> &euro;
                    </div>

                    <div id="lasttime" class=""><?php echo calc_time_diff($data['timestamp']); ?></div>

                </div>

                <form class="nomargin" method="post" action="update.php">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                    <input type="hidden" name="solde" value="<?php echo $data['solde']; ?>" />
                    <button class="btn btn-inverse pull-right" name="action" value="raz" type="submit"><i class="icon-refresh icon-white"></i> Remise à zéro</button>
                </form>
                
            </div>

        </div>
        

		<hr />

        <div class="row">

    		
            <div id="payer" class="span6 well">
            
                <h2 class="">Payer <a class="hint label label-info" rel="hint1">Aide</a></h2>

                <div id="hint1" class="hintcontent alert alert-info">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <p>Montant à payer = Nombre de ticket x Valeur d'un ticket</p>
                </div>
                
                <form class="form-horizontal" method="post" action="update.php">
                
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                    <input type="text" name="solde" id="thesolde" class="hide" value="<?php echo $data['solde']; ?>" />

                    
                    <div class="input-append">
                        <input name="montant" id="montant" class="input-small" type="text" value="" placeholder="Ex: 22,37" /><span class="add-on">&euro;</span>
                    </div>
                
                    =
                    
                    <input name="nombre" id="nombre" class="input-mini" type="text" placeholder="Ex: 2" value="" />
                    
                    <i class="icon-remove"></i>
                    
                    <div class="input-append">
                        <input name="valeur" id="valeur" class="input-mini" type="text" value="<?php echo $data['valticket']; ?>" /><span class="add-on">&euro;</span>
                    </div>
                    

                    <button class="btn btn-primary pull-right" name="action" value="calcul" type="submit">Payer</button>
                
                </form>


                <div id="" class="">

                    <table cellspacing="30px" cellpadding="12px">
                        <tr>
                            <th width="120px">Nombre de ticket minium</th>
                            <th class="reste" width="120px">Reste à payer</th>
                            <th class="avoir" width="120px">Avoir</th>
                        </tr>
                        <tr>
                            <td class="nbrminval"><span class="hintitem">&nbsp;</span></td>
                            <td class="reste resteval"><span class="hintitem negative">&nbsp;</span></td>
                            <td class="avoir avoirval"><span class="hintitem positive">&nbsp;</span></td>
                        </tr>
                    </table>

                </div>
                
            </div>


            <div id="" class="span4 offset1">
                
                <h4 class="marged">Modifier solde <a class="hint label label-info" rel="hint2">Aide</a></h4>

                <div id="hint2" class="hintcontent alert alert-info">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <p>Pour modifier un solde entrez le montant total du solde. 
                    Cette case peut servir pour des cas particulier ou bien pour corriger une erreur.</p>
                </div>
                
                
                <form class="form-horizontal" method="post" action="update.php">

                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                    <input type="hidden" name="solde" value="<?php echo $data['solde']; ?>" />

                    <div class="input-append">
                        <input name="newsolde" id="newsolde" class="input-small" type="text" value="" placeholder="Ex: 10,24" /><span class="add-on">&euro;</span>
                    </div>
                    <button class="btn" name="action" value="updatesolde" type="submit">Modifier</button>

                </form>


                <hr class="well-marged" />


                <h4 class="marged">Ajouter du crédit <a class="hint label label-info" rel="hint3">Aide</a></h4>

                <div id="hint3" class="hintcontent alert alert-info">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <p>Sans forcément faire d'achat un client peut vous donner ses tickets restaurant afin
                    de créditer son compte. Entrez le nombre de ticket et la valeur d'un ticket pour les
                    ajouter à son solde.</p>
                </div>
                
                <form class="form-horizontal" method="post" action="update.php">

                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                    <input type="hidden" name="solde" value="<?php echo $data['solde']; ?>" />
                

                    <input name="nombre" id="nombre" class="input-mini" type="text" placeholder="Ex: 2" value="" />

                    <i class="icon-remove"></i>

                    <div class="input-append">
                        <input name="valeur" id="valeur" class="input-mini" type="text" value="<?php echo $data['valticket']; ?>" /><span class="add-on">&euro;</span>
                    </div>

                    <button class="btn" name="action" value="addcredit" type="submit">Créditer</button>

                </form>




            </div>
            
            
        
        </div>
		

        <hr />


        <div class="row">
            
            
            <div id="historique" class="span6 offset3">

                <h2>Historique <a class="hint label label-info" rel="hint4">Aide</a></h2>

                <div id="hint4" class="hintcontent alert alert-info">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <p>Le tableau suivant affiche les 6 dernieres opérations du client.
                    Toutes les opérations sont sauvegarder dans la base de données mais seulement
                    les 6 dernières sont affichées.</p>
                </div>


                <table class="table table-condensed table-striped">

                  <tr>
                    <th class="black">Date</th>
                    <th class="black">Solde</th>
                    <th width="12px">+</th>
                    <th class="black">Modif</th>
                    <th width="12px">=</th>
                    <th class="black">Nouveau solde</th>
                  </tr>
            
            <?php 
                    while( $hdata = mysql_fetch_array($historique) ) :
            ?>
                

                        <tr>
                            <td class="caps"><?php echo strftime("%d %b %y - %Hh%M", $hdata['timestamp']); ?></td>
                            <td><strong><?php echo $hdata['prevsolde']; ?> &euro;</strong></td>
                            <td>+</td>
                            <td><?php echo $hdata['modif']; ?> &euro;</td>
                            <td>=</td>
                            <td><?php echo $hdata['newsolde']; ?> &euro;</td>
                        </tr>
      
            <?php	
                    endwhile;
            ?>

                </table>
                
            </div>
            

        </div>
        
        
			
		
	</div>
	
	
	<?php include('footer.php'); ?>	