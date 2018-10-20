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


InicVarGetSimple('DpId');

$lista= new Lista();
header("Content-Type: text/plain");

if ($DpId!=""){

	$sql="select TeId, ". $_ExpresionesComunes['Temas']['Concat']. " as TeTema
		from temas 
		where TeDependencia = '$DpId' and TeEstado = 'A'
		order by TeTema ";
	
	$result = ReturnExecSQL($sql);

	while ($arr_Variables = TraerArregloSql($result, SQL_ASSOC)){
		$lista->agregarElemento($arr_Variables['TeId'],  urlencode($arr_Variables['TeTema']));
	}
}

$oJSON = new Services_JSON();
$sOutput = $oJSON->encode($lista);

echo ($sOutput);

?>