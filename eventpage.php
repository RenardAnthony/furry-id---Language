<?php

require 'bootstrap.php';

$auth = App::getAuth();

$db = App::getDatabase();

$auth->connectFromCookie($db);

$session = Session::getInstance();



if(isset($_GET['id']) AND !empty($_GET['id'])){
	$event_id = htmlspecialchars($_GET['id']);

	$event = $db->query('SELECT * FROM event WHERE id = ?', [$event_id]);

	if($event->rowCount() == 1){
		$event = $event->fetch(PDO::FETCH_OBJ);
	}else{
		$session->setFlash('alert',"Cette evenement existe pas !");
		App::redirect('index.php');
	}

} else {
	$session->setFlash('alert',"Cette evenement existe pas !");
		App::redirect('index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
		<base href="/"/>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/theme.css"/>
		<link rel="stylesheet" href="css/eventpage.css"/>
		<link rel="shortcut icon" type="image/png" href="img/theme/favicon.png"/>
		<title>Furry-id.com</title>
		<meta name="description" content="Retrouve n'import quelle furry du monde entier en quellques cliques !."/>
		<meta name="author" content="Anthony Rodrigues"/>
		<meta property="og:title" content="Furry-id.com"/>
		<meta property="og:type" content="website"/>
		<meta property="og:image" content="img/theme/favicon.png"/>
		<meta property="og:description" content="Retrouve n'import quelle furry du monde entier en quellques cliques !."/>
		<meta property="og:url" content="http://www.furry-id.fr"/>
		<meta name="viewport" content="width=device-width; initial-scale=1.0, maximum-scale=1.0">
		<script src="https://kit.fontawesome.com/d5d0318cf5.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php include("part/header.php");?>
		<div id="__global_body__">
            <div id="gen">
                <div class="event_general">
                    <h1><?=$event->name?></h1>
                    <p><?=$event->desc?></p>
                    <img id="shadow" src="<?=$event->img?>" alt="<?=$event->name?>">
                </div>

				<div id="flex-div">
					<div class="localisation box">
						<p>Paye : <?=$event->paye?></p>
						<p>Lieu : <?=$event->localisation?></p>
					</div>
					<div class="box">
						<p>Du : <?=$event->date_debut?></p>
						<p>Au : <?=$event->date_defin?></p>
					</div>
					<div class="ecom box">
						<button>Je participe</button>
						<button>Je suis intéressé</button>
					</div>
				</div>
            </div>
        </div>
		<?php include("part/footer.php");?>
	</body>
</html>