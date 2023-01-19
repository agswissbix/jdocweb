    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">-->

<script type="text/javascript">
$( "#report_ccl_table" ).ready(function(){
 
});

function varia_prezzi(el,direction)
{       var limitup=parseFloat(<?=$user_settings['offerta_limitup']?>);
        var limitdown=parseFloat(<?=$user_settings['offerta_limitdown']?>);
        console.info(limitup);
        console.info(limitdown);
        
        var eccesso=false;
        $('#prepara_offerta_prezzi').find('.prezzo_value').each(function(i){
        var prezzooriginale=$(this).data("prezzooriginale");
        console.info(prezzooriginale);
        var value=$(this).val();
        if(direction=='up')
         {
            var newval=(parseFloat(value)+0.1).toFixed(2); 
            var variazione= newval-prezzooriginale;
            console.info('Variazione: '+variazione);
            if(variazione>limitup)
            {  
                eccesso=true;
            }
         } 
         if(direction=='down')
         {
             var newval=(parseFloat(value)-0.1).toFixed(2);
             var variazione= prezzooriginale-newval;
             console.info('Variazione: '+variazione);
             if(variazione>limitdown)
             {  
                 eccesso=true;
             }
         }   
        
        if(eccesso)
        {
            console.info('Eccesso');
        }  
        else
        {
            $(this).val(newval);
        }
        
    })
    if(eccesso)
        {
            alert('Eccesso');
        }  
}

</script>
    <div id="prepara_offerta_prezzi" style="margin-top: 100px;">
        <div style="width: 95%">
            <table style="border-collapse: collapse;width: 100%;">
                <tbody>
                    <tr class="report_ccl_tr_header">
                        <td colspan="4" style="border-top: 2px solid black;border-left: 2px solid black;border-bottom: 2px solid black;text-align: left">INQUADRAMENTO</td>
                        <td style="border-top: 2px solid black;border-left: 1px solid black;border-bottom: 2px solid black;">ESP.</td>
                        <td style="border-top: 2px solid black;border-left: 1px solid black;border-bottom: 2px solid black;">STIP.M.</td>
                        <td style="border-top: 2px solid black;border-left: 1px solid black;border-bottom: 2px solid black;">STIP.ORARIO</td>
                        <?php
                                foreach ($fascie as $key_fascia => $fascia) {
                                ?>
                                    <td style="border-top: 1px solid black;border-left: 1px solid black;border-bottom: 2px solid black;"><?=$fascia['nomecolonna']?></td>
                                <?php
                                }
                                ?>
                       
                        <td style="border-top: 1px solid black;border-bottom: 2px solid black;border-right:2px solid black; ">
                        </td>
                    </tr>
                    <?php
                    $count_qualifiche=count($qualifiche);
                    $counter_qualifiche=0;
                    foreach ($qualifiche as $descrizione_qualifica => $qualifica_gruppo) {
                        
                        $counter_group=0;
                        $tr_border='';
                        foreach ($qualifica_gruppo as $recordid_qualifica => $qualifica) {
                            $counter_group++;
                            if($counter_group==count($qualifica_gruppo))
                            {
                                $tr_border="border-bottom: 1px solid black;";
                            }
                            $fascie=$qualifica['fascie'];
                            $descrizione_qualifica=$qualifica['qualifica']."<br/>".$qualifica['descrizione'];
                            $bordertop='border-top: 2px solid black;';
                            $borderbottom='border-bottom: 2px solid black;';
                            
                            if($counter_group!=1)
                            {
                                $descrizione_qualifica='';
                                $borderbottom='';
                                $bordertop='';
                            }
                            if($counter_group==(count($qualifica_gruppo)-1))
                            {
                                $borderbottom='border-bottom: 2px solid black;';
                            }
                            ?>
                            <tr class="report_ccl_tr_body" style="<?=$tr_border?>" >
                                <td colspan="4" style="border-left:2px solid black;text-align: left;"><?=$descrizione_qualifica?></td>
                                <td style="white-space: nowrap;"><?=$qualifica['esperienza']?></td>
                                <td style="white-space: nowrap;"><?=$qualifica['stipmensile']?></td>
                                <td style="white-space: nowrap;"><?=$qualifica['base']?> CHF/ora</td>
                                <?php
                                foreach ($fascie as $key_fascia => $fascia) {
                                ?>
                                <td style="border-left: 1px solid black;white-space: nowrap;">
                                    <input class="prezzo_value" style="width:50px;" type="text" value="<?=$fascia['prezzovendita']?>" name="prezzo[<?=$key_fascia?>][<?=$qualifica['recordid_']?>][value]" data-prezzooriginale="<?=$fascia['prezzovendita']?>"> fr/ora <input name="prezzo[<?=$key_fascia?>][<?=$qualifica['recordid_']?>][check]" type="checkbox" checked />
                                </td>
                                    
                                <?php
                                
                                }
                                ?>
                                <td  ">
                                </td>
                                <td style="border-right:2px solid black;white-space: nowrap;">
                                    <p>
        <label>
              <span></span>
        </label>
    </p>
                                </td>
                            </tr>

                            <?php
                        
                        
                        }
                        $counter_qualifiche++;
                    }
                    ?>
                </tbody>
            </table>
            <div style="float: right;margin-right: 100px;margin-top: 20px;">
                
                
                <div class="btn_fa fa fa-solid fa-arrow-down" style="height: 20px; margin-left: 20px;float: right" onclick="varia_prezzi(this,'down')"></div>
                <div class="btn_fa fa fa-solid fa-arrow-up" style="height: 20px;margin-left: 20px;float: right" onclick="varia_prezzi(this,'up')"></div>
                <div style="float: right" >Variazione prezzi <?=$user_settings['offerta_limitdown']?></div>
                
            </div>
        <div style="clear: both">
        </div>
        
            
        </div>
        </div>
    
