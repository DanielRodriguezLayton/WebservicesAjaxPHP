<?php

require_once("../../Config/Config.php");
require_once("VerificarAcceso.php");
require_once ($PathSGP . "/Lib/InicializarVariableGet.php");
require_once ($PathSGP . "/Lib/InicializarAdmin.php");
#Descomentar esta linea cuando se haga una actualización en Producción
#include('../MensajeMantenimiento.html'); die;

InicVarGetSimple("SoOrigenSolicitud");

?>

<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <title>Formulario de registro</title>
  
  <!-- Bootstrap -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/css/bootstrap-datepicker3.min.css" rel="stylesheet">
  

  <link href="vendor.css" rel="stylesheet">

<style type="text/css">
body{
  background-color: transparent;
}

.jf-form{
  margin-top: 28px;
}

.jf-form > form{
  margin-bottom: 32px;
}

.jf-option-box{
  display: none;
  margin-left: 8px;
}

.jf-hide{
  display: none;
}

.jf-disabled {
    background-color: #eeeeee;
    opacity: 0.6;
    pointer-events: none;
}

/* 
overwrite bootstrap default margin-left, because the <label> doesn't contain the <input> element.
*/
.checkbox input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio] {
  position: absolute;
  margin-top: 4px \9;
  margin-left: 0px;
}

div.form-group{
  padding: 8px 8px 4px 8px;
}

.mainDescription{
  margin-bottom: 10px;
}

p{
 text-align:justify;
}

p.description{
  margin:0px;
}

.responsive img{
  width: 100%;
}

p.error, p.validation-error{
  padding: 5px;
}

p.error{
  margin-top: 10px;
  color:#a94442;
}

p.server-error{
  font-weight: bold;
}

div.thumbnail{
  position: relative;
  text-align: center;
}

div.thumbnail.selected p{
  color: #ffffff;
}

div.thumbnail .glyphicon-ok-circle{
  position: absolute;
  top: 16px;
  left: 16px;
  color: #ffffff;
  font-size: 32px;
}

