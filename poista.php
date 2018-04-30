<?php
require_once("tietokanta.php");
$kysely=$yhteys->prepare("delete from toimitukset where id=" . $_GET['id']);
$kysely->execute();
header('location:index.php');
?>
