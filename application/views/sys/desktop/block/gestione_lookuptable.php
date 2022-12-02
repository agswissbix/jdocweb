<?php
$lookuptableid=$data['lookuptableid'];
$lookuptable_items=$data['lookuptable_items'];
?>
<div class="scheda" style="overflow-y: scroll;height: 90%">
    <?php
    foreach ($lookuptable_items as $key => $item) {
    ?>
    <div class="lookuptable_item_container" data-itemcode="<?=$item['itemcode']?>" style="margin: 5px;border: 1px solid #bcbcbc;">
        <div style="float: left;">
            <?=$item['itemcode']?>
            -
            <?=$item['itemdesc']?>
        </div>
        <?php
        
        $test=  str_replace('"', '\"', $item['itemcode']);
        $test=htmlentities($test, ENT_QUOTES, 'UTF-8');
        ?>
        
        
        <div class="btn_scritta  tooltip" title="Elimina" style="float: right;" onclick='delete_lookuptable_item(this,"<?=$lookuptableid?>","<?=$test?>")'>Elimina</div>
        <div class="btn_scritta  tooltip" title="Nascondi" style="float: right;" onclick='hide_lookuptable_item(this,"<?=$lookuptableid?>","<?=$test?>")'>Nascondi</div>
        <div class="btn_scritta  tooltip" title="Mostra" style="float: right;" onclick='show_lookuptable_item(this,"<?=$lookuptableid?>","<?=$test?>")'>Mostra</div>
        <div class="clearboth"></div>
    </div>
    <?php
    }
    ?>
</div>
<div class="btn_scritta" style="float: right;margin-top: 10px;" onclick="chiudi_gestione_lookuptable(this);">Chiudi</div>