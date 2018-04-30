<?php
try {
  $yhteys = new PDO("mysql:host=localhost;dbname=tietokanta", "käyttäjätunnus", "salasana");
} catch (PDOException $e) {
  die("Voi rähmä: " . $e->getMessage());
}
$yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$yhteys->exec("SET NAMES utf8");
?>
