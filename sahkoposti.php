<?php 
if(isset($_POST['submit'])){
    $to = "esi@merkki.fi"; // tähän oma osoite
    $from = "esi@merkki.fi"; // tähän osoite joka näkyy lähettäjänä
    $kuittaaja = $_POST['kuittaaja'];
    $nimi = $_POST['nimi'];
	$linkki = $_POST['linkki'];
    $subject = $nimi . " työ valmistui.";
    $message = $nimi . " työ on kuitattu valmiiksi. Työn tekijäksi on merkitty " . $kuittaaja . ". Linkki työhön: "  . $linkki .  " Lisätiedot: " . "\n\n" . $_POST['lisatieto'];

	$headers = "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From:" . $from . "\r\n";
	
    mail($to, "=?utf-8?B?".base64_encode($subject)."?=", $message, $headers);
    header('Location: index.php');
    }
?>
