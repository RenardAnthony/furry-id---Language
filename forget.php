<?php 

require 'bootstrap.php';

if(!empty($_POST) && !empty($_POST['email'])){

	$db = App::getDatabase();

	$auth = App::getAuth();

	$session = Session::getInstance();

	if($auth->resetPassword($db, $_POST['email'])){

		$session->setFlash('success',"Votre nouveau mot de passe est disponible dans vos email");

		App::redirect('index.php');

	} else {

		$session->setFlash('alert',"Aucun compte ne correspond à cet email");

	}

}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/theme.css"/>
		<link rel="stylesheet" href="css/login_and_register.css"/>
		<link rel="shortcut icon" type="image/png" href="img/theme/favicon.png"/>
		<title>Furry-id.com</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0, maximum-scale=1.0">
		<script src="https://kit.fontawesome.com/d5d0318cf5.js" crossorigin="anonymous"></script>
	</head>
		<?php include("part/header.php");?>

		<div id="center">
			<form action="" method="POST" class="box_connect">

				<input name="email" class="text-input" type="email">
				<p>Votre adresse mail</p>

				<button class="sub_button_forget" type="submit">Envoyer un nouveau mot de passe</button>
			</form>
		</div>

		<?php include("part/footer.php");?>
	</body>
</html>