<?php
include ('Includes/connexion.inc.php');
include ('Includes/fonctions.inc.php');
include ('Includes/haut.inc.php');

if ( isset($_SESSION["article"]) )
	{
		include ('Includes/notification.inc.php');
		unset($_SESSION["article"]);
	} 

?>
<h2>Connexion</h2>

<p>Saisissez les identifiants choisient lors de votre inscription</p>

<form action="connexion.php" method="POST" id="form_connexion">

<fieldset>
	<div class="clearfix">
		<label for="email">Email</label>
		<div class="input"><input id="email" name="email" size="30" type="email" value="" /></div>
	</div>
	
	<div class="clearfix">
		<label for="mdp">Mot de Passe</label>
		<div class="input"><input id="mdp" name="mdp" size="30" type="password" value="" /></div>
	</div>
	<div class="form-actions">
		<input class="btn btn-large btn-primary" id="submit" type="submit" value="Se Connecter" />
	</div>
</fieldset>

</form>
<?php

			
if ( var_post("email") && var_post("mdp") )
	{

				$email = mysql_real_escape_string($_POST["email"]);
				$mdp = mysql_real_escape_string($_POST["mdp"]);
				
				// CONNEXION
				
				$sql = "SELECT * FROM `blog`.`utilisateur` WHERE email= '".$email."' AND mdp='".$mdp."';";
				
				$req= mysql_query($sql);
				
				if ( $re = mysql_fetch_array($req) )
				{
				
					$sid = md5($_POST["email"].time());
					$id = $re["id"];
					
					$sql_add_sid =" UPDATE `utilisateur` SET `sid` = '".$sid."' WHERE `id` = ".$id.";";
					mysql_query($sql_add_sid);
					
					setcookie('sid',$sid,time() + 3600);
					$_SESSION["article"] = "connexion";
					header("Location: index.php");
					
				} else {
					$_SESSION["article"] = "badpass";
					header("Location: index.php");
				}
	}

?>
	
<?php
include ('Includes/bas.inc.php');
?>