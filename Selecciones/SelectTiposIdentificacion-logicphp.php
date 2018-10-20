<?php
/**
 * Servicio de consulta JSON de Tipos de Identificacion
*/

require_once ("../Config/Config.php");
require_once ("../Admin/VerificarAcceso.php");
require_once ($PathSGP. "/Lib/Perfilacion.php");
require_once ($PathSGP. "/Lib/InicializarVariableGet.php");
require_once ($PathSGP. "/Lib/InicializarAdmin.php");
require_once ($PathSGP. "/Ajax/Lista.php");
require_once ($PathSGP. "/Ajax/ObtenerRegistrosListaJson.php");
require_once ("../MotorBD/ExpresionesComunes.php");
require_once ($PathSGP . "/Lib/Utilidades.php");
require_once ($PathSGP . "/BD/". $BaseDatosMotor. "/FuncionesSQL.php");
require_once ($PathSGP ."/Ajax/JSON.php");
require_once ($PathSGP ."/Ajax/Lista.php");


$lista = new Lista();
header("Content-Type: text/plain");

$CampoLlave = 'TidId';
$CampoDescripcion = 'TidDescripcion';

$TlId = "PJ";

if ($TlId == 'PN'){

	$sql="select $CampoLlave, $CampoDescripcion  from tiposidentificacion ";

	$result = ReturnExecSQL($sql);
	
} else {
    $sql="select $CampoLlave, $CampoDescripcion  from tiposidentificacion where $CampoLlave = 'NIT' ";

	$result = ReturnExecSQL($sql);

	
}

echo(ObtenerRegistrosListaJson($sql, $CampoLlave, $CampoDescripcion, "order by 2"));

?>