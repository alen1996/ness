<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>

<style>

</style>


<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="grid.css">


</head>
<body onload="UcitajFormuLogin()">
<div id="sve">

<script src="funs.js"></script>

<div class="header">

<h1 id="Gore">
Doom Estate Agency

</h1>
</div>
<div class="sredina">
<div class="row">
<div class="col-3 col-m-3">
 <form name="forma2" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<?php












if(isset($_REQUEST['Odjava']))
{
session_unset();
}
$k=0;

if (isset($_SESSION['username']))
{
echo "<br><input type=submit  value=Odjava name=Odjava>";

$k=1;
}
if((isset($_REQUEST['korisnik']))&&(isset($_REQUEST['pass']))&&(isset($_REQUEST['Signin'])))
{
$xml1 = simplexml_load_file('admini.xml');

foreach ($xml1->children() as $child)
  {

if(($child->username==$_REQUEST['korisnik'])&&($child->pasword==$_REQUEST['pass']))
{echo "Dobro dosli admine";

$_SESSION['username'] =(string)$child->username;
$_SESSION['pasword'] =(string)$child->pasword;



echo "<br><input type=submit  value=Odjava name=Odjava>";
$k=1;
}
}
}
if($k==0){




$userErr = $passErr =  "";

if (isset($_REQUEST['Signin']))
{
if (empty($_POST["korisnik"])) {
    $userErr = "Username je potreban";

  } else {
    $un = test_input($_POST["korisnik"]);

}
if (empty($_POST["pass"])) {
    $passErr = "Password je potrebam";

  } else {
    $pass = test_input($_POST["korisnik"]);
  }
}











echo "Username:<br>";
echo $userErr;
 echo "<input type=text name=korisnik><br>";
echo "Password:<br>";
echo $passErr;
 echo "<input type=password name=pass><br>";


echo "<input type=submit  value=Prijavi se name=Signin>";
echo "<p><a href=passprob.html>Zaboravili ste password?Kliknite ovdje!</a></p><br>";
echo "<p id=greska></p>";
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}





?>
</form>
</div>

<div class="col-6 col-m-9">
<h1>O nama</h1>
<p>Agencija Doom Estate Agency osnovana je u Makedoniji 1997. godine i vazi za jednu od vodecih agencija za nekretnine na Balkanu.
Svakako sa najduzim radom i kontinuiranim prisustvom na trzistu nekretnina, uspjesno i u kontinuitetu poslujemo 18 godina.
U nasem poslovnom pristupu klijent je na centralnom mjestu i vazno nam je da je klijent zadovoljan sa ishodom posla. Imajuci to
u vidu, nastojimo vam pruziti istovremeno profesionalan i prijateljski vid usluge.
Nasa Agencija oglasava Vasu nekretninu na aktuelnim web portalima, kao i printanim medijima te reklamnom bloku na televiziji
(web portali: sigenx.com, pik.ba, nekretnine.ba, market.ba, stampa : Dnevni Avaz, Oslobodjenje, SuperOGLASI sa 100 objava
pojedinacnih oglasa, mediji: TV Alfa i Radio EFM).
Agencija Doom Estate Agency je prepoznatljiva a time i konkurentna na trzistu nekretnina po oglasavanju u elektronskim i printanim medijima u
nasim poslovnicama u Tetovu,Skadru,Novom Pazaru,Presevu,Tirani,kao i Atini.Kako bismo nasu ponudu ucinili dostupnom sto vecem broju klijenata agencija Sigenx je aktivna u izradi analize i ispitivanja
trzista, stalnoj potraznji kupaca i investitora, te posjedujemo listu klijenata koji su prijavili potraznju odredjenih nekretnina.
Nasim klijentima pored usluge posredovanja osiguravamo i kompletnu strucnu uslugu savjetovanja i pravnu pomoc. Obaveze,
prava i odgovornosti izmedju Agencije i klijenta definisane su Ugovorom o posredovanju ( u trajanju 3 ili 6 mjeseci ), pri cemu
vam je osigurana potpuna pravna zastita i sigurnost.

</p>
</div>

<div class="col-3 col-m-12">
<div class="aside">
Adresa:<br>
Put zivota bb<br>
Grad:<br>
Sarajevo:<br>
Telefon:<br>
+38769999999<br>
E-mail:<br>
hotmail@doomnekretnine.com
</div>
</div>

</div>

<div class="row">
<div class="col-3 col-m-3 menu">
<ul>
<li> <a href="Home.php">Home</a></li>
<li> <a href="informacije.php">O nama</a></li>
<li> <a href="kontakt.php">Kontakt</a></li>
<li> <a href="ponuda.php">Ponuda</a></li>

</ul>
</div>

<div class="col-3 col-m-6">

<div class="slideshow-container">

<div class="mySlides ">
  
  <img src="office1.jpg" style="width:100%">

</div>

<div class="mySlides">

  <img src="office2.jpg" style="width:100%">
 
</div>

<div class="mySlides ">
  
  <img src="office3.jpg" style="width:100%">
 
</div>

<a class="prev" onclick="sljedeci(-1)"><</a>
<a class="next" onclick="sljedeci(1)">></a>

</div>
<br>


<script>
var index= 1;
showSlides(index);


</script>
</div>

<div class="col-3 col-m-12">
<div class="aside">
-Profesionalnost<br>
-Efikasnost<br>
-Renome<br>
-Susretljivost<br>
-Uvijek dostupno osoblje<br>
-Ugodna atmosfera<br>
-Ozbiljnost<br>
Posjeti nas!!
</div>
</div>






<div class="col-3 col-m-12">
<div class="aside">
IZABERITE PROFESIONALNOST ! recite NE neovla?tenim agentima i neredu na trzistu. ZASTITITE SVOJA PRAVA
</div>
</div>


<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">�~</span>
      <h2>Prijava</h2>
    </div>
    <div class="modal-body">
      <p>Prijavi se <br></p>
      <form name="forma2" action="forma2.asp" onsubmit="return validacijaForme2()" method="post">
Username:<br>
 <input type="text" name="korisnik"><br>
Password:<br>
 <input type="password" name="password"><br>

 <input type="checkbox" name="Zapamti" value="Remember">Zapamti me<br>
<input type="submit" value="Prijava!"><br>
<p><a href="passprob.html">Zaboravili ste password?Kliknite ovdje!</a></p>
<p id="greska"></p>
</form>


    </div>

  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("Login");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


<div class="row">

</div>

</div>
</div>

<div class="footer">
<p></p>
</div>
</div>
</body>
</html>
