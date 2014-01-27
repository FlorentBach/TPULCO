<?php
include ('Includes/connexion.inc.php');
include ('Includes/fonctions.inc.php');
include ('Includes/haut.inc.php');


if ( !var_post("id") )
	{
		if ( $connexion_info == true )
		{
			if (var_post("titre") && var_post("texte"))
			{
				$titre = mysql_real_escape_string($_POST["titre"]);
				$texte = mysql_real_escape_string($_POST["texte"]);
				$tag = mysql_real_escape_string($_POST["tag"]);
				

				
							// AJOUT DES NOUVEAU ARTICLE //
				$req_sql = "INSERT INTO  `blog`.`articles` (`titre` ,`texte`,`tag`,`date`)VALUES ('". $titre ."',  '". $texte ."','".$tag."', UNIX_TIMESTAMP());";
				$var_notif = "article";
				$val_notif = "ajoute";
				requete_notif($req_sql,$var_notif,$val_notif);
				$id = mysql_insert_id();
				$src = $_FILES["image"]["tmp_name"];
				$dest = dirname(__FILE__)."/data/images/$id.jpg";		
				move_uploaded_file($src,$dest);
				header("Location: index.php");
				$req_sql2 = "INSERT INTO `tag` (`idarticle`,`nomdutag`)VALUES (". $id .",'".$tag."');";
				requete_notif($req_sql2,$var_notif,$val_notif);
				
			}
		} else { // IL FAUT ETRE CONNECTER POUR AJOUTER UN ARTICLE
		
		$_SESSION["article"] = "erreur_ajout";
		header("Location: connexion.php");
		
		}
	}
if ( var_post("id") )
	{
	
			if ( $connexion_info == true )
		{		
	
			$id = (var_post("id"))? (int)$_POST["id"] : false;
			$titre = $_POST["titre"];
			$texte= $_POST["texte"];
			$tag =   $_POST['tag'];
			
	
			// MODIFICATIONS
			$req_sql = "UPDATE `blog`.`articles` SET `titre` = '".$_POST["titre"]."', `texte` = '".$_POST["texte"]."', tag ='".$_POST["tag"]."' WHERE `articles`.`id` = ".$_POST["id"].";";
			$var_notif = "article";
			$val_notif = "modifie";
			requete_notif($req_sql,$var_notif,$val_notif);
			header("Location: index.php");
			
		} else { // IL FAUT ETRE CONNECTER POUR MODIFIER UN ARTICLE
		
		$_SESSION["article"] = "erreur_modif";
		header("Location: connexion.php");
		
		}	
	}	
	
		if ( var_get("id") )
			{ 
				if ( $connexion_info == true )
				{
				$req = mysql_query("SELECT * FROM articles WHERE id=".$_GET["id"]."");
				while ( $res = mysql_fetch_array($req) )
					{
						extract($res);
					}

				?>
				<h2> Modifier un article </h2>

				<form action="article.php" method="POST">

					<div class="clearfix">
						<label for="titre">Titre</label>
						<div class="impact"><input type="text" name="titre" id="titre" value="<?= $titre ?>" /></div>
					</div>
					
					<div class="clearfix">
						<label for="text">Texte</label>
						<div class="impact"><textarea name="texte" id="texte" rows="10" cols="40" style="resize: none;"><?php echo htmlspecialchars($texte); ?></textarea></div>
					</div>
					
					<div class="clearfix">
						<label for="TAG">Tag </label>
						<div class="impact"><input type="text" name="tag" id="tag" value="<?=$tag ?>" /></div>
					</div>
					
						<input type="hidden" name="id" id="id" value="<?= $id ?>" >

					
					<div class="form-action">
						<input type="submit" value="Modifier" class="btn btn-large btn-primary" />
					</div>

				</form>

				<?php
				} else { // IL FAUT ETRE CONNECTER POUR AJOUTER UN ARTICLE
	
	$_SESSION["article"] = "erreur_modif";
	header("Location: connexion.php");
		
	}
				
		} else {

		?>
		<h2> Rédiger un article </h2>

		<form action="article.php" method="POST" id="addart" enctype="multipart/form-data" >

			<div class="input-group">
				<span class="input-group-addon">Titre : </span></br>
				<input type="text" name="titre" id="titre" />
			</div>
			
			<div class="input-group">
				<span class="input-group-addon">Texte : </span></br>
				<textarea name="texte" id="texte" rows="10" style="width: 500px;height: 200px;resize: none;"></textarea>
			</div>
			<div class="input-group">
				<span class="input-group-addon">Tag :</span></br>
				<input type="text" name="tag" id="tag" />
			</div>
			<div class="input-group">
				<span class="input-group-addon">Image :</span></br>
				<input type="file" name="image" id="image" />
			</div>
			</br>
			<div class="form-action">
				<input type="submit" value="Ajouter" class="btn btn-large btn-primary" />
			</div>

		</form>
		
		<script>
		
		$(function() {
			$('#addart').submit(function() {
				var titre = $('#titre').val();
				var texte = $('#texte').val();
				if (!titre.length || !texte.length)
					{
						
						$('#notif').addClass('alert alert-error');
						$('#notif-span').html("Veuillez remplir tous les champs avant de continuer !");			// AFFICHE CE MESSAGE SI LES CHAMPS NE SONT PAS REMPLIS		
						
						
						
						return false;
					} 
					
					
				return true;	
			} 
			
			
			
			);
			
			$("#croix").click(function() {
						notif();	  
						});
			
		});
		
		</script>
		

		<?php

		} 

		
include ('Includes/bas.inc.php');


?>