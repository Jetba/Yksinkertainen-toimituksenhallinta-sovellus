<!DOCTYPE html>
<html lang="fi">
  <head>
    <title>Jokin hallintasysteemi</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Hallinta</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls=navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Toimitukset</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aiemmat.php">Aiemmat toimitukset</a>
          </li>
        </ul>
      </div>
      <form action="haku.php" class="form-inline" method="post">
        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Etsi tietokannasta" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Etsi</button>
      </form>
    </nav>
    <div class="container">
      <h2>Asiakkaan tiedot</h2>
        <div class="row">
          <div class="col">
          <form class="form-horizontal">
          <?php
          include("tietokanta.php");

          $kysely = $yhteys->prepare("SELECT * FROM toimitukset WHERE id = ?");
          $kysely->execute(array($_GET["id"]));

          $tulos = $kysely->fetch();
          echo "<p>Asiakas: " . htmlspecialchars($tulos["nimi"]) . "</p>";
          echo "<p>Asiakkaan yhteyshenkilö: " . htmlspecialchars($tulos["yhteyshenkilo"]) . "</p>";
          echo "<p>Tilauksen tekijä: " . htmlspecialchars($tulos["tekija"]) . "</p>";
          echo "<p>Lisätiedot: " . htmlspecialchars($tulos["lisatieto"]) . "</p>";
          echo "<p>Tila: " . htmlspecialchars($tulos["tila"]) . "</p>";
          echo "<p>Asiakkaan osoite: " . htmlspecialchars($tulos["osoite"]) . "</p>";

          $id = $tulos["id"];
          echo "<p><a href=\"muokkaa.php?id=$id\" class=\"btn btn-primary\">Muokkaa</a> ";
          echo "<a href=\"poista.php?id=$id\" class=\"btn btn-danger\" onclick=\"return confirm('Oletko varma että haluat poistaa toimituksen?')\">Poista</a> ";
          echo "<a href=\"index.php\" class=\"btn btn-secondary\">Takaisin etusivulle</a>";
          echo "<br />";
          echo "<br />";
          echo "<a href=\"aloitettu.php?id=$id\" class=\"btn btn-info\">Muuta tilaksi aloitettu</a> ";
          echo "<a href=\"tuleva.php?id=$id\" class=\"btn btn-info\">Muuta tilaksi tuleva</a></p>";
          ?>
        </form>
        </div>
        <div class="col">
<h4>Ilmoitetut kelat</h4>
<form action="tilauksenlisays.php" method="post">
<p>K4: <input class="form-control-sm" type="text" name="K4" value="0" required></p>
<p>K5: <input class="form-control-sm" type="text" name="K5" value="0" required></p>
<p>K6: <input class="form-control-sm" type="text" name="K6" value="0" required></p>
<p>K7: <input class="form-control-sm" type="text" name="K7" value="0" required></p>
<p>K8: <input class="form-control-sm" type="text" name="K8" value="0" required></p>
<p>K9: <input class="form-control-sm" type="text" name="K9" value="0" required></p>
<p>K10: <input class="form-control-sm" type="text" name="K10" value="0" required></p>
<p>K11: <input class="form-control-sm" type="text" name="K11" value="0" required></p>
<p>K12: <input class="form-control-sm" type="text" name="K12" value="0" required></p>
<p>K14: <input class="form-control-sm" type="text" name="K14" value="0" required></p>
<p>K16: <input class="form-control-sm" type="text" name="K16" value="0" required></p>
<p>K18: <input class="form-control-sm" type="text" name="K18" value="0" required></p>
<p>K20: <input class="form-control-sm" type="text" name="K20" value="0" required></p>
<p>K22: <input class="form-control-sm" type="text" name="K22" value="0" required></p>
<p>K24: <input class="form-control-sm" type="text" name="K24" value="0" required></p>
<p>K26: <input class="form-control-sm" type="text" name="K26" value="0" required></p>
<p>K28: <input class="form-control-sm" type="text" name="K28" value="0" required></p>
<p>K30: <input class="form-control-sm" type="text" name="K30" value="0" required></p>
<p>9PV: <input class="form-control-sm" type="text" name="9PV" value="0" required></p>
<p>11GW: <input class="form-control-sm" type="text" name="11GW" value="0" required></p>
<p>12H: <input class="form-control-sm" type="text" name="12H" value="0" required></p>
<p>13G: <input class="form-control-sm" type="text" name="13G" value="0" required></p>
<p>15G/X: <input class="form-control-sm" type="text" name="15GX" value="0" required></p>
<p>FIN: <input class="form-control-sm" type="text" name="FIN" value="0" required></p>
<p>EUR: <input class="form-control-sm" type="text" name="EUR" value="0" required></p>
<p>CADDY: <input class="form-control-sm" type="text" name="CADDY" value="0" required></p>
<?php
include("tietokanta.php");

