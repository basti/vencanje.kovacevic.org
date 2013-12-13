<?php
// change the 4 variables below
$yourName = 'Vencanje';
$yourEmail = 'basti@orangeiceberg.com';
$yourSubject = 'vencanje.kovacevic.org: ';
$referringPage = 'http://vencanje.kovacevic.org';
// no need to change the rest unless you want to. You could add more error checking...

header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';

echo '<resultset>';

function cleanPosUrl ($str) {
$nStr = $str;
$nStr = str_replace("**am**","&",$nStr);
$nStr = str_replace("**pl**","+",$nStr);
$nStr = str_replace("**eq**","=",$nStr);
return stripslashes($nStr);
}
	if ( $_GET['contact'] == true && $_GET['xml'] == true && isset($_POST['posText']) ) {
	$to = $yourEmail;
	$subject = $yourSubject . cleanPosUrl($_POST['posRegard']);
	$message = cleanPosUrl($_POST['posText']);
	$headers = "From: ".cleanPosUrl($_POST['posName'])." <".cleanPosUrl($_POST['posEmail']).">\r\n";
	$headers .= 'To: '.$yourName.' <'.$yourEmail.'>'."\r\n";
	$mailit = mail($to,$subject,$message,$headers);
		
		if ( @$mailit )
		{ $posStatus = 'OK'; $posConfirmation = 'Poruka je poslata!.'; }
		else
		{ $posStatus = 'NOTOK'; $posConfirmation = 'Došlo je do greške. Poruka nije poslata.'; }
		
		if ( $_POST['selfCC'] == 'send' )
		{
		$ccEmail = cleanPosUrl($_POST['posEmail']);
		//@mail($ccEmail,$subject,$message,"From: Yourself <".$ccEmail.">\r\nTo: Yourself");
		}
	
	echo '
		<status>'.$posStatus.'</status>
		<confirmation>'.$posConfirmation.'</confirmation>
		<regarding>'.cleanPosUrl($_POST['posRegard']).'</regarding>
		';
	}
echo'	</resultset>';

?>