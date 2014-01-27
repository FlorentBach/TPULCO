<?php
$adresse = "127.0.0.1";
$nom_bdd = "blog";
$identif = "root";
$mdp = "";


mysql_connect($adresse,$identif,$mdp);
mysql_select_db($nom_bdd);
session_start();

if ( isset($_COOKIE["sid"]) ) {

$sid_info_connexion = mysql_real_escape_string($_COOKIE["sid"]);
$sql_info_connexion = " SELECT * FROM utilisateur WHERE sid = '". $sid_info_connexion ."';";
$req_info_connexion = mysql_query($sql_info_connexion);

if ( $re_info_connexion = mysql_fetch_array($req_info_connexion) )
{
	$email_info = $re_info_connexion["email"];
	$connexion_info = true;	
} else {
 	$connexion_info = false;
	
}
} else { // Else de isset($_COOKIE["sid"]
	
	$connexion_info = false;	
	
}
?>