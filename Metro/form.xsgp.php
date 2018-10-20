<?php namespace JF;

/**

Copyright 2017 JQueryForm.com
License: http://www.jqueryform.com/license.php

*/

require_once("F:/SGP_Demo/Trabajo/v1.3/AppSGP/Config/Config.php");

require_once("$PathSGP/Lib/Utilidades.php");
require_once("$PathSGP/Lib/XsltTransform.php");
require_once("$PathSGP/Lib/InicializarVariableGet.php");
require_once("$PathSGP/WebServices/WebServicesLib.php");


class Form2XSGP {
    
    private $UrlWebService = 'http://localhost/SGP_Demo/AppSGP/WebServices/RecepcionMensaje/WsRecepcionMensaje.php';
    private $Referencia = 'MsgObs1';
    private $Emisor = 'JQueryForm';
    private $IdEmisor = 'JQueryForm';
    private $TagMensaje = 'Observacion';
    
    /*
    define the mapping between form field IDs and table columns
    */
    private $fieldMap = array(
        // formFieldID => columnName
        'f5'           => 'TipoDeSolicituid',
        'f7'           => 'UsuarioAnonimo',
        'f8'           => 'AtencionPreferencial',
        'f30'          => 'IdentificacionPoblacional',
        'f9'           => 'Nombres',
        'f10'          => 'Apellidos',
        'f11'          => 'TipoIdentificacion',
        'f25'          => 'NumeroDeIdentificacion',
        'f14'          => 'Telefono',
        'f16'          => 'CorreoElectronico',
        'f17'          => 'Pais',
        'f18'          => 'Departamento',
        'f26'          => 'Ciudad',
        'f19'          => 'DescripcionDeSolicitud',
        'f28'          => 'Documentos',		
        'AutoID'       => 'AutoID',
        'HTTP_HOST'    => 'HTTP_HOST',
        'IP'           => 'IP',
        'Date'         => 'Date',
        'Time'         => 'Time',
        'HTTP_REFERER' => 'HTTP_REFERER',	
    );


    // $form is a array of form data after form validation
    public function SendFormData( $form ){
    
    	global $PathSGP;
        LogContenido("a.txt", "1111");	
        $rowCount = 0;
        $values   = $this->getValues( $form );
        $columns  = array_keys( $values );
        $marks    = array_fill( 0, sizeof($columns), '?' );
        
        $MensajeXML.= $this->Arreglo2MensajeSGP($values);
        $this->LogContenido('data/MensajeXSGP.log', $MensajeXML, 'MensajeXSGP');
        
        //die("$PathSGP/WebServices/xslts/EnSoap.xslt");
        $SoapMensajeXML = TransformXslt($MensajeXML, "$PathSGP/WebServices/xslts/EnSoap.xslt", 1, Array('Status' => 'Ok','NumProceso' => '1234'));
		
		set_time_limit(180);
		$Respuesta = EnvioMensajeClienteWS($this->UrlWebService, $SoapMensajeXML, 180);
        $this->LogContenido('data/MensajeXSGP.log', $Respuesta, 'RespuestaMensajeXSGP');
        //die($Respuesta);
        
    }

    private function getValues( $form ){
        $values = array();
        foreach( $this->fieldMap as $id => $column ){
            $values[ $column ] = isset($form[ $id ]) ? $form[ $id ] : '';
			}
        return $values;
    }
    
    
    private function Arreglo2MensajeSGP($ArrCamposValores) {
    	
		# Determina si se envia el atributo IpId en el Mensaje.
		if (isset($ArrCamposValores['IpId']) and !empty($ArrCamposValores['IpId'])) {
			$IpId = $ArrCamposValores['IpId'];
			$AtributoIpId = "IpId=\"$IpId\"";
			}
		else {
			$AtributoIpId = '';
			}
			
		$Xml = DeclaracionXML . "<sgp:MensajeSGP Referencia=\"$this->Referencia\" Emisor=\"$this->Emisor\" IdEmisor=\"$this->IdEmisor\" $AtributoIpId xmlns:sgp=\"http://www.analitica.com.co/Esquemas/SGP/\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\">";
		$Xml .= "<$this->TagMensaje>";
		foreach ($ArrCamposValores as $Campo => $Valor) {			
			if ($Campo != 'Emisor' and $Campo != 'IdEmisor' and $Campo != 'Referencia' and $Campo != 'TagMensaje' ) {
				$Xml .=  "<$Campo>" . $this->AjusteCadenaXML($Valor) .  "</$Campo>";
				}	
			}
		$Xml .= "</$this->TagMensaje></sgp:MensajeSGP>";
		return $Xml;
	}
	
	
	private function AjusteCadenaXML($Cadena) {
	
		$Caracteres = array('&',   '<',     '>',   '"',     '\'');
		$CodigosXML = array('&amp;','&lt;', '&gt;','&quot;','&apos;');
	
		$Cadena = str_replace($Caracteres, $CodigosXML, $Cadena);
		return $Cadena;
	}


	private function LogContenido($Archivo,$Datos,$Titulo='') {

		$FechaHora = date('c');
		if ($Titulo!='-') $Datos = "\n<!-- $Titulo: $FechaHora -->\n" . $Datos . "\n"; else  $Datos .= "\n";
		$handle = fopen($Archivo, "a");
		if (!$handle = fopen($Archivo, 'a')) {
			die("No es posible abrir el archivo: ($Archivo)");
		}
		if (fwrite($handle, $Datos) === FALSE) {
			die("No es posible escribir en el archivo ($Archivo)");
			}
		fclose($handle);
	}

    
} // class