.jf-copyright{color: #888888; display: inline-block; margin: 16px;display:none;}

.form-group.required .control-label:after {
    color: #dd0000;
    content: "*";
    margin-left: 6px;
}

.submit .btn.disabled, .submit .btn[disabled]{
  background: transparent;
  opacity: 0.75;
}

/* for image option with span text */
.checkbox label > span, .radio label > span{
  display: block;
}

.form-group.inline .control-label,
.form-group.col-1 .control-label,
.form-group.col-2 .control-label,
.form-group.col-3 .control-label
{
  display: block;
}

.form-group.inline div.radio,
.form-group.inline div.checkbox{
  display: inline-block;
}

.form-group.col-1 div.radio,
.form-group.col-1 div.checkbox{
  display: block;
}

.form-group.col-2 div.radio,
.form-group.col-2 div.checkbox{
  display: inline-flex;
  width: 48%;
}

.form-group.col-3 div.radio,
.form-group.col-3 div.checkbox{
  display: inline-flex;
  width: 30%;
}

.clearfix:after {
   content: ".";
   visibility: hidden;
   display: block;
   height: 0;
   clear: both;
}

</style>


</head>

<body>


<!-- ----------------------------------------------- -->
<div class="container">
<form data-licenseKey="" name="formulario" id="formulario" action='admin.php' method='post' enctype='multipart/form-data' novalidate autocomplete="on">
<input type="hidden" name="method" value="validateForm">
<input type="hidden" name="SoOrigenSolicitud" id="SoOrigenSolicitud"  value="<?php echo($SoOrigenSolicitud)?>"  >
<input type="hidden" id="serverValidationFields" name="serverValidationFields" value="">



<div class="form-group f29 " data-fid="f29">
  <label class="control-label sr-only" for="f29"></label>

	<div class="mainDescription">
		<div class='images'>
			<img src="../../Graficas/LogoOpciones.gif" alt="">
		</div>
	</div>


  
</div>




<div class="form-group f31 " data-fid="f31">
  <label class="control-label sr-only" for="f31"></label>

	<div class="mainDescription">
		<p><b> En esta sección usted puede formular las Peticiones, Quejas, Reclamos, Sugerencias y Denuncias sobre los temas de competencia de <?php echo $RazonSocial;?>. Registre los datos necesarios para responderle y el detalle de la solicitud.<br />
<br />
Los campos con <font color="red"> * </font> son obligatorios. </b></p>
	</div>


  
</div>

<!--https://antv.gov.co/index.php/component/jdownloads/send/944-resoluciones-2016/2177-resolucion-1680-de-2016?option=com_jdownloads-->

<!--"https://antv.gov.co/index.php/component/jdownloads/send/1129-resoluciones-2017/5691-resolucion-2034-de-2017"-->

<div class="form-group f33 required col-1" data-fid="f33">
  <label class="control-label sr-only" for="f33">Concentimiento</label>

	<div class="mainDescription">
		<p>Autorizo a <?php echo $RazonSocial ?> para dar tratamiento de mis datos personales registrados en el presente formulario, conforme a la Ley 1581 de 2012 y la política de tratamiento de datos personales, con la finalidad de otorgar una respuesta efectiva a su petición, queja, reclamo, sugerencia y denuncia, realizar encuestas de satisfacción y percepción sobre la entidad y realización de la caracterización de usuarios con el objetivo de focalizar estrategias de mejora en la atención de las solicitudes.<br />
<a href="https://antv.gov.co/index.php/component/jdownloads/send/1129-resoluciones-2017/5691-resolucion-2034-de-2017" target="_blank">Política de tratamiento de datos personales</a></p>
	</div>

<div class="checkbox">
  	<input  id="f33_1" name="f33[]"  type="checkbox" value="Autorizo" 
    data-rule-required="true"  >
  	<label  for="f33_1">
  		Autorizo
  	</label>
  </div>

  
</div>




<div class="form-group f5 required" data-fid="f5">
  <label class="control-label" for="f5">Tipo de Solicitud</label>

	<div class="mainDescription">
		<p>Seleccione el tipo de solicitud de acuerdo a su necesidad.</p>
	</div>

<div class="input-group"><span class="input-group-addon left"><i class="glyphicon glyphicon-th-list"></i> </span>
<select class="form-control" id="f5" name="f5"   
    data-rule-required="true" >
  <option  value="">- Select -</option>

  </select>
</div>
  
</div>


<div class="form-group f7 required inline" data-fid="f7">
  <label class="control-label" for="f7">Usuario Anónimo</label>

	<div class="mainDescription">
		<p>Seleccione si quiere o no registrar su información personal de contacto.</p>
	</div>

<div class="radio">
  	<input  id="f7_1" name="f7"  type="radio" value="SI" 
    data-rule-required="true"  >
  	<label  for="f7_1">
  		Sí
  	</label>
  </div>

  <div class="radio">
  	<input  id="f7_2" name="f7"  type="radio" value="NO"  >
  	<label  for="f7_2">
  		No
  	</label>
  </div>

  
</div>




<div class="form-group f39  jf-hide" data-fid="f39">
  <label class="control-label" for="f39"></label>

	<div class="mainDescription">
		<p>En caso que usted decida hacer uso del derecho consagrado en el parágrafo de artículo 4 de la Ley 1712 de 2015: “Cuando el usuario considere que la solicitud de la información pone en riesgo su integridad o la de su familia, podrá solicitar ante el Ministerio Público el procedimiento especial de solicitud con identificación reservada.” <br />
Se podrá acceder a la página de la Procuraduría General de la República a través del siguiente enlace:<br />
<a href="https://www.procuraduria.gov.co/SedeElectronica" target="_blank">Sede Electrónica Procuraduría General de la República</a></p>
	</div>


  
</div>




<div class="form-group f40 required jf-hide" data-fid="f40">
  <label class="control-label" for="f40">Tipo de Solicitante</label>

	<div class="mainDescription">
		<p>Seleccione el tipo de solicitante.</p>
	</div>

<div class="input-group"><span class="input-group-addon left"><i class="glyphicon glyphicon-th-list"></i> </span>
<select class="form-control" id="f40" name="f40"   
    data-rule-required="true" >
    <option  value="">- Select -</option>
  </select>
</div>
  
</div>




<div class="form-group f43 required jf-hide" data-fid="f43">
  <label class="control-label" for="f43">Persona</label>

	<div class="mainDescription">
		<p>Seleccione el tipo de persona.</p>
	</div>

<!--Se cambia 'ratio element' a lista desplegable-->

<div class="input-group">
	<span class="input-group-addon left">
		<i class="glyphicon glyphicon-th-list"></i>
	</span>
		<select class="form-control" name="f43" id="f43" data-rule-required="true" required>
			<option value="">- Select -</option>
		</select>
</div>

</div>

<!--
		Se agrega lista desplegable de genero
-->
<div class="form-group f83 required jf-hide" data-fid="f83">
  <label class="control-label" for="f83">Genero</label>

	<div class="mainDescription">
		<p>Seleccione el genero.</p>
	</div>
	
<div class="input-group">
		<span class="input-group-addon left">
			<i class="glyphicon glyphicon-th-list"></i>
		</span>
		<select class="form-control" name="f83" id="f83" data-rule-required="true" required>
			<option value="">- Select -</option>
		</select>
</div>

</div>



<div class="form-group f8  jf-hide" data-fid="f8">
  <label class="control-label" for="f8">Atención Preferencial</label>

	<div class="mainDescription">
		<p>Seleccione si usted considera que requiere atención preferencial de acuerdo a la lista de opciones.</p>
	</div>

<div class="input-group"><span class="input-group-addon left"><i class="glyphicon glyphicon-th-list"></i> </span>
<select class="form-control" id="f8" name="f8"   
    >
  <option  value="">- Select -</option>
  <option  value="1">ADULTO MAYOR</option>
  
  </select>
</div>
  
</div>




<div class="form-group f30  jf-hide" data-fid="f30">
  <label class="control-label" for="f30">Identificación Poblacional</label>

	<div class="mainDescription">
		<p>Seleccione el tipo de grupo poblacional al que usted pertenece.</p>
	</div>

<div class="input-group"><span class="input-group-addon left"><i class="glyphicon glyphicon-th-list"></i> </span>
<select class="form-control" id="f30" name="f30"   
    >
  <option  value="">- Select -</option>

  </select>
</div>
  
</div>




<div class="form-group f41 required jf-hide" data-fid="f41">
  <label class="control-label" for="f41">Razón Social</label>

	<div class="mainDescription">
		<p>Nombre de la Empresa</p>
	</div>

<div class="input-group"><span class="input-group-addon left"><i class="glyphicon glyphicon-pencil"></i> </span>
<input type="text" class="form-control" id="f41" name="f41" value=""    
    data-rule-required="true"  />
</div>

</div>

<div class="form-group f9 required jf-hide" data-fid="f9">
  <label class="control-label" for="f9">Primer Nombre</label>

	<div class="mainDescription">
		<p>Primer Nombre de la persona que hace la solicitud.</p>
	</div>

<div class="input-group"><span class="input-group-addon left"><i class="glyphicon glyphicon-pencil"></i> </span>
<input type="text" class="form-control" id="f9" name="f9" value="" maxlength="20"   
    data-rule-required="true" 
    data-rule-maxlength="20" data-msg-maxlength="Máximo 20 caracteres."   
    data-mask="SSSSSSSSSSSSSSSSSSSS" />
</div>

  
</div>




<div class="form-group f35  jf-hide" data-fid="f35">
  <label class="control-label" for="f35">Segundo Nombre</label>

	<div class="mainDescription">
		<p>Segundo Nombre de la persona que hace la solicitud.</p>
	</div>

<div class="input-group"><span class="input-group-addon left"><i class="glyphicon glyphicon-pencil"></i> </span>
<input type="text" class="form-control" id="f35" name="f35" value="" maxlength="20"   
    data-rule-maxlength="20" data-msg-maxlength="Máximo 20 caracteres."   
    data-mask="SSSSSSSSSSSSSSSSSSSS" />
</div>

  
</div>




<div class="form-group f10 required jf-hide" data-fid="f10">
  <label class="control-label" for="f10">Primer Apellido</label>

	<div class="mainDescription">
		<p>Primer Apellido de la persona que hace la solicitud.</p>
	</div>

<div class="input-group"><span class="input-group-addon left"><i class="glyphicon glyphicon-pencil"></i> </span>
<input type="text" class="form-control" id="f10" name="f10" value="" maxlength="20"   
    data-rule-required="true" 
    data-rule-maxlength="20" data-msg-maxlength="Máximo 20 caracteres."   
    data-mask="SSSSSSSSSSSSSSSSSSSS" />
</div>

  
</div>




<div class="form-group f36  jf-hide" data-fid="f36">
  <label class="control-label" for="f36">Segundo Apellido</label>

	<div class="mainDescription">
		<p>Segundo Apellido de la persona que hace la solicitud.</p>
	</div>

<div class="input-group"><span class="input-group-addon left"><i class="glyphicon glyphicon-pencil"></i> </span>
<input type="text" class="form-control" id="f36" name="f36" value="" maxlength="20"   
    data-rule-maxlength="20" data-msg-maxlength="Máximo 20 caracteres."   
    data-mask="SSSSSSSSSSSSSSSSSSSS" />
</div>

  
</div>




<div class="form-group f11 required jf-hide" data-fid="f11">
  <label class="control-label" for="f11">Tipo de Identificación</label>

	<div class="mainDescription">
		<p>Seleccione el tipo de identificación.</p>
	</div>

<div class="input-group"><span class="input-group-addon left"><i class="glyphicon glyphicon-th-list"></i> </span>
<select class="form-control" id="f11" name="f11"   
    data-rule-required="true" >
  <option  value="">- Select -</option>
 
  </select>
</div>
  
</div>




<div class="form-group f25 required jf-hide" data-fid="f25">
  <label class="control-label" for="f25">Número de Identificación</label>

<div class="input-group"><span class="input-group-addon left"><i class="glyphicon glyphicon-th"></i> </span>
<input type="text" class="form-control" id="f25" name="f25" value="" maxlength="10"   
    data-rule-required="true" 
    data-rule-maxlength="10"   
    data-mask="#" />
</div>

  
</div>




<div class="form-group f14  jf-hide" data-fid="f14">
  <label class="control-label" for="f14">Teléfono</label>

<div class="input-group"><span class="input-group-addon left"><i class="glyphicon glyphicon-th"></i> </span>
<input type="text" class="form-control" id="f14" name="f14" value="" maxlength="12"   
    data-rule-maxlength="12" data-msg-maxlength="Máximo 12 dígitos."   
    data-mask="#" />
</div>

  
</div>




<div class="form-group f19 required jf-hide" data-fid="f19">
  <label class="control-label" for="f19">Descripción de la Solicitud</label>

	<div class="mainDescription">
		<p>Describa en detalle la solicitud que usted quiere gestionar a través de ANTV.</p>
	</div>

<div class="input-group"><span class="input-group-addon left"><i class="glyphicon glyphicon-pencil"></i> </span>
<textarea class="form-control" id="f19" name="f19" rows="3"   
    data-rule-required="true" 
    data-rule-maxlength="100000"></textarea>
</div>
  
</div>




<div class="form-group f28 multi jf-hide" data-fid="f28">
  <label class="control-label" for="f28">Adjuntar Documentos</label>

<input type="file" class="form-control multi" id="f28" name="f28[]" data-multiple="true" multiple value="" aria-describedby="f28-help-block" data-maxFileSize="3000" data-maxFileCount="10"  data-showPreview="false" data-showUpload="false" data-showZoom="false" language="en" accept="jpg|jpeg|gif|png|doc|docx|pdf"/>

  <p id="f28-help-block" class="description">Solo se permite cargar imágenes en formato: jpg, jpeg, gif, png o documentos en formato doc, docx, o pdf. <br />
El tamaño máximo permitido por archivo es de 3MB. Se puede puede subir máximo 3 archivos para lo cual los debe seleccionar al mismo tiempo.</p>
  
</div>




<div class="form-group f37 required jf-hide" data-fid="f37">
  <label class="control-label" for="f37">Medio de Respuesta</label>

	<div class="mainDescription">
		<p>Seleccione el medio por el cual usted desea le llegue la respuesta a su solicitud.</p>
	</div>

<div class="input-group"><span class="input-group-addon left"><i class="glyphicon glyphicon-th-list"></i> </span>
<select class="form-control" id="f37" name="f37">
  <option  value="">- Select -</option>
  <option  value="CE">Correo Electrónico</option>
  <option  value="DC">Dirección de Correspondencia</option>
  </select>
</div>
  
</div>



<div class="form-group f16 required jf-hide" data-fid="f16">
  <label class="control-label" for="f16">Correo Electrónico</label>

<div class="input-group"><span class="input-group-addon left"><i class="glyphicon glyphicon-envelope"></i> </span>
<input type="email" class="form-control" id="f16" name="f16" value=""   
    data-rule-email="true" 
    data-rule-required="true"  />
</div>
  
</div>




<div class="form-group f38 required jf-hide" data-fid="f38">
  <label class="control-label" for="f38">Dirección de Correspondencia</label>

<div class="input-group"><span class="input-group-addon left"><i class="glyphicon glyphicon-home"></i> </span>
<input type="text" class="form-control" id="f38" name="f38" value=""    
    data-rule-required="true"  />
</div>

  
</div>




<div class="form-group f17 required jf-hide" data-fid="f17">
  <label class="control-label" for="f17">Pais</label>
	<select class="form-control" id="f17" name="f17" data-rule-required="true" onchange="actualizarListaCascada('../../Selecciones/SelectEstados.php','f18','PaiId='+this.value);">
		<option  value="">- Select -</option>

	</select>

	</div>




<div class="form-group f18 required jf-hide" data-fid="f18">
  <label class="control-label" for="f18">Departamento</label>


<select class="form-control" id="f18" name="f18"   
    data-rule-required="true" onchange="actualizarListaCascada('../../Selecciones/SelectCiudadLocalidad.php','f26','EstId='+this.value);">
  <option  value="">- Select -</option>
</select>

  
</div>




<div class="form-group f26 required jf-hide" data-fid="f26">
  <label class="control-label" for="f26">Ciudad</label>


	<select class="form-control" id="f26" name="f26" data-rule-required="true" data-rule-required="true" onchange="">
  	<option  value="">- Select -</option>
	</select>

  
</div>




<div class="form-group f42 " data-fid="f42">
  <label class="control-label" for="f42"></label>

	<div class="mainDescription">
		<p>Esta solicitud puede generar costos de reproducción de la información, favor revisar la política de ANTV al respecto: <a href="https://antv.gov.co/index.php/component/jdownloads/send/944-resoluciones-2016/2177-resolucion-1680-de-2016" target="_blank">Política de costos de reproducción.</a><br />
<br />
Los tiempos de respuesta de acuerdo al tipo de solicitud los puede consultar en el siguiente enlace: <a href="http://www.secretariasenado.gov.co/senado/basedoc/ley_1755_2015.html" target="_blank">LEY 1755 DE 2015.</a> <br />
<br />
Tener en cuenta también las siguientes observaciones sobre el procedimiento de atención de PQRSD de ANTV: <a href="http://www.secretariasenado.gov.co/senado/basedoc/codigo_contencioso_administrativo.html" target="_blank">Código contencioso administrativo.</a></p>
	</div>


  
</div>





<div class='form-group recaptcha'>
  <script type="text/javascript">
  	function renderReCaptcha(){
  		var jfKey = '6LdopwYTAAAAABunoQoWr5mZGVpVSmTFumNM8ZfO', // when form loaded from jqueryform.com
  		realKey = "<?php echo $RecaptchaKey; ?>",
  		theme = 'light',
  		key = -1 !== location.href.indexOf('jqueryform.com/') ? jfKey : realKey;
  		grecaptcha.render( document.getElementById('g-recaptcha'), {
          'sitekey' : key,
          'theme' : theme
        });
  	};
  </script>
  
  <?php if (!empty($RecaptchaKey)) { ?>
 <script src="https://www.google.com/recaptcha/api.js?hl=es&onload=renderReCaptcha&render=explicit" async defer></script>
     <div id='g-recaptcha' class='g-recaptcha col_field' data-theme='light' data-sitekey="<?php echo $RecaptchaKey; ?>"></div> 
  <?php } ?>   
</div>





<div class="form-group submit f0 " data-fid="f0" style="position: relative;">
  <label class="control-label sr-only" for="f0" style="display: block;">Submit Button</label>

  <div class="progress" style="display: none; z-index: -1; position: absolute;">
    <div class="progress-bar progress-bar-striped active" role="progressbar" style="width:100%">
    </div>
  </div>

  <button type="submit" class="btn btn-primary btn-lg" style="z-index: 1;">
  		Enviar
  </button>

</div><div class="clearfix"></div>

<div class="submit">
  <p class="error bg-warning" style="display:none;">
    Please check the required fields.  </p>
</div>

<div class="clearfix"></div>


</form>

<a href="http://www.jqueryform.com" target="_blank" class="jf-copyright">Powered by jqueryform.com</a>
</div>

<div class="container jf-thankyou" style="display:none;" data-redirect="" data-seconds="10">
  <div id="MensajeRespuesta"></div>
  <h3>Gracias por registrar su PQRSD</h3>
</div>
<!-- ----------------------------------------------- -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/locales/bootstrap-datepicker.es.min.js"></script>
<script type="text/javascript">
	$.fn.datepicker.defaults.language = 'es';
</script>
<script src="vendor.js" ></script>





<!-- [ Start: iCheck support ] ---------------------------------- -->
<link href="https://cdn.jsdelivr.net/icheck/1.0.2/skins/flat/_all.min.css" rel="stylesheet">
<style type="text/css">
/* overwrite bootstrap styles */
.checkbox input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio] {
    position: relative;
    margin-top: 0px;
    margin-left: 2px;
}

