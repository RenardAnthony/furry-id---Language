<?php

require 'bootstrap.php';

$auth = App::getAuth();

$db = App::getDatabase();

$auth->connectFromCookie($db);

$session = Session::getInstance();

$beta = $_COOKIE["beta"];
if(!isset($beta)){
	App::redirect('index.php');
}


$nbr_total = $db->query('SELECT * FROM furrys');
	$nbr_total = $nbr_total->rowCount();

	$nbr_male = $db->query('SELECT * FROM furrys WHERE genre = ?', ["male"]);
	$nbr_male = $nbr_male->rowCount();
	$nbr_femelle = $db->query('SELECT * FROM furrys WHERE genre = ?', ["femelle"]);
	$nbr_femelle = $nbr_femelle->rowCount();


	$nbr_autre_genre = $nbr_total - ($nbr_male + $nbr_femelle);

	$nbr_canin = $db->query('SELECT * FROM furrys WHERE famille = ?', ["canin"]);
	$nbr_canin = $nbr_canin->rowCount();
	$nbr_felin = $db->query('SELECT * FROM furrys WHERE famille = ?', ["felin"]);
	$nbr_felin = $nbr_felin->rowCount();
	$nbr_oiseau = $db->query('SELECT * FROM furrys WHERE famille = ?', ["oiseau"]);
	$nbr_oiseau = $nbr_oiseau->rowCount();
	$nbr_poisson = $db->query('SELECT * FROM furrys WHERE famille = ?', ["poisson"]);
	$nbr_poisson = $nbr_poisson->rowCount();

	$nbr_digigrade = $db->query('SELECT * FROM furrys WHERE padding = ?', ["digigrade"]);
	$nbr_digigrade = $nbr_digigrade->rowCount();
	$nbr_plantigrade = $db->query('SELECT * FROM furrys WHERE padding = ?', ["plantigrade"]);
	$nbr_plantigrade = $nbr_plantigrade->rowCount();

	$nbr_toony = $db->query('SELECT * FROM furrys WHERE style = ?', ["toony"]);
	$nbr_toony = $nbr_toony->rowCount();
	$nbr_realist = $db->query('SELECT * FROM furrys WHERE style = ?', ["realist"]);
	$nbr_realist = $nbr_realist->rowCount();
	$nbr_autreaide = $db->query('SELECT * FROM furrys WHERE style = ?', ["autre"]);
	$nbr_autreaide = $nbr_autreaide->rowCount();

	$nbr_fix = $db->query('SELECT * FROM furrys WHERE machoir = ?', ["fix"]);
	$nbr_fix = $nbr_fix->rowCount();
	$nbr_amovible = $db->query('SELECT * FROM furrys WHERE machoir = ?', ["moving"]);
	$nbr_amovible = $nbr_amovible->rowCount();

	$nbr_corne = $db->query('SELECT * FROM furrys WHERE cornes = ?', ["yes"]);
	$nbr_corne = $nbr_corne->rowCount();
	$nbr_pascorne = $db->query('SELECT * FROM furrys WHERE cornes = ?', ["no"]);
	$nbr_pascorne = $nbr_pascorne->rowCount();

	$nbr_dent = $db->query('SELECT * FROM furrys WHERE dents = ?', ["yes"]);
	$nbr_dent = $nbr_dent->rowCount();
	$nbr_pasdent = $db->query('SELECT * FROM furrys WHERE dents = ?', ["no"]);
	$nbr_pasdent = $nbr_pasdent->rowCount();

	$nbr_4doight = $db->query('SELECT * FROM furrys WHERE doigt = ?', ["4"]);
	$nbr_4doight = $nbr_4doight->rowCount();
	$nbr_5doight = $db->query('SELECT * FROM furrys WHERE doigt = ?', ["5"]);
	$nbr_5doight = $nbr_5doight->rowCount();
	$nbr_doightautre = $db->query('SELECT * FROM furrys WHERE doigt = ?', ["autre"]);
	$nbr_doightautre = $nbr_doightautre->rowCount();

	$nbr_queue_petit = $db->query('SELECT * FROM furrys WHERE queue = ?', ["short"]);
	$nbr_queue_petit = $nbr_queue_petit->rowCount();
	$nbr_queue_moyen = $db->query('SELECT * FROM furrys WHERE queue = ?', ["normal"]);
	$nbr_queue_moyen = $nbr_queue_moyen->rowCount();
	$nbr_queue_grand = $db->query('SELECT * FROM furrys WHERE queue = ?', ["large"]);
	$nbr_queue_grand = $nbr_queue_grand->rowCount();

	$nbr_follow = $db->query('SELECT * FROM furrys WHERE yeux = ?', ["followMe"]);
	$nbr_follow = $nbr_follow->rowCount();
	$nbr_plat = $db->query('SELECT * FROM furrys WHERE yeux = ?', ["normal"]);
	$nbr_plat = $nbr_plat->rowCount();

	$nbr_eyerealist = $db->query('SELECT * FROM furrys WHERE yeux = ?', ["realist"]);
	$nbr_eyerealist = $nbr_eyerealist->rowCount();
	$nbr_led = $db->query('SELECT * FROM furrys WHERE yeux = ?', ["led"]);
	$nbr_led = $nbr_led->rowCount();

	$nbr_wingon = $db->query('SELECT * FROM furrys WHERE ailes = ?', ["yes"]);
	$nbr_wingon = $nbr_wingon->rowCount();
	$nbr_wingoff = $db->query('SELECT * FROM furrys WHERE ailes = ?', ["no"]);
	$nbr_wingoff = $nbr_wingoff->rowCount();




	if(!empty($_POST)){
		if(isset($_POST['genre']) != "tout"){
			$genre = htmlspecialchars($_POST['genre']);
		} else {
			$genre = "*";
		}
		if(isset($_POST['famille']) != "tout2"){
			$famille = htmlspecialchars($_POST['famille']);
		} else {
			$famille = "*";
		}
	}



	if(isset($_POST['colorprimp_ar'])){
		$checkedcolorprimp = $_POST['colorprimp_ar'];
		$liste_colorprimpar = implode("," , $checkedcolorprimp);
		$liste_colorprimp = $liste_colorprimpar;
	} else {
		$liste_colorprimp = "";
	}





