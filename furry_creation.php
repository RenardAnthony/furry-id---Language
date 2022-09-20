<?php
require_once 'bootstrap.php';

App::getAuth()->restrict();

$session = Session::getInstance();

$itconnect = App::getAuth()->online();

if($itconnect == true){

    $db = App::getDatabase();
    
    $user_id = $_SESSION['auth']->id;
    
    foreach($db->query('SELECT * FROM users WHERE id = ?', [$user_id]) as $userdata):
    
        $data_id = $userdata->id;
        
    endforeach;
}

$furso_du_client = $db->query('SELECT * FROM furrys WHERE proprio = ?', [$user_id]);
$nbrMembres = $furso_du_client->rowCount();

if(!empty($_GET['id'])){
	$fureditid = $_GET['id'];


	$furtoedits = $db->query('SELECT * FROM furrys WHERE id = ?', [$fureditid]);
	$furtoedit = $furtoedits->fetch(PDO::FETCH_OBJ);

	if($furtoedit->proprio != $data_id){
		$session->setFlash('alert',"Ce fursona ne vous appartien pas !");
    	App::redirect('index.php');
	}


}

if(!empty($_POST)){
	if(!empty($_POST['name'])){

		$name = htmlspecialchars($_POST['name']);

		if(isset($_POST['genre'])){
			$genre = htmlspecialchars($_POST['genre']);
		} else {
			$genre = "";
		}
		if(isset($_POST['famille'])){
			$famille = htmlspecialchars($_POST['famille']);
		} else {
			$famille = "";
		}
		if(isset($_POST['espece'])){
			$espece = htmlspecialchars($_POST['espece']);
		} else {
			$espece = "";
		}
		if(isset($_POST['refshit2'])){
			$refshit3 = $_POST['refshit2'];
		} else {
			$refshit3 = "http://www.furry-id.com/img/theme/refinconu.png";
		}
		if(isset($_POST['photo-fursuit'])){
			$photofursuit = htmlspecialchars($_POST['photo-fursuit']);
		} else {
			$photofursuit = "";
		}
		if(isset($_POST['photo-fursona'])){
			$avatar = htmlspecialchars($_POST['photo-fursona']);
		} else {
			$avatar = "http://www.furry-id.com/img/theme/furinconupp.png";
		}
		if(isset($_POST['description'])){
			$description = htmlspecialchars($_POST['description']);
		} else {
			$description = "";
		}
		if(isset($_POST['histoire'])){
			$histoire = htmlspecialchars($_POST['histoire']);
		} else {
			$histoire = "";
		}
		if(isset($_POST['type-suite'])){
			$typesuite = htmlspecialchars($_POST['type-suite']);
		} else {
			$typeesuite = "";
		}
		if(isset($_POST['touche-zone'])){
			$touchezone = htmlspecialchars($_POST['touche-zone']);
		} else {
			$touchezone = "";
		}
		if(isset($_POST['padding'])){
			$padding = htmlspecialchars($_POST['padding']);
		} else {
			$padding = "";
		}
		if(isset($_POST['style'])){
			$style = htmlspecialchars($_POST['style']);
		} else {
			$style = "";
		}
		if(isset($_POST['queue'])){
			$queue = htmlspecialchars($_POST['queue']);
		} else {
			$queue = "";
		}
		if(isset($_POST['taches'])){
			$taches = htmlspecialchars($_POST['taches']);
		} else {
			$taches = "";
		}
		if(isset($_POST['machoire'])){
			$machoire = htmlspecialchars($_POST['machoire']);
		} else {
			$machoire = "";
		}
		if(isset($_POST['corne'])){
			$cornes = htmlspecialchars($_POST['corne']);
		} else {
			$cornes = "";
		}
		if(isset($_POST['ailes'])){
			$ailes = htmlspecialchars($_POST['ailes']);
		} else {
			$ailes = "";
		}
		if(isset($_POST['dents'])){
			$dents = htmlspecialchars($_POST['dents']);
		} else {
			$dents = "";
		}
		if(isset($_POST['doigt'])){
			$doigt = htmlspecialchars($_POST['doigt']);
		} else {
			$doigt = "";
		}
		if(isset($_POST['yeux'])){
			$yeux = htmlspecialchars($_POST['yeux']);
		} else {
			$yeux = "";
		}
		if(isset($_POST['size'])){
			$size1 = htmlspecialchars($_POST['size']);
			$size = floatval($size1);
		} else {
			$size = floatval(0.0);
		}
		if(isset($_POST['maker'])){
			$maker = htmlspecialchars($_POST['maker']);
		} else {
			$maker = "";
		}
		if(isset($_POST['hug'])){
			$hug = htmlspecialchars($_POST['hug']);
		} else {
			$hug = "";
		}
		if(isset($_POST['speak'])){
			$speak = htmlspecialchars($_POST['speak']);
		} else {
			$speak = "";
		}
		if(isset($_POST['colorprimp_ar'])){
			$checkedcolorprimp = $_POST['colorprimp_ar'];
			$liste_colorprimpar = implode("," , $checkedcolorprimp);
			$liste_colorprimp = $liste_colorprimpar;
		} else {
			$liste_colorprimp = "";
		}
		if(isset($_POST['coloreye'])){
			$checkedcoloreye = $_POST['coloreye'];
			$liste_coloreyear = implode("," , $checkedcoloreye);
			$liste_coloreye = $liste_coloreyear;
		} else {
			$liste_coloreye = "";
		}

		if(!empty($fureditid)){
			$db->query("UPDATE furrys SET proprio = ?, name = ?, famille = ?,taches = ?, colors = ?, colors_eye = ?, espece = ?, genre = ?, avatar = ?, histoire = ?, suit_type = ?, description = ?, taille_metre = ?, padding = ?, ailes = ?, queue = ?, cornes = ?, yeux = ?, machoir = ?, dents = ?, doigt = ?, style = ?, speak = ?, hug = ?, ref = ?, maker = ?, photo_suit = ? WHERE id = ?",
			[$user_id, $name, $famille, $taches, $liste_colorprimp, $liste_coloreye, $espece, $genre, $avatar, $histoire, $typesuite, $description, 
			$size, $padding, $ailes, $queue, $cornes, $yeux, $machoire, $dents, $doigt, $style, $speak, $hug, $refshit3, $maker, $photofursuit, $fureditid]);

			$session->setFlash('success',"Votre fursona à bien été modifier !");
		} else {
			$db->query("INSERT INTO furrys SET proprio = ?, creation = NOW(), name = ?, famille = ?,taches = ?, colors = ?, colors_eye = ?, espece = ?, genre = ?, avatar = ?, histoire = ?, suit_type = ?, description = ?, taille_metre = ?, padding = ?, ailes = ?, queue = ?, cornes = ?, yeux = ?, machoir = ?, dents = ?, doigt = ?, style = ?, speak = ?, hug = ?, ref = ?, maker = ?, photo_suit = ?",
			[$user_id, $name, $famille, $taches, $liste_colorprimp, $liste_coloreye, $espece, $genre, $avatar, $histoire, $typesuite, $description, 

			$size, $padding, $ailes, $queue, $cornes, $yeux, $machoire, $dents, $doigt, $style, $speak, $hug, $refshit3, $maker, $photofursuit]);
			$session->setFlash('success',"Votre fursona à bien été crée !");
		}

		

		
		App::redirect('index.php');
	}
}

