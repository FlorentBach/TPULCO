<?php

function var_get ($nom) {
return $resultat = ( isset($_GET[$nom]) ) ? $_GET[$nom] : false; }

function var_post ($nom) {
return $resultat = ( isset($_POST[$nom]) ) ? $_POST[$nom] : false; }

function requete_notif($req_sql,$var_notif,$val_notif) {
	if ( mysql_query($req_sql) )
		{
			$_SESSION[$var_notif] = $val_notif;
	} else {
			$_SESSION[$var_notif] = "erreur";
		}		
}

?>