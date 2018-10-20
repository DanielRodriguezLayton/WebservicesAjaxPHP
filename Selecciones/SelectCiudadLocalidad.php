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


InicVarGetSimple('EstId');

$lista= new Lista();
header("Content-Type: text/plain");

if ($EstId!=""){

	$sql="select CiuId, ". $_ExpresionesComunes['CiudadesLocalidades']['Concat']. " as CiuNombre
		from ciudadeslocalidades 
		where CiuEstado = '$EstId'
		order by CiuCodigo ";

	$result = ReturnExecSQL($sql);

	while ($arr_Variables = TraerArregloSql($result, SQL_ASSOC)){
		$lista->agregarElemento($arr_Variables['CiuId'],  urlencode($arr_Variables['CiuNombre']));
	}
}

$oJSON = new Services_JSON();
$sOutput = $oJSON->encode($lista);

echo ($sOutput);

?>