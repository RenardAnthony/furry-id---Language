<?php 

require_once 'bootstrap.php';

$itconnect = App::getAuth()->online();

?>

<?php //Ceci permet de recuper tout les info des utilisateur.

if($itconnect == true){

$db = App::getDatabase();

$user_id = $_SESSION['auth']->id;

foreach($db->query('SELECT * FROM users WHERE id = ?', [$user_id]) as $userdata):

	$data_id = $userdata->id; //Id de l'utilisateur.
	$data_role = $userdata->role; //Role de l'utilisateur .
	$data_username = $userdata->username; //Nom de l'utilisateur.
	$data_email = $userdata->email; //Email de l'utilisateur.
	$data_avatar = $userdata->avatar;//avatar de l'utilisateur.
	
endforeach;
}

$alluser = $db->query('SELECT * FROM furrys ORDER BY id DESC');
if(isset($_GET['search']) AND !empty($_GET['search'])){
	$search_fur = htmlspecialchars($_GET['search']);
	$alluser = $db->query('SELECT * FROM furrys WHERE name LIKE "%'.$search_fur.'%" ORDER BY id DESC');
}



$newsunique = $db->query('SELECT * FROM news ORDER BY date_time_publication DESC LIMIT 1');


?>

<header>		
	<nav id="header-bar">

		<a href="index.php" id="logosite"><img alt="Logo du site" src="img/theme/Logo_site_nb.png"/></a>

		<div id="deusiemepart">
			<div id="header-body-left">
				<div id="bar_navigation">
					<ul class="menu">
						<li class="blocked-soon"><a href="">About</a></li>
						<li><a href="../news_unique?id=<?php while($news_uniques = $newsunique->fetch()){ echo $news_uniques->id;} ?>">News</a></li>
						<li>
							<a style="cursor:pointer;" onclick="open_language_menu()"><img src="img/flags/fr.svg" alt=""> Francais</a>
							<div class="dropdown-menu" id="liste_langue">
								<a href="https://fr.furry-id.com/" class="dropdown-item"><img src="img/flags/fr.svg">Français <span class="float-right text-muted">72%</span></a>
								<a class="dropdown-item"><img src="img/flags/gb.svg">English <span class="float-right text-muted">0%</span></a>
								<a class="dropdown-item"><img src="img/flags/de.svg">Deutsch <span class="float-right text-muted">0%</span></a>
								<a class="dropdown-item"><img src="img/flags/it.svg">Italiano <span class="float-right text-muted">0%</span></a>
								<a class="dropdown-item"><img src="img/flags/pt.svg">Português <span class="float-right text-muted">0%</span></a>
								<a class="dropdown-item"><img src="img/flags/es.svg">Español <span class="float-right text-muted">0%</span></a>
								<a class="dropdown-item"><img src="img/flags/ru.svg">русский <span class="float-right text-muted">0%</span></a>
							</div>
						</li>
					</ul>
				</div>
			</div>
			

			<div id="recherche_bar">
				<form method="GET" action="">
					<div><input type="search" id="search_fur" name="search" placeholder="Rechercher un fursona" <?php if(!empty($search_fur)){?>value="<?=$search_fur?>"<?php } ?>></div>
					<div><button type="submit"><img src="/img/theme/search.png" alt="Search"></button></div>
				</form>
			</div>

			<div id="header-body-right">
				<ul class="menu">
					<li><a href="furidentifier.php">Fur Identifier</a></li>
				</ul>	
			</div>


			<div id="header-body-right">
				<table id="connection-tab">
					<tr>
						<?php if($itconnect == true):?>
							<td><img src="<?php echo $data_avatar; ?>"/></td>
							<td><a href="../account.php<?php echo "?id=$data_id"?>"><?= $_SESSION['auth']->username;?></a></td>
							<td><a href="logout.php"><img src="img/theme/logout.png"/></a></td>
						<?php else: ?>
							<td><img src="../img/theme/profil_default_disconected.png"/></td>
							<td><a href="../login.php">Connexion</a></td>
						<?php endif; ?>
					</tr>
				</table>
			</div>
		</div>
	</nav>

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
</header>



<div id="notif">

	<?php if(Session::getInstance()->hasFlashes()): ?>

		<?php foreach(Session::getInstance()->getFlashes() as $type => $message): ?>

				<div class="<?= $type; ?>">

					<?= $message; ?>

				</div>

		<?php endforeach; ?>

	<?php endif;?>

</div>


<script>
	setTimeout(function(){
    var obj = document.getElementById("notif");
    obj.innerHTML = "";
    },5000);
</script>

<script>
	function open_language_menu(){

		liste = document.getElementById("liste_langue");

		if(open != 0){
			liste.style.display = "flex";
			open = 0;
		} else {
			liste.style.display = "none";
			open = 1;
		}
	}
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>