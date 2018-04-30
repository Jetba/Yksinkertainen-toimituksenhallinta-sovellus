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
        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Etsi tietokannasta" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Etsi</button>
      </form>
    </nav>
    <div class="container">
<?php
include("tietokanta.php");

$kysely = $yhteys->prepare("UPDATE toimitukset SET tila = 'Valmis', piilotettu = 1 WHERE id = ?");
$kysely->execute(array($_GET["id"]));
?>

<?php
require_once("tietokanta.php");
$kysely = $yhteys->prepare("SELECT * FROM toimitukset where id=" . $_GET["id"]);
$kysely->execute();
$result = $kysely->fetchAll();
?>


<p>Tilauksen tilaksi on muutettu valmis ja tilaus on siirretty aiempiin toimituksiin!</p>

<form action="sahkoposti.php" method="post">
<input type="hidden" class="form-control" name="kuittaaja" value="<?php echo $result[0]['tekija']; ?>">
Asiakkaan nimi: <input type="text" class="form-control" name="nimi" value="<?php echo $result[0]['nimi']; ?>">
Lisätietoa: <br><textarea rows="2" class="form-control" name="lisatieto" cols="30">-</textarea>
<input type="hidden" name="linkki" value="http://rahtikuljetus.fi/hallinta/tilaus.php?id=<?php echo $result[0]['id']; ?>">
<input type="submit" name="submit" class="btn btn-info" value="Lähetä sähköposti ja palaa etusivulle">
</form>

<p><a href="index.php" class="btn btn-info">Palaa etusivulle</a></p>

    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
