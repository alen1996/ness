


 
<?php
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array("Broj artika","Cijena","Opis","Slika"));

$xml = simplexml_load_file('nekretnine.xml');
$k=0;
foreach ($xml->children() as $child)
  {

$user_CSV[$k]=array($child->id,$child->cijena,$child->naziv,$child->ikona);


  $k++;}

foreach ($user_CSV as $line) {

 fputcsv($output, $line,',');
}



?>




