<?php

require 'bootstrap.php';

$auth = App::getAuth();

$db = App::getDatabase();

$auth->connectFromCookie($db);

$session = Session::getInstance();

/* Recupe info du profil*/

	$furry_target_id = $_GET["id"];
    $furryselect = $db->query('SELECT * FROM furrys WHERE id = ?', [$furry_target_id]);
	$furry_seeing = $furryselect->fetch(PDO::FETCH_OBJ);


    $propiochercher = $db->query('SELECT * FROM users WHERE id = ?', [$furry_seeing->proprio]);
    $propio = $propiochercher->fetch(PDO::FETCH_OBJ);

    $makerchercher = $db->query('SELECT * FROM users WHERE id = ?', [$furry_seeing->maker]);
    $maker = $makerchercher->fetch(PDO::FETCH_OBJ);

	if(empty($furry_seeing->name)){
		$session->setFlash('alert',"Ce furry n'existe pas");
		App::redirect('index.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
		<base href="/"/>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/theme.css"/>
		<link rel="stylesheet" href="css/furrycard.css"/>
		<link rel="shortcut icon" type="image/png" href="img/theme/favicon.png"/>
		<title>Furry-id.com</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0, maximum-scale=1.0">
		<script src="https://kit.fontawesome.com/d5d0318cf5.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php include("part/header.php");?>

        <div id="top">
            <div class="side_box">
                <?php
                if($itconnect){
					if($data_id == $furry_seeing->proprio ){?>
                    <div id="box_edit" class="gray_box">
                        <a href="furry_creation?id=<?=$furry_seeing->id?>">Edit fursona</a>
                    </div>
                <?php } } ?>
                <div id="box_propio" class="gray_box">
                    <p>Appartien à :</p>
                    <div id="s1">
                        <a href="account?id=<?= $propio->id; ?>">
                            <img src="<?= $propio->avatar; ?>" alt="">
                            <p><?= $propio->username; ?></p>
                        </a>
                    </div>
                </div>

                <?php if(!empty($furry_seeing->histoire)){ ?>
                    <div id="box_histoire" class="gray_box">
                    <p>Histoire du fursona :</p>
                    <p id="scrol"><?= $furry_seeing->histoire; ?></p>
                    </div>
                <?php } ?>
            </div>

            <div id="furry_card">
                <div id="g1"><p><img src="<?= $furry_seeing->avatar; ?>"></p></div>
                <div id="g2"><p>Nom : <?= $furry_seeing->name ?></p></div>
                <div id="g3"><p>Espece : <?= $furry_seeing->espece ?></p></div>
                <div id="g4">
                    <?php if($furry_seeing->genre == "male"){ ?>
                        <img src="img/theme/male.png" alt="male">
                    <?php } else if($furry_seeing->genre == "femelle") { ?>
                        <img src="img/theme/femelle.png" alt="femelle">
                    <?php } else { ?>
                        <img src="img/theme/sex_inconnu.png" alt="non_defini">
                    <?php } ?>
                </div>
                <div id="g5">
                    <p>Fursuite :
                        <?php
                        if($furry_seeing->suit_type != "none"){?> Yes  <?php $part_2 = 1;
                        } else {
                            ?> No <?php $part_2 = 0;} ?></p>
                </div>
                <div id="g6">
                    <p>Couleurs :</p>
                    <table>
                        <tr> <?php
                            $liste_couleur = explode(',', $furry_seeing->colors);
                            $nombre_de_couleur = (count($liste_couleur) - 1);
                            $color_gloable_while = -1;
                            while(++$color_gloable_while <= $nombre_de_couleur){?> <td style="background-color: <?=$liste_couleur[$color_gloable_while];?>"></td><?php } ?>
                        </tr>
                    </table>
                </div>
                <div id="g7">
                    <p>Couleur des Yeux :</p>
                    <table>
                        <tr> <?php
                            $eye_couleur = explode(',', $furry_seeing->colors_eye);
                            $nombre_de_couleur_eye = (count($eye_couleur) - 1);
                            $color_eye_while = -1;
                            while(++$color_eye_while <= $nombre_de_couleur_eye){?> <td style="background-color: <?=$eye_couleur[$color_eye_while];?>"></td><?php } ?>
                        </tr>
                    </table>
                </div>
                <div id="g8"><p>Taches : <?= $furry_seeing->taches ?></p><img src="img/theme/TR_<?= $furry_seeing->taches ?>.png" alt=""></div>
                <div id="g9"><p>Description : </p><p><?= $furry_seeing->description; ?></p></div>
            </div>

            <div class="side_box">
                <?php if(!empty($furry_seeing->ref)){?>
                    <a target="_blank" href="<?= $furry_seeing->ref ?>"><div id="ref" class="gray_box">
                    <img src="<?= $furry_seeing->ref; ?>" alt="ref">
                </div>
                <?php } ?></a>
                
                <div id="convention" class="gray_box"><p>Convention participation</p></div>
            </div>
        </div>

        <?php if($part_2 == 1){ ?>
        <div id="bottom">
            <div class="side_box_2">
                <div id="info_suite" class="gray_box">
                    <table>
                        <tr>
                            <td class="gauche"><p>Taille : </p></td>
                            <?php
                                $taille_metre = $furry_seeing->taille_metre;
                                $taille_ft_noround = $taille_metre / 0.3048;
                                $taille_ft = round($taille_ft_noround, 2)
                            ?>
                            <td class="droit"><p><?=$taille_metre?> m <br> <?= $taille_ft ?> ft</p></td>
                        </tr>
                        <tr>
                            <td class="gauche"><p>Type : </p></td>
                            <td class="droit"><p><?=$furry_seeing->suit_type?></p></td>
                        </tr>
                        <tr>
                            <td class="gauche"><p>Padding : </p></td>
                            <td class="droit"><p><?=$furry_seeing->padding?></p></td>
                        </tr>
                        <tr>
                            <td class="gauche"><p>Ailes : </p></td>
                            <td class="droit"><p><?=$furry_seeing->ailes?></p></td>
                        </tr>
                        <tr>
                            <td class="gauche"><p>Queue : </p></td>
                            <td class="droit"><p><?=$furry_seeing->queue?></p></td>
                        </tr>
                        <tr>
                            <td class="gauche"><p>Cornes : </p></td>
                            <td class="droit"><p><?=$furry_seeing->cornes?></p></td>
                        </tr>
                        <tr>
                            <td class="gauche"><p>Yeux : </p></td>
                            <td class="droit"><p><?=$furry_seeing->yeux?></p></td>
                        </tr>
                        <tr>
                            <td class="gauche"><p>Machoir : </p></td>
                            <td class="droit"><p><?=$furry_seeing->machoir?></p></td>
                        </tr>
                        <tr>
                            <td class="gauche"><p>Dents : </p></td>
                            <td class="droit"><p><?=$furry_seeing->dents?></p></td>
                        </tr>
                        <tr>
                            <td class="gauche"><p>Nombre de doigt : </p></td>
                            <td class="droit"><p><?=$furry_seeing->doigt?></p></td>
                        </tr>
                        <tr>
                            <td class="gauche"><p>Style : </p></td>
                            <td class="droit"><p><?=$furry_seeing->style?></p></td>
                        </tr>
                        <tr>
                            <td class="gauche"><p>Can speak : </p></td>
                            <td class="droit"><p><?=$furry_seeing->speak?></p></td>
                        </tr>
                        <tr>
                            <td class="gauche"><p>Hug : </p></td>
                            <td class="droit"><p><?=$furry_seeing->hug?></p></td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <div id="fursuit_photo" class="gray_box"><img src="<?= $furry_seeing->photo_suit ?>" alt=""></div>
            
            
                <div class="side_box">
                <?php if(!empty($furry_seeing->touch_zone)){?>
                <a target="_blank" href="<?= $furry_seeing->touch_zone ?>"><div id="toutch_zone" class="gray_box">
                    <p>Touch zone :</p>
                    <img src="<?= $furry_seeing->touch_zone ?>" alt="">
                </div> <?php } ?></a>

                <?php if(!empty($furry_seeing->accesoirs)){ ?>
                <div id="accesoir" class="gray_box">
                    <p>Accessoire(s) :</p>
                    <p><?=$furry_seeing->accesoirs?></p>
                </div> <?php } ?>


                <div id="af_maker" class="gray_box">
                    <p>Fursuite Maker :</p>
                    <div id="s2">
                        <a href="account?id=<?= $maker->id; ?>">
                            <img src="<?= $maker->avatar; ?>" alt="">
                            <p><?= $maker->username ?></p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

		<?php include("part/footer.php");?>
	</body>
</html>