<script type="text/javascript">
$( "#prepara_offerta_frasi_fatturazione" ).ready(function(){
 
});

</script>

<div id="prepara_offerta_frasi_fatturazione" style="margin-top: 100px;">
    Frasi Fatturazione
    <?php
    foreach ($frasi as $key => $frase) {
    ?>
    <div>
        <input type="checkbox" onclick="mostra_sottotitoli(this)" id="fraseccl_id_<?=$key?>" name="frasefatturazione[<?=$frase['recordid']?>]" ><?=$frase['titolo']?>
        
    </div>
    <?php
    }
    ?>
</div>