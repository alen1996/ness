<?php
require('fpdf.php');



class PDF extends FPDF
{
protected $B = 0;
protected $I = 0;
protected $U = 0;
protected $HREF = '';

function WriteHTML($html)
{
    // HTML parser
    $html = str_replace("\n",' ',$html);
    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e);
        }
        else
        {
            // Tag
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extract attributes
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag, $attr)
{
    // Opening tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF = $attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}

function CloseTag($tag)
{
    // Closing tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF = '';
}

function SetStyle($tag, $enable)
{
    // Modify style and select corresponding font
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach(array('B', 'I', 'U') as $s)
    {
        if($this->$s>0)
            $style .= $s;
    }
    $this->SetFont('',$style);
}

function PutLink($URL, $txt)
{
    // Put a hyperlink
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}
}




$the_content = "Ovo je PDF file u kom se nalaze svi podaci ";

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

//specify width and height of the cell Multicell(width, height, string)
$pdf->Multicell(190,10,$the_content);
$k=0;
$xml = simplexml_load_file('nekretnine.xml');

foreach ($xml->children() as $child)
  {

$pdf->Write(10,'ID nekretnine:');
$pdf->Write(10,$child->id);
$pdf->Ln(10);


$pdf->Write(10,'Opis:');
$pdf->Write(10,$child->naziv);
$pdf->Ln(10);


$pdf->Write(10,'Cijena');
$pdf->Write(10,$child->cijena);
$pdf->Ln(10);



$pdf->Write(10,'Slika');
$pdf->Write(10,$child->ikona);
$pdf->Ln(10);



  $k++;}

$pdf->Write(10,"Dakle ukupno agencija radi sa ");
$pdf->Write(10,$k);
$pdf->Write(10,"nekretnina");


$pdf->Output();

?>