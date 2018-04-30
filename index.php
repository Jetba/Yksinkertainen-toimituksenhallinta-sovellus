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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Toimitukset <span class="sr-only">(current)</span></a>
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
    <?php
    include("tietokanta.php");
    $kysely = $yhteys->prepare("select * from toimitukset where tasmaaika = 1 and not piilotettu= 1");
    $kysely->execute();
    echo "<h4>Täsmäaikana tehtävät toimitukset</h4>";

    echo '<table class="table table-striped">';
    echo "<thead>";
    echo "<tr>";
    echo "<td>Asiakas:</td><td>Yhteyshenkilö:</td><td>Tekijä:</td><td>Lisätieto:</td><td>Tila:</td><td>Osoite:</td><td>Toiminnot:</td>";
    echo "</tr>";
    echo "</thead>";

    echo "<tbody>";
    while ($rivi = $kysely->fetch()) {
      $id = $rivi["id"];
      echo "<tr>";
      echo "<td>" . htmlspecialchars($rivi["nimi"]) . "</td>";
      echo "<td>" . htmlspecialchars($rivi["yhteyshenkilo"]) . "</td>";
      echo "<td>" . htmlspecialchars($rivi["tekija"]) . "</td>";
      echo "<td>" . htmlspecialchars($rivi["lisatieto"]) . "</td>";
      echo "<td>" . htmlspecialchars($rivi["tila"]) . "</td>";
      echo "<td>" . htmlspecialchars($rivi["osoite"]) . "</td>";
      echo "<td><a href=\"tilaus.php?id=$id\" class=\"btn btn-info\">Sisältö</a> <a href=\"valmis.php?id=$id\" class=\"btn btn-info\">Valmis</a></td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";

    $kysely = $yhteys->prepare("SELECT * FROM toimitukset where tasmaaika = 0 and not piilotettu= 1");
    $kysely->execute();
    echo "<h4>Oman aikataulun mukaan tehtävät toimitukset</h4>";

    echo '<table class="table table-striped">';
    echo "<thead>";
    echo "<tr>";
    echo "<td>Asiakas:</td><td>Yhteyshenkilö:</td><td>Tekijä:</td><td>Lisätieto:</td><td>Tila:</td><td>Osoite:</td><td>Toiminnot:</td>";
    echo "</tr>";
    echo "</thead>";

    echo "<tbody>";
    while ($rivi = $kysely->fetch()) {
      $id = $rivi["id"];
      echo "<tr>";
      echo "<td>" . htmlspecialchars($rivi["nimi"]) . "</td>";
      echo "<td>" . htmlspecialchars($rivi["yhteyshenkilo"]) . "</td>";
      echo "<td>" . htmlspecialchars($rivi["tekija"]) . "</td>";
      echo "<td>" . htmlspecialchars($rivi["lisatieto"]) . "</td>";
      echo "<td>" . htmlspecialchars($rivi["tila"]) . "</td>";
      echo "<td>" . htmlspecialchars($rivi["osoite"]) . "</td>";
      echo "<td><a href=\"tilaus.php?id=$id\" class=\"btn btn-info\">Sisältö</a> <a href=\"valmis.php?id=$id\" class=\"btn btn-info\">Valmis</a></td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";

    ?>
  </div>
  <div class="container">
    <div class="row">
      <div class="col">
<h4>Tilauksen lisäys</h4>
<form action="lisaa.php" method="post">
<p>Asiakas: <input class="form-control" type="text" name="nimi" required></p>
<p>Asiakkaan yhteyshenkilö: <input class="form-control" type="text" name="yhteyshenkilo" required></p>
<p>Tekijä: <input class="form-control" type="text" name="tekija" required></p>
<p>Täsmäaika: <select class="form-control" name="tasmaaika">
  <option value="0">Ei</option>
  <option value="1">Kyllä</option>
</select></p>
<p>Lisätieto (Esimerkiksi täsmäaika): <input class="form-control" type="text" value="-" name="lisatieto" required></p>
<p>Tila: <select class="form-control" name="tila">
  <option value="Tuleva">Tuleva</option>
  <option value="Aloitettu">Aloitettu</option>
</select></p>
<p>Osoite: <input class="form-control" type="text" name="osoite" required></p>
<input type="hidden" name="piilotettu" value="0">
<p><input type="submit" class="btn btn-info" value="Lisää"></p>
</form>
      </div>
        <div class="col">
        </div>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
