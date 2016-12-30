
<?php
// Start the session
session_start();
?>



<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="grid.css">


</head>
<body onload="UcitajFormuKontakt();UcitajFormuLogin()">

<?php
// Start the session
$nameErr = $emailErr= "";

if(isset($_POST["Upit"]))
{
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (empty($_POST["adresa"])) {
 $emailErr = "Email se mora popunit";
 }
else {
    $email = test_input($_POST["adresa"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Pogresan format e maila";
    }
  }


 if (empty($_POST["fname"])) {
    $nameErr = "*Prazno";
  }


}


}




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>



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






?>
</form>
</div>

<div class="col-6 col-m-9">


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Tiket:<br>
<p id="gs">Subjekt:</p><br>
<select class="testSelect">
  <option value="Kupovina">Kupujem nekretninu</option>
  <option value="Prodaja">Prodajem nekretninu</option>
  <option value="Ostalo">Ostalo</option>

</select>

<br>
<p id="g1">E-mail adresa:</p>
<input type="text" name="adresa">
<?php echo $emailErr;?>
<p id="g2">Pitanje:</p>


<textarea rows="4" cols="20"  name="fname" title="First Name" style="color:#888;" 
   ></textarea>
<?php echo $nameErr;?>
<br>
<input type="submit" value="Posalji" name="Upit">
<p id="end1"></p>
</form>







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

<div class="col-6 col-m-6">
<div id="map" style="width:100%;height:200px;">

<script>
function myMap() {
  var mapCanvas = document.getElementById("map");
  var mapOptions = {
    center: new google.maps.LatLng(51.5, -0.2),
    zoom: 10
  }
  var map = new google.maps.Map(mapCanvas, mapOptions);

}
</script>

<script async defer
 src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>

</div>

</div>




<div class="col-3 col-m-12">
<div class="aside">
Vrsimo usluge <br>
-Prodaja nekretnina<br>
-Iznajmljivanje nekrentnina<br>
-Pravni savjeti<br>
-Procjena vrijednosti<br>
</div>
</div>


<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">Å~</span>
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
<div id="modall">
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
</div>

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
