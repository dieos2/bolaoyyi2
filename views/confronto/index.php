<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;
use app\models\Confronto;
use app\models\Aposta;
use app\models\UserCadastro;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Confrontos';
$this->params['breadcrumbs'][] = $this->title;
?>
 <section class="vbox">
                            <section class="scrollable padder">
 <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                                <li><a href="/confronto/index/0">Todos</a></li>
                                  <?php foreach (\app\models\Grupo::find()->all() as $grupo){ ?>
                                <li><a href="/confronto/index/<?php echo $grupo->id?>"><?php echo $grupo->nome?></a></li>
                               
                                  <?php }?>
                            </ul>
<div class="m-b-md"> <h3 class="m-b-none">Confrontos</h3> </div>
   <?php foreach($confrontos as $data){ /* @var $this ConfrontoController */
/* @var $data Confronto */
date_default_timezone_set('America/Belem');
$date = date_create($data->data);
$modelUsers =  User::findByUsername(Yii::$app->user->identity->username)?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&appId=120052838155369&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<section class="panel panel-default">
    <header class="panel-heading font-bold"><?php echo date_format($date, 'd-m-Y H:i'); ?> - <a id="verAposta-<?php echo $data->id ?>" data-id="<?php echo $data->id ?>" class="btn verAposta btn-info">Ver Apostas</a> </header>
                                <div class="panel-body">
                                    <form id="<?php echo $data->id ?>" class="form-inline" role="form" data-validate="parsley">
                                        <div class="" style="width: 30%;display: initial;">
                                            <label>
                                                <?php if($data->placar_casa != null){
                                                echo '<span class="label bg-dark">'. $data->placar_casa.'</span>'; } ?>
                                                <img src="/images/<?php echo $data->idTimeCasa->escudo?>" /> <?php echo $data->idTimeCasa->nome; ?></label>
                                        </div> <div class="form-group" style="width: 26px; display: inline-block;">
                                           
                                            <input class="c<?php echo $data->id ?>" type="text" data-notblank="true" data-maxlength="2" id="placar_casa" name="placar_casa" style="width: 100%;text-align: center;">
                                        </div> x
                                        <div class="form-group" style="width: 26px; display: inline-block;">
                                           
                                            <input  class="v<?php echo $data->id ?>" type="text" data-notblank="true" data-maxlength="2" id="placar_visitante" name="placar_visitante" style="width: 100%;text-align: center;" >
                                        
                                        </div> <div class="" style="width: 30%;display: initial;">
                                            <label>
                                               <?php echo $data->idTimeVisitante->nome; ?><img src="/images/<?php echo $data->idTimeVisitante->escudo?>" /> <?php if($data->placar_casa != null){
                                                echo '<span class="label bg-dark">'. $data->placar_visitante.'</span>'; } ?></label>
                                        </div>
                                       <?php 
                                     
                                       if(date("Y-m-d H:i:s") > date_format($date,'Y-m-d 15:00') ){
                                           echo '<a id="btn-'.$data->id.'" data-idConfronto="'.$data->id.'" data-idGrupo="'.$data->id_grupo.'" class="btn btn-success" disabled="disabled" >Apostar</a>';
                                       }else{
                                          echo '<a  id="btn-'.$data->id.'" data-idConfronto="'.$data->id.'" data-idGrupo="'.$data->id_grupo.'" class="btn btn-success">Apostar</a>';
                                       } 
                                       
                                    
                                       if( $modelUsers->role==30){
                                           echo '  <a href="/confronto/update/'.$data->id.'" class="btn btn-success" >Editar</a>';
                                       }?> 
                                       
                                       <input type="hidden" id="id_confronto" name="id_confronto" value="<?php echo $data->id ?>" />
                                       <input type="hidden" id="id_user" name="id_user" value="<?php echo  $modelUsers->id; ?>" />
                                       <input type="hidden" id="data" name="data" value="<?php echo date("Y-m-d H:i:s") ?>" />
                                      
                                    </form>
                                    <div class="fb-share-button" data-href="http://www.casadogui.com.br/index.php?r=confronto/curtir&id=<?php echo $data->id ?>" data-type="button"></div>
                                </div> 
        <div id="verApostaDiv-<?php echo $data->id ?>" class="panel-body verApostaDiv">
              <?php
               $apostas = Aposta::find()->where(['=', 'id_confronto',$data->id ])->orderBy(['data' => SORT_DESC])->all(); 
       
                ?>
                <?php foreach ($apostas as $aposta){ ?>
            
            <div class="divApostas_<?php echo $aposta->id ?>" style="padding: 0 0px 0px 2.5%;;
margin: -30px 0 12px  0; text-align: right;width: 162px;">
                                   
                                        <div class="" style="width: 30%;display: initial;">
                                            <label>
                                                <?php echo ucfirst($aposta->idUser->username); ?></label>
                                        </div> <div class="form-group" style="width: 26px; display: inline-block;">
                                           
                                            <input class="c<?php echo $aposta->id ?>" type="text" data-notblank="true" data-maxlength="2" id="placar_casa" name="placar_casa" style="width: 100%;text-align: center; border: none" value="<?php echo $aposta->placar_casa ?>" readonly="readonly">
                                        </div> x
                                        <div class="form-group" style="width: 26px; display: inline-block;">
                                           
                                            <input  class="v<?php echo $aposta->id ?>" type="text" data-notblank="true" data-maxlength="2" id="placar_visitante" name="placar_visitante" style="width: 100%;text-align: center; border: none " value="<?php echo $aposta->placar_visitante ?>" readonly="readonly">
                                        
                                        </div> <div class="" style="width: 30%;display: initial;">
                                            <label>
                                              
                                        </div>
 </div>
                <?php }?>
               
         </div> 
       <div class="progress m-t-sm">
            <div class="progress-bar progress-bar-success" data-toggle="tooltip" data-original-title="<?php echo $data->GetNumeroApostaCasa($data->id) ?>" style="width: <?php echo $data::GetPorcentagemApostaCasa($data->id) ?>%"></div>
            <div class="progress-bar progress-bar-primary" data-toggle="tooltip" data-original-title="<?php echo $data->GetNumeroApostaVisitante($data->id) ?>" style="width: <?php echo $data::GetPorcentagemApostaVisitante($data->id) ?>%"></div> 
       </di> 
                            </section>
	
	
	


   <?php }?>
