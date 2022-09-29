<script type="text/javascript">
$( "#prepara_offerta_frasi_ccl" ).ready(function(){
 
});

function mostra_sottotitoli(el)
{
    $(el).next().toggle();
}
</script>

<div id="prepara_offerta_frasi_ccl" style="margin-top: 100px;">
            Frasi CCL
            <?php
            foreach ($frasi as $key => $frase) {
            ?>
            <div>
                <input type="checkbox" onclick="mostra_sottotitoli(this)" id="fraseccl_id_<?=$key?>" name="fraseccl_titolo[<?=$frase['recordid']?>]" ><?=$frase['titolo']?>
                <?php
                if(count($frase['sottotitolo'])>1)
                {    
                ?>
                <select class="descrizioni" style="display: none;margin-left: 20px;" name="fraseccl_titolo[<?=$frase['recordid']?>][sottotitolo]">
                <?php
                    foreach ($frase['sottotitolo'] as $key => $sottotitolo) {
                        $sottotitolo_recordid=$sottotitolo['recordid'];
                        $sottotitolo_testo=$sottotitolo['sottotitolo'];
                        
                    ?>
                        <option value="<?=$sottotitolo_recordid?>"><?=$sottotitolo_testo?></option>
                    <?php
                    }
                ?>
                
                </select>
                <?php
                }
                ?>
            </div>
            <?php
            }
            ?>
        </div>
