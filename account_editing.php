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
        $data_role = $userdata->role;
        $data_username = $userdata->username;
        $data_nom = $userdata->nom;
        $data_prenom = $userdata->prenom;
        $data_age = $userdata->age;
        $data_email = $userdata->email;
        $data_avatar = $userdata->avatar;
        $data_furry_depuis = $userdata->furry_depuis;
        $data_fur_id_card = $userdata->fur_id_card;
        $data_pays = $userdata->pays;
        $data_genre = $userdata->genre;
        $data_fursuiter = $userdata->fursuiter;
        $data_photofur = $userdata->photo;
        $data_ecrivainfur = $userdata->ecrivain;
        $data_musicienfur = $userdata->musicien;
        $data_desinateurfur = $userdata->desinateur;
        $data_makerfur = $userdata->maker;
        $data_rp = $userdata->rp;
        $data_r_instagram = $userdata->r_instagram;
        $data_r_facebook = $userdata->r_facebook;
        $data_r_siteweb = $userdata->r_siteweb;
        $data_r_telegram = $userdata->r_telegram;
        $data_r_furaffinity = $userdata->r_furaffinity;
        $data_r_twitter = $userdata->r_twitter;
        $data_r_discord = $userdata->r_discord;
        $data_l_speak = $userdata->l_speak;
        
    endforeach;
    }


$update = 0;
if(isset($_POST['new_userename']) AND !empty($_POST['new_userename']) AND $_POST['new_userename'] != $data_username){
    $newpseudo = htmlspecialchars($_POST['new_userename']);
    $db->query("UPDATE users SET username = ? WHERE id = ?", [$newpseudo, $data_id]);
    $update = 1;
}
if(isset($_POST['new_adresse_mail']) AND !empty($_POST['new_adresse_mail']) AND $_POST['new_adresse_mail'] != $data_email){
    $newmail = htmlspecialchars($_POST['new_adresse_mail']);
    $db->query("UPDATE users SET email = ? WHERE id = ?", [$newmail, $data_id]);
    $update = 1;
}
if(isset($_POST['new_nom']) AND $_POST['new_nom'] != $data_nom){
    $newnom = htmlspecialchars($_POST['new_nom']);
    $db->query("UPDATE users SET nom = ? WHERE id = ?", [$newnom, $data_id]);
    $update = 1;
}
if(isset($_POST['new_prenom']) AND $_POST['new_prenom'] != $data_prenom){
    $newprenom = htmlspecialchars($_POST['new_prenom']);
    $db->query("UPDATE users SET prenom = ? WHERE id = ?", [$newprenom, $data_id]);
    $update = 1;
}
if(isset($_POST['new_age']) AND $_POST['new_age'] != $data_age){
    $newage = htmlspecialchars($_POST['new_age']);
    $db->query("UPDATE users SET age = ? WHERE id = ?", [$newage, $data_id]);
    $update = 1;
}
if(isset($_POST['new_genre']) AND $_POST['new_genre'] != $data_genre){
    $newgenre = htmlspecialchars($_POST['new_genre']);
    $db->query("UPDATE users SET genre = ? WHERE id = ?", [$newgenre, $data_id]);
    $update = 1;
}
if(isset($_POST['new_avatar']) AND !empty($_POST['new_avatar']) AND $_POST['new_avatar'] != $data_avatar){
    $newavatar = htmlspecialchars($_POST['new_avatar']);
    $db->query("UPDATE users SET avatar = ? WHERE id = ?", [$newavatar, $data_id]);
    $update = 1;
}
if(isset($_POST['new_fur_depuis']) AND !empty($_POST['new_fur_depuis']) AND $_POST['new_fur_depuis'] != $data_furry_depuis){
    $fur_depuis = htmlspecialchars($_POST['new_fur_depuis']);
    $db->query("UPDATE users SET furry_depuis = ? WHERE id = ?", [$fur_depuis, $data_id]);
    $update = 1;
}
if(isset($_POST['new_pays']) AND $_POST['new_pays'] != $data_pays){
    $newpays = htmlspecialchars($_POST['new_pays']);
    $db->query("UPDATE users SET pays = ? WHERE id = ?", [$newpays, $data_id]);
    $update = 1;
}
if(isset($_POST['new_telegram']) AND $_POST['new_telegram'] != $data_r_telegram){
    $newtelegram = htmlspecialchars($_POST['new_telegram']);
    $db->query("UPDATE users SET r_telegram = ? WHERE id = ?", [$newtelegram, $data_id]);
    $update = 1;
}
if(isset($_POST['new_discord']) AND $_POST['new_discord'] != $data_r_discord){
    $newdiscord = htmlspecialchars($_POST['new_discord']);
    $db->query("UPDATE users SET r_discord = ? WHERE id = ?", [$newdiscord, $data_id]);
    $update = 1;
}
if(isset($_POST['new_instagram']) AND $_POST['new_instagram'] != $data_r_instagram){
    $newinstagram = htmlspecialchars($_POST['new_instagram']);
    $db->query("UPDATE users SET r_instagram = ? WHERE id = ?", [$newinstagram, $data_id]);
    $update = 1;
}
if(isset($_POST['new_furaffinity']) AND $_POST['new_furaffinity'] != $data_r_furaffinity){
    $newfa = htmlspecialchars($_POST['new_furaffinity']);
    $db->query("UPDATE users SET r_furaffinity = ? WHERE id = ?", [$newfa, $data_id]);
    $update = 1;
}
if(isset($_POST['new_facebook']) AND $_POST['new_facebook'] != $data_r_facebook){
    $newfb = htmlspecialchars($_POST['new_facebook']);
    $db->query("UPDATE users SET r_facebook = ? WHERE id = ?", [$newfb, $data_id]);
    $update = 1;
}
if(isset($_POST['new_twitter']) AND $_POST['new_twitter'] != $data_r_twitter){
    $newtwitter = htmlspecialchars($_POST['new_twitter']);
    $db->query("UPDATE users SET r_twitter = ? WHERE id = ?", [$newtwitter, $data_id]);
    $update = 1;
}
if(isset($_POST['new_siteweb']) AND $_POST['new_siteweb'] != $data_r_siteweb){
    $newsiteweb = htmlspecialchars($_POST['new_siteweb']);
    $db->query("UPDATE users SET r_siteweb = ? WHERE id = ?", [$newsiteweb, $data_id]);
    $update = 1;
}
if(isset($_POST['langue_ar'])){
    $checkedt = $_POST['langue_ar'];
    $liste_lange = implode("," , $checkedt);

    $newlanguage = $liste_lange;
    $db->query("UPDATE users SET l_speak = ? WHERE id = ?", [$newlanguage, $data_id]);
}
if(isset($_POST['new_fursuitter'])){
    $db->query("UPDATE users SET fursuiter = ? WHERE id = ?", ["on", $data_id]); } else { $db->query("UPDATE users SET fursuiter = ? WHERE id = ?", ["off", $data_id]);}
