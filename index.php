<?php

require 'bootstrap.php';

$auth = App::getAuth();

$db = App::getDatabase();

$auth->connectFromCookie($db);

$session = Session::getInstance();

$news = $db->query('SELECT * FROM news ORDER BY date_time_publication DESC LIMIT 3');


?>

<!DOCTYPE html>
<html>
<head>
		<base href="/"/>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/theme.css"/>
		<link rel="stylesheet" href="css/index.css"/>
		<link rel="shortcut icon" type="image/png" href="img/theme/favicon.png"/>
		<title>Furry-id.com</title>
		<meta name="description" content="Retrouve n'import quelle furry du monde entier en quelques cliques !."/>
		<meta name="author" content="Anthony Rodrigues"/>
		<meta property="og:title" content="Furry-id.com"/>
		<meta property="og:type" content="website"/>
		<meta property="og:image" content="img/theme/favicon.png"/>
		<meta property="og:description" content="Retrouve n'import quelle furry du monde entier en quelques cliques !."/>
		<meta property="og:url" content="http://www.furry-id.fr"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<script src="https://kit.fontawesome.com/d5d0318cf5.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php include("part/header.php");?>
		<div id="__global_body__">

			<div id="tete" class="box_100">
				<p>Bienveneue sur <em>Furry-id.com</em> ! <br><br>
				Grâce à ce site fini de ne plus retrouver un furry que vous avez croisé ! <br>
				Simplifiez-vous la vie dans le fandom grâce à votre IDcarte qui contient toutes les informations sur vous et vos fursona.</p>
			</div>

			<div id="GENERAL">
				<div id="Gauche">


					<div id="site_progress" class="box_100">
						<p>Progression du site : "Le site avance bien !"</p>
						<?php
						
							$pourcent_progresse_bar = 28;
						
						?>
						<div id="progress_bar">
							<div id="inner" style="width: <?=$pourcent_progresse_bar?>%;"><p><?=$pourcent_progresse_bar?>%</p></div>
							
						</div>
					</div>
					<div id="news-general" class="box_200">

						<h1 class="titre_section">Les News !</h1>

						<?php while($news_unique = $news->fetch()){ ?>
							<a href="/news_unique?id=<?=$news_unique->id?>">
							
								<div class="article-unique">
									<div><img src="<?=$news_unique->img?>" alt=""></div>
									<div style="width: 100%; min-height: 100%;">
										<h1><?=$news_unique->titre?></h1>
										<p><?=$news_unique->description?></p>
										<p class="dt"><?=$news_unique->date_time_publication?></p>
									</div>
								</div>
							</a>
						<?php } ?>

					</div>
					<div id="Evenement_a_venir" class="box_200">
						<h1 class="titre_section">Les évènement à venir</h1>

						<?php $event_list = $db->query('SELECT * FROM event LIMIT 6');?>

						<div id="list_event_global">

							<?php while($event_unique = $event_list->fetch(PDO::FETCH_OBJ)){ ?>
								<div class="parent">
								<a href="/eventpage?id=<?=$event_unique->id?>"><div class="event_unique">
									<img src="<?=$event_unique->img?>" alt="<?=$event_unique->name?> - image">
									<p class="overlay"><?=$event_unique->name?> <br><br>
									<img class="badge" src="<?=$event_unique->badge?>"><br>
									<?=$event_unique->paye?><br>
									<?=$event_unique->date_debut?></p>
								</div></a></div>
							<?php } ?>
						</div>
					</div>
				</div>
				<div id="Droit">
					<div id="last_register" class="box_100">

						<p>Dernier inscrit :</p>
						
						<div class="last_register_liste">
							<?php $liste_last_register = $db->query('SELECT * FROM users ORDER BY confirmed_at DESC LIMIT 10');?>

							<?php while($user_liste = $liste_last_register->fetch(PDO::FETCH_OBJ)){ ?>
								<a href="/account?id=<?=$user_liste->id?>"><div class="last_register_unit">
									<img src="<?=$user_liste->avatar?>" alt="<?=$user_liste->username?>">
								</div></a>
							<?php } ?>
						</div>
					</div>
					<div id="last_fursona" class="box_100">

						<p>Dernier Fursona inscrit :</p>

						<div class="last_register_liste">

							<?php $liste_last_fursona = $db->query('SELECT * FROM furrys ORDER BY creation DESC LIMIT 10');?>

							<?php while($furso_liste = $liste_last_fursona->fetch(PDO::FETCH_OBJ)){ ?>
								<a href="/furrycard?id=<?=$furso_liste->id?>"><div class="last_register_unit">
									<img src="<?=$furso_liste->avatar?>" alt="<?=$furso_liste->name?>">
								</div></a>
							<?php } ?>

						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include("part/footer.php");?>
	</body>
</html>