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
		<base href="/"/>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/theme.css"/>
		<link rel="stylesheet" href="css/about.css"/>
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

			<h1>A propos</h1>
			
		</div>
		<?php include("part/footer.php");?>
	</body>
</html>