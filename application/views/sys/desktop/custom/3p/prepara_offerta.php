<style type="text/css">
    .bPopup_generico{
        background-color: transparent !important;
        overflow: hidden !important;
    }    
    
    .offerta_step{
        background-color: white;
        height: 100%;
        width: 100%;
        position: relative;
        padding: 20px;
        }
    .offerta_step_content{
        height: 90%;
        overflow: scroll;
        }
     .offerta_step .menu_bottom{
        width: 95%;
        position: absolute;
        bottom: 40px;
     }
</style>
<script type="text/javascript">
$( "#prepara_offerta" ).ready(function(){
 
});

function selezione_cliente(el)
{
   $('#selezione_ccl').hide(); 
   $('#selezione_cliente').show(); 
   
}

function selezione_ccl(el)
{
   $('#selezione_cliente').hide(); 
   $('#selezione_ccl').show(); 
}

function carica_prezzi(el,recordid_ccl)
{
    $('.offerta_step').hide();
    var serialized_data=[];
    serialized_data.push({name: 'recordid_ccl', value: recordid_ccl});
    var url=controller_url+'ajax_load_block_prezzi/'+recordid_ccl;
        $.ajax( {
            type: "POST",
            url: url,
            data: serialized_data,
            success: function( response ) {
                $('#selezione_prezzi').show();
                $('#prezzi').html(response);

            },
            error:function(){
                alert('errore');
            }
        } ); 
}

function carica_selezione_frasi_ccl(el,recordid_ccl)
{
    $('.offerta_step').hide();
    var serialized_data=[];
    serialized_data.push({name: 'recordid_ccl', value: recordid_ccl});
    var url=controller_url+'ajax_load_block_selezione_frasi_ccl/'+recordid_ccl;
        $.ajax( {
            type: "POST",
            url: url,
            data: serialized_data,
            success: function( response ) {
                $('#selezione_frasi_ccl').show();
                $('#selezione_frasi_ccl_content').html(response);

            },
            error:function(){
                alert('errore');
            }
        } ); 
}

function carica_selezione_frasi_fatturazione(el)
{
    $('.offerta_step').hide();
    var serialized_data=[];
    var url=controller_url+'ajax_load_block_selezione_frasi_fatturazione/';
        $.ajax( {
            type: "POST",
            url: url,
            data: serialized_data,
            success: function( response ) {
                $('#selezione_frasi_fatturazione').show();
                $('#selezione_frasi_fatturazione_content').html(response);

            },
            error:function(){
                alert('errore');
            }
        } ); 
}


function carica_offerta_finalizzata(el,recordid_ccl)
{
    $('.offerta_step').hide();
    var serialized_data=[];
    serialized_data=$('#prepara_offerta').find("select,textarea,input").serializeArray();
    serialized_data.push({name: 'recordid_azienda', value: $('#records_linkedmaster_field_offerte_azienda').val()});
    serialized_data.push({name: 'recordid_ccl', value: $('#records_linkedmaster_field_offerte_ccl').val()});
    
    var url=controller_url+'ajax_load_block_offerta_finalizzata/';
        $.ajax( {
            type: "POST",
            url: url,
            data: serialized_data,
            success: function( response ) {
                $('#offerta_finalizzata').show();
                $('#offerta_finalizzata_content').html(response);

            },
            error:function(){
                alert('errore');
            }
        } ); 
}

function finalizza_documento_htmlpdf(el,recordid_ccl)
{
    $('.offerta_step').hide();
    var serialized_data=[];
    serialized_data=$('#prepara_offerta').find("select,textarea,input").serializeArray();
    serialized_data.push({name: 'recordid_azienda', value: $('#records_linkedmaster_field_offerte_azienda').val()});
    serialized_data.push({name: 'recordid_ccl', value: $('#records_linkedmaster_field_offerte_ccl').val()});
    
    var url=controller_url+'ajax_finalizza_documento_htmlpdf/';
        $.ajax( {
            type: "POST",
            url: url,
            data: serialized_data,
            success: function( response ) {
                $('#offerta_finalizzata').show();
                $('#offerta_finalizzata_content').html(response);

            },
            error:function(){
                alert('errore');
            }
        } );
}

function finalizza_documento_word(el,recordid_ccl)
{
    //$('.offerta_step').hide();
    var serialized_data=[];
    serialized_data=$('#prepara_offerta').find("select,textarea,input").serializeArray();
    serialized_data.push({name: 'recordid_azienda', value: $('#records_linkedmaster_field_offerte_azienda').val()});
    serialized_data.push({name: 'recordid_ccl', value: $('#records_linkedmaster_field_offerte_ccl').val()});
    
  
    var urlprint=controller_url+"/ajax_finalizza_documento_word/";
    var urldownload=controller_url+"/download_test_phpword/";
    $.ajax({
        type: "POST",
        url: urlprint,
        data: serialized_data,
        success:function(data){
            window.location.href = urldownload + data;
        },
        error:function(){
            alert("ERRORE RICHIESTA AJAX");
        }
    })
}


