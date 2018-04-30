<?php
require_once("tietokanta.php");
if(!empty($_POST["save_record"])) {
	$kysely=$yhteys->prepare("update toimitukset set nimi='" . $_POST[ 'nimi' ] . "', yhteyshenkilo='" . $_POST[ 'yhteyshenkilo' ]. "', tekija='" . $_POST[ 'tekija' ]. "', lisatieto='" . $_POST[ 'lisatieto' ]. "', tila='" . $_POST[ 'tila' ]. "', tasmaaika='" . $_POST[ 'tasmaaika' ]. "', osoite='" . $_POST[ 'osoite' ]. "' where id=" . $_GET["id"]);
	$result = $kysely->execute();
	if($result) {
		header('location:index.php');
	}
}

$kysely = $yhteys->prepare("SELECT * FROM toimitukset where id=" . $_GET["id"]);
$kysely->execute();
$result = $kysely->fetchAll();
?>
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls=$
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
        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Etsi tietokannasta" aria-label$
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Etsi</button>
      </form>
    </nav>
    <div class="container">
    <div class="row">
      <div class="col">
<h4>Muokkaa tietoja</h4>
<form action="" method="POST">
  <p>Asiakkaan nimi: <input type="text" name="nimi" class="form-control" value="<?php echo $result[0]['nimi']; ?>" required  /></p>
  <p>Asiakkaan yhteyshenkilö: <input type="text" name="yhteyshenkilo" class="form-control" value="<?php echo $result[0]['yhteyshenkilo']; ?>" required  /></p>
  <p>Tekijä : <input type="text" name="tekija" class="form-control" value="<?php echo $result[0]['tekija']; ?>" required  /></p>
  <p>Lisätieto: <input type="text" name="lisatieto" class="form-control" value="<?php echo $result[0]['lisatieto']; ?>" required /></p>
  <p>Tila: <select type="text" class="form-control" name="tila" required>
    <option value="Tuleva">Tuleva</option>
    <option value="Aloitettu">Aloitettu</option>
  </select></p>
<p>Täsmäaika: <select class="form-control" name="tasmaaika" required>
  <option value="0">Ei</option>
  <option value="1">Kyllä</option>
</select></p>
  <p>Osoite: <input class="form-control" type="text" name="osoite" value="<?php echo $result[0]['osoite']; ?>" required  /> </p>
	  <input name="save_record" type="submit" value="Save" class="btn btn-info">
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

