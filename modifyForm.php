<?php
	require_once 'lib/functions.php';

	if(isset($_GET['id'])){
		$data = get_by_id($_GET['id']);
	} else {
		header("Location: addForm.php");
	}

?>

<?php include('head.php'); ?>
	<?php include('header.php'); ?>
	
	
	<div id="content" class="container">
		<div class="row">
			<div class="span12">
				
				<h2>Modifier un client</h2>
				
				<form class="form-horizontal" method="post" action="modify.php">

					<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
				
					<div class="control-group">
						<label class="control-label" for="nom">Nom</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on"><i class="icon-user"></i></span><input name="nom" id="nom" class="input-xlarge" type="text" value="<?php echo $data['nom']; ?>" />
							</div>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="prenom">Prénom</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on"><i class="icon-user"></i></span><input name="prenom" id="prenom" class="input-xlarge" type="text" value="<?php echo $data['prenom']; ?>" />
							</div>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="email">Email</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on"><i class='icon-envelope'></i></span><input name="email" id="" class="input-xlarge" type="text" value="<?php echo $data['email']; ?>" />
							</div>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="telephone">Téléphone</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on">&#9742;</span><input name="telephone" id="telephone" class="input-xlarge" type="text" value="<?php echo $data['telephone']; ?>" />
							</div>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="adresse">Adresse</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on"><i class="icon-home"></i></span><input name="adresse" id="adresse" class="input-xlarge" type="text" value="<?php echo $data['adresse']; ?>" />
							</div>
						</div>
					</div>

					<hr />

					<div class="control-group">
						<label class="control-label" for="valticket">Valeur d'un ticket</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on">&euro;</span><input name="valticket" id="valticket" class="input-small" type="text" value="<?php echo $data['valticket']; ?>" />
								<p class="help-block">Entrez la valeur d'un ticket restaurant du client afin de simplifier votre utilisation</p>
							</div>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="solde">Solde</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on">&euro;</span><input name="solde" id="" class="input-small disabled" disabled="disabled" type="text" placeholder="<?php echo $data['solde']; ?>" />
								<p class="help-block">Modifier le solde dans la fiche client</p>
							</div>
						</div>
					</div>

					<hr />
					
					<div class="control-group">
						<label class="control-label" for="commentaire">Commentaire</label>
						<div class="controls">
							<textarea name="commentaire" id="commentaire" class="input-xlarge"><?php echo $data['commentaire']; ?></textarea>
						</div>
					</div>

					
					<div class="form-actions">
						<button type="submit" class="btn btn-large btn-primary" name="action" value="update"><i class='icon-pencil icon-white'></i> Modifier</button>
						<a href="fiche.php?id=<?php echo $data['id']; ?>" class="btn btn-large"><i class='icon-remove'></i> Annuler</a>
						<a class="btn btn-large btn-danger pull-right confirmsuppr"><i class='icon-trash icon-white'></i> Supprimer</a>
							<div id="confirmsuppr" class="span5 pull-right">
								<p>Etes-vous sure de vouloir supprimer ce client? <br />
								Cette opération est irreversible.<p>
								<a class="btn btn-large hidesuppr"> Non </a>
								<button type="submit" class="btn btn-large btn-danger" name="action" value="delete"><i class='icon-trash icon-white'></i> Oui</button>
							</div>
					</div>
				
				</form>
				
			</div>	
		</div>
		
	</div>
	
	
	<?php include('footer.php'); ?>
	