</section>
    <script>
        jQuery(function (){
             $(".summary").hide();
              $(".verApostaDiv").hide();
             PreencheApostas();
            
        
        });
      function PreencheApostas(){
              $.ajax({
            type: "get",
            url: "/aposta/getapostas/<?= User::findByUsername(Yii::$app->user->identity->username)->id ?>",
            
            dataType: "json",
            success: function(response, status) {
                debugger;
               

                for (var i = 0; response.length > i; i++) {
                    
                  jQuery('#'+response[i][1]).find('input[id=placar_casa]').val(response[i][4]);
                    jQuery('#'+response[i][1]).find('input[id=placar_visitante]').val(response[i][5]);
                   
                }
            
            },
            error: function(response, status) {

            },
        });
        }
         function AtualizeApostas(){
              $.ajax({
            type: "get",
            url: "index.php?r=aposta/GetApostas/",
           data: "id=0",
            dataType: "json",
            success: function(response, status) {
                debugger;
              
                for (var i = 0; response.length > i; i++) {
                     debugger;
                     var divAposta = jQuery('.divApostas_'+response[i][0]);
                     if(divAposta.length > 0){
                    jQuery('.divApostas_'+response[i][0]).find('input[id=placar_casa]').val(response[i][4]);
                    jQuery('.divApostas_'+response[i][0]).find('input[id=placar_visitante]').val(response[i][5]);
                }else
              {
                  jQuery('#verApostaDiv-'+response[i][1]).find('div[class=items]').append('<div class="divApostas_'+response[i][0]+'" style="padding: 0 0px 0px 2.5%;margin: -30px 0 12px  0; text-align: right;width: 162px;">'
                                       + '<div class="" style="width: 30%;display: initial;">'
                                           +' <label>'+response[i][6]+'</label>'
                                       +' </div> <div class="form-group" style="width: 26px; display: inline-block;">'
                                           
                                            +'<input class="c26" type="text" data-notblank="true" data-maxlength="2" id="placar_casa" name="placar_casa" style="width: 100%;text-align: center; border: none" value="'+response[i][4]+'" readonly="readonly">'
                                      +  '</div> x'
                                       + '<div class="form-group" style="width: 26px; display: inline-block;">'
                                           
                                           + '<input class="v26" type="text" data-notblank="true" data-maxlength="2" id="placar_visitante" name="placar_visitante" style="width: 100%;text-align: center; border: none " value="'+response[i][5]+'" readonly="readonly">'
                                        
                                       +' </div> <div class="" style="width: 30%;display: initial;">'
                                           + '<label>'
                                              
                                       +' </label></div>'
 +'</div>');
                 
              }
                }
             
            },
            error: function(response, status) {

            },
        });
        }
         jQuery('.verAposta').click(function (){
             debugger;AtualizeApostas();
             var id =  jQuery(this).attr('data-id');
             var teste= jQuery('#verApostaDiv-'+id).attr('style');
             if(jQuery('#verApostaDiv-'+id).attr('style') == 'display: block;'){
             jQuery('#verApostaDiv-'+id).slideUp();
             }else
             {
                 jQuery('#verApostaDiv-'+id).slideDown();
             }
             
         });
        jQuery('.btn-success').click(function (){
            
            debugger;
            var id = jQuery(this).attr('data-idConfronto');
            var id_confronto = jQuery('#'+id).find('input[id=id_confronto]').val();
            var placar_casa =jQuery('#'+id).find('input[id=placar_casa]').val();
            var placar_visitante =jQuery('#'+id).find('input[id=placar_visitante]').val();
            var id_user = jQuery('#'+id).find('input[id=id_user]').val();
            var data = jQuery('#'+id).find('input[id=data]').val();
            if(jQuery('.c'+id).val() !== '' && jQuery('.v'+id).val() !=='' && checkNumber(jQuery('.v'+id).val()) && checkNumber(jQuery('.c'+id).val())){
              $.ajax({
            type: "get",
            url: "/aposta/create",
            data: "id_confronto="+id_confronto+"&placar_casa="+placar_casa+"&placar_visitante="+placar_visitante+"&id_user="+id_user+"&data="+data,
            dataType: "json",
             success: function(response, status) {
             debugger;
                            jQuery('#btn-'+id).html('ok');
                            AtualizeApostas();
                        }
                    });
        }else       
        {
        alert('dados Invalidos');
         jQuery('#btn-'+id_confronto).html('Apostar');
          jQuery('#btn-'+id_confronto).removeAttr('disabled');
        }
           
        });
   function checkNumber(valor) {
  var regra = /^[0-9]+$/;
  if (valor.match(regra)) {
   return true;
  }else{
     return false;
  }
}; 
        </script>
