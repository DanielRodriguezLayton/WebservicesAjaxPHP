<?php
/**
 * Servicio de consulta del estado de una solicitud. Retorna un arreglo JSON 
 * con los resultados obtenidos
 */

require_once ("../Config/Config.php");
require_once ("../Publica/VerificarAcceso.php");
require_once ($PathSGP. "/BD/$BaseDatosMotor/FuncionesSQL.php");
require_once ($PathSGP. "/Lib/InicializarVariableGet.php");


InicVarGetSimple('NumeroRadicado');
$arrDatosSolicitud = array();


# Conuslta el ID de la solicitud y su estado
# ------------------------------------------
List($IdSolicitud, $IdEstado,$Estado ) = 
                    Sql2Arreglo("select SoId, EsId, EsNombreExterno 
                               from solicitudes 
                               join estadossolicitudes on EsId = SoEstadoSolicitud
                               where SoRadicadoSolicitud = '"  . EscapeCaracteresMotorBD($NumeroRadicado) . "'",
                               SQL_NUM );
                    
# Si se encuntra la solocitud se procede a buscar una respuesta definitiva, de lo contrario
# se busca entonces una respuesta temporal
# -------------------------------------------------------------------------------------------
if (!empty($IdSolicitud)){
    $EstadoRespuesta = Sql2Valor("select SrEstado from solicitudesrespuesta where SrEstado = 'RS' 
                                  and SrSolicitud = " .  EscapeCaracteresMotorBD($IdSolicitud));
    
    if (empty($EstadoRespuesta)){
       $EstadoRespuesta = Sql2Valor("select SrEstado from solicitudesrespuesta where SrEstado = 'RP'
                                 and SrSolicitud = " .  EscapeCaracteresMotorBD($IdSolicitud));
    }
	
	if($RequiereEncuesta == true)
		$RequiereEncuesta = "SI";
	else
		$RequiereEncuesta = "NO";
	
    $arrDatosSolicitud['RequiereEncuesta'] = $RequiereEncuesta;
	$arrDatosSolicitud['EstadoRespuesta'] = $EstadoRespuesta;
    $arrDatosSolicitud['IdSolicitud'] = $IdSolicitud;
    $arrDatosSolicitud['IdEstado'] = $IdEstado;
    $arrDatosSolicitud['Estado'] = $Estado;
    $arrDatosSolicitud['IdEncuesta'] = Sql2Valor("select EsaId from encuestassatisfaccion 
                                       where EsaSolicitud = " . EscapeCaracteresMotorBD($IdSolicitud));}
    
echo json_encode($arrDatosSolicitud);

?>