$kysely = $yhteys->prepare("SELECT * FROM toimitukset WHERE id = ?");
$kysely->execute(array($_GET["id"]));
$tulos = $kysely->fetch();
$id = $tulos["id"];
echo "<input type=\"hidden\" name=\"yritysid\" value=$id>"
?>
<input type="hidden" name="huomioitava" value="-">
<p><input type="submit" class="btn btn-info" value="Tallenna ilmoitetut"></p>
</form>
</div>
<?php
include ("tietokanta.php");

$kysely = $yhteys->prepare("SELECT * FROM toteutuneet where yritysid=" . $_GET["id"]);
$kysely->execute(array($_GET["id"]));
$result = $kysely->fetchAll();
?>
      <div class="col">
<h4>Noudetut kelat</h4>
<form action="tilauksenkorjaus.php" method="post">
<p>K4: <input class="form-control-sm" type="text" name="K4" value="<?php echo $result[0]['K4']; ?>"></p>
<p>K5: <input class="form-control-sm" type="text" name="K5" value="<?php echo $result[0]['K5']; ?>"></p>
<p>K6: <input class="form-control-sm" type="text" name="K6" value="<?php echo $result[0]['K6']; ?>"></p>
<p>K7: <input class="form-control-sm" type="text" name="K7" value="<?php echo $result[0]['K7']; ?>"></p>
<p>K8: <input class="form-control-sm" type="text" name="K8" value="<?php echo $result[0]['K8']; ?>"></p>
<p>K9: <input class="form-control-sm" type="text" name="K9" value="<?php echo $result[0]['K9']; ?>"></p>
<p>K10: <input class="form-control-sm" type="text" name="K10" value="<?php echo $result[0]['K10']; ?>"></p>
<p>K11: <input class="form-control-sm" type="text" name="K11" value="<?php echo $result[0]['K11']; ?>"></p>
<p>K12: <input class="form-control-sm" type="text" name="K12" value="<?php echo $result[0]['K12']; ?>"></p>
<p>K14: <input class="form-control-sm" type="text" name="K14" value="<?php echo $result[0]['K14']; ?>"></p>
<p>K16: <input class="form-control-sm" type="text" name="K16" value="<?php echo $result[0]['K16']; ?>"></p>
<p>K18: <input class="form-control-sm" type="text" name="K18" value="<?php echo $result[0]['K18']; ?>"></p>
<p>K20: <input class="form-control-sm" type="text" name="K20" value="<?php echo $result[0]['K20']; ?>"></p>
<p>K22: <input class="form-control-sm" type="text" name="K22" value="<?php echo $result[0]['K22']; ?>"></p>
<p>K24: <input class="form-control-sm" type="text" name="K24" value="<?php echo $result[0]['K24']; ?>"></p>
<p>K26: <input class="form-control-sm" type="text" name="K26" value="<?php echo $result[0]['K26']; ?>"></p>
<p>K28: <input class="form-control-sm" type="text" name="K28" value="<?php echo $result[0]['K28']; ?>"></p>
<p>K30: <input class="form-control-sm" type="text" name="K30" value="<?php echo $result[0]['K30']; ?>"></p>
<p>9PV: <input class="form-control-sm" type="text" name="9PV" value="<?php echo $result[0]['9PV']; ?>"></p>
<p>11GW: <input class="form-control-sm" type="text" name="11GW" value="<?php echo $result[0]['11GW']; ?>"></p>
<p>12H: <input class="form-control-sm" type="text" name="12H" value="<?php echo $result[0]['12H']; ?>"></p>
<p>13G: <input class="form-control-sm" type="text" name="13G" value="<?php echo $result[0]['13G']; ?>"></p>
<p>15G/X: <input class="form-control-sm" type="text" name="15GX" value="<?php echo $result[0]['15GX']; ?>"></p>
<p>FIN: <input class="form-control-sm" type="text" name="FIN" value="<?php echo $result[0]['FIN']; ?>"></p>
<p>EUR: <input class="form-control-sm" type="text" name="EUR" value="<?php echo $result[0]['EUR']; ?>"></p>
<p>CADDY: <input class="form-control-sm" type="text" name="CADDY" value="<?php echo $result[0]['CADDY']; ?>"></p>
<p>Lisätiedot: <input class="form-control-sm" type="text" name="huomioitava"  value="<?php echo $result[0]['huomioitava']; ?>"></p>
<p><input type="submit" class="btn btn-info" value="Tallenna toteutuneet"></p>
<?php
include("tietokanta.php");

$kysely = $yhteys->prepare("SELECT * FROM toimitukset WHERE id = ?");
$kysely->execute(array($_GET["id"]));
$tulos = $kysely->fetch();
$id = $tulos["id"];
echo "<input type=\"hidden\" name=\"yritysid\" value=$id>"
?>

</form>
      </div>
    </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

