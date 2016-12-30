<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("nekretnine.xml");

$x=$xmlDoc->getElementsByTagName('nekretnina');

//get the q parameter from URL
$q=$_GET["q"];
$Sugestije=10;
if(($x->length)<10)$Sugestije=$x->length;
//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($Sugestije); $i++) {
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
?> 