.checkbox label, .radio label {
   padding-left: 4px;
}

</style>

<script type="text/javascript">


;(function ($, undefined)
{

var checkers = '.icheckbox_flat, .iradio_flat';

function initICheck( $input ){
  $input.iCheck({
	    checkboxClass: 'icheckbox_flat',
	    radioClass: 'iradio_flat'
  }).on('ifClicked', function(e){
    setTimeout( function(){
      $(e.target).valid();
      $(e.target).trigger('change').trigger('handleOptionBox');
    }, 250);
  });
}; // func

//$('.jf-form .checkbox, .jf-form .radio')
$('.jf-form input[type="checkbox"], .jf-form input[type="radio"]').each( function( i, e ){
    var $input = $(e), $div = $input.closest('.checkbox,.radio'), hasImg = $div.find('label > img').length;
    if( hasImg ){

        $input.css({ 'opacity': '0', 'position': 'absolute', 'left': '-1000px', 'right': '-1000px'} );

    }else{

        initICheck( $input );

        // IE11 and under, the table-cell makes the checkboxes/radio buttons not clickable
        var isWin = navigator.platform.indexOf('Win') > -1,
            isEdge = navigator.userAgent.indexOf('Edge/') > -1,
            noTableCell = isWin && !isEdge;
        if( !noTableCell ){
          $div.find('label').css( { display: 'table-cell' } );
          $(checkers).css( { display: 'table-cell' } );
        };

    };
});

})(jQuery);