///FILTRES







?>



<!DOCTYPE html>
<html>
<head>
		<base href="/"/>
			<meta charset="utf-8"/>
			<link rel="stylesheet" href="css/theme.css"/>
			<link rel="stylesheet" href="css/furidentifier.css"/>
			<link rel="shortcut icon" type="image/png" href="img/theme/favicon.png"/>
			<title>Furry-id.com</title>
			<meta name="description" content="Retrouve n'import quelle furry du monde entier en quellques cliques !."/>
			<meta name="author" content="Anthony Rodrigues"/>
			<meta property="og:title" content="Furry-id.com"/>
			<meta property="og:type" content="website"/>
			<meta property="og:image" content="img/theme/favicon.png"/>
			<meta property="og:description" content="Retrouve n'import quelle furry du monde entier en quellques cliques !."/>
			<meta property="og:url" content="http://www.furry-id.fr"/>
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
			<script src="https://kit.fontawesome.com/d5d0318cf5.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php include("part/header.php");?>
		<div id="__global_body__">

			<div id="gauche">


				<form action="" method="POST">
					<nav>
						<h1 class="titre">Genre</h1>
							<ul>
								<li><input onclick="update()" type="radio" name="genre" value="male" id="male" <?php if(isset($_POST['genre'])){ if($_POST['genre'] == "male"){?> checked="checked" <?php } } ?>><label for="male">Mâle <em>(<?= $nbr_male ?>)</em></label>
								<li><input onclick="update()" type="radio" name="genre" value="femelle" id="femelle" <?php if(isset($_POST['genre'])){ if($_POST['genre'] == "femelle"){?> checked="checked" <?php } } ?>><label for="femelle">Femelle <em>(<?= $nbr_femelle ?>)</em></label>
								<li><input onclick="update()" type="radio" name="genre" value="autre" id="autre" <?php if(isset($_POST['genre'])){ if($_POST['genre'] == "autre"){?> checked="checked" <?php } } ?>><label for="autre">Autre <em>(<?= $nbr_autre_genre ?>)</em></label>
								
								<li><input onclick="update()" type="radio" name="genre" value="tout" id="tout" <?php if(isset($_POST['genre'])){ if($_POST['genre'] == "tout"){?> checked="checked" <?php } } else { ?> checked="checked" <?php } ?>><label for="tout">Tout</label>

							</ul>
						<h1 class="titre">Famille</h1>
							<ul>
								<li><input onclick="update()" type="radio" name="famille" value="canin" id="canin" <?php if(isset($_POST['famille'])){ if($_POST['famille'] == "canin"){?> checked="checked" <?php } } ?>><label for="canin">Canin <em>(<?= $nbr_canin ?>)</em></label>
								<li><input onclick="update()" type="radio" name="famille" value="felin" id="felin" <?php if(isset($_POST['famille'])){ if($_POST['famille'] == "felin"){?> checked="checked" <?php } } ?>><label for="felin">Felin <em>(<?= $nbr_felin ?>)</em></label>
								<li><input onclick="update()" type="radio" name="famille" value="oiseau" id="oiseau" <?php if(isset($_POST['famille'])){ if($_POST['famille'] == "oiseau"){?> checked="checked" <?php } } ?>><label for="oiseau">Oiseau <em>(<?= $nbr_oiseau ?>)</em></label>
								<li><input onclick="update()" type="radio" name="famille" value="poisson" id="poisson" <?php if(isset($_POST['famille'])){ if($_POST['famille'] == "poisson"){?> checked="checked" <?php } } ?>><label for="poisson">Poisson <em>(<?= $nbr_poisson ?>)</em></label>
								
								<li><input onclick="update()" type="radio" name="famille" value="tout2" id="tout2" <?php if(isset($_POST['famille'])){ if($_POST['famille'] == "tout2"){?> checked="checked" <?php } } else { ?> checked="checked" <?php } ?>><label for="tout2">Tout</label>
							</ul>
						
						
					
						<h1 class="titre">Couleur principales</h1>
							<table class="color_tab" style="text-align: center;">
								<tr>
									<td style="background-color: black" class="color2"></td>
									<td style="background-color: green" class="color2"></td>
									<td style="background-color: lightgreen" class="color2"></td>
									<td style="background-color: yellow" class="color2"></td>
									<td style="background-color: orange" class="color2"></td>
									<td style="background-color: #964B00" class="color2"></td>
									<td style="background-color: red" class="color2"></td>
									<td style="background-color: purple" class="color2"></td>
									<td style="background-color: blue" class="color2"></td>
									<td style="background-color: lightblue" class="color2"></td>
									<td style="background-color: pink" class="color2"></td>
									<td style="background-color: white" class="color2"></td>
									<td style="background-color: gray" class="color2"></td>
								</tr>
								<tr>
									


									<?php if(!empty($liste_colorprimp)){
										
										$colorprimp_array = explode(',', $liste_colorprimp);
										
									} ?>


									<td><input onclick="update()" type="checkbox" name="colorprimp_ar[]" <?php if(!empty($liste_colorprimp)){if(in_array("black", $colorprimp_array)){?>checked="checked"<?php }} ?> value="black"></td>
									<td><input onclick="update()" type="checkbox" name="colorprimp_ar[]" <?php if(!empty($liste_colorprimp)){if(in_array("green", $colorprimp_array)){?>checked="checked"<?php }} ?> value="green"></td>
									<td><input onclick="update()" type="checkbox" name="colorprimp_ar[]" <?php if(!empty($liste_colorprimp)){if(in_array("lightgreen", $colorprimp_array)){?>checked="checked"<?php }} ?> value="lightgreen"></td>
									<td><input onclick="update()" type="checkbox" name="colorprimp_ar[]" <?php if(!empty($liste_colorprimp)){if(in_array("yellow", $colorprimp_array)){?>checked="checked"<?php }} ?> value="yellow"></td>
									<td><input onclick="update()" type="checkbox" name="colorprimp_ar[]" <?php if(!empty($liste_colorprimp)){if(in_array("orange", $colorprimp_array)){?>checked="checked"<?php }} ?> value="orange"></td>
									<td><input onclick="update()" type="checkbox" name="colorprimp_ar[]" <?php if(!empty($liste_colorprimp)){if(in_array("brown", $colorprimp_array)){?>checked="checked"<?php }} ?> value="brown"></td>
									<td><input onclick="update()" type="checkbox" name="colorprimp_ar[]" <?php if(!empty($liste_colorprimp)){if(in_array("red", $colorprimp_array)){?>checked="checked"<?php }} ?> value="red"></td>
									<td><input onclick="update()" type="checkbox" name="colorprimp_ar[]" <?php if(!empty($liste_colorprimp)){if(in_array("purple", $colorprimp_array)){?>checked="checked"<?php }} ?> value="purple"></td>
									<td><input onclick="update()" type="checkbox" name="colorprimp_ar[]" <?php if(!empty($liste_colorprimp)){if(in_array("blue", $colorprimp_array)){?>checked="checked"<?php }} ?> value="blue"></td>
									<td><input onclick="update()" type="checkbox" name="colorprimp_ar[]" <?php if(!empty($liste_colorprimp)){if(in_array("lightblue", $colorprimp_array)){?>checked="checked"<?php }} ?> value="lightblue"></td>
									<td><input onclick="update()" type="checkbox" name="colorprimp_ar[]" <?php if(!empty($liste_colorprimp)){if(in_array("pink", $colorprimp_array)){?>checked="checked"<?php }} ?> value="pink"></td>
									<td><input onclick="update()" type="checkbox" name="colorprimp_ar[]" <?php if(!empty($liste_colorprimp)){if(in_array("white", $colorprimp_array)){?>checked="checked"<?php }} ?> value="white"></td>
									<td><input onclick="update()" type="checkbox" name="colorprimp_ar[]" <?php if(!empty($liste_colorprimp)){if(in_array("gray", $colorprimp_array)){?>checked="checked"<?php }} ?> value="gray"></td>
								</tr>
							</table>

						<h1 class="titre">Couleur des yeux</h1>
							<table class="color_tab">
								<tr>
									<td style="background-color: black" class="color2"></td>
									<td style="background-color: green" class="color2"></td>
									<td style="background-color: lightgreen" class="color2"></td>
									<td style="background-color: yellow" class="color2"></td>
									<td style="background-color: orange" class="color2"></td>
									<td style="background-color: #964B00" class="color2"></td>
									<td style="background-color: red" class="color2"></td>
									<td style="background-color: purple" class="color2"></td>
									<td style="background-color: blue" class="color2"></td>
									<td style="background-color: lightblue" class="color2"></td>
									<td style="background-color: pink" class="color2"></td>
									<td style="background-color: white" class="color2"></td>
									<td style="background-color: gray" class="color2"></td>
								</tr>
								<tr>

									<?php if(!empty($fureditid)){
											
											$coloreye_array = explode(',', $furtoedit->colors_eye);
										
									} ?>

									<td><input onclick="update()" type="checkbox" name="coloreye[]" value="black"></td>
									<td><input onclick="update()" type="checkbox" name="coloreye[]" value="green"></td>
									<td><input onclick="update()" type="checkbox" name="coloreye[]" value="lightgreen"></td>
									<td><input onclick="update()" type="checkbox" name="coloreye[]" value="yellow"></td>
									<td><input onclick="update()" type="checkbox" name="coloreye[]" value="orange"></td>
									<td><input onclick="update()" type="checkbox" name="coloreye[]" value="brown"></td>
									<td><input onclick="update()" type="checkbox" name="coloreye[]" value="red"></td>
									<td><input onclick="update()" type="checkbox" name="coloreye[]" value="purple"></td>
									<td><input onclick="update()" type="checkbox" name="coloreye[]" value="blue"></td>
									<td><input onclick="update()" type="checkbox" name="coloreye[]" value="lightblue"></td>
									<td><input onclick="update()" type="checkbox" name="coloreye[]" value="pink"></td>
									<td><input onclick="update()" type="checkbox" name="coloreye[]" value="white"></td>
									<td><input onclick="update()" type="checkbox" name="coloreye[]" value="gray"></td>
								</tr>
							</table>

						<h1 class="titre">Motifs fouture</h1>
							<table class="color_tab">
								<tr>
									<td><img src="http://www.furry-id.com/img/theme/TR_none.png" alt=""></td>
									<td><img src="http://www.furry-id.com/img/theme/TR_cow.png" alt=""></td>
									<td><img src="http://www.furry-id.com/img/theme/TR_tigre.png" alt=""></td>
									<td><img src="http://www.furry-id.com/img/theme/TR_leopar.png" alt=""></td>
									<td><img src="http://www.furry-id.com/img/theme/TR_scale.png" alt=""></td>
								</tr>
								<tr>
									<td><input onclick="update()" type="checkbox" name="taches"></td>
									<td><input onclick="update()" type="checkbox" name="taches"></td>
									<td><input onclick="update()" type="checkbox" name="taches"></td>
									<td><input onclick="update()" type="checkbox" name="taches"></td>
									<td><input onclick="update()" type="checkbox" name="taches"></td>
								</tr>
							</table>
					</nav>
					
					<div style="height:50px;"></div>

					<nav>
						<h1 class="titre">Fursuit</h1>
							<h2 class="titre2-noborder">Paddings</h2>
								<ul>
									<li><input onclick="update()" type="checkbox" value="digigrade" id="digigrade"><label for="digigrade">Digigrade <em>(<?= $nbr_digigrade ?>)</em></label>
									<li><input onclick="update()" type="checkbox" value="plantigrade" id="plantigrade"><label for="plantigrade">Plantigrade <em>(<?= $nbr_plantigrade ?>)</em></label>
								</ul>
							<h2 class="titre2">Type de suite</h2>
								<ul>
									<li><input onclick="update()" type="checkbox" value="toony" id="toony"><label for="toony">Toony <em>(<?= $nbr_toony ?>)</em></label>
									<li><input onclick="update()" type="checkbox" value="realist" id="realist"><label for="realist">Réalist <em>(<?= $nbr_realist ?>)</em></label>
									<li><input onclick="update()" type="checkbox" value="autre" id="autre"><label for="autre">Autre <em>(<?= $nbr_autreaide ?>)</em></label>
								</ul>
							<h2 class="titre2">Machoir</h2>
								<ul>
									<li><input onclick="update()" type="checkbox" value="fix" id="fix"><label for="fix">Fix <em>(<?= $nbr_fix ?>)</em></label>
									<li><input onclick="update()" type="checkbox" value="amovible" id="amovible"><label for="amovible">Articuler <em>(<?= $nbr_amovible ?>)</em></label>
								</ul>
							<h2 class="titre2">Cornes</h2>
								<ul>
									<li><input onclick="update()" type="checkbox" value="corne" id="corne"><label for="corne">Avec <em>(<?= $nbr_corne ?>)</em></label>
									<li><input onclick="update()" type="checkbox" value="pascorne" id="pascorne"><label for="pascorne">Sens <em>(<?= $nbr_pascorne ?>)</em></label>
								</ul>
							<h2 class="titre2">Dents</h2>
								<ul>
									<li><input onclick="update()" type="checkbox" value="avdent" id="avdent"><label for="avdent">Avec <em>(<?= $nbr_dent ?>)</em></label>
									<li><input onclick="update()" type="checkbox" value="pasdent" id="pasdent"><label for="pasdent">Sens <em>(<?= $nbr_pasdent ?>)</em></label>
								</ul>
							<h2 class="titre2">Nombre de doigt</h2>
								<ul>
									<li><input onclick="update()" type="checkbox" value="4doight" id="4doight"><label for="4doight">4 <em>(<?= $nbr_4doight ?>)</em></label>
									<li><input onclick="update()" type="checkbox" value="5doight" id="5doight"><label for="5doight">5 <em>(<?= $nbr_5doight ?>)</em></label>
									<li><input onclick="update()" type="checkbox" value="5doight" id="5doight"><label for="5doight">Autre <em>(<?= $nbr_doightautre ?>)</em></label>
								</ul>
							<h2 class="titre2">Taille de la queue</h2>
								<ul>
									<li><input onclick="update()" type="checkbox" value="queue_petit" id="queue_petit"><label for="queue_petit">Petit <em>(<?= $nbr_queue_petit ?>)</em></label>
									<li><input onclick="update()" type="checkbox" value="queue_moyen" id="queue_moyen"><label for="queue_moyen">Moyen <em>(<?= $nbr_queue_moyen ?>)</em></label>
									<li><input onclick="update()" type="checkbox" value="queue_grand" id="queue_grand"><label for="queue_grand">Grande <em>(<?= $nbr_queue_grand ?>)</em></label>
								</ul>
							<h2 class="titre2">Type de yeux</h2>
								<ul>
									<li><input onclick="update()" type="checkbox" value="follow" id="follow"><label for="follow">Follow me <em>(<?= $nbr_follow ?>)</em></label>
									<li><input onclick="update()" type="checkbox" value="plat" id="plat"><label for="plat">Normal <em>(<?= $nbr_plat ?>)</em></label>
									<li><input onclick="update()" type="checkbox" value="realist" id="realist"><label for="realist">Réalist <em>(<?= $nbr_eyerealist ?>)</em></label>
									<li><input onclick="update()" type="checkbox" value="led" id="led"><label for="led">LED <em>(<?= $nbr_led ?>)</em></label>
								</ul>
							<h2 class="titre2">Ailes</h2>
								<ul>
									<li><input onclick="update()" type="checkbox" value="wingon" id="wingon"><label for="wingon">Avec <em>(<?= $nbr_wingon ?>)</em></label>
									<li><input onclick="update()" type="checkbox" value="wingoff" id="wingoff"><label for="wingoff">Sans <em>(<?= $nbr_wingoff ?>)</em></label>
								</ul>
					</nav>

					<input type="submit">
				</form>

			</div>
			<div id="droit">


				<div id="pp_choix">
					<img src="img/theme/pp_hum.png" alt="">
					<input type="checkbox" class="checkbox_box" id="checkbox_box" name="test" value="1">
					<label for="checkbox_box"></label>
					<img src="img/theme/pp_fur.png" alt="">
				</div>

				<div>
					<section id="list_fur">
						<?php

							if(isset($_POST['genre'])){

								$alluser = $db->query("SELECT * FROM furrys WHERE famille = ? AND genre = ?", [$famille, $genre]);
								echo $famille;
								echo $genre;

								/*if($_POST['genre'] == "tout"){
									$alluser = $db->query('SELECT * FROM furrys WHERE famille = ?', [$famille]);
								}
								elseif($_POST['famille'] == "tout2"){
									$alluser = $db->query('SELECT * FROM furrys WHERE genre = ?', [$genre]);
								}
								else{
									$alluser = $db->query('SELECT * FROM furrys WHERE famille = ? AND genre = ?', [$famille, $genre]);
								}*/
							}

						
							if($alluser->rowCount() > 0){
								while($user_liste_fund = $alluser->fetch()){ ?>

								<?php
								
								$img_imode = 0; //afficher les suite ? : 1 = Oui
								
								?>

								<a class="furry_liste_gloabal" href="furrycard?id=<?=$user_liste_fund->id?>">
									<div id="furry_unique">
										<img class="img_avatar" src="<?php

											if($img_imode == 1){
												if(empty($user_liste_fund->photo_suit)){
													echo $user_liste_fund->avatar;
												}
												echo $user_liste_fund->photo_suit;
											} else {
												echo $user_liste_fund->avatar;
											} ?>

										">

										
									


										<p class="name"><?=$user_liste_fund->name?></p>
										<p class="especise"><?=$user_liste_fund->famille?> / <?=$user_liste_fund->espece?></p>
										<?php
										
										/*if(!empty($user_liste_fund->photo_suit)){?>
											<img class="img_suite" src="<?=$user_liste_fund->photo_suit?>" alt="">
										<?php } else {

										}*/
										
										?>
										
									</div>
								</a>

						<?php }
							} else {
								echo "aucun utilisateur ne corresponde à votre recherche.";
							} ?>
					</section>
				</div>
			</div>

		</div>
		<?php include("part/footer.php");?>
	</body>
</html>



<script>

	var box = document.getElementById("checkbox_box");
	var valbox = 0;

	if (box.checked == true){
		valbox = 0;
		$img_imode = 0;
	} else {
		valbox = 1;
		$img_imode = 1;
	}

</script>

<script src="../script/furidentifier.js"></script>