function salva_offerta(el)
{
    var serialized_data=[];
    serialized_data=$('#prepara_offerta').find("select,textarea,input").serializeArray();
    serialized_data.push({name: 'recordid_azienda', value: $('#records_linkedmaster_field_offerte_azienda').val()});
    serialized_data.push({name: 'recordid_ccl', value: $('#records_linkedmaster_field_offerte_ccl').val()});
    
  
    $.ajax({
        type: "POST",
        url: controller_url+'ajax_salva_offerta/',
        data: serialized_data,
        success:function(data){
            alert('Offerta salvata');
        },
        error:function(){
            alert("ERRORE RICHIESTA AJAX");
        }
    })
}



        
</script>

<div id="prepara_offerta" style="">
    <div id="selezione_cliente" class="offerta_step" style="width: 50%;margin: auto;" >
        <div id="selezione_cliente_content" class="offerta_step_content" >
            <div   onclick="$(this).next().toggle()" style="font-size: 14px;cursor: pointer;">CLIENTE ESISTENTE</div>
            <div id="ciente_esistente" style="display: none;">
                <?php
                echo $clienti;
                ?>
            </div>
            <div style="clear: both"></div>
            <div   onclick="$(this).next().toggle()" style="font-size: 14px;cursor: pointer;margin-top: 20px;">NUOVO CLIENTE</div>
            <div id="nuovo_cliente" style="display: none">
                    <span style="width: 200px;display: inline-block;">Ragione sociale:</span> <input type="text"><br/><br/>
                    <span style="width: 200px;display: inline-block;">Paese:</span> <input type="text"><br/><br/>
                    <span style="width: 200px;display: inline-block;">Indirizzo:</span> <input type="text"><br/><br/>
            </div>
            <br/><br/>
            <div>
                <span style="width: 200px;">Alla cortese attenzione di:</span> <input type="text" id="contatto" name="contatto" style="border:0px;border-bottom:2px solid #DADADA;width:50%;;margin-left: 50px;" ><br/><br/>
            </div>
        </div>
        <div class="menu_big menu_bottom">
            <div  class="btn_scritta" onclick="selezione_ccl(this)" style="width: 150px;float: right;">Avanti</div>
        </div>
        
    </div>

    <div id="selezione_ccl" class="offerta_step" style="display: none;width: 50%;margin: auto;" >
        <div id="selezione_ccl_content" class="offerta_step_content">
            <span style="font-size: 22px">Seleziona il ccl:</span>
            </br><br/>
            <?php
            echo $ccl;
            ?>
            
        </div>
        <div class="menu_big menu_bottom">
            <div  class="btn_scritta" onclick="selezione_cliente(this)" style="width: 150px;float: left;">Indietro</div>
            <div  class="btn_scritta" onclick="carica_prezzi(this,$('#records_linkedmaster_field_offerte_ccl').val())" style="width: 150px;float: right;">Avanti</div>
        </div>
        
    </div>
    
    <div id="selezione_prezzi" class="offerta_step" style="display: none">
        <div id="selezione_prezzi_content" class="offerta_step_content">
            <div id="prezzi">

            </div>
        </div>
        <div class="menu_big menu_bottom">
            <div  class="btn_scritta" onclick="selezione_ccl(this)" style="width: 150px;float: left;">Indietro</div>
            <div  class="btn_scritta" onclick="carica_selezione_frasi_ccl(this,$('#records_linkedmaster_field_offerte_ccl').val())" style="width: 150px;float: right">Avanti frasi</div>
            
        </div>
    </div>
    
    <div id="selezione_frasi_ccl" class="offerta_step" style="display: none;width: 50%;margin: auto;">
        <div id="selezione_frasi_ccl_content" class="offerta_step_content" >
            
        </div>
        <div class="menu_big menu_bottom">
            <div  class="btn_scritta" onclick="carica_prezzi(this,$('#records_linkedmaster_field_offerte_ccl').val())" style="width: 150px;float: left">Indietro</div>
             <div  class="btn_scritta" onclick="carica_selezione_frasi_fatturazione(this)" style="width: 150px;float: right">Avanti</div>
        </div>
    </div>
    
    <div id="selezione_frasi_fatturazione" class="offerta_step" style="display: none;width: 50%;margin: auto;">
        <div id="selezione_frasi_fatturazione_content" class="offerta_step_content" >
            
        </div>
        <div class="menu_big menu_bottom">
            <div  class="btn_scritta" onclick="carica_selezione_frasi_ccl(this)" style="width: 150px;float: left">Indietro</div>
            <div  class="btn_scritta" onclick="carica_offerta_finalizzata(this)" style="width: 150px;float: right">Avanti</div>
        </div>
    </div>
    
    <div id="offerta_finalizzata" class="offerta_step" style="display: none">
        <div id="offerta_finalizzata_content" class="offerta_step_content">
            
        </div>
        <div class="menu_big menu_bottom">
            <div  class="btn_scritta" onclick="carica_selezione_frasi_fatturazione(this)" style="width: 150px;float: left;">Indietro</div>
            <div  class="btn_scritta" onclick="finalizza_documento_htmlpdf(this)" style="width: 150px;float: right">html PDF</div>
            <div  class="btn_scritta" onclick="finalizza_documento_word(this)" style="width: 150px;float: right">WORD</div>
            <div  class="btn_scritta" onclick="finalizza_documento_wordpdf(this)" style="width: 150px;float: right">word PDF</div>
            <div  class="btn_scritta" onclick="salva_offerta(this)" style="width: 150px;float: right">Salva offerta</div>
        </div>
    </div>

    
</div>