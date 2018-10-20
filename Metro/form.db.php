<?php namespace JF;

/**

Copyright 2017 JQueryForm.com
License: http://www.jqueryform.com/license.php

*/

class Form2DB {
    
    // mysql
    private $db = array(
        'host'    => '127.0.0.1',
        'db'      => 'form2db',
        'user'    => 'form2db_user',
        'pass'    => 'form2db_pass',
        'charset' => 'utf8',    
    );

    private $table = 'demo';

    /*
    define the mapping between form field IDs and table columns
    */
    private $fieldMap = array(
        // formFieldID => columnName
        'f5'       => 'TipoSolicitud',
        'f7'       => 'Anonimo',
        'f16'      => 'Email',
        'f40'      => 'TipoSolicitante',
        'f43'      => 'TipoPersona',
        'f83'      => 'Genero',
        'f8'       => 'AtencionPreferencial',
        'f30'      => 'IdentificacionPoblacional',
        'f41'      => 'RazonSocial',
        'f9'       => 'PrimerNombre',
		'f84'      => 'NombreCompletoContacto',
        'f35'      => 'SegundoNombre',
        'f10'      => 'PrimerApellido',
        'f36'      => 'SegundoApellido',
        'f11'      => 'TipoIdentificacion',        
        'f25'      => 'NumeroIdentificacion',
        'f14'      => 'TelefonoFijo',
        'f16'      => 'Email',
        'f38'      => 'Direccion',
        'f17'      => 'Pais',
        'f18'      => 'Estado',
        'f26'      => 'Ciudad',
        'fl24'      => 'Localidad',
        'f19'      => 'TextoSolicitud',
        
        
        'OrigenSolicitud'  => 'OrigenSolicitud',
        'AutoID'       => 'AutoID',
        'HTTP_HOST'    => 'HTTP_HOST',
        'IP'           => 'IP',
        'Date'         => 'Date',
        'Time'         => 'Time',
        'HTTP_REFERER' => 'HTTP_REFERER',
    );

    private $pdo;

    private function connectDB(){
        $dsn = "mysql:host=" . $this->db['host'] . ";dbname=" . $this->db['db'] . ";charset=" . $this->db['charset'];
        $this->pdo = new \PDO( $dsn, $this->db['user'], $this->db['pass'] );
    }

    // $form is a array of form data after form validation
    public function saveFormData( $form ){
        global $NuevaSoId;
        global $PathApp;
        global $IdOrigenSolicitoDefecto;
               
        $rowCount = 0;
        $values   = $this->getValues( $form );
        $columns  = array_keys( $values );
                
        foreach ($values as $key => $value) {
			
			$encoding = mb_detect_encoding($value, array('UTF-8','ISO-8859-1'));
			switch($encoding) {

				case 'UTF-8' :
					$value = utf8_decode($value);

			}
			
			if ($key != 'TextoSolicitud'){
			 $value = AjusteCadenaDobleComillas($value);
			}
			
			$value = AjusteCadenaXML($value);
			$$key = $value;
        }
        
        if (empty($OrigenSolicitud)){
            $OrigenSolicitud = $IdOrigenSolicitoDefecto;
        }
        
        if (!empty($Estado)){
            $Estado = Sql2Valor("select EstCodigo from estados where EstId = $Estado ");
        }
        
        if (!empty($Ciudad)){
            $Ciudad = Sql2Valor("select CiuCodigo from ciudadeslocalidades where CiuId = $Ciudad ");
        }
        
        if (empty($PrimerNombre) && !empty($RazonSocial)){
            $PrimerNombre = $RazonSocial;
        }
        
        $XMLSolicitud = <<<XML
  <ser:RegistrarPQRSD xmlns:ser="http://www.analitica.com.co/Esquemas/ServiciosPQRSD" 
        OrigenSolicitud="$OrigenSolicitud" 
        MedioRecepcion="IN" TipoSolicitud="$TipoSolicitud" Anonimo="$Anonimo" 
        AtencionPreferencial="$AtencionPreferencial" IdentificacionPoblacional="$IdentificacionPoblacional" 
            NumeroRadicadoSolicitud="" IdExpedienteRadicado="" IdExpedienteSolicitud="" IdExpedienteRespuesta=""
             NumeroRadicadoSolicitudAsociada="" NumeroRadicadoRespuesta="">
         <InfoPersona TipoIdentificacion="$TipoIdentificacion" NumeroIdentificacion="$NumeroIdentificacion" 
             PrimerNombre="$PrimerNombre" NombreCompletoContacto="$NombreCompletoContacto" SegundoNombre="$SegundoNombre" PrimerApellido="$PrimerApellido" 
             SegundoApellido="$SegundoApellido"  Genero="$Genero"  
             TelefonoFijo="$TelefonoFijo" TelefonoFijoOpcional="" Celular="" 
                 CelularOpcional="" Email="$Email" EmailOpcional="">
            <Direccion Pais="$Pais" Estado="$Estado" Ciudad="$Ciudad" Localidad="$Localidad">$Direccion</Direccion>
         </InfoPersona>
         <!--Optional:-->
         <TextoSolicitud>$TextoSolicitud</TextoSolicitud>
      </ser:RegistrarPQRSD>
XML;
      $XMLSolicitud = '<?xml version="1.0" encoding="ISO-8859-1"?>' . $XMLSolicitud ;
      $Resultado = RegistrarPQRSDWs($XMLSolicitud, "NO");
      
      if (count($Resultado['Error'])> 0){
        MostrarError($Resultado['Error'][0]['Mensaje']);    
      }
      
      $PathYPatronCargaArchios = __DIR__ . "/data/" . $AutoID . "*";
      $NuevoRaNumero = RegistrarSolicitud($NuevaSoId, $PathYPatronCargaArchios, "NO");
      return $NuevoRaNumero;
    }

    private function getValues( $form ){
        $values = array();
        foreach( $this->fieldMap as $id => $column ){
            $values[ $column ] = isset($form[ $id ]) ? $form[ $id ] : '';
        }
        return $values;
    }
    
} // class


/*
example:

CREATE DATABASE form2db;

CREATE TABLE `demo` (
	`id` INT(10) UNSIGNED NOT NULL auto_increment,
	`name` TINYTEXT NULL,
	`comments` TEXT NULL,
	`email` VARCHAR(100) NULL DEFAULT NULL,

    `AutoID` varchar(64) NULL DEFAULT NULL,
    `HTTP_HOST` varchar(255) NULL DEFAULT NULL,
    `IP` varchar(15) NULL DEFAULT NULL,
    `Date` varchar(16) NULL DEFAULT NULL,
    `Time` varchar(16) NULL DEFAULT NULL,
    `HTTP_REFERER` text,

	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;

GRANT ALL ON form2db.* TO 'form2db_user'@'localhost' IDENTIFIED BY 'form2db_pass';
flush privileges;
*/
