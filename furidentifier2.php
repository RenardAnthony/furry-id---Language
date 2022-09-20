<?php

require 'bootstrap.php';

$auth = App::getAuth();

$db = App::getDatabase();

$auth->connectFromCookie($db);

$session = Session::getInstance();


$alluser = $db->query('SELECT name, avatar, id FROM furrys ORDER BY id DESC');
if(isset($_GET['search']) AND !empty($_GET['search'])){
	$search_fur = htmlspecialchars($_GET['search']);
	$alluser = $db->query('SELECT * FROM furrys WHERE name LIKE "%'.$search_fur.'%" ORDER BY id DESC');
}

?>

<!DOCTYPE html>
<html>
<head>
		<base href="/"/>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/theme.css"/>
		<link rel="stylesheet" href="css/furidentifier.css"/>
		<link rel="stylesheet" href="css/furrycreation.css"/>
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
			<div id="right">
				<div class="span2">
					<select name="genre" id="genre-input" class="w30n">
						<option value=""></option>
						<option <?php if(!empty($fureditid)){ if($furtoedit->genre == "male" ){?> selected="selected" <?php } } ?> value="male">Mâle</option>
						<option <?php if(!empty($fureditid)){ if($furtoedit->genre == "femelle" ){?> selected="selected" <?php } } ?> value="femelle">Femelle</option>
						<option <?php if(!empty($fureditid)){ if($furtoedit->genre == "autre" ){?> selected="selected" <?php } } ?> value="autre">Autre</option>
					</select>
				</div>
				<div class="span2">
					<select name="famille" id="famille-input" class="w30n">
						<option value=""></option>
						<option <?php if(!empty($fureditid)){ if($furtoedit->famille == "canin" ){?> selected="selected" <?php } } ?> value="canin">Canin</option>
						<option <?php if(!empty($fureditid)){ if($furtoedit->famille == "felin" ){?> selected="selected" <?php } } ?> value="felin">Felin</option>
						<option <?php if(!empty($fureditid)){ if($furtoedit->famille == "oiseau" ){?> selected="selected" <?php } } ?> value="oiseau">Oiseau</option>
						<option <?php if(!empty($fureditid)){ if($furtoedit->famille == "poisson" ){?> selected="selected" <?php } } ?> value="poisson">Poisson</option>
					</select>
				</div>
				<div class="span2">
					<img src="" id="mg1" class="imgprevu">
					<img src="" id="mg2" class="imgprevu">
				</div>
				<div class="span2">
					<p class="w50n">Couleurs principales</p>
				</div>
				<div class="span2" style="margin-bottom: 2em;">
					<table class="color_tab" style="text-align: center;">
						<tr>
							<td style="background-color: black" class="color2"></td>
							<td style="background-color: green" class="color2"></td>
							<td style="background-color: lightgreen" class="color2"></td>
							<td style="background-color: yellow" class="color2"></td>
							<td style="background-color: orange" class="color2"></td>
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
					<div class="span2">
						<p class="w50n">Couleurs des yeux</p>
					</div>
					<table class="color_tab">
						<tr>
							<td style="background-color: black" class="color2"></td>
							<td style="background-color: green" class="color2"></td>
							<td style="background-color: lightgreen" class="color2"></td>
							<td style="background-color: yellow" class="color2"></td>
							<td style="background-color: orange" class="color2"></td>
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
				<div class="span2" id="suitediv">
					<div class="span2">
						<img src="" id="mg3" class="imgprevu">
						<img src="" id="mg4" class="imgprevu">
					</div>
					<div class="span2">
						<div class="w50n forgrid">
							<div class="w50n choix_uniq">
								<label for="padding-input1">
									<img src="img/furcreation/plantigrade.png" alt="">
									<div class="indiv">
									<input type="radio" id="padding-input1" name="padding" value="plantigrade" <?php if(!empty($fureditid)){ if($furtoedit->padding == "plantigrade" ){?> checked="checked" <?php } } ?>><p>Plantigrade</p></div>
								</label>
							</div>
							<div class="w50n choix_uniq">
								<label for="padding-input2">
									<img src="img/furcreation/digigrade.png" alt="">
									<div class="indiv">
									<input type="radio" id="padding-input2" name="padding" value="digigrade" <?php if(!empty($fureditid)){ if($furtoedit->padding == "digigrade" ){?> checked="checked" <?php } } ?>><p>Digidrade</p></div>
								</label>
							</div>
						</div>
						<div class="w50n forgrid">
							<div class="w50n choix_uniq">
								<label for="style-input1">
									<img src="img/furcreation/toony.png" alt="">
									<div class="indiv">
									<input type="radio" id="style-input1" name="style" value="toony" <?php if(!empty($fureditid)){ if($furtoedit->style == "toony" ){?> checked="checked" <?php } } ?>><p>Toony</p></div>
								</label>
							</div>
							<div class="w50n choix_uniq">
								<label for="style-input2">
									<img src="img/furcreation/realist.png" alt="">
									<div class="indiv">
									<input type="radio" id="style-input2" name="style" value="realist" <?php if(!empty($fureditid)){ if($furtoedit->style == "realist" ){?> checked="checked" <?php } } ?>><p>Realist</p></div>
								</label>
							</div>
						</div>
					</div>
					<div class="span2">
						<div class="w50n forgrid">
							<div class="w50n choix_uniq">
								<label for="machoire-input1">
									<img src="img/furcreation/jaw-close.jpg" alt="">
									<div class="indiv">
									<input type="radio" id="machoire-input1" name="machoire"  value="fix" <?php if(!empty($fureditid)){ if($furtoedit->machoir == "fix" ){?> checked="checked" <?php } } ?>><p>Fix</p></div>
								</label>
							</div>
							<div class="w50n choix_uniq">
								<label for="machoire-input2">
									<img src="img/furcreation/jaw-open.jpg" alt="">
									<div class="indiv">
									<input type="radio" id="machoire-input2" name="machoire"  value="moving" <?php if(!empty($fureditid)){ if($furtoedit->machoir == "moving" ){?> checked="checked" <?php } } ?>><p>Amovible</p></div>
								</label>
							</div>
						</div>
						<div class="w50n forgrid">
							<div class="w50n choix_uniq">
								<label for="corne-input1">
									<img src="img/furcreation/pascorne.png" alt="">
									<div class="indiv">
									<input type="radio" id="corne-input1" name="corne" value="no" <?php if(!empty($fureditid)){ if($furtoedit->cornes == "no" ){?> checked="checked" <?php } } ?>><p>Non</p></div>
								</label>
							</div>
							<div class="w50n choix_uniq">
								<label for="corne-input2">
									<img src="img/furcreation/aveccorne.png" alt="">
									<div class="indiv">
									<input type="radio" id="corne-input2" name="corne" value="yes" <?php if(!empty($fureditid)){ if($furtoedit->cornes == "yes" ){?> checked="checked" <?php } } ?>><p>Oui</p></div>
								</label>
							</div>
						</div>
					</div>
					<div class="span2">
						<div class="w50n forgrid">
							<div class="w50n choix_uniq">
								<label for="dents-input1">
									<img src="img/furcreation/dentition-no.jpg" alt="">
									<div class="indiv">
									<input type="radio" id="dents-input1" name="dents" value="no" <?php if(!empty($fureditid)){ if($furtoedit->dents == "no" ){?> checked="checked" <?php } } ?>><p>Non</p></div>
								</label>
							</div>
							<div class="w50n choix_uniq">
								<label for="dents-input2">
									<img src="img/furcreation/dentition-toon.jpg" alt="">
									<div class="indiv">
									<input type="radio" id="dents-input2" name="dents" value="yes" <?php if(!empty($fureditid)){ if($furtoedit->dents == "no" ){?> checked="checked" <?php } } ?>><p>Oui</p></div>
								</label>
							</div>
						</div>
						<div class="w50n forgrid">
							<div class="w50n choix_uniq">
								<label for="doigt-input1">
									<img src="img/furcreation/4.png" alt="">
									<div class="indiv">
									<input type="radio" id="doigt-input1" name="doigt" value="4" <?php if(!empty($fureditid)){ if($furtoedit->doigt == "4" ){?> checked="checked" <?php } } ?>><p>4</p></div>
								</label>
							</div>
							<div class="w50n choix_uniq">
								<label for="doigt-input2">
									<img src="img/furcreation/5.png" alt="">
									<div class="indiv">
									<input type="radio" id="doigt-input2" name="doigt" value="5" <?php if(!empty($fureditid)){ if($furtoedit->doigt == "5" ){?> checked="checked" <?php } } ?>><p>5</p></div>
								</label>
							</div>
						</div>
					</div>
					<div class="span2">
						<div class="w70n forgrid">
							<div class="w50n choix_uniq">
								<label for="queue-input1">
									<img src="img/furcreation/shorttaile.png" alt="">
									<div class="indiv">
									<input type="radio" id="queue-input1" name="queue"  value="short" <?php if(!empty($fureditid)){ if($furtoedit->queue == "short" ){?> checked="checked" <?php } } ?>><p>Petit</p></div>
								</label>
							</div>
							<div class="w50n choix_uniq">
								<label for="queue-input2">
									<img src="img/furcreation/normaltaile.png" alt="">
									<div class="indiv">
									<input type="radio" id="queue-input2" name="queue"  value="normal" <?php if(!empty($fureditid)){ if($furtoedit->queue == "normal" ){?> checked="checked" <?php } } ?>><p>Moyen</p></div>
								</label>
							</div>
							<div class="w50n choix_uniq">
								<label for="queue-input3">
									<img src="img/furcreation/grandtaile.png" alt="">
									<div class="indiv">
									<input type="radio" id="queue-input3" name="queue"  value="large" <?php if(!empty($fureditid)){ if($furtoedit->queue == "large" ){?> checked="checked" <?php } } ?>><p>Grand</p></div>
								</label>
							</div>
						</div>
					</div>
					<div class="span2">
						<div class="w50n forgrid">
							<div class="w50n choix_uniq">
								<label for="yeux-input1">
									<img src="img/furcreation/eyes_normal.jpg" alt="">
									<div class="indiv">
									<input type="radio" id="yeux-input1" name="yeux" value="normal" <?php if(!empty($fureditid)){ if($furtoedit->yeux == "normal" ){?> checked="checked" <?php } } ?>><p>Plan</p></div>
								</label>
							</div>
							<div class="w50n choix_uniq">
								<label for="yeux-input2">
									<img src="img/furcreation/eyes_follow.jpg" alt="">
									<div class="indiv">
									<input type="radio" id="yeux-input2" name="yeux" value="followMe" <?php if(!empty($fureditid)){ if($furtoedit->yeux == "followMe" ){?> checked="checked" <?php } } ?>><p>FollowMe</p></div>
								</label>
							</div>
						</div>
						<div class="w50n forgrid">
							<div class="w50n choix_uniq">
								<label for="ailes-input1">
									<img src="img/furcreation/pasaile.png" alt="">
									<div class="indiv">
									<input type="radio" id="ailes-input1" name="ailes" value="no" <?php if(!empty($fureditid)){ if($furtoedit->ailes == "no" ){?> checked="checked" <?php } } ?>><p>Non</p></div>
								</label>
							</div>
							<div class="w50n choix_uniq">
								<label for="ailes-input2">
									<img src="img/furcreation/aile.png" alt="">
									<div class="indiv">
									<input type="radio" id="ailes-input2" name="ailes" value="yes" <?php if(!empty($fureditid)){ if($furtoedit->ailes == "yes" ){?> checked="checked" <?php } } ?>><p>Oui</p></div>
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="left">
				<div class="indiv">
					<?php if(isset($_GET['search']) AND !empty($_GET['search'])){?>
						<section id="liste_all_user_for_search">
							<?php
							
								if($alluser->rowCount() > 0){
									while($user_liste_fund = $alluser->fetch()){ ?>
									<a class="furry_funding" href="furrycard?id=<?=$user_liste_fund->id?>">
										<div id="user_fund_unique">
											<img src="<?=$user_liste_fund->avatar?>" alt="">
											<p><?=$user_liste_fund->name?></p>
										</div>
									</a>
									<?php }
								} else {
									echo "aucune utilisateur ne corresponde à votre recherche \"$search_fur\" ";
								}
							
							?>
						</section>
					<?php } ?>
				</div>
			</div>
		</div>
			
		</div>
		<?php include("part/footer.php");?>
	</body>
</html>