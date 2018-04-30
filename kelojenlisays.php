<?php
include("tietokanta.php");

$kysely = $yhteys->prepare("DELETE FROM ilmoitetut where (yritysid) = (?)");
$kysely->execute(array($_POST["yritysid"]));

$kysely = $yhteys->prepare("DELETE FROM toteutuneet where (yritysid) = (?)");
$kysely->execute(array($_POST["yritysid"]));

$kysely = $yhteys->prepare("INSERT INTO ilmoitetut (yritysid, K4, K5, K6, K7, K8, K9, K10, K11, K12, K14, K16, K18, K20, K22, K24, K26, K28, K30, 9PV, 11GW, 12H, 13G, 15GX, FIN, EUR, CADDY) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$kysely->execute(array($_POST["yritysid"], $_POST["K4"], $_POST["K5"], $_POST["K6"], $_POST["K7"], $_POST["K8"], $_POST["K9"], $_POST["K10"], $_POST["K11"], $_POST["K12"], $_POST["K14"], $_POST["K16"], $_POST["K18"], $_POST["K20"], $_POST["K22"], $_POST["K24"], $_POST["K26"], $_POST["K28"], $_POST["K30"], $_POST["9PV"], $_POST["11GW"], $_POST["12H"], $_POST["13G"], $_POST["15GX"], $_POST["FIN"], $_POST["EUR"], $_POST["CADDY"]));

$kysely = $yhteys->prepare("INSERT INTO toteutuneet (huomioitava, yritysid, K4, K5, K6, K7, K8, K9, K10, K11, K12, K14, K16, K18, K20, K22, K24, K26, K28, K30, 9PV, 11GW, 12H, 13G, 15GX, FIN, EUR, CADDY) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$kysely->execute(array($_POST["huomioitava"], $_POST["yritysid"], $_POST["K4"], $_POST["K5"], $_POST["K6"], $_POST["K7"], $_POST["K8"], $_POST["K9"], $_POST["K10"], $_POST["K11"], $_POST["K12"], $_POST["K14"], $_POST["K16"], $_POST["K18"], $_POST["K20"], $_POST["K22"], $_POST["K24"], $_POST["K26"], $_POST["K28"], $_POST["K30"], $_POST["9PV"], $_POST["11GW"], $_POST["12H"], $_POST["13G"], $_POST["15GX"], $_POST["FIN"], $_POST["EUR"], $_POST["CADDY"]));

$id = $_POST["yritysid"];
header("Location: tilaus.php?id=$id");
?>

