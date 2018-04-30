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
          <li class="nav-item active">
            <a class="nav-link" href="aiemmat.php">Aiemmat toimitukset <span class="sr-only">(current)</span></a>
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
    include("tietokanta.php");
    $tuloksia_sivulla = 50;
    if (isset($_GET["sivu"])) { $sivu  = $_GET["sivu"]; } else { $sivu=1; };
    $start_from = ($sivu-1) * $tuloksia_sivulla;

    $kysely = $yhteys->prepare("select * from toimitukset where piilotettu = 1 ORDER BY ID DESC LIMIT $start_from, ".$tuloksia_sivulla);
    $kysely->execute();
    echo "<h4>Valmistuneet toimitukset</h4>";

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
    ?>
    <p>Näytetään viimeisimmät 50 työtä<p>
    <?php
    include("tietokanta.php");
    $kysely = $yhteys->prepare("SELECT COUNT(ID) AS total FROM toimitukset where piilotettu = 1;");
    $kysely->execute();
    $row = $kysely->fetch();
    $total_pages = ceil($row["total"] / $tuloksia_sivulla); // calculate total pages with results

    for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
                echo "<a href='aiemmat.php?sivu=".$i."'";
                if ($i==$sivu)  echo " class='curPage'";
                echo ">".$i."</a> ";
    };
    ?>

    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
