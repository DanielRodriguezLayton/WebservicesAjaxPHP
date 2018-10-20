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



header("Content-Type: text/plain");
$lista = new Lista();

$CampoLlave = 'TidId';
$CampoDescripcion = 'TidDescripcion';

$sql = "select $CampoLlave, $CampoDescripcion from 
		tiposidentificacion ";

echo(ObtenerRegistrosListaJson($sql, $CampoLlave, $CampoDescripcion, "order by 2"));		


?>