</script>
<!-- [ End: iCheck support ] ---------------------------------- -->


<!-- [ Start: Select2 support ] ---------------------------------- -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js"></script>
<style type="text/css">
.select2-hidden-accessible{
	opacity: 0;
    width:1% !important;
}
.select2-container .select2-selection--single{
  height: 34px;
  padding-top: 2px;
  box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
  border: 1px solid #ccc;
}
.select2-container--default .select2-selection--single .select2-selection__arrow{
  top: 4px;
}
</style>
<script type="text/javascript">
;(function(){
	
	function templateResult (obj) {
	  if (!obj.id) { return obj.text; }

	  var img = $(obj.element).data('imgSrc');
	  if( img ){
	    return $( '<span><img src="' + img + '" class="img-flag" /> ' + obj.text + '</span>' );
	  };

	  return obj.text;
	};
	 
	$(".jf-form select").css('width', '100%'); // make it responsive
	$(".jf-form select").select2({
	  templateResult: templateResult
	}).change( function(e){
	  $(e.target).valid();
	});

})();
</script>
<!-- [ End: Select2 support ] ---------------------------------- -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.3.6/js/locales/es.min.js"></script>
<script src="CargaListas.js"></script>
<script src="<?php echo ($UrlSGP) ?>/Ajax/Json.js"></script>
<!-- tell jquery fileinput plugin init with selected lanaguage -->
<script>
fileinputLanguage = 'es';
</script>


