<?php
require_once 'phpword/PHPWord.php';

// New Word Document
$PHPWord = new PHPWord();

$PHPWord->setDefaultFontName('Calibri'); 
$PHPWord->setDefaultFontSize(11);

$sectionStyle = array('orientation' => null,
                      'marginLeft' => 1100,
                      'marginRight' => 1100,
                      'marginTop' => 1800,
                      'marginBottom' => 1100,
                      'color' => 'FF0000'
                      );



$cellStyle=array('valign'=>'center');

$styleTable = array('borderColor'=>'7B7B7B',
                    'borderTopSize'=>12,
                    'borderLeftSize'=>12,
                    'borderRightSize'=>12,
                    'borderBottomSize'=>12,
                    'borderInsideHSize'=>6,
                    'borderInsideVSize'=>6,    
                    'cellMarginLeft'=>80
                    );

$PHPWord->addTableStyle('table', $styleTable);

$section = $PHPWord->createSection($sectionStyle);

$section->addTextBreak();
$section->addTextBreak();
$section->addTextBreak();
$fontSyle=array();
$paragraphStyle=array('align' => 'left','spacing' => '0','spacingLineRule' => 'exact','lineHeight' => '1.0','spaceAfter' => '0');

$table=$section->addTable(array('cellMarginLeft'=>0));
$table->addRow(0);
$table->addCell(5800,$cellStyle)->addText("",$fontSyle,$paragraphStyle);
$table->addCell(4200,$cellStyle)->addText("Spettabile",$fontSyle,$paragraphStyle);
$table->addRow(0);
$table->addCell(5800,$cellStyle)->addText("",$fontSyle,$paragraphStyle);
$table->addCell(4200,$cellStyle)->addText(conv_text($azienda['ragionesociale']),$fontSyle,$paragraphStyle);
$table->addRow(0);
$table->addCell(5800,$cellStyle)->addText("",$fontSyle,$paragraphStyle);
$table->addCell(4200,$cellStyle)->addText(conv_text("Alla C.att ".$contatto),$fontSyle,$paragraphStyle);
$table->addRow(0);
$table->addCell(5800,$cellStyle)->addText("",$fontSyle,$paragraphStyle);
$table->addCell(4200,$cellStyle)->addText(conv_text($azienda['indirizzo']),$fontSyle,$paragraphStyle);
$table->addRow(0);
$table->addCell(5800,$cellStyle)->addText("",$fontSyle,$paragraphStyle);
$table->addCell(4200,$cellStyle)->addText($azienda['npa']." ".$azienda['localita'],$fontSyle,$paragraphStyle);
$table->addRow(0);
$table->addCell(5800,$cellStyle)->addText("",$fontSyle,$paragraphStyle);
$table->addCell(4200,$cellStyle)->addText("Bioggio, 09/09/2022",$fontSyle,$paragraphStyle);

$section->addTextBreak();
$paragraphStyle['spaceAfter']='100';
$section->addText("Egregi signori,",$fontSyle,$paragraphStyle);
$section->addText(conv_text("con la presente vi sottoponiamo la nostra migliore offerta per personale a prestito per l'anno 2022, nel pieno rispetto del ".$ccl['nomeccl']),$fontSyle,$paragraphStyle);
$section->addText(conv_text("I nostri costi orari sottoelencati sono comprensivi di tutte le indennità e di tutti i contributi e oneri sociali."),$fontSyle,$paragraphStyle);
$fontSyle=array('bold' => 'true','underline' => 'single');
$paragraphStyle['spaceAfter']='100';
$section->addText(conv_text("Settore ".$ccl['nomeccl']),$fontSyle,$paragraphStyle);
$fontSyle=array();
foreach ($prezzi as $key_fascia => $fascia) {
    $paragraphStyle['spaceAfter']='100';
    $section->addText(conv_text($key_fascia." anni di età"),$fontSyle,$paragraphStyle);
    $table=$section->addTable(array('cellMarginLeft'=>0));
    foreach ($fascia as $key => $qualifica) {
        $paragraphStyle['spaceAfter']='0';
        $table->addRow(50);
        $table->addCell(4800,$cellStyle)->addText(conv_text($qualifica['descrizione']),$fontSyle,$paragraphStyle);
        $table->addCell(4800,$cellStyle)->addText("CHF ".number_format((float)$qualifica['prezzo'], 2, '.', '')." +IVA",$fontSyle,$paragraphStyle);
    }
    $section->addTextBreak();
}
$fontSyle=array('bold' => 'true','underline' => 'single');
$paragraphStyle['spaceAfter']='100';
$section->addText(conv_text("Ulteriori informazioni"),$fontSyle,$paragraphStyle);
$fontSyle=array();
foreach ($frasiccl as $key => $fraseccl) {
    $section->addText(conv_text($fraseccl),$fontSyle,$paragraphStyle);
}
foreach ($frasifatturazione as $key => $frasefatturazione) {
    $section->addText(conv_text($frasefatturazione),$fontSyle,$paragraphStyle);
}
$section->addTextBreak(); 
$fontSyle=array('bold' => 'true');

$table=$section->addTable(array('cellMarginLeft'=>0));
$table->addRow(50);
$table->addCell(7000,$cellStyle)->addText(conv_text($azienda['ragionesociale']),$fontSyle,$paragraphStyle);
$paragraphStyle['align']='right';
$table->addCell(3000,$cellStyle)->addText(conv_text("3P clc Sagl"),$fontSyle,$paragraphStyle);
$table->addRow(50);


$table->addCell(7000,$cellStyle)->addText(conv_text(""),$fontSyle,$paragraphStyle);
$table->addCell(3000,$cellStyle)->addText(conv_text($venditore),$fontSyle,$paragraphStyle);
                
$paragraphStyle['align']='left';

$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
$filename= str_replace(" ", "", $filename);
$filename= utf8_decode($filename);
$filename= utf8_encode($filename);
if(!file_exists("./stampe")){
    mkdir("./stampe");
}
if(!file_exists("./stampe/".$userid)){
    mkdir("./stampe/".$userid);
}
$objWriter->save('stampe/'.$userid.'/'.$filename);
?>