if(isset($_POST['new_porf'])){
    $db->query("UPDATE users SET photo = ? WHERE id = ?", ["on", $data_id]); } else { $db->query("UPDATE users SET photo = ? WHERE id = ?", ["off", $data_id]);}
if(isset($_POST['new_ecrivain'])){
    $db->query("UPDATE users SET ecrivain = ? WHERE id = ?", ["on", $data_id]); } else { $db->query("UPDATE users SET ecrivain = ? WHERE id = ?", ["off", $data_id]);}
if(isset($_POST['new_musicien'])){
    $db->query("UPDATE users SET musicien = ? WHERE id = ?", ["on", $data_id]); } else { $db->query("UPDATE users SET musicien = ? WHERE id = ?", ["off", $data_id]);}
if(isset($_POST['new_dessinateur'])){
    $db->query("UPDATE users SET desinateur = ? WHERE id = ?", ["on", $data_id]); } else { $db->query("UPDATE users SET desinateur = ? WHERE id = ?", ["off", $data_id]);}
if(isset($_POST['new_f-maker'])){
    $db->query("UPDATE users SET maker = ? WHERE id = ?", ["on", $data_id]); } else { $db->query("UPDATE users SET maker = ? WHERE id = ?", ["off", $data_id]);}
if(isset($_POST['new_rp'])){
    $db->query("UPDATE users SET rp = ? WHERE id = ?", ["on", $data_id]); } else { $db->query("UPDATE users SET rp = ? WHERE id = ?", ["off", $data_id]);}



