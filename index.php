<?php
// Start the session
session_start();
?>


<!DOCTYPE html>
<html>
<head>






<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="grid.css">




<script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>







</head>
<body onload="UcitajFormuLogin()">


<script src="funs.js"></script>
<div id="sve">
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
<h1>Doom agencija od sada i u Vasem gradu</h1>

<p>Doom Estate agency je agencija za nekretnine koja vec duzi niz godina uspjesno posluje 
u zemljama u razvoju,kao sto su Kosovo,Makedonija,Albanija,Srbija  i Grcka.Od dana 1.11.2016 
rijeseni su i svi administracijski problemi ,pa je tako agencija tj. njena filijala  i zvanicno registrovana.
Zbog toga vas dana 23.11.2016 sve pozivamo u nase sjediste u ulici "Put zivota bb" kako bi svi zajedno proslavili.
Osim besplatnih pica i hrane,one najsretnije ocekuju i druge vrijedne nagrade 
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
<?php
if (isset($_SESSION['username']))
echo "<li> <a href=p33.php>Editovanje</a></li>";



?>
</ul>
</div>

<div class="col-6 col-m-3">

<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 


<input type="text"   placeholder="Unesi id nekretnine ili opis"       size="30" onkeyup="showResult(this.value)"  name="Pretraga">
<div id="livesearch"></div>

<input type="submit"  value="Pretrazi" name="Pretraga1"><br>
</form>






<?php

if ((isset($_REQUEST['Pretraga1']))&&(!empty($_POST["Pretraga"])))
{
$q=$_REQUEST["Pretraga"];

echo "Rezultati pretrage za rijec ";
echo $q;
echo "<br>";
 $hint="";
$xmlDoc=new DOMDocument();
$xmlDoc->load("nekretnine.xml");

$x=$xmlDoc->getElementsByTagName('nekretnina');
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('naziv');
    $z=$x->item($i)->getElementsByTagName('id');
   $l=$x->item($i)->getElementsByTagName('cijena'); 
    $m=$x->item($i)->getElementsByTagName('ikona');
  if ($y->item(0)->nodeType==1 ||$z->item(0)->nodeType==1  ) {
      //find a link matching the search text
      if ((stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) || (stristr($z->item(0)->childNodes->item(0)->nodeValue,$q)))                {
        if ($hint=="") {
          $hint="<p>" .
          $z->item(0)->childNodes->item(0)->nodeValue .
          "," .
 $l->item(0)->childNodes->item(0)->nodeValue .
          "," .
$m->item(0)->childNodes->item(0)->nodeValue .
          "," .
          $y->item(0)->childNodes->item(0)->nodeValue . "</p>";





        } else {
          $hint=$hint . "<br /><p>" .
          $z->item(0)->childNodes->item(0)->nodeValue .
          "," .
$l->item(0)->childNodes->item(0)->nodeValue .
          "," .
$m->item(0)->childNodes->item(0)->nodeValue .
          "," .
          $y->item(0)->childNodes->item(0)->nodeValue . "</p>";

        }
      }
    }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="Nema rezultata";
} else {
  $response=$hint;
}

//output the response
echo $response;










}
?>


</div>



<div class="col-3 col-m-12">
<div class="aside">
 <a href="pdffile.php">Izvjestaj u pdfu<br></a>
<?php 
if (isset($_SESSION['username']))

echo "<a href=skini.php>CSV file</a>";


?>
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
      <form name="forma2" action="kontakt.php" method="get" onsubmit="return validacijaForme2()">
Username:<br>
 <input type="text" name="korisnik"><br>
<?php echo $userErr;?><br>
Password:<br>
 <input type="password" name="password"><br>
<?php echo $passErr;?><br>
 <input type="checkbox" name="Zapamti" value="Remember">Zapamti me<br>
<input type="submit" value="Prijava!"><br>
<p><a href="passprob.html">Zaboravili ste password?Kliknite ovdje!</a></p><br>
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
