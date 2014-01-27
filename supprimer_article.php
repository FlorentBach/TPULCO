<?php
include ('Includes/connexion.inc.php');
include ('Includes/fonctions.inc.php');


if ( var_get("id") && $connexion_info == true )
	{
		$id = (var_get("id"))? (int)$_GET["id"] : false;
				try {
				
					$chemin = dirname(__FILE__)."/data/images/".$id.".jpg";
					unlink($chemin);
					$req_sql = "DELETE FROM articles WHERE id= ". $id ."; ";
					$var_notif = "article";
					$val_notif = "supprime";
					requete_notif($req_sql,$var_notif,$val_notif);
					header("Location: index.php");
				} catch (exception $e)
				{
					echo "Didn't Work ! :'( : ".$e."<br/>";
					echo "<a href=\"index.php\">Cliquez ici pour revenir à l'accueil</a>";
				}
				
				

	} else { 
		
		$_SESSION["article"] = "erreur_suppr";
		header("Location: connexion.php");
		
		}