if(empty($data_fur_id_card)){ //Generation de l'id unique de carte

    while(1 == 1){
        $uniqueid_1 = rand(1111, 9999);
        $uniqueid_2 = rand(1111, 9999);
        $uniqueid_3 = rand(1111, 9999);
        $uniqueid_4 = rand(1111, 9999);
        $idarraygeneerated = array($uniqueid_1, $uniqueid_2, $uniqueid_3, $uniqueid_4);
        $unique_Id = $idarraygeneerated[0] . " - " . $idarraygeneerated[1] . " - " . $idarraygeneerated[2] . " - " . $idarraygeneerated[3];

        $furidoverused = $db->query("SELECT id FROM users WHERE fur_id_card = ?", [$unique_Id])->fetch();

        if($furidoverused == true){
        } else {
            break;
        }
    }

    $db->query("UPDATE users SET fur_id_card = ? WHERE id = ?", [$unique_Id, $data_id]);

}

if($update == 1){
    $update = 0;
    $session->setFlash('success',"Votre profil à bien été modifier. Elle prendrons effet à votre prochain connection.");
    App::redirect('index.php');
}


$db->query("UPDATE users SET update_profil = NOW() WHERE id = ?", [$data_id]);

?>




<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/theme.css"/>
        <link rel="stylesheet" href="css/account_editing.css"/>
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
            <div id="center">
                <form action="" method="POST" class="box_connect">
                    <div id="gauche">
                        <input name="new_userename" class="text-input" placeholder="Nom d'utilisateur" type="text" value="<?=$data_username?>">
                        <div class="tuflex">
                            <input name="new_nom" class="text-input" placeholder="Nom" type="text" value="<?=$data_nom?>">
                            <input name="new_prenom" class="text-input" placeholder="Prenom" type="text" value="<?=$data_prenom?>">
                        </div>
                        <div class="tuflex">
                            <input name="new_age" class="text-input age" placeholder="Age" type="text" value="<?=$data_age?>">
                            <input name="new_adresse_mail" class="text-input" placeholder="Adresse mail" type="text" value="<?=$data_email?>">
                        </div>
                        <button class="forget_button" type="submit">Changer de mot de passe</button>
                        <div class="tuflex">
                            <select name="new_genre" id="">
                                <option value="<?=$data_genre?>"><?=$data_genre?></option>
                                <option value=""></option>
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                                <option value="Non binaire">Non binaire</option>
                                <option value="LGBTQ+">Autre</option>
                            </select>

                            <input name="new_avatar" class="text-input" placeholder="avatar URL" type="text" value="<?=$data_avatar?>">
                        </div>
                        <div class="tuflex">

                        <div class="choix-liste">
                            </div>

                            <?php $liste_langue_parler = explode(',', $data_l_speak); ?>

                            <div class="choix-liste">
                                <div class="form-check">
                                    <input id="check-fr" name="langue_ar[]" value="fr" type="checkbox" <?php if(in_array("fr", $liste_langue_parler)){?>checked="checked"<?php } ?>>
                                    <label for="langue-fr">Francais</label>
                                </div>
                                <div class="form-check">
                                    <input id="check-de" name="langue_ar[]" value="de" type="checkbox" <?php if(in_array("de", $liste_langue_parler)){?>checked="checked"<?php } ?>>
                                    <label for="langue-de">Allemand</label>
                                </div>
                                <div class="form-check">
                                    <input id="check-es" name="langue_ar[]" value="es" type="checkbox" <?php if(in_array("es", $liste_langue_parler)){?>checked="checked"<?php } ?>>
                                    <label for="langue-es">Espagnol</label>
                                </div>
                                <div class="form-check">
                                    <input id="check-gb" name="langue_ar[]" value="gb" type="checkbox" <?php if(in_array("gb", $liste_langue_parler)){?>checked="checked"<?php } ?>>
                                    <label for="langue-gb">Anglais</label>
                                </div>
                                <div class="form-check">
                                    <input id="check-it" name="langue_ar[]" value="it" type="checkbox" <?php if(in_array("it", $liste_langue_parler)){?>checked="checked"<?php } ?>>
                                    <label for="langue-it">Italien</label>
                                </div>
                                <div class="form-check">
                                    <input id="check-pt" name="langue_ar[]" value="pt" type="checkbox" <?php if(in_array("pt", $liste_langue_parler)){?>checked="checked"<?php } ?>>
                                    <label for="langue-pt">Portugais</label>
                                </div>
                                <div class="form-check">
                                    <input id="check-ru" name="langue_ar[]" value="ru" type="checkbox" <?php if(in_array("ru", $liste_langue_parler)){?>checked="checked"<?php } ?>>
                                    <label for="langue-ru">Russe</label>
                                </div>
                            </div>

                            

                            <div id="photo_profil_preview">
                                <img src="<?= $userdata->avatar ?>" alt="">
                            </div>
                        </div>
                        <input name="new_pays" class="text-input" placeholder="Pays : " type="text" value="<?=$data_pays?>">
                    </div>
                        
                    <div id="droit">
                        <div class="tuflex">
                            <input name="new_fur_depuis" class="text-input age" placeholder="Furry depuis" type="text" value="<?=$data_furry_depuis?>">
                            <div class="choix-liste">
                                <div class="form-check">
                                    <input id="fursuitter" name="new_fursuitter" type="checkbox" <?php if($data_fursuiter == "on"){?> checked <?php } ?>>
                                    <label for="fursuitter">Fursuitter</label>
                                </div>
                                <div class="form-check">
                                    <input id="porf" name="new_porf" type="checkbox" <?php if($data_photofur == "on"){?> checked <?php } ?>>
                                    <label for="porf">Photographe / vidéaste</label>
                                </div>
                                <div class="form-check">
                                    <input id="ecrivain" name="new_ecrivain" type="checkbox" <?php if($data_ecrivainfur == "on"){?> checked <?php } ?>>
                                    <label for="ecrivain">Ecrivain</label>
                                </div>
                                <div class="form-check">
                                    <input id="musicien" name="new_musicien" type="checkbox" <?php if($data_musicienfur == "on"){?> checked <?php } ?>>
                                    <label for="musicien">Musicien</label>
                                </div>
                                <div class="form-check">
                                    <input id="dessinateur" name="new_dessinateur" type="checkbox" <?php if($data_desinateurfur == "on"){?> checked <?php } ?>>
                                    <label for="dessinateur">Dessinateur</label>
                                </div>
                                <div class="form-check">
                                    <input id="f-maker" name="new_f-maker" type="checkbox" <?php if($data_makerfur == "on"){?> checked <?php } ?>>
                                    <label for="f-maker">Fursuit Maker</label>
                                </div>
                                <div class="form-check">
                                    <input id="rp" name="new_rp" type="checkbox" <?php if($data_rp == "on"){?> checked <?php } ?>>
                                    <label for="rp">Role play</label>
                                </div>
                            </div>
                        </div>

                        <div id="liste_lien">
                            <table>
                                <tr>
                                    <td><p>Telegram</p></td>
                                    <td><input name="new_telegram" class="text-input" placeholder="Telegram : " type="text" value="<?=$data_r_telegram?>"></td>
                                </tr>
                                <tr>
                                    <td><p>Discord</p></td>
                                    <td><input name="new_discord" class="text-input" placeholder="Discord : " type="text" value="<?=$data_r_discord?>"></td>
                                </tr>
                                <tr>
                                    <td><p>Instagram</p></td>
                                    <td><input name="new_instagram" class="text-input" placeholder="Instagram : " type="text" value="<?=$data_r_instagram?>"></td>
                                </tr>
                                <tr>
                                    <td><p>FurAffinity</p></td>
                                    <td><input name="new_furaffinity" class="text-input" placeholder="Furaffinity : " type="text" value="<?=$data_r_furaffinity?>"></td>
                                </tr>
                                <tr>
                                    <td><p>Facebook</p></td>
                                    <td><input name="new_facebook" class="text-input" placeholder="Facebook : " type="text" value="<?=$data_r_facebook?>"></td>
                                </tr>
                                <tr>
                                    <td><p>Twitter</p></td>
                                    <td><input name="new_twitter" class="text-input" placeholder="Twitter : " type="text" value="<?=$data_r_twitter?>"></td>
                                </tr>
                                <tr>
                                    <td><p>Site Web</p></td>
                                    <td><input name="new_siteweb" class="text-input" placeholder="Site Web : " type="text" value="<?=$data_r_siteweb?>"></td>
                                </tr>
                            </table>
                        </div>
                        <button class="sub_button" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>

        <?php include("part/footer.php");?>
	</body>

<script>

</script>

</html>