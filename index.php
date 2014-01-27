<?php
//--- Inclusion des fichier 
include ('Includes/connexion.inc.php');
include ('Includes/fonctions.inc.php');
include ('Includes/haut.inc.php');
include ('/Smarty/libs/Smarty.class.php');
					// --- fin de l'inclusion des fichiers
					
					
					
//--- Utilisation de smarty
$Smarty = new Smarty();
$Smarty->setTemplateDir('Smarty/tpl'); // Définition du dossier contenant les template
$Smarty->assign('connexion_info', $connexion_info); // Envoie des informations de connexion


 
//--- Pagination
$app = 2;  // Article par page
$page = (var_get('p'))? var_get('p') : 1; // Variable de la page courrante 
$debut = round(($page*$app)-$app); 






$reqnumart = mysql_query("SELECT COUNT(*) AS total FROM articles;"); // Requete par défaut prenant tout les articles
if(var_get("r")) // Si dans un cas de recherche
{   $rech = var_get("r");
    $reqnumart = mysql_query("SELECT COUNT(*) AS total FROM articles WHERE titre LIKE '%". $rech."%';"); // Requete qui compte que les article correspondant a la recherche
}


if(var_get("tag"))// Si on as cliqué sur un tag
{
$tag = var_get("tag");
$reqnumart = mysql_query("SELECT COUNT(*) AS total FROM articles WHERE tag='".$tag."';"); // Requete qui compte que les articles correspondant au tag
}
if ( $resnumart = mysql_fetch_array($reqnumart) )
	{
		$numartmax = $resnumart["total"];
	}
if (var_get("r"))
{
$numartmax = 0;
}
if (var_get("tag"))
{
$numartmax=0;
}


$numpagemax = ($page > 0) ? ceil($numartmax / $app) : 1; // Défini le nombre de page max 
$page2 = $page - 1;
$page3 = $page + 1;


//--- On envoie a smarty toutes les infos , afin que la pagination sois affiché dans celu ici 
$Smarty->assign('app', $app);
$Smarty->assign('page', $page);
$Smarty->assign('page2', $page2);
$Smarty->assign('page3', $page3);
$Smarty->assign('numpagemax', $numpagemax);
				//---Fin de la pagination



$Smarty->assign('numartmax', $numartmax);

$req =" SELECT * FROM articles  ORDER BY date DESC LIMIT ". $debut .",". $app ."; "; // Par défaut on selectionne tout les article ( par rapport a la pagination )
if(var_get("r"))
{
$rech = var_get("r");
$req = "SELECT * FROM articles WHERE titre LIKE '%". $rech."%' ;"; // En cas de recherche selectionne tout les articles correspondant a la recherche sans pagination
}
if(var_get("tag"))
{
$tag = var_get("tag");
$req = "SELECT * FROM articles WHERE tag ='".$tag."'; "; // En cas de tag on selectionne tout les articles correspondant au tag  sans pagination
}
$res = mysql_query($req);
	while ( $re = mysql_fetch_array($res) )
		{
			$re['image'] = (file_exists(dirname(__FILE__)."/data/images/".$re['id'].".jpg")) ? "/data/images/".$re['id'].".jpg" : false;
			$articles[] = $re;
			
		}
		
$Smarty->assign('tab_articles', $articles); // On envoie le tableau article a Smarty
		
// ON NE RECUPERE PLUS LES ARTICLES

$Smarty->display('index.tpl'); // On affiche index.tpl

include ('Includes/bas.inc.php');