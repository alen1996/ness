

function validacijaForme99() 
{

var x99 = document.forms["forma99"]["umel"].value;
var patt99=/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
var result99=x99.search(patt99);
if(result99!=0)
{
document.getElementById("g100").style.color= "red";

document.getElementById("g99").style.color= "red";
document.getElementById("g99").innerHTML="Greske su obojene u crveno";


}
;








if(result99==0)
{
document.getElementById("g100").style.color= "black";

document.getElementById("g99").style.color= "black";
document.getElementById("g99").innerHTML="";

}
;



localStorage.setItem("umel99", x99);

return false;

}



function UcitajFormuSubs()
{
var storedValue991 = localStorage.getItem("umel99");
document.forms["forma99"]["umel"].value=storedValue991;

}


function UcitajFormuLogin()
{
var storedValue21 = localStorage.getItem("Login");
var storedValue22 = localStorage.getItem("Pass");
document.forms["forma2"]["korisnik"].value=storedValue21;
document.forms["forma2"]["password"].value=storedValue22;
}



function validacijaForme() {
var x = document.forms["forma"]["polje"].value;
if (x == null || x == "") {
alert("Morate unijeti vrijednost poljsa");
return false;
}
}

function validacijaForme2() 
{

var x = document.forms["forma2"]["korisnik"].value;
var y = document.forms["forma2"]["password"].value;

if (x == null || x == ""||y == null || y == "") {
document.getElementById("greska").innerHTML="Jedno od polja je prazno";
}

if (x != null && x != "" &&y != null && y != "") {
document.getElementById("greska").innerHTML="";
}
localStorage.setItem("Login", x);
localStorage.setItem("Pass", y);



return false;

}










function validacijaForme5() {

var x5 = document.forms["forma5"]["adresa"].value;
var y5 = document.forms["forma5"]["fname"].value;
var patt1=/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
var result=x5.search(patt1);

var x=0;
if(result!=0)
{
document.getElementById("g1").style.color= "red";
x=1;
document.getElementById("end1").style.color= "red";
document.getElementById("end1").innerHTML="Greske su obojene u crveno";

}
;



if (y5 == null || y5 == "") {
document.getElementById("g2").style.color= "red";

if(x==0){document.getElementById("end1").style.color= "red";
document.getElementById("end1").innerHTML="Greske su obojene u crveno";;
x=1;
}



}


if (y5 != null && y5 != "") {
document.getElementById("g2").style.color= "black";


}
if (result==0) {
document.getElementById("g1").style.color= "black";


}

var inputEmail=x5;
     localStorage.setItem("email", inputEmail);

var inputPitanje=y5;
localStorage.setItem("pitanje", inputPitanje);
var select = document.querySelector(".testSelect");
var selectOption = select.options[select.selectedIndex];

if(select.selectedIndex!=-1)localStorage.setItem("izbor",selectOption.value);

if(select.selectedIndex==-1)
{document.getElementById("gs").style.color= "red";

}

if(select.selectedIndex!=-1)
{document.getElementById("gs").style.color= "black";

}

if(x==1)return false;

return false;
}




