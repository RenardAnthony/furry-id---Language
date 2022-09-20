<?php

require 'bootstrap.php';

$auth = App::getAuth();

$db = App::getDatabase();

$auth->connectFromCookie($db);

$session = Session::getInstance();

$newsgeen = $db->query('SELECT * FROM news ORDER BY date_time_publication DESC');

if(isset($_GET['id']) AND !empty($_GET['id'])){
	$get_id = htmlspecialchars($_GET['id']);

	$news = $db->query('SELECT * FROM news WHERE id = ?', [$get_id]);

	if($news->rowCount() == 1){
		$news = $news->fetch(PDO::FETCH_OBJ);
	}else{
		$session->setFlash('alert',"Cette article existe pas !");
		App::redirect('index.php');
	}

} else {
	$session->setFlash('alert',"Cette article existe pas ! (id incorrect)");
		App::redirect('index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
		<base href="/"/>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/theme.css"/>
		<link rel="stylesheet" href="css/news.css"/>
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

		<div id="top">
			<article>

				<img src="<?=$news->img?>" alt="">
				<h1><?=$news->titre?></h1>
				<p><?=$news->contenu?></p>

			</article>

			<div id="liste_articles">
				<?php while($newsgeenuni = $newsgeen->fetch()){ ?>
					<a href="/news_unique?id=<?=$newsgeenuni->id?>"><div class="article-unique">
						<h1><?=$newsgeenuni->titre?></h1>
						<p><?=$newsgeenuni->description?></p>
					</div></a>
				<?php } ?>
			</div>
		</div>

		<?php 
			if(isset($data_role)){
				if($data_role == "admin"){?>
		
				<div>
					<a href="news_redaction.php?edit=<?=$news->id?>">Modifier</a>
					<a href="news_redaction.php?supr=<?=$news->id?>">Suprimer</a>
				</div>
		<?php } } ?>

			

		</div>
		<?php include("part/footer.php");?>
	</body>
</html>