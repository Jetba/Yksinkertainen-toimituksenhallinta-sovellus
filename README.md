# Yksinkertainen-toimituksenhallinta-sovellus
Yksinkertaiseen toimituksen hallintaan tarkoitettu sovellus joka toimii PHP:llä ja MySQL tietokannalla.

# Miksi
Harjoitellakseni PHP koodaamista sekä MySQL käyttämistä PHP koodissa.
Tarkoituksena olisi että koodia voi käyttää muuhunkin kuin suunnittelemaani tarkoitukseen minimaalisella muokkaamisella.

Näin jälkikäteen katsoessa tämä onnistui mielestäni hyvin kaikkalla, paitsi tilaus.php jossa tuotteet ovat kiinteästi määritelty. Tähän liittyen myös kela*.php tiedostoissa on myös kiinteät arvot.

# Millä
Sovellus käyttää toimiakseen HTML5 ja PHP7 ohjelmointikieliä sekä MySQL tietokantaa tiedon säilömiseen.
Tyylitiedostona toimii Bootstrap 4, joka on mukana CSS ja JS kansioiden sisällä.

PHP-lisäosista tarvitaan PHP-PDO, jota käytetään sovelluksesta tietokannan hallintaan

# Käyttöönottaminen
Kuten ylempänä mainittu, sovellusta varten tarvitaan php7, mysql/pdo paketti php7 varten, mysql palvelin kuten mariadb sekä http palvelin.
Omassa käytössä olen käyttänyt sovellusta Debianilla, mariadb:n sekä apache2 avulla.

Aloita luomalla oma tietokanta sovellukselle sekä käyttäjä jolla on täysi oikeus tietokantaan.
Tämän jälkeen tuo testi.sql tuotekantaa. Tämä luo tietokantaan tarvittavat sarakkeet sekä tuo muutaman testi-tilauksen.

Nyt muokkaan yhteyttä varten tarvittavat tiedostot tietokanta.php tiedostoon, korvaamalla tietokanta, käyttäjätunnus sekä salasana luomillasi tiedoilla.

Jotta saat valmistumisessa lähetettävän sähköpostin toimimaan, muuta sähköpostiosoitteesi tiedostoon sahkoposti.php.

Prosessi on tällä valmis.

Suosittelen vahvasti suojaamaan sovelluksen sivuston verkkosivupalvelimen suojaustoiminnolla, kuten esimerkiksi apachen basic auth.
Sovelluksessa ei tällä hetkellä ole suojaa sql injectionia vastaan, ja sovellus ei itsessään sisällä kirjautumista.

Mikäli sähköpostin lähetys ei toimi, tarkistathan että palvelimesta löytyy "sendmail" komento. Sovellus käyttää PHP:n mail ominaisuutta, joka nojaa sendmailiin.

# Tuotteiden nimien vaihtaminen

On kaksi vaihtoehtoista tapaa muokata muokata tuotteiden nimet sovelluksessa.
Ensimmäinen vaihtoehto on vain muokata tuotteiden näytettävät nimet tilaus.php tiedostossa, sekä muuttaa tarvitsemattomien tuotteiden nimien perässä oleville <input> kentille määritelty tyyppi piilotetuksi. Tämä onnistuu muuttamalla type="text" -> type="hidden"
Heikkoutena on, että kaikki tieto silti käsitellään ja päivitetään tietokantaan.

Toisena vaihtoehtona on poistaa ylimääräiset kentät koodista sekä olemassa olevien kenttien <p> jälkeen oleva nimi sekä name="" arvo. Tämän jälkeen tulee myös päivittää MySQL komento vastaamaan uutta kelojenkorjaus.php ja kelojenlisays.php tiedostoihin.
Tämä onnistuu muuttamalta riviltä:
$kysely = $yhteys->prepare("INSERT INTO toteutuneet (huomioitava, yritysid, K4, K5, K6, K7, K8, K9, K10, K11, K12, K14, K16, K18, K20, K22, K24, K26, K28, K30, 9PV, 11GW, 12H, 13G, 15GX, FIN, EUR, CADDY) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
Muokatun tuotteen nimi sekä riviltä:
$kysely->execute(array($_POST["huomioitava"], $_POST["yritysid"], $_POST["K4"], $_POST["K5"], $_POST["K6"], $_POST["K7"], $_POST["K8"], $_POST["K9"], $_POST["K10"], $_POST["K11"], $_POST["K12"], $_POST["K14"], $_POST["K16"], $_POST["K18"], $_POST["K20"], $_POST["K22"], $_POST["K24"], $_POST["K26"], $_POST["K28"], $_POST["K30"], $_POST["9PV"], $_POST["11GW"], $_POST["12H"], $_POST["13G"], $_POST["15GX"], $_POST["FIN"], $_POST["EUR"], $_POST["CADDY"]));
kyseisen tuotteen $_POST[""] tieto.

Jos tuotteita halutaan poistaa, tämä onnistuu poistamalla kyseinen rivi tilaus.php tiedostosta sekä poistamalla kyseinen tuote kelojenkorjaus.php ja kelojenlisays.php tiedostoista. Tällöin tulee poistaa myös poistettavien tuotteiden määrä "?," tietoja.

Lisäys taas onnistuu kopioimalla rivi tilaus.php tiedostossa, ja tämän jälkeen lisäämällä tuotteen kelojenkorjaus.php ja kelojenlisays.php tiedostoihin sekä lisäämällä yhden "?," määrityksen "$kysely = $yhteys" rivien loppuun.

# Heikkoudet ja puutteet

Sovelluksen suurimpana heikkoutena uskon olevan tuotteiden vaikean muokkauksen.
Toisena puutteena sovelluksessa on kirjautumisen sekä lokien puute.
