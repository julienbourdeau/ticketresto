
	<?php include('head.php'); ?>
	<?php include('header.php'); ?>
	
	
	<div id="content" class="container">
		<div class="row">
			<div class="span12">
				
				<h2>Vos informations</h2>
				
				<form id="largeform" class="form-horizontal" method="post" action="modify.php">

					<div class="control-group">
						<label class="control-label" for="nom">Votre Nom</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on"><i class="icon-user"></i></span><input name="nom" id="nom" class="input-xlarge" type="text" />
							</div>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="prenom">Votre Prénom</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on"><i class="icon-user"></i></span><input name="prenom" id="prenom" class="input-xlarge" type="text" />
							</div>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="prenom">Votre Identifiant</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on"><i class="icon-user"></i></span><input name="" id="" class="input-xlarge disabled" disabled="disabled" type="text" placeholder="julienbourdeau"/>
							</div>
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="prenom">Votre mot de passe</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on"><i class="icon-lock"></i></span><input name="password" id="" class="input-xlarge" type="password" />
								<br /> <br />
								<span class="add-on"><i class="icon-lock"></i></span><input name="password" id="" class="input-xlarge" type="password" />
							</div>
						</div>
					</div>

					<hr />

					<h2>Les informations de votre magasin</h2>

					<div class="alert alert-block">
						<a class="close" data-dismiss="alert" href="#">×</a>
						<h4 class="alert-heading"><span class="label label-warning">Attention</span></h4>
						Les infomations suivantes doivent être celle communiquées à vos clients. Par exemple le numéro de téléphone ne doit pas être votre portable mais numéro où vos clients peuvent vous joindre.
					</div>

					<div class="control-group">
						<label class="control-label" for="prenom">Nom de votre boutique</label>
						<div class="controls">
							<div class="input-prepend">
								<span class="add-on"><i class="icon-home"></i></span><input name="prenom" id="prenom" class="input-xlarge" type="text" />
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
								<span class="add-on">N&deg;</span><input name="steet_number" id="adresse" class="span1" type="text" /> <span class="add-on">Rue</span><input name="street_address" id="adresse" class="span4" type="text" />
								<br /> <br />
								<span class="add-on">CP</span><input name="steet_number" id="adresse" class="span2" type="text" /> <span class="add-on">Ville</span><input name="city_address" id="adresse" class="span3" type="text" />

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
						<button type="submit" class="btn btn-large btn-success" name="action" value="TO BE MODIFIED"><i class='icon-plus icon-white'></i> Ajouter</button>
						<a href="#" class="btn btn-large"><i class='icon-remove'></i> Annuler</a>
					</div>
					
				</form>


			</div>
		</div>
		
		
	</div>
	
	
	<?php include('footer.php'); ?>
	

