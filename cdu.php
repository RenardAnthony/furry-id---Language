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
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/theme.css"/>
		<link rel="stylesheet" href="css/cduetconfidentialiter.css"/>
		<link rel="shortcut icon" type="image/png" href="img/theme/favicon.png"/>
		<title>Furry-id.com</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0, maximum-scale=1.0">
		<script src="https://kit.fontawesome.com/d5d0318cf5.js" crossorigin="anonymous"></script>
	</head>

	<body>
			<?php include("part/header.php");?>

			<div class="para">
				<h1>Condition d'utilisation</h1>
				<p>À jour le : 06/06/2021</p>
				<p>Auteur : _name_</p>
			</div>

			<div class="para">
				<h1>Déclaration</h1>
				<p>
					Les présentes conditions générales de vente créent un accord légal et s'appliquent à toutes les commandes et à toutes les ventes de prestations et produits conclues entre le client (désigné comme « le client ») et le photographe _name_ (désigné comme « la FOXCAM »). <br> <br>
					Elles sont acceptées pleinement et sans réserve par le client. la FOXCAM se réserve le droit de modifier, à tout moment les présentes conditions générales. Chaque commande est régie par les conditions générales applicables à la date de la commande.
				</p>
				<p>Les précédente déclaration sont visible dans les <em><a href="../cdu_archives/cdu_liste.php">archives</a></em> .</p>
			</div>

			<div class="para">
				<h1>Article 1 - Objet</h1>
				<p>
					La FOXCAM propose des prestations de photographique, d'enregristrement vidéo et de montages privées et publiques telles que présentées sur leur site Internet : www.foxcam.fr <br><br>

					Le fait de réserver une tournage équivaut à la passation d'une commande par le client et entraîne l'adhésion sans réserve aux présentes conditions générales de vente, sauf conditions particulières consenties par la FOXCAM au client. <br> <br>

					Tout autre document que les présentes CGV et notamment catalogue, prospectus, publicités, notices, n'a qu'une valeur informative et indicative, non contractuelle. <br> <br>

					Les présentes conditions générales de vente forment un document contractuel indivisible avec le contrat de la prestation signé par le client.

				</p>
			</div>

			<div class="para">
				<h1>ARTICLE 2 – COMMANDE</h1>
				<p>
					La commande n'est qu'effective qu'après réception de l'acompte et doit être validée par un contrat/devis signé par le client reprenant les informations pratiques (date, lieu, ...). Ce dernier pourra être signé en ligne ou retourné signé au photographe par envoi d'email ou par couriel. A défaut de paiement de l'acompte et réception du contrat, la FOXCAM ne s'engage pas à garder la date. <br> <br>

					Toute commande de montage doit être réglée au résultat la FOXCAM vous donnera ce montant avent de commancer le montage.
				</p>
			</div>

			<div class="para">
				<h1>ARTICLE 3 – TARIFS & MODALITÉS DE PAIEMENT</h1>
				<p>
					3.1 Les prix sont exprimés en euro (€) et sont affichés toutes taxes comprises. Les tarifs affichés sur le site www.foxcam.fr peuvent faire l'objet de modifications sans préavis ou information préalable. S'ils sont amenés à varier, toute prestation préalablement fixée gardera le tarif appliqué lors de la prise de commande. <br><br>

					3.2 Un acompte de 50% sera demandé afin de valider une commande. Il pourra être réglé par virement bancaire, ou espèces. Dans le cas ou la FOXCAM ne prend pas en charge le montage, le solde sera payé par le client par espèces le jour de la prestation. Dans le cas ou la FOXCAM prend en charge le montage, le solde sera à payé par le client par un virement le jour de la prévisualisaton du fichier. Tout frais relatif au règlement effectué à partir d'une monnaie étrangère est à l'entière charge du Client. Aucune ristourne pour paiement comptant ou anticipé ne peut être accordée.<br><br>

					3.3 Le non-paiement du solde entraîne l'annulation du projet, sans remboursement de l'acompte reçu. La vidéo terminer ne se fera envoyer que lorsque la commande sera totalement payée.<br><br>

					3.4 La commande et le devis peuvent également être validés de manière électronique, par envoi d'un mail dans lequel sera stipulé : « j'accepte les conditions générales de vente ».

					3.5 Les devis établis par la FOXCAM sont valables 30 jours.
				</p>
			</div>

			<div class="para">
				<h1>ARTICLE 4 – FRAIS DE DÉPLACEMENT</h1>
				<p>
					Les frais de déplacement sont inclus dans la limite de 50km compteur (l'aller/retour ne doit pas dépasser 100 kilomètres), depuis la rocade de Bordeaux. Au-delà, les frais de transport et les éventuels autres frais seront à la charge du client au réel ainsi qu'une indemnité dépendant de la durée du transport et des éventuels temps d'attente.
					<br> <br>
					En cas de restriction d'usage du véhicule de la FOXCAM imposé par la loi (restriction « crit'air », journée pair/impair...) la FOXCAM se réserve le droit de facturer au Client les éventuelles pénalités/amendes qu'il subit afin d'assurer le bon déroulé de sa prestation (frais appliqués au réel).
				</p>
			</div>
			<div class="para">
				<h1>ARTICLE 5 – MODIFICATION DE LA PRESTATION</h1>
				<p>
					Toute demande de modification d'une prestation sollicitée par un client ne pourra être prise en compte que si la demande est envoyée par SMS ou par email a la FOXCAM au moins 7 jours avant la date prévue de la prestation. Conformément aux dispositions légales en vigueur, le client dispose d'un délai de rétractation de 14 jours à compter de la conclusion du contrat. Toute demande de rétractation effectuée dans le délai imparti entrainera le remboursement de l'acompte. A moins que la prestation ait déjà été réalisée en totalité ou en partie.
					<br> <br>
					En cas d'annulation de la réservation d'une prestation devenue définitive, il est rappelé que conformément aux dispositions légales, le montant de l'acompte ne sera pas remboursé, sauf cas de force majeure pour le client.
				</p>
			</div>
			<div class="para">
				<h1>ARTICLE 6 – RÉALISATION DE LA PRESTATION</h1>
				<p>
					Les tournage sont réalisées par _name_. la FOXCAM n'est pas soumis à une obligation de résultat. Il met tous les moyens en œuvre pour fournir des images de qualité, tel que stipulé dans la commande. Le contenu de ces images est laissé à l'appréciation artistique de la FOXCAM. En conséquence, les clients reconnaissent que les imges ne sont pas soumises à un rejet en fonction des goûts du client.
				</p>
			</div>
			<div class="para">
				<h1>ARTICLE 7 – OBLIGATION DU CLIENT</h1>
				<p>
					L'heure fixée pour la prestation est impérative et tout retard des clients pourra être imputé du temps préalablement convenu pour le tournage. Au delà de 30 minutes de retard sens nouvelle du clients, la séance sera annulée et l'acompte ne sera pas remboursé. Les clients déclarent être majeurs, passeront librement devant les cameras et le cas échéant autoriser des prises de vues de leurs enfants selon le style de tourange qu'ils souhaitent. la FOXCAM ne pourra être gêné durant sa prestation par des photographes/vidéaste amateurs.
					<br> <br>
					Les enfants présents lors des séances restent sous l'entière responsabilité des parents. En cas de dégâts matériels causés par le client ou l'enfant ou toute autre personne liée aux clients, le client prendra à sa charge le remboursement du matériel dans son intégralité.
				</p>
			</div>
			<div class="para">
				<h1>ARTICLE 8 – POST-TRAITEMENT</h1>
				<p>
					La FOXCAM propose une offre images brutes appeller option CarteSD. Si vous fourniser les suport d'enregistrement, les fichier vous appartien. Le montage, au même titre que la prise de vue, est propre a la FOXCAM et fait partie intégrante de son travail, son style et son univers artistique. la FOXCAM est la seul à décider du montage qu'elle appliquera.
					<br> <br>
					Le montage de votre vidéo présente de nombreux paramètres tels que la colorimétrie, l'assemblage, le son, voix off, transition, etc... Toute retouche supplémentaire (ajout d'éléments virtuel dans la vidéo, FX) demandée par le client n'est pas inclus dans la prestation de base et sera acceptée ou non par la FOXCAM qui se réserve le droit de facturer le travail supplémentaire. Seules les images traitées par la FOXCAMs seront exploitables par les deux parties.
				</p>
			</div>
			<div class="para">
				<h1>ARTICLE 9 – DURÉE DE CONSERVATION</h1>
				<p>
					À compter de l'envois du/des fichier au client, les vidéo sont conservées et archivées 3 mois et peuvent être renvoyés si nécessaire. Au dela de cette periode le client est invité à effectuer des sauvegardes sur des supports variés. La FOXCAM se détache de toute responsabilité en cas de perte ou détérioration des fichiers numériques remis au client.
				</p>
			</div>
			<div class="para">
				<h1>ARTICLE 10 – RESPONSABILITÉ</h1>
				<p>
					10.1 Conditions atmosphériques
					<br> <br>
					En cas de conditions atmosphériques dégradées comme par exemple, orages, tempêtes, pluies importantes, etc, la FOXCAM ne pourra être tenu responsable de la non exécution ou de l'exécution partielle des prestations en extérieur initialement prévues à la commande. la séance sera au choix du client, reportée à une date ultérieure, ou rembourcé en partie.
					<br> <br>
					10.2 Force majeure ou maladie
					<br> <br>
					Est considéré comme force majeure un événement extérieur imprévisible et rendant impossible l'exécution de la prestation (accident, décès d'un parent, ...). Chacune des parties pourra opposer ce droit dès lors où la force majeure est caractérisée. La FOXCAM se réserve le droit d'annuler/reporter une prestation en cas de force majeure ou maladie. Une telle annulation ne pourra ni engager sa responsabilité ni donner lieu au versement de dommages et intérêts à quelque titre que ce soit.
					<br> <br>
					10.3 Problème technique et accident
					<br> <br>
					La FOXCAM s'engage à se munir de matériel en suffisance pour assurer l'ensemble de ses prestations et à veiller à faire usage de matériel en bon état d'entretien et de fonctionnement. En cas de problème technique avec le matériel ou d'un accident quelconque pendant la prestation empêchant la FOXCAM de remettre le travail demandé, l'intégralité du montant versé sera remboursé, sans pour autant donner lieu au versement de dommages et intérêts à quelque titre que ce soit. En cas de perte ou de détérioration des imges avant leur envois (cambriolage, incendie, piratage...), le client ne pourra prétendre qu'au remboursement de la prestation.
				</p>
			</div>
			<div class="para">
				<h1>ARTICLE 11 – PROPRIÉTÉ INTELLECTUELLE</h1>
				<p>
					11.1 Les imges constituent des œuvres de l'esprit, telles que définies par le code de la propriété intellectuelle, dont la FOXCAM est l'auteur (art. L112-2 CPI). Les imges sont réservées à une utilisation personnelle et privée des clients, utilisation soumise, sur quelques supports que ce soient, au respect des dispositions du code de la propriété intellectuelle, et plus généralement des lois et conventions en matière de droits d'auteur. Aucune imges ne peut ainsi être modifiée de quelque manière que ce soit, sans accord écrit et préalable de l'auteur. Les clients s'engagent à respecter l'intégrité des œuvres de la foxcam, et notamment à en rendre fidèlement les couleurs, sans les tronquer ou les déformer. (art. L121-1 CPI)
					<br> <br>
					11.2 La communication des supports (originaux et imges stockées sur un support informatique) n'entraîne, ni ne présume la cession des droits d'exploitation sur les imges (droit reproduction et/ou de représentation).
					<br> <br>
					11.3 Les images, en format numérique ou analogique, demeurent la propriété de leur auteur ou de ses ayants droits. (art. L111-3 CPI). Toute utilisation, quelle qu'elle soit (diffusion, exposition, reproduction...), autre que strictement personnelle, d'une image est donc interdite sans l'accord écrit et préalable de l'auteur.
					<br> <br>
					11.4 Pour les besoins d'utilisation des vidéo dans un autre cadre que le cadre privé, la FOXCAM évalue le montant relatif aux droits d'auteurs, montant dépendant du mode de diffusion et du volume de diffusion.
					<br> <br>
					11.5 Toute utilisation des vidéo au-delà de cet usage et sans son autorisation écrite sont constitutives de contrefaçon au sens de l'article L 335- 2 du même Code, et sont punissables, en vertu de cet article, de peines pouvant aller jusqu'à 3 ans d'emprisonnement et 300.000 € d'amende.
				</p>
			</div>
			<div class="para">
				<h1>ARTICLE 12 – DROIT A L'IMAGE</h1>
				<p>
					Les imges pourront être librement utilisées par l'auteur, sur tous supports, afin d'assurer la promotion de son activité professionnelle, sous réserve du respect des droits des personnes et des biens filmé et sauf demande explicite du Client exprimée par écrit avant la signature du devis/validation de la commande. Les clients acceptent que leur image soit utilisée sur tous supports promotionnels du photographe, tel que site internet, réseaux sociaux, plaquette de présentation, article de presse... Le droit à l'image est confié pour une durée de 2 ans, renouvelé par tacite reconduction.
					<br> <br>
					la FOXCAM s'interdit d'exploiter toute photographie susceptible de porter atteinte à la vie privée, à l'image ou à la réputation des clients.
					<br> <br>
					Le Client peut librement s'opposer à la cession du droit à l'image. Il doit cependant impérativement le mentionner par écrit (courriel, ou mention sur devis) avant la signature du devis/validation de la commande. Ce refus constitue un manque pour la communication de la FOXCAM qui se réserve le droit de facturer une majoration de 10% sur le montant total de la prestation en question.
				</p>
			</div>
			<div class="para">
				<h1>ARTICLE 13 – DONNÉES À CARACTÈRE PERSONNEL</h1>
				<p>
					Les informations personnelles recueillies lors de la passation d'une commande sont destinées exclusivement à assurer la gestion de la clientèle et notamment le suivi des réservations en vue de la bonne réalisation de la prestation commandée.
					<br> <br>
					la FOXCAM s'engage à ne pas communiquer ces informations à des tiers pour quelque raison que ce soit.
				</p>
			</div>
			<div class="para">
				<h1>ARTICLE 14 – LOI APPLICABLE</h1>
				<p>
					Les relations contractuelles entre parties auxquelles s'appliquent les présentes conditions générales sont régies exclusivement par le droit français.
					<br> <br>
					Tout litige relatif à la formation, à l'exécution ou à l'interprétation des présentes conditions générales ainsi qu'à toutes conventions auxquelles elles s'appliquent, sera, à défaut d'accord amiable, soumis à la compétence exclusive des juridictions françaises. Toute action en justice devra se faire auprès d'un tribunal situé dans le département de résidence de la FOXCAM.
					<br> <br>
					Le client reconnaît avoir pris connaissance des conditions générales de vente ci-dessus.
				</p>
			</div>

			<div class="para">
				<h1>Obligation Made in France</h1>
				<p>
					_name_ directeur FOXCAM<br/><br/>
					17 bis rue des écoles 33520 Bruges, France<br/>
					contact@foxcam.fr<br/>
					En cas de réponse tardive :<br/>
					06.68.86.13.17<br/><br/>

					N° de Siren : 879 539 690<br/><br/>

					Site créé par : _name_<br/>
					Héberger à la foxcam<br/>

				</p>
			</div>

			<div id="inspir"><p>Inspirer de : Flight By Wire</p></div>

			<?php include("part/footer.php");?>
	</body>
</html>