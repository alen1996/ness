<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="grid.css">


</head>
<body onload="UcitajFormuSubs();UcitajFormuLogin()">
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
<ul id="ddlista">

  <li class="dropdown">
    <a href="#" class="dropbtn">Prijava</a>
    <div class="dropdown-content">
      <a href="#Login" id="Login">Login</a>
   <a href="register.php">Register</a>
    </div>
  </li>
</ul>

</div>

<div class="col-6 col-m-9">


<form  id="forma66"   action="forma6.asp" onsubmit="return validacijaForme6()" method="post">


		
		 <p id="r1">Ime1:</p>
 <input type="text" name="klijent" > <br>
		<p id="r2">Grad:</p>
 <input type="text" name="grad"> <br>
		
		
		<p id="r3">Prezime:</p>
<input type="text" name="prezime"> <br>
		<p id="r4">Broj telefona:</p>
 <input type="text" name="brI" 
>


</input> 
		
		
	
		
		
		
		<p id="r5">E-mail adresa:</p>
<input type="text" name="adresa"><br>
	<p id="r6">Password: </p>

<input type="password" name="password"> <br>
		Prihvacam pravila i uvjete koristenja <br>
		
		<input type="checkbox" name="Uslovi"  checked>
		 <br>
<input type="submit" value="Posalji">
<p id="r7"> </p>




	

</form>

</div>
<div class="col-3 col-m-9">

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
<h3>Ako se ne zelite registrovati ali zelite putem maila dobiti obavijesti o novim nekretninama popunite formular ispod</h3>

<form  id="forma99"   action="forma99.asp" onsubmit="return validacijaForme99()" method="post">



		
		
		
		
		
<p id="g100">E-mail adresa:</p>
<input type="text" name="umel">
	
		

 <input type="submit" value="Posalji">
		
	
		
<p id="g99"></p>

	

</form>


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
<button type="submit" form="forma2" value="Submit">Prijava!</button><br>
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







</div>

</div>
</div>




<div class="footer">
<p></p>
</div>



<script>
// Check browser support
var storedValue661 = localStorage.getItem("Ime661");
var storedValue662 = localStorage.getItem("Ime662");
var storedValue663 = localStorage.getItem("Ime663");
var storedValue664 = localStorage.getItem("Ime664");
var storedValue665 = localStorage.getItem("Ime665");
var storedValue666 = localStorage.getItem("Ime666");
document.forms["forma66"]["klijent"].value=storedValue661;
document.forms["forma66"]["grad"].value=storedValue662;
document.forms["forma66"]["prezime"].value=storedValue663;
document.forms["forma66"]["brI"].value=storedValue664;
 document.forms["forma66"]["adresa"].value=storedValue665;
document.forms["forma66"]["password"].value=storedValue666;

</script>







</div>
</body>
</html>