if(!empty($_POST)){
	if(!empty($_POST['confirme_supression'] == $furtoedit->name)){
		$db->query('DELETE FROM `furrys` WHERE id = ?', [$furtoedit->id]);
		$session->setFlash('success',"Votre fursona à été suprimer avec succes !");
    	App::redirect('index.php');
	}
}

?>




<!DOCTYPE html>
<html>
	<head>
		<base href="/"/>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/theme.css"/>
		<link rel="stylesheet" href="css/furrycreation.css"/>
		<link rel="shortcut icon" type="image/png" href="img/theme/favicon.png"/>
		<title>Furry-id.com</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0, maximum-scale=1.0">
		<script src="https://kit.fontawesome.com/d5d0318cf5.js" crossorigin="anonymous"></script>
	</head>
	<body onload="loadimg()">
		<?php include("part/header.php");?>
		
		<form action="" method="POST">
			<div id="centre">
				<div class="span">
					<input type="text" name="name" id="name-input" placeholder="Nom du fursona" <?php if(!empty($fureditid)){?>value="<?=$furtoedit->name?>"<?php } ?> required="required">
					<select name="genre" id="genre-input" class="w30">
						<option value=""></option>
						<option <?php if(!empty($fureditid)){ if($furtoedit->genre == "male" ){?> selected="selected" <?php } } ?> value="male">Mâle</option>
						<option <?php if(!empty($fureditid)){ if($furtoedit->genre == "femelle" ){?> selected="selected" <?php } } ?> value="femelle">Femelle</option>
						<option <?php if(!empty($fureditid)){ if($furtoedit->genre == "autre" ){?> selected="selected" <?php } } ?> value="autre">Autre</option>
					</select>
				</div>
				<div class="span">
					<select name="famille" id="famille-input" class="w30">
						<option value=""></option>
						<option <?php if(!empty($fureditid)){ if($furtoedit->famille == "canin" ){?> selected="selected" <?php } } ?> value="canin">Canin</option>
						<option <?php if(!empty($fureditid)){ if($furtoedit->famille == "felin" ){?> selected="selected" <?php } } ?> value="felin">Felin</option>
						<option <?php if(!empty($fureditid)){ if($furtoedit->famille == "oiseau" ){?> selected="selected" <?php } } ?> value="oiseau">Oiseau</option>
						<option <?php if(!empty($fureditid)){ if($furtoedit->famille == "poisson" ){?> selected="selected" <?php } } ?> value="poisson">Poisson</option>
					</select>
					<input type="text" name="espece" id="espece-input" class="w70" <?php if(!empty($fureditid)){?>value="<?=$furtoedit->espece?>"<?php } ?> placeholder="Espece (ex : Polar Fox)">
				</div>
				<div class="span">
					<input type="text" onkeyup="img_furso()" name="photo-fursona" id="photo-fursona-input" class="w50" <?php if(!empty($fureditid)){?>value="<?=$furtoedit->avatar?>"<?php } else { ?>value="http://www.furry-id.com/img/theme/furinconupp.png" <?php } ?> placeholder="URL : Photo du fursona">
					<input type="text" onkeyup="img_ref()" name="refshit2" id="refshit-input" class="w50" <?php if(!empty($fureditid)){?>value="<?=$furtoedit->ref?>"<?php } else { ?>value="http://www.furry-id.com/img/theme/refinconu.png" <?php } ?> placeholder="URL : Refshit">
				</div>
				<div class="span">
					<img src="" id="mg1" class="imgprevu">
					<img src="" id="mg2" class="imgprevu">
				</div>
				<div class="span">
					<p class="w50">Couleurs principales</p>
					<p class="w50">Couleurs des yeux</p>
				</div>
				<div class="span" style="margin-bottom: 2em;">
					<table class="color_tab" style="text-align: center;">
						<tr>
							<td style="background-color: black" class="color"></td>
							<td style="background-color: green" class="color"></td>
							<td style="background-color: lightgreen" class="color"></td>
							<td style="background-color: yellow" class="color"></td>
							<td style="background-color: orange" class="color"></td>
							<td style="background-color: red" class="color"></td>
							<td style="background-color: purple" class="color"></td>
							<td style="background-color: blue" class="color"></td>
							<td style="background-color: lightblue" class="color"></td>
							<td style="background-color: pink" class="color"></td>
							<td style="background-color: white" class="color"></td>
							<td style="background-color: gray" class="color"></td>
						</tr>
						<tr>
							<?php if(!empty($fureditid)){
								
									$colorprimp_array = explode(',', $furtoedit->colors);
								
							} ?>


							<td><input type="checkbox" name="colorprimp_ar[]" <?php if(!empty($fureditid)){if(in_array("black", $colorprimp_array)){?>checked="checked"<?php }} ?> value="black"></td>
							<td><input type="checkbox" name="colorprimp_ar[]" <?php if(!empty($fureditid)){if(in_array("green", $colorprimp_array)){?>checked="checked"<?php }} ?> value="green"></td>
							<td><input type="checkbox" name="colorprimp_ar[]" <?php if(!empty($fureditid)){if(in_array("lightgreen", $colorprimp_array)){?>checked="checked"<?php }} ?> value="lightgreen"></td>
							<td><input type="checkbox" name="colorprimp_ar[]" <?php if(!empty($fureditid)){if(in_array("yellow", $colorprimp_array)){?>checked="checked"<?php }} ?> value="yellow"></td>
							<td><input type="checkbox" name="colorprimp_ar[]" <?php if(!empty($fureditid)){if(in_array("orange", $colorprimp_array)){?>checked="checked"<?php }} ?> value="orange"></td>
							<td><input type="checkbox" name="colorprimp_ar[]" <?php if(!empty($fureditid)){if(in_array("red", $colorprimp_array)){?>checked="checked"<?php }} ?> value="red"></td>
							<td><input type="checkbox" name="colorprimp_ar[]" <?php if(!empty($fureditid)){if(in_array("purple", $colorprimp_array)){?>checked="checked"<?php }} ?> value="purple"></td>
							<td><input type="checkbox" name="colorprimp_ar[]" <?php if(!empty($fureditid)){if(in_array("blue", $colorprimp_array)){?>checked="checked"<?php }} ?> value="blue"></td>
							<td><input type="checkbox" name="colorprimp_ar[]" <?php if(!empty($fureditid)){if(in_array("lightblue", $colorprimp_array)){?>checked="checked"<?php }} ?> value="lightblue"></td>
							<td><input type="checkbox" name="colorprimp_ar[]" <?php if(!empty($fureditid)){if(in_array("pink", $colorprimp_array)){?>checked="checked"<?php }} ?> value="pink"></td>
							<td><input type="checkbox" name="colorprimp_ar[]" <?php if(!empty($fureditid)){if(in_array("white", $colorprimp_array)){?>checked="checked"<?php }} ?> value="white"></td>
							<td><input type="checkbox" name="colorprimp_ar[]" <?php if(!empty($fureditid)){if(in_array("gray", $colorprimp_array)){?>checked="checked"<?php }} ?> value="gray"></td>
						</tr>
					</table>
					<table class="color_tab">
						<tr>
							<td style="background-color: black" class="color"></td>
							<td style="background-color: green" class="color"></td>
							<td style="background-color: lightgreen" class="color"></td>
							<td style="background-color: yellow" class="color"></td>
							<td style="background-color: orange" class="color"></td>
							<td style="background-color: red" class="color"></td>
							<td style="background-color: purple" class="color"></td>
							<td style="background-color: blue" class="color"></td>
							<td style="background-color: lightblue" class="color"></td>
							<td style="background-color: pink" class="color"></td>
							<td style="background-color: white" class="color"></td>
							<td style="background-color: gray" class="color"></td>
						</tr>
						<tr>

							<?php if(!empty($fureditid)){
									
									$coloreye_array = explode(',', $furtoedit->colors_eye);
								
							} ?>

							<td><input type="checkbox" name="coloreye[]" <?php if(!empty($fureditid)){if(in_array("black", $coloreye_array)){?>checked="checked"<?php }} ?> value="black"></td>
							<td><input type="checkbox" name="coloreye[]" <?php if(!empty($fureditid)){if(in_array("green", $coloreye_array)){?>checked="checked"<?php }} ?> value="green"></td>
							<td><input type="checkbox" name="coloreye[]" <?php if(!empty($fureditid)){if(in_array("lightgreen", $coloreye_array)){?>checked="checked"<?php }} ?> value="lightgreen"></td>
							<td><input type="checkbox" name="coloreye[]" <?php if(!empty($fureditid)){if(in_array("yellow", $coloreye_array)){?>checked="checked"<?php }} ?> value="yellow"></td>
							<td><input type="checkbox" name="coloreye[]" <?php if(!empty($fureditid)){if(in_array("orange", $coloreye_array)){?>checked="checked"<?php }} ?> value="orange"></td>
							<td><input type="checkbox" name="coloreye[]" <?php if(!empty($fureditid)){if(in_array("red", $coloreye_array)){?>checked="checked"<?php }} ?> value="red"></td>
							<td><input type="checkbox" name="coloreye[]" <?php if(!empty($fureditid)){if(in_array("purple", $coloreye_array)){?>checked="checked"<?php }} ?> value="purple"></td>
							<td><input type="checkbox" name="coloreye[]" <?php if(!empty($fureditid)){if(in_array("blue", $coloreye_array)){?>checked="checked"<?php }} ?> value="blue"></td>
							<td><input type="checkbox" name="coloreye[]" <?php if(!empty($fureditid)){if(in_array("lightblue", $coloreye_array)){?>checked="checked"<?php }} ?> value="lightblue"></td>
							<td><input type="checkbox" name="coloreye[]" <?php if(!empty($fureditid)){if(in_array("pink", $coloreye_array)){?>checked="checked"<?php }} ?> value="pink"></td>
							<td><input type="checkbox" name="coloreye[]" <?php if(!empty($fureditid)){if(in_array("white", $coloreye_array)){?>checked="checked"<?php }} ?> value="white"></td>
							<td><input type="checkbox" name="coloreye[]" <?php if(!empty($fureditid)){if(in_array("gray", $coloreye_array)){?>checked="checked"<?php }} ?> value="gray"></td>
						</tr>
					</table>

				</div>
				<div class="span">
					<p class="w50">Motifs fourrure</p>
					<p class="w50">Description autre</p>
				</div>
				<div class="span">
					<table class="color_tab" class="w50">
						<tr>
							<td><img src="http://www.furry-id.com/img/theme/TR_none.png" alt=""></td>
							<td><img src="http://www.furry-id.com/img/theme/TR_cow.png" alt=""></td>
							<td><img src="http://www.furry-id.com/img/theme/TR_tigre.png" alt=""></td>
							<td><img src="http://www.furry-id.com/img/theme/TR_leopar.png" alt=""></td>
							<td><img src="http://www.furry-id.com/img/theme/TR_scale.png" alt=""></td>
						</tr>
						<tr>

							<?php if(!empty($fureditid)){
									
									$taches_array = explode(',', $furtoedit->taches);
								
							} ?>

							<td><input type="radio" value="none" name="taches" <?php if(!empty($fureditid)){if(in_array("none", $taches_array)){?>checked="checked"<?php } else { ?> checked <?php }} ?>></td>
							<td><input type="radio" value="cow" name="taches" <?php if(!empty($fureditid)){if(in_array("cow", $taches_array)){?>checked="checked"<?php }} ?>></td>
							<td><input type="radio" value="tigre" name="taches" <?php if(!empty($fureditid)){if(in_array("tigre", $taches_array)){?>checked="checked"<?php }} ?>></td>
							<td><input type="radio" value="leopar" name="taches" <?php if(!empty($fureditid)){if(in_array("leopar", $taches_array)){?>checked="checked"<?php }} ?>></td>
							<td><input type="radio" value="scale" name="taches" <?php if(!empty($fureditid)){if(in_array("scale", $taches_array)){?>checked="checked"<?php }} ?>></td>
						</tr>
					</table>
					<textarea name="description" id="description-input" cols="50" rows="2" placeholder="Je porte toujours un colier rouge et un lance roquette."><?php if(!empty($fureditid)){ echo $furtoedit->description ;} ?></textarea>
				</div>
				<div class="span">
					<textarea class="w100" name="histoire" id="histoire-input" cols="50" rows="10" placeholder="Voici mon histoire..."><?php if(!empty($fureditid)){ echo $furtoedit->histoire ;} ?></textarea>
				</div>
				<div class="span">
					<select class="w100" name="type-suite" id="type-suite-input" onchange="changementType('suitediv', this)">
						<option value="none" <?php if(!empty($fureditid)){ if($furtoedit->suit_type == "none" ){?> selected="selected" <?php } } ?>>Pas de suite</option>
						<option value="partiel" <?php if(!empty($fureditid)){ if($furtoedit->suit_type == "partiel" ){?> selected="selected" <?php } } ?>>Partiel</option>
						<option value="full" <?php if(!empty($fureditid)){ if($furtoedit->suit_type == "full" ){?> selected="selected" <?php } } ?>>Full</option>
						<option value="quad" <?php if(!empty($fureditid)){ if($furtoedit->suit_type == "quad" ){?> selected="selected" <?php } } ?>>Quad suite</option>
					</select>
				</div>
				<div class="span" id="suitediv" style="display:none">
					<div class="span">
						<input class="w50" onkeyup="img_fursuit()" type="text" name="photo-fursuit" id="photo-fursuit-input" <?php if(!empty($fureditid)){?>value="<?=$furtoedit->photo_suit?>"<?php } ?>  placeholder="URL : Photo fursuit">
						<input class="w50" onkeyup="img_touchezone()" type="text" name="touche-zone" id="touche-zone-input" <?php if(!empty($fureditid)){?>value="<?=$furtoedit->ref?>"<?php } ?>  placeholder="URL : Touche zone">	
					</div>
					<div class="span">
						<img src="" id="mg3" class="imgprevu">
						<img src="" id="mg4" class="imgprevu">
					</div>
					<div class="span w50">
						<div class="w50"><p class="w102">Padding</p></div>
						<div class="w50"><p class="w102">Style de suite</p></div>
					</div>
					<div class="span">
						<div class="w50 forgrid">
							<div class="w50 choix_uniq">
								<label for="padding-input1">
									<img src="img/furcreation/plantigrade.png" alt="">
									<div class="indiv">
									<input type="radio" id="padding-input1" name="padding" value="plantigrade" <?php if(!empty($fureditid)){ if($furtoedit->padding == "plantigrade" ){?> checked="checked" <?php } } ?>><p>Plantigrade</p></div>
								</label>
							</div>
							<div class="w50 choix_uniq">
								<label for="padding-input2">
									<img src="img/furcreation/digigrade.png" alt="">
									<div class="indiv">
									<input type="radio" id="padding-input2" name="padding" value="digigrade" <?php if(!empty($fureditid)){ if($furtoedit->padding == "digigrade" ){?> checked="checked" <?php } } ?>><p>Digidrade</p></div>
								</label>
							</div>
						</div>
						<div class="w50 forgrid">
							<div class="w50 choix_uniq">
								<label for="style-input1">
									<img src="img/furcreation/toony.png" alt="">
									<div class="indiv">
									<input type="radio" id="style-input1" name="style" value="toony" <?php if(!empty($fureditid)){ if($furtoedit->style == "toony" ){?> checked="checked" <?php } } ?>><p>Toony</p></div>
								</label>
							</div>
							<div class="w50 choix_uniq">
								<label for="style-input2">
									<img src="img/furcreation/realist.png" alt="">
									<div class="indiv">
									<input type="radio" id="style-input2" name="style" value="realist" <?php if(!empty($fureditid)){ if($furtoedit->style == "realist" ){?> checked="checked" <?php } } ?>><p>Realist</p></div>
								</label>
							</div>
						</div>
					</div>
					<div class="span w50">
						<div class="w50"><p class="w102">Machoire</p></div>
						<div class="w50"><p class="w102">Cornes / bois</p></div>
					</div>
					<div class="span">
						<div class="w50 forgrid">
							<div class="w50 choix_uniq">
								<label for="machoire-input1">
									<img src="img/furcreation/jaw-close.jpg" alt="">
									<div class="indiv">
									<input type="radio" id="machoire-input1" name="machoire"  value="fix" <?php if(!empty($fureditid)){ if($furtoedit->machoir == "fix" ){?> checked="checked" <?php } } ?>><p>Fix</p></div>
								</label>
							</div>
							<div class="w50 choix_uniq">
								<label for="machoire-input2">
									<img src="img/furcreation/jaw-open.jpg" alt="">
									<div class="indiv">
									<input type="radio" id="machoire-input2" name="machoire"  value="moving" <?php if(!empty($fureditid)){ if($furtoedit->machoir == "moving" ){?> checked="checked" <?php } } ?>><p>Amovible</p></div>
								</label>
							</div>
						</div>
						<div class="w50 forgrid">
							<div class="w50 choix_uniq">
								<label for="corne-input1">
									<img src="img/furcreation/pascorne.png" alt="">
									<div class="indiv">
									<input type="radio" id="corne-input1" name="corne" value="no" <?php if(!empty($fureditid)){ if($furtoedit->cornes == "no" ){?> checked="checked" <?php } } ?>><p>Non</p></div>
								</label>
							</div>
							<div class="w50 choix_uniq">
								<label for="corne-input2">
									<img src="img/furcreation/aveccorne.png" alt="">
									<div class="indiv">
									<input type="radio" id="corne-input2" name="corne" value="yes" <?php if(!empty($fureditid)){ if($furtoedit->cornes == "yes" ){?> checked="checked" <?php } } ?>><p>Oui</p></div>
								</label>
							</div>
						</div>
					</div>
					<div class="span w50">
						<div class="w50"><p class="w102">Dents</p></div>
						<div class="w50"><p class="w102">Nombre de doigt</p></div>
					</div>
					<div class="span">
						<div class="w50 forgrid">
							<div class="w50 choix_uniq">
								<label for="dents-input1">
									<img src="img/furcreation/dentition-no.jpg" alt="">
									<div class="indiv">
									<input type="radio" id="dents-input1" name="dents" value="no" <?php if(!empty($fureditid)){ if($furtoedit->dents == "no" ){?> checked="checked" <?php } } ?>><p>Non</p></div>
								</label>
							</div>
							<div class="w50 choix_uniq">
								<label for="dents-input2">
									<img src="img/furcreation/dentition-toon.jpg" alt="">
									<div class="indiv">
									<input type="radio" id="dents-input2" name="dents" value="yes" <?php if(!empty($fureditid)){ if($furtoedit->dents == "no" ){?> checked="checked" <?php } } ?>><p>Oui</p></div>
								</label>
							</div>
						</div>
						<div class="w50 forgrid">
							<div class="w50 choix_uniq">
								<label for="doigt-input1">
									<img src="img/furcreation/4.png" alt="">
									<div class="indiv">
									<input type="radio" id="doigt-input1" name="doigt" value="4" <?php if(!empty($fureditid)){ if($furtoedit->doigt == "4" ){?> checked="checked" <?php } } ?>><p>4</p></div>
								</label>
							</div>
							<div class="w50 choix_uniq">
								<label for="doigt-input2">
									<img src="img/furcreation/5.png" alt="">
									<div class="indiv">
									<input type="radio" id="doigt-input2" name="doigt" value="5" <?php if(!empty($fureditid)){ if($furtoedit->doigt == "5" ){?> checked="checked" <?php } } ?>><p>5</p></div>
								</label>
							</div>
						</div>
					</div>
					<div class="span w50">
						<div class="w50"><p class="w102">Queue</p></div>
					</div>
					<div class="span">
						<div class="w70 forgrid">
							<div class="w50 choix_uniq">
								<label for="queue-input1">
									<img src="img/furcreation/shorttaile.png" alt="">
									<div class="indiv">
									<input type="radio" id="queue-input1" name="queue"  value="short" <?php if(!empty($fureditid)){ if($furtoedit->queue == "short" ){?> checked="checked" <?php } } ?>><p>Petit</p></div>
								</label>
							</div>
							<div class="w50 choix_uniq">
								<label for="queue-input2">
									<img src="img/furcreation/normaltaile.png" alt="">
									<div class="indiv">
									<input type="radio" id="queue-input2" name="queue"  value="normal" <?php if(!empty($fureditid)){ if($furtoedit->queue == "normal" ){?> checked="checked" <?php } } ?>><p>Moyen</p></div>
								</label>
							</div>
							<div class="w50 choix_uniq">
								<label for="queue-input3">
									<img src="img/furcreation/grandtaile.png" alt="">
									<div class="indiv">
									<input type="radio" id="queue-input3" name="queue"  value="large" <?php if(!empty($fureditid)){ if($furtoedit->queue == "large" ){?> checked="checked" <?php } } ?>><p>Grand</p></div>
								</label>
							</div>
						</div>
					</div>
					<div class="span w50">
						<div class="w50"><p class="w102">Yeux</p></div>
						<div class="w50"><p class="w102">Ailes</p></div>
					</div>
					<div class="span">
						<div class="w50 forgrid">
							<div class="w50 choix_uniq">
								<label for="yeux-input1">
									<img src="img/furcreation/eyes_normal.jpg" alt="">
									<div class="indiv">
									<input type="radio" id="yeux-input1" name="yeux" value="normal" <?php if(!empty($fureditid)){ if($furtoedit->yeux == "normal" ){?> checked="checked" <?php } } ?>><p>Plan</p></div>
								</label>
							</div>
							<div class="w50 choix_uniq">
								<label for="yeux-input2">
									<img src="img/furcreation/eyes_follow.jpg" alt="">
									<div class="indiv">
									<input type="radio" id="yeux-input2" name="yeux" value="followMe" <?php if(!empty($fureditid)){ if($furtoedit->yeux == "followMe" ){?> checked="checked" <?php } } ?>><p>FollowMe</p></div>
								</label>
							</div>
						</div>
						<div class="w50 forgrid">
							<div class="w50 choix_uniq">
								<label for="ailes-input1">
									<img src="img/furcreation/pasaile.png" alt="">
									<div class="indiv">
									<input type="radio" id="ailes-input1" name="ailes" value="no" <?php if(!empty($fureditid)){ if($furtoedit->ailes == "no" ){?> checked="checked" <?php } } ?>><p>Non</p></div>
								</label>
							</div>
							<div class="w50 choix_uniq">
								<label for="ailes-input2">
									<img src="img/furcreation/aile.png" alt="">
									<div class="indiv">
									<input type="radio" id="ailes-input2" name="ailes" value="yes" <?php if(!empty($fureditid)){ if($furtoedit->ailes == "yes" ){?> checked="checked" <?php } } ?>><p>Oui</p></div>
								</label>
							</div>
						</div>
					</div>
					<div class="span">
						<input type="text" name="size" style="text-align: center;" class="w30" id="size-input" <?php if(!empty($fureditid)){?>value="<?=$furtoedit->taille_metre ?>"<?php } ?> placeholder="Taille en metre ( ex : 1.82 )">
						<select name="hug" class="w30" id="hug-input">
							<option <?php if(!empty($fureditid)){ if($furtoedit->hug == "no" ){?> selected="selected" <?php } } ?> value="no">No hug</option>
							<option <?php if(!empty($fureditid)){ if($furtoedit->hug == "yes" ){?> selected="selected" <?php } } ?> value="yes">Ok hug</option>
						</select>
						<select name="speak" class="w30" id="speak-input">
							<option <?php if(!empty($fureditid)){ if($furtoedit->speak == "no" ){?> selected="selected" <?php } } ?> value="no">Je ne parle pas en fursuit</option>
							<option <?php if(!empty($fureditid)){ if($furtoedit->speak == "yes" ){?> selected="selected" <?php } } ?> value="yes">Je parle en fursuit</option>
						</select>
					</div>
					<div class="span">
						<input type="text" class="w30" name="maker" style="text-align: center;" id="maker-input" placeholder="Id de votre maker" <?php if(!empty($fureditid)){?>value="<?=$furtoedit->maker ?>"<?php } ?>>
					</div>
				</div>
				<?php if(!empty($fureditid)){?> 
						<button class="sub_button" type="submit">Editer ce fursona</button>
						<button class="sub_button_delet" type="submit"><a href="furry_creation?id=<?=$furtoedit->id?>&suprime=1">Supprimer ce fursona</a></button>
						<?php } else { ?> 
						<button class="sub_button" type="submit">Crée mon fursona</button>
					<?php } ?>
				</div>
				<?php if(!empty($fureditid)){
						if(!empty($_GET["suprime"])){
							if($_GET["suprime"] == 1){ ?>
							<form id="form_supression_furso" method="POST">
								<div id="bg-flou"></div>
								<div id="confirmation_supression_fursona">
									<a href="furry_creation?id=<?=$furtoedit->id?>">X</a>
									<h1>Supression de votre fursona</h1>
									<p>Vous êtes sur le point de suprimer votre fursona <em><?=$furtoedit->name?></em><br>
									Pour validez la supression de votre fursona, retaper le nom de votre fursona dans la case en desous, puis validé.</p>
									<input type="text" name="confirme_supression">
									<input type="submit" value="Je confirme la supression">
								</div>
							</form>
				<?php } } } ?>
			</div>
		</form>

		<?php include("part/footer.php");?>
	</body>
</html>

<script>
	function changementType(divId, element) {
		document.getElementById(divId).style.display = element.value != "none" ? 'block' : 'none';
	}
	function img_furso(){
		document.getElementById("mg1").src=document.getElementById("photo-fursona-input").value;
	}
	function img_ref(){
		document.getElementById("mg2").src=document.getElementById("refshit-input").value;
	}
	function img_fursuit(){
		document.getElementById("mg3").src=document.getElementById("photo-fursuit-input").value;
	}
	function img_touchezone(){
		document.getElementById("mg4").src=document.getElementById("touche-zone-input").value;
	}
	function loadimg(){
		document.getElementById("mg1").src=document.getElementById("photo-fursona-input").value;
		document.getElementById("mg2").src=document.getElementById("refshit-input").value;
		document.getElementById("mg3").src=document.getElementById("photo-fursuit-input").value;
		document.getElementById("mg4").src=document.getElementById("touche-zone-input").value;
	}
</script>