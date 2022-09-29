<script type="text/javascript">
$( "#prepara_offerta_frasi_ccl" ).ready(function(){
 
});



</script>

<div id="prepara_offerta_finalizzata" style="background-color: rgb(238 238 238);">
    <?php
    //var_dump($frasiccl)
    ?>
    <div id="prepara_offerta_finalizzata" style="width: 70%;margin: auto;box-shadow: 0 1px 4px 0 rgb(0 0 0 / 14%);background-color: white;padding: 150px;">
        <div style="float: right">
            Spettabile<br/>
            <?=$azienda['ragionesociale']?><br/>
            Alla C.att <?=$contatto?><br/>
            <?=$azienda['indirizzo']?><br/>
            <?=$azienda['npa']?> <?=$azienda['localita']?><br/>
            <br/><br/><br/>
            Bioggio, 09/09/2022
        </div>
        <div style="clear: both"></div>
        <div>
            Egregi signori,<br/>
            con la presente vi sottoponiamo la nostra migliore offerta per personale a prestito per l'anno 2022, nel pieno rispetto del <?=$ccl['nomeccl']?> .<br/>
            <br/>
            I nostri costi orari sottoelencati sono comprensivi di tutte le indennità e di tutti i contributi e oneri sociali.<br/>
            
            
            
        </div>
        
        <span style="font-weight: bold;text-decoration: underline">Settore <?=$ccl['nomeccl']?></span><br/>
        <br/> 
        <div>
            <div>
                <?php
                    //var_dump($prezzi);
                    foreach ($prezzi as $key_fascia => $fascia) {
                    ?>
                    Per persone <?=$key_fascia?><br/>
                    <table style="width: 50%">
                        <tbody>
                            <?php
                            foreach ($fascia as $key => $qualifica) {
                            ?>
                            <tr>
                                <td style="width:70%"><?=$qualifica['descrizione']?></td>
                                <td style="padding-left: 50px;"><?=$qualifica['prezzo']?></td>
                            </tr>
                            <?php
                            }
                            ?>
                            
                        </tbody>
                    </table>
                    <br/>
                    <?php
                    }
                ?>
                
            </div>
        </div>
        <br/>
        <br/>
        <div>
            <span style="font-weight: bold;text-decoration: underline">Ulteriori informazioni</span><br/>
            <br/>
            <?php
                foreach ($frasiccl as $key => $fraseccl) {
                ?>
                    <?=$fraseccl?>
                    <br/><br/>
                <?php
                }
            ?>
        </div>
        <br/>
        <div>
            <span style="font-weight: bold;"><?=$azienda['ragionesociale']?></span>
        </div>
        
        <div style="float: right;font-weight: bold">
            3p clc Sagl
            <br/><br/>
            VENDITORE
        </div>
        <div style="clear: both"></div>
    </div>
    
</div>