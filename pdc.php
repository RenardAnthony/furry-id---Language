<?php

require 'bootstrap.php';

$auth = App::getAuth();

$db = App::getDatabase();

$auth->connectFromCookie($db);

$session = Session::getInstance();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/theme.css"/>
		<link rel="stylesheet" href="css/cduetconfidentialiter.css"/>
		<link rel="shortcut icon" type="image/png" href="img/theme/favicon.png"/>
		<title>Furry-id.com</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0, maximum-scale=1.0">
		<script src="https://kit.fontawesome.com/d5d0318cf5.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php include("part/header.php");?>

			<div class="para">
				<h1>Condition d'utilisation</h1>
				<p>A jour le : 06/06/2021</p>
				<p>Auteur : _name_</p>
			</div>

			<div class="para">
				<h1>Quelles informations collectons-nous ?</h1>
				<p>
					Nous pouvons collecter, stocker et utiliser les types de données personnelles suivants:<br/><br/>
					
					1. Informations sur vos visites et votre utilisation de ce site Web.<br/><br/>
					
					2. Des informations sur toutes les transactions effectuées entre vous et nous sur ou en relation avec ce site Web ou l'un de nos services, y compris, mais sans s'y limiter, les dépôts sur discord.<br/><br/>
					
					3. Les informations que vous nous fournissez dans le but de vous inscrire et / ou de vous abonner aux services de notre site Web et / ou aux notifications par e-mail. <br/>

				</p>
			</div>
			<div class="para">
				<h1>Informations sur les visites du site Web</h1>
				<p>
					Nous pouvons collecter des informations sur vos visites sur ce site Web telles que votre adresse IP, votre emplacement géographique, le type de navigateur, la durée de la visite et le nombre de pages vues. Nous pouvons utiliser ces informations dans l'administration de ce site Web, pour améliorer la convivialité du site Web et à des fins de marketing.<br/><br/>

					Nous utilisons des cookies sur ce site.<br/>
					Un cookie est un fichier texte envoyé par un serveur Web à un navigateur Web et stocké par le navigateur. Le fichier texte est ensuite renvoyé au serveur chaque fois que le navigateur demande une page au serveur. Cela permet au serveur Web d'identifier et de suivre le navigateur Web.<br/><br/>


					Nous pouvons envoyer un cookie qui peut être stocké par votre navigateur sur le disque dur de votre ordinateur. Nous pouvons utiliser les informations que nous obtenons à partir du cookie dans l'administration de ce site Web, pour améliorer la convivialité du site Web et à des fins de marketing. Nous pouvons également utiliser ces informations pour reconnaître votre ordinateur lorsque vous visitez notre site Web et pour personnaliser notre site Web pour vous.<br/><br/>


					La plupart des navigateurs vous permettent de refuser d'accepter les cookies. (Par exemple, dans Internet Explorer, vous pouvez refuser tous les cookies en cliquant sur "Outils", "Options Internet", "Confidentialité" et en sélectionnant "Bloquer tous les cookies".) Cela aura cependant un impact négatif sur l'économie de nombreux sites Web. <br/><br/>

					A savoir, refuser les cookies sur un site revien à crée un cookie qui contien l'information "je ne veut pas de cookies".
				</p>
			</div>
			<div class="para">
				<h1>Utilisation de vos données personnelles</h1>
				<p>
					Les données personnelles soumises sur ce site Web seront utilisées aux fins spécifiées dans la présente politique de confidentialité ou dans les parties pertinentes du site Web.<br/>
					En plus des utilisations identifiées ailleurs dans cette politique de confidentialité.<br/><br/>

					Vos données personnelles ne seront ni partagées, si vendues à des tiers !<br/><br/>
				</p>
			</div>
			<div class="para">
				<h1>Autres divulgations</h1>
				<p>
					En plus des divulgations raisonnablement nécessaires aux fins identifiées ailleurs dans cette politique de confidentialité, nous pouvons divulguer des informations vous concernant:<br/><br/>

					1. Dans la mesure où nous sommes tenus de le faire par la loi.<br/><br/>

					2. Dans le cadre de toute procédure judiciaire ou procédure judiciaire potentielle.<br/><br/>

					3. Afin d'établir, d'exercer ou de défendre nos droits légaux (y compris fournir des informations à des tiers à des fins de prévention de la fraude et de réduction du risque de crédit).<br/><br/>

					4. Sauf dans les cas prévus dans cette politique de confidentialité, nous ne fournirons pas vos informations à des tiers. 
				</p>
			</div>
			<div class="para">
				<h1>Sécurité de vos données personnelles </h1>
				<p>Nous prendrons des précautions raisonnables pour éviter le vol, l'utilisation abusive ou l'altération de vos informations personnelles.<br/>
				Bien entendu, la transmission de données sur Internet est intrinsèquement non sécurisée et nous ne pouvons garantir la sécurité des données envoyées sur Internet.
				</p>
			</div>
			<div class="para">
				<h1>Sites Web tiers </h1>
				<p>Le site Web contient des liens vers d'autres sites Web. Nous ne sommes pas responsables des politiques de confidentialité des sites Web tiers.</p>
			</div>

			<div id="inspir"><p>Inspirer de : Flight By Wire</p></div>

		<?php include("part/footer.php");?>
	</body>
</html>