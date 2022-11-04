<script type="text/javascript">
$( "#prepara_offerta_frasi_fatturazione" ).ready(function(){
 
});

</script>

<div id="prepara_offerta_frasi_fatturazione"  style="font-size: 18px;margin-left: 20px;">
    <?php
    foreach ($frasi as $key => $frase) {
    ?>
    <div style="margin-bottom: 10px;">
        <input type="checkbox" onclick="mostra_sottotitoli(this)" id="fraseccl_id_<?=$key?>" name="frasefatturazione[<?=$frase['recordid']?>]" style="margin-right: 10px;" ><?=$frase['titolo']?>
        
    </div>
    <?php
    }
    ?>
</div>