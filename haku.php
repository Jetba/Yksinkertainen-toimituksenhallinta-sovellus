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
          <li class="nav-item">
            <a class="nav-link" href="index.php">Toimitukset</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aiemmat.php">Aiemmat toimitukset</a>
          </li>
        </ul>
      </div>
      <form action="haku.php" class="form-inline" method="post">
        <input class="form-control mr-sm-2" type="search"  name="search" placeholder="Etsi tietokannasta" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Etsi</button>
      </form>
    </nav>
    <div class="container">

<?php 
  include ("tietokanta.php");

  $search=$_POST['search'];
  $kysely = $yhteys->prepare("select * from toimitukset where nimi LIKE '%$search%' OR tekija LIKE '%$search%' OR lisatieto LIKE '%$search%' OR osoite LIKE '%$search%' OR yhteyshenkilo LIKE '%$search%'  LIMIT 0 , 50");
  $kysely->bindValue(1, "%$search%", PDO::PARAM_STR);
  $kysely->execute();
  // Display search result
         if (!$kysely->rowCount() == 0) {
		 		echo "Haun tulokset :<br/>";
    echo '<table class="table table-striped">';
    echo "<thead>";
    echo "<tr>";
    echo "<td>Asiakas:</td><td>Yhteyshenkilö:</td><td>Tekijä:</td><td>Lisätieto:</td><td>Tila:</td><td>Osoite:</td><td>Täsmäaika:</td><td>Toiminnot:</td>";
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
      if($rivi["tasmaaika"] == 1)
          $rivi["tasmaaika"] = "Kyllä";
      else
          $rivi["tasmaaika"] = "Ei";
      echo "<td>" . htmlspecialchars($rivi["tasmaaika"]) . "</td>";
      echo "<td><a href=\"tilaus.php?id=$id\" class=\"btn btn-info\">Sisältö</a> <a href=\"palautus.php?id=$id\" class=\"btn btn-info\">Palauta tilaus</a></td>";
      echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
        } else {
            echo 'Nothing found';
        }
?>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

