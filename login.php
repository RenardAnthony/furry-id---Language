<?php 

require 'bootstrap.php';

$auth = App::getAuth();

$db = App::getDatabase();

$auth->connectFromCookie($db);

$session = Session::getInstance();


if($auth->user()){

	App::redirect('account.php');

};

if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){

	$user = $auth->login($db, $_POST['username'], $_POST['password'], isset($_POST['remember']));


	if($user){

		$session->setFlash('success',"Vous êtes bien connecté");

		App::redirect('index.php');

		exit();

	}else{

		$session->setFlash('alert',"Le nom d'utilisateur ou le mots de passe est incorrect");

	}

};
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
				<div id="image-connection">
				</div>
				<form action="" method="POST" class="box_connect">

					<img src="../img/theme/Logo_site_couleur.png" alt="">
					<p id="p_acroche">Bon retour parmi nous !</p>

					<input name="username" class="text-input" placeholder="Pseudo ou email" type="text">

					<input name="password" class="text-input" placeholder="Mot de passe" type="password">

					<div id="regroupement">
						<table class="ckeckbox__box_box">
							<tr class="ckeckbox__box_box">
								<td class="ckeckbox__box_box">
									<input type="checkbox" class="checkbox_box" id="checkbox_box" name="remember" value="1">
									<label for="checkbox_box"></label>
								</td>
								<td class="ckeckbox__box_box">
									
									<p class="nomargin">Se souvenir de moi</p>
								</td>
							</tr>
						</table>

						<a href="forget.php" class="spacial_1">mot de passe oublier</a>
					</div>

					<button class="sub_button" type="submit">Se connecter</button>

					<p class="other_button"><a href="register.php" class="other_button">Pas encore inscrit ? c'est gratuit !</a></p>
				</form>
			</div>
	</body>
</html>