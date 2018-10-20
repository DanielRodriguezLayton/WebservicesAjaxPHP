<?php
/**
 * Servicio de consulta JSON de Tipos de Solicitudes
*/

require_once ("../Config/Config.php");
require_once ("../Admin/VerificarAcceso.php");
require_once ($PathSGP. "/Lib/Perfilacion.php");
require_once ($PathSGP. "/Lib/InicializarVariableGet.php");
require_once ($PathSGP. "/Lib/InicializarAdmin.php");
require_once ($PathSGP. "/Ajax/Lista.php");
require_once ($PathSGP. "/Ajax/ObtenerRegistrosListaJson.php");



header("Content-Type: text/plain");
$lista = new Lista();

$CampoLlave = 'TlId';
$CampoDescripcion = 'TlNombre';

$sql = "select $CampoLlave, $CampoDescripcion from 
		tipossolicitante  ";

echo(ObtenerRegistrosListaJson($sql, $CampoLlave, $CampoDescripcion, "order by 2"));		


?>
