<?php
/**
 * Servicio de consulta del estado de una solicitud. Retorna un arreglo JSON 
 * con los resultados obtenidos
 */

require_once ("../Config/Config.php");
require_once ("../Publica/VerificarAcceso.php");
require_once ($PathSGP. "/BD/$BaseDatosMotor/FuncionesSQL.php");
require_once ($PathSGP. "/Lib/InicializarVariableGet.php");
require_once ($PathSGP . "/Lib/XsltTransform.php");
require_once ($PathSGP . "/WebServices/Mensajeria.php");
require_once ("../Lib/RecursosIntegracionAZDigital.php");


InicVarGetSimple('IdCarpeta');
$Resultado = Array();
$PathCarpeta = "";

if (!empty($IdCarpeta)){
    $Resultado = ConsultarPathCarpetaAZDigital($IdCarpeta);
}
echo json_encode($Resultado);

?>