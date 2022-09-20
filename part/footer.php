<footer id="footer">


	<?php

		if(isset($_COOKIE['accept_cookie'])){
			$showcookie = false;
		} else {
			$showcookie = true;
		} 
	?>
	
	
	<?php if($showcookie){ ?>
		<div id="cookie-alert">
			<table>
				<tr><img src="../img/theme/cookie.png" alt=""></tr>
				<tr>
					<td colspan="2"><h1>Ce site web utilise des cookies.</h1></td>
				</tr>
				<tr>
					<td colspan="2"><p>Et vous, voulez-vous des cookies ?</p></td>
				</tr>
				<tr>
					<td><a href="../class/Accept_cookie.php?cookiechoix=true"><button id="cookie_yes">OUI</button></a></td>
					<td><a href="../class/Accept_cookie.php?cookiechoix=false"><button id="cookie_no">NON</button></a></td>
				</tr>
			</table>
		</div>
	<?php } ?>

	<table>
		<tr>
			<td><a href="../cdu.php">Conditions d'utilisation</a></td>
			<td><a href="../pdc.php">Politique de confidentialité</a></td>
		</tr>
		<tr>
			<td colspan="2" id="copyright"><p>© Furry-id.com base de donnée</p></td>
		</tr>
		<tr>
			<td colspan="2" id="version"><p>v0.1.2</p></td>
		</tr>
	</table>
</footer>