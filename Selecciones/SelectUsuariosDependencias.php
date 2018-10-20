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

	$sql="select UsId, ". $_ExpresionesComunes['Usuarios']['Concat']. " as UsNombres
		from rolesusuarios 
		join usuarios on UsId = RouUsuario
		where RouDependencia = '$DpId' and RouRol in ($AsignacionRolesUsuarios) and UsEstado != 'I'
		order by UsNombres ";

	$result = ReturnExecSQL($sql);

	while ($arr_Variables = TraerArregloSql($result, SQL_ASSOC)){
		$lista->agregarElemento($arr_Variables['UsId'],  urlencode($arr_Variables['UsNombres']));
	}
}

$oJSON = new Services_JSON();
$sOutput = $oJSON->encode($lista);

echo ($sOutput);

?>