<?php
require_once 'phpword/PHPWord.php';

// New Word Document
$PHPWord = new PHPWord();

$PHPWord->setDefaultFontName('Calibri'); 
$PHPWord->setDefaultFontSize(11);

$sectionStyle = array('orientation' => null,
                      'marginLeft' => 1100,
                      'marginRight' => 1100,
                      'marginBottom' => 0,
                      'color' => 'FF0000'
                      );

$title_textFontStyle=array('size'=>3,'color'=>'#FFFFFF');
$title_textParagraphStyle=array('spaceBefore'=>0,'spaceAfter'=>0,'spacing'=>0);

$tableFontStyle=array();
$table_label_FontStyle=array('bold'=>true,'size'=>10);
$table_value_FontStyle=array();
$tableParagraphStyle=array('spaceBefore'=>0,'spaceAfter'=>0,'spacing'=>0);
$tableTextRunParagraphStyle=array('spaceBefore'=>0,'spaceAfter'=>0,'spacing'=>0);

$cellStyle=array('valign'=>'center');
$cellFontStyle=array();
$cellParagraphStyle=array('spaceBefore'=>0,'spaceAfter'=>0,'spacing'=>0);

$Stile_Intestazione=array('size'=>20);

$titolo_sezione=array('valign'=>'center','borderSize'=>18,'borderColor'=>'7B7B7B','bgColor'=>'D9D9D9','spacing'=>0,'spaceAfter'=>0);
$titolo_sottosezione=array('valign'=>'center','borderSize'=>12,'borderColor'=>'686868','bgColor'=>'EFEFEF','spacing'=>0,'spaceAfter'=>0);

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

//$fontSyle=array('name'=>'Tahoma', 'size'=>16, 'bold'=>true);
//$paragraphStyle=array('align' => 'right');

//$fontSyle=array('name'=>'Tahoma', 'size'=>16, 'bold'=>true);
//$paragraphStyle=array('align' => 'right');
$fontSyle=array();
$paragraphStyle=array('align' => 'left','spacing' => '0','spacingLineRule' => 'exact','lineHeight' => '0.1');

$table=$section->addTable(array('cellMarginLeft'=>0));
$table->addRow(20);
$table->addCell(6000,$cellStyle)->addText("",$fontSyle,$paragraphStyle);
$table->addCell(4000,$cellStyle)->addText("Spettabile",$fontSyle,$paragraphStyle);
$table->addRow(20);
$table->addCell(6000,$cellStyle)->addText("",$fontSyle,$paragraphStyle);
$table->addCell(4000,$cellStyle)->addText(conv_text($azienda['ragionesociale']),$fontSyle,$paragraphStyle);
$table->addRow(20);
$table->addCell(6000,$cellStyle)->addText("",$fontSyle,$paragraphStyle);
$table->addCell(4000,$cellStyle)->addText(conv_text("Alla C.att di ".$contatto),$fontSyle,$paragraphStyle);
$table->addRow(20);
$table->addCell(6000,$cellStyle)->addText("",$fontSyle,$paragraphStyle);
$table->addCell(4000,$cellStyle)->addText(conv_text($azienda['indirizzo']),$fontSyle,$paragraphStyle);
$table->addRow(20);
$table->addCell(6000,$cellStyle)->addText("",$fontSyle,$paragraphStyle);
$table->addCell(4000,$cellStyle)->addText($azienda['npa']." ".$azienda['localita'],$fontSyle,$paragraphStyle);
$table->addRow(20);
$table->addCell(6000,$cellStyle)->addText("",$fontSyle,$paragraphStyle);
$table->addCell(4000,$cellStyle)->addText("Bioggio, 09/09/2022",$fontSyle,$paragraphStyle);

$section->addTextBreak();
$section->addTextBreak();
$section->addTextBreak();
$paragraphStyle=array('align' => 'left');
$section->addText("Egregi signori,",$fontSyle,$paragraphStyle);
$section->addText(conv_text("con la presente vi sottoponiamo la nostra migliore offerta per personale a prestito per l'anno 2022, nel pieno rispetto del ".$ccl['nomeccl']),$fontSyle,$paragraphStyle);
$section->addTextBreak(); 
$section->addText(conv_text("I nostri costi orari sottoelencati sono comprensivi di tutte le indennità e di tutti i contributi e oneri sociali."),$fontSyle,$paragraphStyle);
$fontSyle=array('bold' => 'true','underline' => 'single');
$section->addText(conv_text("Settore ".$ccl['nomeccl']),$fontSyle,$paragraphStyle);
$fontSyle=array();
$cellStyle=array('valign'=>'center');
$section->addTextBreak(); 
foreach ($prezzi as $key_fascia => $fascia) {
    $section->addText("Per persone ".$key_fascia,$fontSyle,$paragraphStyle);
    $table=$section->addTable(array('cellMarginLeft'=>0));
    foreach ($fascia as $key => $qualifica) {
        $table->addRow(50);
        $table->addCell(4800,$cellStyle)->addText(conv_text($qualifica['descrizione']),$fontSyle,$paragraphStyle);
        $table->addCell(4800,$cellStyle)->addText("CHF ".conv_text($qualifica['prezzo'])." +IVA",$fontSyle,$paragraphStyle);
    }
    $section->addTextBreak();
}
$section->addTextBreak(); 
$fontSyle=array('bold' => 'true','underline' => 'single');
$section->addText(conv_text("Ulteriori informazioni"),$fontSyle,$paragraphStyle);
$fontSyle=array();
foreach ($frasiccl as $key => $fraseccl) {
    $section->addText(conv_text($fraseccl),$fontSyle,$paragraphStyle);
}
$section->addTextBreak(); 
$fontSyle=array('bold' => 'true');
$table=$section->addTable(array('cellMarginLeft'=>0));
$table->addRow(50);
$table->addCell(10000,$cellStyle)->addText(conv_text("Cliente"),$fontSyle,$paragraphStyle);
$table->addCell(1000,$cellStyle)->addText(conv_text("3P"),$fontSyle,$paragraphStyle);
$table->addRow(50);
$table->addCell(10000,$cellStyle)->addText(conv_text(""),$fontSyle,$paragraphStyle);
$table->addCell(1000,$cellStyle)->addText(conv_text("Venditore"),$fontSyle,$paragraphStyle);
                
//    $phpWord->addFontStyle('myOwnStyle',
    //        array('name'=>'Verdana', 'size'=>14, 'color'=>'1B2232'));
    //    $section->addText('Hello world! I am formatted by a user defined style',
    //        'myOwnStyle');
//$fontStyle = new \PhpOffice\PhpWord\Style\Font();
//$fontStyle->setBold($bold);
//$fontStyle->setName($font);
//$fontStyle->setSize($size);
//$myTextElement = $section->addText($text);
//$myTextElement->setFontStyle($fontStyle);

// Save File
$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
$filename='test_phpword.docx';
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
echo urlencode($filename);
?>
