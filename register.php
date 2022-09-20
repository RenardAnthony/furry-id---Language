<?php 


require 'bootstrap.php';

$auth = App::getAuth();

$db = App::getDatabase();

$auth->connectFromCookie($db);

$session = Session::getInstance();

if(!empty($_POST)){

	$entry_user_name = htmlspecialchars($_POST['username']);
	$entry_email = htmlspecialchars($_POST['email']);
	$entry_password_first = htmlspecialchars($_POST['password']);
	$entry_password_second = htmlspecialchars($_POST['password_confirm']);

	if(isset($_POST['ruleok'])){//reglement ok ?


	//Verifier si le pseudo corresponde aux réglement
		if(!preg_match('%([-_.,;:\|]+)%i', $entry_user_name)){
			$db = App::getDatabase();
			$isUniquUser = $db->query("SELECT id FROM users WHERE username = ?", [$entry_user_name])->fetch();



	//Verifier si le nom de l'utilisateur existe pas déjà dans la base de donnée.
			if($isUniquUser == false){



	//Verifier si le mail est bien un email.
				if(!filter_var($entry_email, FILTER_VALIDATE_EMAIL)){
					Session::getInstance()->setFlash('alert', "Veuiller tapez un email valide.");
				} else {
					$isUniquMail = $db->query("SELECT id FROM users WHERE email = ?", [$entry_email])->fetch();



	//Verifier si le mail est bien unique.
					if($isUniquMail == false){ 


	//Verifier que les deux mots de passe son identique.
						if($entry_password_first == $entry_password_second && !empty($_POST['password'])){
							App::getAuth()->register($db, $entry_user_name, $entry_password_first ,$entry_email);
							Session::getInstance()->setFlash('success', "Un email de confirmation vous à été envoyé par email");
							$session = Session::getInstance();

							$session->setFlash('success',"Un email de confirmation vous à été envoyé par email.");
							App::redirect('index.php');
						} else {
	//Les erreus

							Session::getInstance()->setFlash('alert', "Vos deux mots de passe ne sont pas identique.");
						}
					} else {
						Session::getInstance()->setFlash('alert', "Ce adresse email existe déjà.");
					}
				}
			} else {
				Session::getInstance()->setFlash('alert', "Ce nom d'utilisateur existe déjà.");
				
			}
		} else {
			Session::getInstance()->setFlash('alert', "Ce nom d'utilisateur ne peut contenir que des lettres ou des chiffres.");
		}
	} else {
		Session::getInstance()->setFlash('alert', "Vous devez accepter les conditions générales.");
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
				<div id="image-connection">
				</div>
				<form action="" method="POST" class="box_connect">

					<img src="../img/theme/Logo_site_couleur.png" alt="">
					<p id="p_acroche">Inscrit toi, c'est gratuit !</p>

					<input type="text" name="username" placeholder="Nom d'utilisateur" class="text-input"/>
					<input type="email" name="email" placeholder="Adresse email" class="text-input"/>
					<input type="password" name="password" placeholder="Mots de passe" class="text-input"/>
					<input type="password" name="password_confirm" placeholder="Confirmation du mots de passe" class="text-input"/>

					<div id="regroupement">
						<table class="ckeckbox__box_box">
							<tr class="ckeckbox__box_box">
								<td class="ckeckbox__box_box">
									<input type="checkbox" class="checkbox_box" id="checkbox_box" name="ruleok" value="1">
									<label for="checkbox_box"></label>
								</td>
								<td class="ckeckbox__box_box">
									<p class="nomargin">J'accept les condition général d'utilisation et les Privacy Policy</p>
								</td>
							</tr>
						</table>
					</div>

					<button class="sub_button" type="submit">Crée mon compte</button>

					<p class="other_button"><a href="login.php" class="other_button">Déjà inscrit ? c'est par ici !</a></p>
				</form>
			</div>
	</body>
</html>