function validacijaForme6() {

var x661 = document.forms["forma66"]["klijent"].value;
var x662 = document.forms["forma66"]["grad"].value;

var x663 = document.forms["forma66"]["prezime"].value;
var x664 = document.forms["forma66"]["brI"].value;
var x665 = document.forms["forma66"]["adresa"].value;
var x666 = document.forms["forma66"]["password"].value;
 localStorage.setItem("Ime661", x661);
localStorage.setItem("Ime662", x662);
localStorage.setItem("Ime663", x663);
localStorage.setItem("Ime664", x664);
localStorage.setItem("Ime665", x665);
localStorage.setItem("Ime666", x666);


var patt665=/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
var result665=x665.search(patt665);
var kraj66=0;
if(result665!=0)
{
document.getElementById("r5").style.color= "red";
kraj66=1;
document.getElementById("r7").style.color= "red";
document.getElementById("r7").innerHTML="Greske su obojene u crveno";

};

if (result665==0) {
document.getElementById("r5").style.color= "black";
}

var patt661=/^[A-Za-z]+$/;

var result661=patt661.test(x661);

if(result661==false)
{
document.getElementById("r1").style.color= "red";
kraj66=1;
document.getElementById("r7").style.color= "red";
document.getElementById("r7").innerHTML="Greske su obojene u crveno";

};

if (result661==true) {
document.getElementById("r1").style.color= "black";
}
var patt662=/^[A-Za-z]+$/;
var result662=patt662.test(x662);
if(result662==false)
{
document.getElementById("r2").style.color= "red";
kraj66=1;
document.getElementById("r7").style.color= "red";
document.getElementById("r7").innerHTML="Greske su obojene u crveno";

};

if (result662==true) {
document.getElementById("r2").style.color= "black";
}



var patt663=/^[A-Za-z]+$/;
var result663=patt663.test(x663);
if(result663==false)
{
document.getElementById("r3").style.color= "red";
kraj66=1;
document.getElementById("r7").style.color= "red";
document.getElementById("r7").innerHTML="Greske su obojene u crveno";

};

if (result663==true) {
document.getElementById("r3").style.color= "black";
}


var patt664=/^[+.]?[0-9]{8,12}[ .]{0,15}$/;
var result664=patt664.test(x664);
if(result664==false)
{
document.getElementById("r4").style.color= "red";
kraj66=1;
document.getElementById("r7").style.color= "red";
document.getElementById("r7").innerHTML="Greske su obojene u crveno";

};

if (result664==true) {
document.getElementById("r4").style.color= "black";
}


var patt666=/^.{6,9}$/;
var result666=patt666.test(x666);
if(result666==false)
{
document.getElementById("r6").style.color= "red";
kraj66=1;
document.getElementById("r7").style.color= "red";
document.getElementById("r7").innerHTML="Greske su obojene u crveno";

};

if (result666==true) {
document.getElementById("r6").style.color= "black";
}







if(kraj66==0){document.getElementById("r7").innerHTML= "";}

return false;
}




function inputFocus(i){
    if(i.value==i.defaultValue){ i.value=""; i.style.color="#000"; }
}
function inputBlur(i){
    if(i.value==""){ i.value=i.defaultValue; i.style.color="#888"; }
}



function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// zatvara se ako se klikne bilo gdje drugo
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); 
}


function funkcijakontakt()
{var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("sve").innerHTML =
      this.responseText;
evalJSFromHtml(this.responseText);
 
    }
UcitajFormuKontakt();
 
UcitajFormuLogin();


  };
  xhttp.open("GET", "kontakt.html", true);
  xhttp.send();
}


function funkcijaOnama()
{var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("sve").innerHTML =
      this.responseText;

     evalJSFromHtml(this.responseText);
  
UcitajFormuLogin();

    }
  };
  xhttp.open("GET", "informacije.html", true);
  xhttp.send();
}








function UcitajFormuKontakt()
{

var storedValue51 = localStorage.getItem("email");
document.forms["forma5"]["adresa"].value=storedValue51;
var storedValue52 = localStorage.getItem("pitanje");
document.forms["forma5"]["fname"].value=storedValue52;
var storedValue53 = localStorage.getItem("izbor");
var select = document.querySelector(".testSelect");
select.value = storedValue53; 
}

function funkcijaHome()
{var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("sve").innerHTML =
      this.responseText;
    evalJSFromHtml(this.responseText);

UcitajFormuLogin();

    }
  };
  xhttp.open("GET", "Home.html", true);
  xhttp.send();
}


function funkcijaPonuda()
{var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("sve").innerHTML =
      this.responseText;
      evalJSFromHtml(this.responseText);

UcitajFormuLogin();

    }
  };
  xhttp.open("GET", "ponuda.html", true);
  xhttp.send();
}

function funkcijaRegister()
{var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("sve").innerHTML =
      this.responseText;
      UcitajFormuRegister();
UcitajFormuSubs();

UcitajFormuLogin();
evalJSFromHtml(this.responseText);
    }
  };
  xhttp.open("GET", "register.html", true);
  xhttp.send();
}



function UcitajFormuRegister()
{

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

}






function evalJSFromHtml(html) {
  var newElement = document.createElement('div');
  newElement.innerHTML = html;

  var scripts = newElement.getElementsByTagName("script");
 for (var i = 0; i < scripts.length; ++i) {
    var script = scripts[i];
    eval(script.innerHTML);
  }
}













var slidebr = 1;
function sljedeci(n) {
slidebr=slidebr+n;

  showSlides(slidebr);
}


function currentSlide(n) {

 showSlides(slidebr = n);
}


function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");

  if (n > slides.length) {slidebr = 1}    
  if (n < 1) {slidebr = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  
  slides[slidebr-1].style.display = "block";  
  
}
