<?php
session_start();
if (isset($_SESSION['username']))
{

}
else
{
header('Location: /e/Home.php');
}

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tutorijal 6, Uvod</title>
  </head>
  <body>
<a href="Home.php">Nazad na stranicu</a>
<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">


<?php

if ( isset( $_POST['Submit3'] ) ) {




$doc = new DOMDocument; 
$doc->load('nekretnine.xml');

$thedocument = $doc->documentElement;

$list = $thedocument->getElementsByTagName('nekretnina');
$ukl=$_REQUEST['broj'];
$brojac=0;
$nodeToRemove = null;
foreach ($list as $domElement){
  $attrValue = $domElement->getElementsByTagName('id')->item(0);;

  if ($ukl==$attrValue->textContent) {

    $nodeToRemove = $domElement; //will only remember last one- but this is just an example :)
  }
$brojac++;
}

//Now remove it.
if ($nodeToRemove != null)
$thedocument->removeChild($nodeToRemove);

$doc->saveXML(); // This will return the XML as a string
$doc->save('nekretnine.xml'); // This saves the XML to a file






}




if ( isset( $_POST['Submit2'] ) ) {
$opis=$_REQUEST['opis'];
$cijena=$_REQUEST['cijena'];
$slika=$_REQUEST['slika'];
$dodavac=0;
if (!file_exists($slika)) {
    echo "Slika $slika ne postoji ,nemoguce dodati novu nekretninu<br>";
$dodavac++;
} 




$noviid=1;
$xml = simplexml_load_file('nekretnine.xml');

foreach ($xml->children() as $child)
  {



$noviid=$child->id;

  }

$noviid=$noviid+1;;


$urls = $xml->addChild("nekretnina");
$urls->addChild('id',$noviid);
$urls->addChild('naziv',$opis);
$urls->addChild('cijena',$cijena);
$urls->addChild('ikona', $slika);
if($dodavac==0)$xml->asXML("nekretnine.xml");
}






if ( isset( $_POST['Submit1'] ) ) {
$slike1 = array();
$imena1 = array();
$cijena1 = array();
$postojac=0;
foreach($_POST['ime'] as $myarray) {
array_push($imena1,$myarray);
   

}



foreach($_POST['slikice'] as $myarray) {
array_push($slike1,$myarray);

if (!file_exists($myarray)) {
    $postojac++;
} 
}


foreach($_POST['cijenice'] as $myarray) {
array_push($cijena1,$myarray);
 
}

$xml = simplexml_load_file('nekretnine.xml');

$brojac=0;
foreach ($xml->children() as $child)
  {

$child->ikona=$slike1[$brojac];
$child->cijena=$cijena1[$brojac];
$child->naziv=$imena1[$brojac];
$brojac++;
}
if($postojac==0){$xml->asXML('nekretnine.xml');
echo "Update uspjesan<br>";}
else {echo "jedna ili vise slika ne postoji,neuspjesan update<br>";};


}








 $xml=simplexml_load_file("nekretnine.xml") or die("Error: Cannot create object");

foreach($xml->children() as $nekretnina) {
$c= $nekretnina->naziv;
$d= $nekretnina->ikona;
$e= $nekretnina->cijena;
$f= $nekretnina->id;
echo "Nekretnina broj $f <br>";
echo  " <textarea rows=4 cols=50 name=ime[]>$c</textarea> ";
echo  " <textarea rows=4 cols=50 name=slikice[]>$d</textarea> ";
echo  " <input type=number value=$e name=cijenice[]><br>";



} 








?>


  
<br>
<input type="submit"  value="Update" name="Submit1">
<br>



<br>

Dodaj nekretninu<br>
Opis<br>
<textarea rows="4" cols="50" name="opis"></textarea><br>

Cijena<br>
<textarea rows="4" cols="50" name="cijena"></textarea><br>
Slika<br>
<textarea rows="4" cols="50" name="slika"></textarea><br>



<input type="submit"  value="Dodaj" name="Submit2"><br>

<br>

id nekretnine za brisanje <br>
<input type="number"  name="broj">
<input type="submit"  value="Obrisi" name="Submit3">
    </form>




  </body>
</html>