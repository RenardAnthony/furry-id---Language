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
        <link rel="stylesheet" href="css/soon.css"/>
		<link rel="shortcut icon" type="image/png" href="img/theme/favicon.png"/>
		<title>Furry-id.com</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0, maximum-scale=1.0">
		<script src="https://kit.fontawesome.com/d5d0318cf5.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php include("part/header.php");?>

        <?php
            $errorType = $_GET["error"];
        ?>


        <?php
        if ($errorType == 401){ ?>
            <div id="soonbox">
                <h1>Erreur 401</h1>
                <p class="blue">Utilisateur non authentifié</p>
                <p>Pour des raisons inconnues, vous êtes un utilisateur fantôme. <br> Vous ne pouvez accéder à cette page.</p>
                <img src="img/theme/error.png" alt="Error image">
            </div>
        <?php }
        if ($errorType == 402){ ?>
            <div id="soonbox">
                <h1>Erreur 402</h1>
                <p class="blue">Comment tu à fait ?</p>
                <p>Cette erreur n'est pour le moment pas encore implantée dans les sites internet. <br> cette erreur surviendra normalement lors d'un achat rater à cause d'un payement refuser.</p>
                <img src="img/theme/hum.png" alt="Error image">
            </div>
        <?php }
        if ($errorType == 403){ ?>
            <div id="soonbox">
                <h1>Erreur 403</h1>
                <p class="blue">Accès refusé</p>
                <p>Cette page t'es interdit</p>
                <img src="img/theme/hum.png" alt="Error image">
            </div>
        <?php }
        if ($errorType == 404){ ?>
            <div id="soonbox">
                <h1>Erreur 404</h1>
                <p class="blue">Page non trouvée</p>
                <p>Habituelle... Si c'est un lien qui t’a mené jusqu’à cette page il est recommandé de prévenir les développeurs du site.</p>
                <img src="img/theme/error.png" alt="Error image">
            </div>
        <?php }
        if ($errorType != 401 && $errorType != 402 && $errorType != 403 && $errorType != 404){ ?>
            <div id="soonbox">
                <h1>Erreur <?= $errorType ?></h1>
                <p class="blue">Erreur non programer</p>
                <p>L'erreur retourner n’a pas été prévue sur le site. C'est tout caser.</p>
                <img src="img/theme/error.png" alt="Error image">
            </div>
        <?php } ?>

		<?php include("part/footer.php");?>
	</body>
</html>