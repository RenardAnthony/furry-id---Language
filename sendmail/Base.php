<?php 

if(isset($_POST['mailform'])){

$header="MIME-Version: 1.0\r\n";
$header.='From:"furry-id.com"<contact@furry-id.com>'."\n";
$header.='Content-Type:text/html; charset="uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';


$message='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns:v="urn:shemas-microsoft-com:vml">
    <head>

        <meta http-qequiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">

    </head>
    <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="font-family:\'Trebuchet MS\', Arial, Helvetica, sans-serif;">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody style="text-align: center;">
                <tr>
                    <td bgcolor="#315358" valign="top">
                        <div>
                            <table align="center" width="100%" border="0" cellpadding="0" cellspacing="0" style="color:#ffffff;">
                                <tbody>
                                    <tr><td height="30" style="font-size:30px; line-height: 30px;"></td></tr>
                                    <tr>
                                        <td stlye="text-align: center;">
                                            <a href="http://www.furry-id.com" style="text-decoration: none; color:#ffffff;">
                                                <img alt="logo foxflight" src="http://furry-id.com/img/theme/Logo_site_nb.png" width="100px" border="0">
                                            <h1>FURRY-ID.COM</h1></a>
                                        </td>
                                    </tr>
                                    <tr><td height="30" style="font-size:30px; line-height: 30px;"></td></tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <table bgcolor="#163236" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody style="text-align: center;">
                <tr>
                    <td bgcolor="#163236" valign="top">
                        <div>
                            <table align="center" width="100%" border="0" cellpadding="0" cellspacing="0" style="color:#ffffff;">
                                <tbody>
                                    <tr><td height="30" style="font-size:30px; line-height: 30px;"></td></tr>
                                    <tr>
                                        <td stlye="text-align: center;">
                                            <a href="http://foxfliy.cluster030.hosting.ovh.net"></a>
                                            <p><img src="http://www.furry-id.com/img/flags/fr.svg" alt="French version :" style="height: 20px; margin: 0 1em;">Bienvenue ! Tu à crée t\'on compte sur Furry-id.com ! <br> Pour validé t\'on inscription il te sufit de cliquer sur le boutton juste en dessous.</p>
                                            <p><br><br></p>
                                            <p><img src="http://www.furry-id.com/img/flags/gb.svg" alt="English version :" style="height: 20px; margin: 0 1em;">Welcome ! You created your account on Furry-id.com ! <br> To validate your registration, you just have to click on the button just below.</p>
                                        </td>
                                    </tr>
                                    <tr><td height="30" style="font-size:30px; line-height: 30px;"></td></tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <table bgcolor="#163236" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center"><table border="0" cellspacing="0" cellpadding="0" style="margin:0px auto;" align="center" role="presentation">
                <tr><td height="30" style="font-size:30px; line-height: 30px;"></td></tr>
                  <tr>
                    <td bgcolor="#202021" style="
						border-radius:5px;
						-moz-border-radius:5px;
						-webkit-border-radius:5px; padding:15px 40px;
						background-color:#202021; background:#202021;">
						<a href="http://www.furry-id.com/confirm.php?id=$user_id&token=$token" target="_blank" style="
								color:#FFFFFF;
								text-decoration:none
								">Confirmed
						<p style="
							padding:0px;
							margin:0px;
							font-family:\'Trebuchet MS\', Arial, Helvetica, sans-serif;
							font-size:12px;
							text-align:center;
							color:#FFFFFF;
							mso-line-height-rule:exactly;
							line-height:16px;">
						</p></a>
					</td>
                  </tr>
                </table></td>
            </tr>
            <tr><td height="30" style="font-size:30px; line-height: 30px;"></td></tr>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody style="text-align: center;">
                <tr>
                    <td bgcolor="#315358" valign="top">
                        <div>
                            <table align="center" width="100%" border="0" cellpadding="0" cellspacing="0" style="color:#ffffff;">
                                <tbody>
                                    <tr><td height="30" style="font-size:30px; line-height: 30px;"></td></tr>
                                    <tr>
                                        <td stlye="text-align: center;">
                                            <p>If you are not the recipient of this mail. Please don\'t answer it.</p>
                                            <p>Si vous êtes pas le destinataire de ce mail. Merci de ne pas y répondre.</p>
                                        </td>
                                    </tr>
                                    <tr><td height="30" style="font-size:30px; line-height: 30px;"></td></tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
';


mail("spammoi14@gmail.com", "Test de message", $message, $header);
}
?>

<form method="POST" action="">
	<input type="submit" value="Recevoir un mail !" name="mailform"/>
</form>