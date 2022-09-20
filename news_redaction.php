<?php

require 'bootstrap.php';

$auth = App::getAuth();

$db = App::getDatabase();

$auth->connectFromCookie($db);

$session = Session::getInstance();

$mode_edition = 0;

?>



<!DOCTYPE html>
<html>
<head>
		<base href="/"/>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/theme.css"/>
		<link rel="stylesheet" href="css/news_redaction.css"/>
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
		<?php include("part/header.php");

			if($data_role == "admin"){
				if(isset($_GET['supr']) AND !empty($_GET['supr'])){
					$supr_id = htmlspecialchars($_GET['supr']);
					$supr_id_article = $db->query('SELECT * FROM news WHERE id = ?', [$supr_id]);
					$supr_id_article = $supr_id_article->fetch();

					$db->query('DELETE FROM `news` WHERE id = ?', [$supr_id_article->id]);
					$session->setFlash('success',"La'rticle à été suprimer avec succes !");
					App::redirect('index.php');
				}
				if(isset($_GET['edit']) AND !empty($_GET['edit'])){
					$edit_id = htmlspecialchars($_GET['edit']);
					$edit_article = $db->query('SELECT * FROM news WHERE id = ?', [$edit_id]);
					if($edit_article->rowCount() == 1){
						$edit_article = $edit_article->fetch();
						$mode_edition = 1;
					} else {
						$session->setFlash('alert',"L'article n'existe pas !");
					}
				}
			}
			if(isset($_POST['news_titre'], $_POST['news_contenu'], $_POST['news_img'], $_POST['news_desc'])){

				if(!empty($_POST['news_titre']) AND !empty($_POST['news_contenu'] AND !empty($_POST['news_img'] AND !empty($_POST['news_desc'])))){

					$news_titre = htmlspecialchars($_POST['news_titre']);
					$news_contenu = htmlspecialchars($_POST['news_contenu']);
					$news_img = htmlspecialchars($_POST['news_img']);
					$news_desc = htmlspecialchars($_POST['news_desc']);


					if($mode_edition == 0){
						$db->query("INSERT INTO news SET titre = ?, contenu = ?, img = ?, description = ? date_time_publication = NOW()",[$news_titre, $news_contenu, $news_img, $news_desc]);
						$session->setFlash('success',"L'article a été publier");
						App::redirect('index.php');
					} else {
						$db->query("UPDATE news SET titre = ?, contenu = ?, img = ?, description = ? WHERE id = ?", [$news_titre, $news_contenu, $news_img, $news_desc, $edit_id]);
						$session->setFlash('success',"L'article a été mise à jours");
						App::redirect('index.php');
					}
				} else {

					$session->setFlash('alert',"L'article n'est pas complet !");

				}
			}
		
		if($data_role == "admin"){?>
		<div id="__global_body__">

		<form method="POST" action=""><br>
			<input style="width:80%; display:flex; margin:auto; text-align:center;" name="news_titre" type="text" placeholder="Titre" <?php if($mode_edition == 1) {?>value="<?=$edit_article->titre?>"<?php } ?>><br>
			<textarea style="width:80%; height:10vh; display:flex; margin:auto; text-align:center;" name="news_desc" placeholder="Description courte"><?php if($mode_edition == 1) {?><?=$edit_article->description?><?php } ?></textarea><br>
			<textarea style="width:80%; height:50vh; display:flex; margin:auto; text-align:center;" name="news_contenu" placeholder="Contenu de la news"><?php if($mode_edition == 1) {?><?=$edit_article->contenu?><?php } ?></textarea><br>
			<input style="width:80%; display:flex; margin:auto; text-align:center;" name="news_img" type="text" placeholder="url" <?php if($mode_edition == 1) {?>value="<?=$edit_article->img?>"<?php } ?>><br>
			<input style="width:80%; display:flex; margin:auto; text-align:center;" type="submit" <?php if($mode_edition == 1) {?>value="Modifier"<?php }else{ ?>value="Publier la news"<?php } ?>><br>
		</form>

			
		</div>
		<?php include("part/footer.php");?>
	
		<?php } else { $session->setFlash('alert',"Vous avais pas le droit d'ecrire d'article !");
		App::redirect('index.php'); }?>
	</body>
</html>