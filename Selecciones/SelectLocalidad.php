<?php
# -------------------------------------------------------------------------------------------------
#  Administracion tabla: Radicacion
#  Motor Base de Datos: MySQL
# -------------------------------------------------------------------------------------------------
#	Sistema de Gestion de Procesos (SGP)
# -------------------------------------------------------------------------------------------------
#	Plantilla de control de tabla, pseudo-generada automaticamente.
#		ANALITICA LTDA. (www.analitica.com.co)
#		Todos los derechos reservados.
# -------------------------------------------------------------------------------------------------
require_once ("../Config/Config.php");
require_once ("../MotorBD/ExpresionesComunes.php");
require_once ($PathSGP . "/Lib/Utilidades.php");
require_once ($PathSGP . "/BD/". $BaseDatosMotor. "/FuncionesSQL.php");
require_once ($PathSGP . "/Lib/InicializarVariableGet.php");
require_once ($PathSGP ."/Ajax/JSON.php");
require_once ($PathSGP ."/Ajax/Lista.php");


InicVarGetSimple('CiuId');

$CampoLlave = 'LocId';
$CampoDescripcion = 'LocNombre';

$lista= new Lista();
header("Content-Type: text/plain");

if ($CiuId!=""){

	$sql="select $CampoLlave, $CampoDescripcion  from localidades where LocCiudadLocalidad = '$CiuId' ";

	$result = ReturnExecSQL($sql);

	while ($arr_Variables = TraerArregloSql($result, SQL_ASSOC)){
		$lista->agregarElemento($arr_Variables['LocId'],  urlencode($arr_Variables['LocNombre']));
	}
}

$oJSON = new Services_JSON();
$sOutput = $oJSON->encode($lista);

echo ($sOutput);

?>