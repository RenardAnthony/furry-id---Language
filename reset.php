<?php 

require 'bootstrap.php';

if(isset($_GET['id']) && isset($_GET['token'])){

	$auth = App::getAuth();

	$db = App::getDatabase();

	$user = $auth->checkResetToken($db, $_GET['id'], $_GET['token']);

	if($user){

		if(!empty($_POST)){

			$validator = new Validator($_POST);

			$validator->isConfirmed('password');

			if($validator->isValid()){

				$password = $auth->hashPassword($_POST['password']);

				$db->query('UPDATE users SET password = ?, reset_at = NULL, reset_token = NULL WHERE id = ?', [$password, $_GET['id']]);

				Session::getInstance()->setFlash('success',"Votre mots de passe à bien été modifié");

				$auth->connect($user);

				App::redirect('account.php');

			}

		}

	}else{

		Session::getInstance()->setFlash('alert',"Ce token n'est pas valide");

		App::redirect('login.php');

	}
}else{

	App::redirect('login.php');
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

				<input type="password" class="text-input" name="password"/>
				<p>Mots de passe</p>

				<input type="password" class="text-input" name="password_confirm"/>
				<p>Confirez le nouveau mot de passe</p>

				<button type="submit" class="sub_button_reset">Réinisialiser mon mot de passe</button>

			</form>

			<?php if(!empty($errors)): ?>
				<div class="alert">
					<ul>
					<?php foreach($errors as $error): ?>
						<li><?= $error; ?></li>
					<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

		</div>

		<?php include("part/footer.php");?>
	</body>
</html>