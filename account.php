<?php

	require_once 'bootstrap.php';

	$session = Session::getInstance();

	$itconnect = App::getAuth()->online();

	$db = App::getDatabase();
?>


<?php /* Recupe info du profil*/

	$user_viser_id = $_GET["id"];
	$userselect = $db->query('SELECT * FROM users WHERE id = ?', [$user_viser_id]);
	$user_seeing = $userselect->fetch(PDO::FETCH_OBJ);

	$Nombre_furso_calcule = $db->query('SELECT * FROM furrys WHERE proprio = ?', [$user_viser_id]);
	$Nombre_furso = $Nombre_furso_calcule->rowCount();

	if(empty($user_seeing->username)){
		$session->setFlash('alert',"Cette utilisateur n'existe pas");
		App::redirect('index.php');
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/theme.css"/>
		<link rel="stylesheet" href="css/account.css"/>
		<link rel="shortcut icon" type="image/png" href="img/theme/favicon.png"/>
		<title>Furry-id.com</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0, maximum-scale=1.0">
		<script src="https://kit.fontawesome.com/d5d0318cf5.js" crossorigin="anonymous"></script>
	</head>
			<?php include("part/header.php");?>
			<div id="__global_body__">
			
				<div id="top">
					<div id="user_card">
							<div class="g1">
								<img id="profil_img" src="<?= $user_seeing->avatar; ?>"/>
								<table>
									<tr>
										<td><p id="username"><?= $user_seeing->username ?></p></td>
										<?php
										
										if(!empty($user_seeing->nom) || !empty($user_seeing->prenom)){ ?>
											<td><p id="nomprenom">( <?= $user_seeing->nom;?> <?= $user_seeing->prenom; ?> )</p></td><?php
										} ?>
									</tr>
									<tr><td><p>Âge : <?=$user_seeing->age; ?> age</p></td><td><p>Genre : <?= $user_seeing->genre; ?></p></td></tr>
									<tr><td><p>Furry depuis le : <br> <?= $user_seeing->furry_depuis; ?></p></td></tr>
									
									<tr>
										<td>
											<p>Paye : <?= $user_seeing->pays; ?></p>
										</td>
										<td>
											<p>Langue parler : </p>
										</td>
										<?php
											$liste_langue_parler = explode(',', $user_seeing->l_speak);
											$langues_parler = (count($liste_langue_parler) - 1);
											$langues_parler_init = -1;
											
											while(++$langues_parler_init <= $langues_parler){?>
											<td>
												<img class="flag" src="img/flags/<?=$liste_langue_parler[$langues_parler_init];?>.svg" alt="<?=$liste_langue_parler[$langues_parler_init];?>">
											</td>
									<?php } ?>
									</tr>
								</table>
							</div>
							
							<div class="g2">
										<p>Nombre de fursona : <em><?= $Nombre_furso ?></em> </p>
							</div>

							<div class="g3">
								<table>
									<tr>
										<?php if(($user_seeing->fursuiter) == "on"){ ?>
											<td><img src="../img/theme/checked.png" alt="I am "></td>
											<td><p>Fursuiteur</p></td><?php } ?>
									</tr>
									<tr>
										<?php if(($user_seeing->photo) == "on"){ ?>
											<td><img src="../img/theme/checked.png" alt="I am "></td>
											<td><p>Photographe / Vidéaste furry</p></td><?php } ?>
									</tr>
									<tr>
										<?php if(($user_seeing->ecrivain) == "on"){ ?>
											<td><img src="../img/theme/checked.png" alt="I am "></td>
										<td><p>Ecrivain furry</p></td><?php } ?>
									</tr>
									<tr>
										<?php if(($user_seeing->musicien) == "on"){ ?>
											<td><img src="../img/theme/checked.png" alt="I am "></td>
										<td><p>Musicien furry</p></td><?php } ?>
									</tr>
									<tr>
										<?php if(($user_seeing->desinateur) == "on"){ ?>
											<td><img src="../img/theme/checked.png" alt="I am "></td>
										<td><p>Desintateur furry</p></td><?php } ?>
									</tr>
									<tr>
										<?php if(($user_seeing->maker) == "on"){ ?>
											<td><img src="../img/theme/checked.png" alt="I am "></td>
										<td><p>Fursuit Maker</p></td><?php } ?>
									</tr>
									<tr>
									<?php if(($user_seeing->rp) == "on"){ ?>
											<td><img src="../img/theme/checked.png" alt="I am "></td>
										<td><p>RP furry</p></td><?php } ?>
									</tr>
								</table>
							</div>

							<div class="g4">
								<?php if(!empty($user_seeing->r_facebook)){ ?>
									<a target="_blank" href="https://www.facebook.com/<?=$user_seeing->r_facebook?>"><img src="img/theme/n_facebook.svg" alt="facebook"></a>
								<?php } ?>
								<?php if(!empty($user_seeing->r_instagram)){ ?>
									<a target="_blank" href="https://www.instagram.com/<?=$user_seeing->r_instagram?>"><img src="img/theme/n_instagram.svg" alt="instagram"></a>
								<?php } ?>
								<?php if(!empty($user_seeing->r_telegram)){ ?>
									<a target="_blank" href="t.me/<?=$user_seeing->r_telegram?>"><img src="img/theme/n_telegram.svg" alt="telegram"></a>
								<?php } ?>
								<?php if(!empty($user_seeing->r_furaffinity)){ ?>
									<a target="_blank" href="https://www.furaffinity.net/user/<?=$user_seeing->r_furaffinity?>"><img src="img/theme/n_furaffinity.svg" alt="furaffinity"></a>
								<?php } ?>
								<?php if(!empty($user_seeing->r_siteweb)){ ?>
									<a target="_blank" href="https://<?=$user_seeing->r_siteweb?>"><img src="img/theme/n_siteweb.svg" alt="site web"></a>
								<?php } ?>
								<?php if(!empty($user_seeing->r_twitter)){ ?>
									<a target="_blank" href="https://twitter.com/<?=$user_seeing->r_twitter?>"><img src="img/theme/n_twitter.svg" alt="twitter"></a>
								<?php } ?>
								<?php if(!empty($user_seeing->r_discord)){ ?>
									<a target="_blank" href="<?=$user_seeing->r_discord?>"><img src="img/theme/n_discord.svg" alt="discord"></a>
								<?php } ?>
							</div>

							<div class="g5">
								<p>Fur id card : <?= $user_seeing->fur_id_card; ?></p>
							</div>

							<div class="g6">
								<p>Inscription le : <?= $user_seeing->confirmed_at; ?></p>
								<p>Mise à jours le : <?= $user_seeing->update_profil; ?></p>
							</div>

							<?php if($itconnect){
								if($data_id == $user_seeing->id ){?>
								<div class="g7">
									<a href="account_editing.php"><p>Edit profil</p></a>
								</div>
							<?php } 
							} ?>
					</div>

					<div id="side_box">
						<div class="convention">
							<div class="li-title"><p>Badges</p></div>
							<!--<div class="flex-badge">
								<div><a href=""><img src="img\theme\testbadge.png" alt=""></a></div>
								<div><a href=""><img src="img\badges\BGF2022.png" alt=""></a></div>
							</div>-->
						</div>
						<!--
						<div class="autre">
							<p>test</p>
						</div>
						-->
					</div>
				</div>

				<?php if($Nombre_furso <= 1){ ?>
					<h1 id="mes-fursona">Mon Fursona</h1>
				<?php } else { ?>
					<h1 id="mes-fursona">Mes Fursonas</h1>
				<?php } ?>
				<div id="fursona_liste">
					<?php
						$furso_du_client = $db->query('SELECT * FROM furrys WHERE proprio = ?', [$user_viser_id]);
						$nbrMembres = $furso_du_client->rowCount();
					
					while($user_furso = $furso_du_client->fetch(PDO::FETCH_OBJ)){?>
						<a href="furrycard?id=<?= $user_furso->id; ?>">
							<div class="unique">
								<img src="<?= $user_furso->avatar; ?>" alt="">
								<p class="furso_name"><?= $user_furso->name; ?></p>
								<p><?= $user_furso->espece; ?></p>
							</div>
						</a>
					<?php }
					
					if($itconnect){
						if($data_id == $user_seeing->id ){?>
							<a class="add" href="furry_creation.php">
							<div class="unique">
								<img src="img/theme/add.png" alt="">
								<p class="furso_name">Add new one</p>
								<p>Start a new life.</p>
							</div>
							</a>
						<?php } 
					} ?>
				</div>
			</div>

			<?php include("part/footer.php");?>
	</body>
</html>