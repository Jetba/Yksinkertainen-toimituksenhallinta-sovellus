<?php
include("tietokanta.php");

$kysely = $yhteys->prepare("INSERT INTO toimitukset (nimi, yhteyshenkilo, tekija, tasmaaika, lisatieto, tila, osoite, piilotettu) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$kysely->execute(array($_POST["nimi"], $_POST["yhteyshenkilo"], $_POST["tekija"], $_POST["tasmaaika"], $_POST["lisatieto"], $_POST["tila"], $_POST["osoite"], $_POST["piilotettu"]));

$id = $yhteys->lastInsertId();
header("Location: tilaus.php?id=$id");
?>
