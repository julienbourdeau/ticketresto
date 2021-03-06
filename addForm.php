
	<?php include('head.php'); ?>
	<?php include('header.php'); ?>
	
	
	<div id="content" class="container">
		<div class="row">
			<div class="span12">
				
				<h2>Ajouter un client</h2>
				
				<form id="largeform" class="form-horizontal" method="post" action="modify.php">

					<div class="control-group">
						<label class="control-label" for="nom">Nom</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on"><i class="icon-user"></i></span><input name="nom" id="nom" class="input-xlarge" type="text" />
							</div>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="prenom">Prénom</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on"><i class="icon-user"></i></span><input name="prenom" id="prenom" class="input-xlarge" type="text" />
							</div>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="email">Email</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on"><i class='icon-envelope'></i></span><input name="email" id="" class="input-xlarge" type="email" />
							</div>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="telephone">Téléphone</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on">&#9742;</span><input name="telephone" id="telephone" class="input-xlarge" type="text" />
							</div>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="adresse">Adresse</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on"><i class="icon-home"></i></span><input name="adresse" id="adresse" class="input-xlarge" type="text" />
							</div>
						</div>
					</div>

					<hr />

					<div class="control-group">
						<label class="control-label" for="valticket">Valeur d'un ticket</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on">&euro;</span><input name="valticket" id="valticket" class="input-small" type="text">
								<p class="help-block">Entrez la valeur d'un ticket restaurant du client afin de simplifier votre utilisation</p>
							</div>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="solde">Solde</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on">&euro;</span><input name="solde" id="" class="input-small" type="text">
								<p class="help-block">Entrez le solde actuel du client</p>
							</div>
						</div>
					</div>

					<hr />
					
					<div class="control-group">
						<label class="control-label" for="commentaire">Commentaire</label>
						<div class="controls">
							<textarea name="commentaire" id="commentaire" class="input-xlarge"></textarea>
						</div>
					</div>

					
					<div class="form-actions">
						<button type="submit" class="btn btn-large btn-success" name="action" value="create"><i class='icon-plus icon-white'></i> Ajouter</button>
						<a href="search.php" class="btn btn-large"><i class='icon-remove'></i> Annuler</a>
					</div>
					
				</form>


			</div>
		</div>
		
		
	</div>
	
	
	<?php include('footer.php'); ?>
	