<script type="text/javascript">

	// start jqueryform initialization
	// --------------------------------
	JF.init('#formulario');

	// watch form element change event to run jqueryform's formlogic
	// ---------------------------------------------------------------
	var logics = [
    {
        "disabled": false,
        "action": "show",
        "selector": "f39,f40,f8,f30,f19,f28,f37",
        "match": "all",
        "rules": [
            {
                "disabled": false,
                "selector": "f7",
                "condition": "==",
                "value": "NO"
            }
        ]
    },
	{
        "disabled": false,
        "action": "hide",
        "selector": "f40,f8,f30,f9,f35,f10,f36,f11,f25,f14,f16,f38,f17,f18,f26,f83,f43,f25,f41",
        "match": "all",
        "rules": [
            {
                "disabled": false,
                "selector": "f7",
                "condition": "==",
                "value": "SI"
            }
        ]
    },
	{
        "disabled": false,
        "action": "show",
        "selector": "f39,f19,f28,f37",
        "match": "all",
        "rules": [
            {
                "disabled": false,
                "selector": "f7",
                "condition": "==",
                "value": "SI"
            }
        ]
    },
    {
        "disabled": false,
        "action": "show",
        "selector": "f83,f43,f9,f35,f10,f36,f11,f25",
        "match": "all",
        "rules": [
            {
                "disabled": false,
                "selector": "f40",
                "condition": "==",
                "value": "PN"
            },
			{
                "disabled": false,
                "selector": "f7",
                "condition": "==",
                "value": "NO"
            }
        ]
    },
	 {
        "disabled": false,
        "action": "show",
        "selector": "f41,f11,f25",
        "match": "all",
        "rules": [
            {
                "disabled": false,
                "selector": "f40",
                "condition": "==",
                "value": "PJ"
            },
			{
                "disabled": false,
                "selector": "f7",
                "condition": "==",
                "value": "NO"
            }
        ]
    },
    {
        "disabled": false,
        "action": "hide",
        "selector": "f41",
        "match": "all",
        "rules": [
            {
                "disabled": false,
                "selector": "f40",
                "condition": "==",
                "value": "PN"
            }
        ]
    },
    {
        "disabled": false,
        "action": "hide",
        "selector": "f83,f43,f9,f35,f10,f36",
        "match": "all",
        "rules": [
            {
                "disabled": false,
                "selector": "f40",
                "condition": "==",
                "value": "PJ"
            }
        ]
    },
  	{
        "disabled": false,
        "action": "show",
        "selector": "f16",
        "match": "all",
        "rules": [
            {
                "disabled": false,
                "selector": "f37",
                "condition": "==",
                "value": "CE"
            }
        ]
    },
	{
        "disabled": false,
        "action": "show",
        "selector": "f38,f17,f18,f26",
        "match": "all",
        "rules": [
            {
                "disabled": false,
                "selector": "f37",
                "condition": "==",
                "value": "DC"
            }
        ]
    },

	    {
        "disabled": false,
        "action": "hide",
        "selector": "f16",
        "match": "all",
        "rules": [
            {
                "disabled": false,
                "selector": "f37",
                "condition": "==",
                "value": "DC"
            }
        ]
    },
	
	    {
        "disabled": false,
        "action": "hide",
        "selector": "f38,f17,f18,f26",
        "match": "all",
        "rules": [
            {
                "disabled": false,
                "selector": "f37",
                "condition": "==",
                "value": "CE"
            }
			
        ]
    }	
];
	$('input,input:radio,select').change(function(){
		$.formlogic( {logics: logics} );
	});
	var countSi = 0;
	var countNo = 0;
	//Anónimo
	$('#f7_1').change(function(){
		$(".form-group.f37.required").removeClass("required");
		$(".form-group.f37").removeClass("jf-hide");
		$(".form-group.f37").attr("aria-required","false");
		$("#f37").attr("aria-required","false");
		$("#f37").attr("data-rule-required","false");	
		countSi ++;
		if(countSi >= 1 && countNo >= 1)
			location.reload(false);
	});
	//No Anónimo
	$('#f7_2').change(function(){
		$(".form-group.f37").removeClass("jf-hide");
		$(".form-group.f37").addClass("required");
		$(".form-group.f37").attr("aria-required","true");
		$("#f37").attr("data-rule-required","true");
		$("#f37").attr("aria-required","true");		
		countNo ++;
		if(countSi >= 1 && countNo >= 1)
			location.reload(false);
	});

</script>

  </body>
</html>