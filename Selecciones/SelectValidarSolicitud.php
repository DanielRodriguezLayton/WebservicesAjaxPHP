<?php
/**
 * Servicio que valida la clase de solicitud
 * Es invocado desde la interfaz de AdminSolicitudesRespuesta.js
 */
 
require_once ("../Config/Config.php");
require_once ("../Admin/VerificarAcceso.php");
require_once ("../MotorBD/ExpresionesComunes.php");
require_once ($PathSGP. "/BD/$BaseDatosMotor/FuncionesSQL.php");
require_once ($PathSGP. "/Lib/InicializarVariableGet.php");
require_once ($PathSGP. "/Lib/InicializarAdmin.php");
require_once ($PathSGP. "/Ajax/Lista.php");

# -------------------------------------------------------------------------
# -- Configuracion general del servicio Json. 
# -------------------------------------------------------------------------

if(!empty($_GET['SrResponsable']) && !empty($_GET['Id']))
	$Case = '1';
elseif((!empty($_GET['Id']) && !empty($_GET['Dep'])))
	$Case = '2';
elseif(!empty($_GET['Id']))
	$Case = '3';

switch($Case){
	case '1':
		$CampoLlave = $_GET['Id'];
		$Responsable = $_GET['SrResponsable'];
		//Se valida si el responsable ya e ha elegido anterioemente
		$ResponsableSeleccionado = Sql2Valor("select count(*) from solicitudesrespuesta where SrResponsable = '$Responsable' and SrEstado != 'NC' and SrSolicitud = $CampoLlave");
		// Se envia la variable $CantidadResponsablesConRespuesta a AdminSolicitudesRespuesta.js
		$sOutput = json_encode(htmlentities($ResponsableSeleccionado));
		echo ($sOutput);
	break;
	case '2':
		$CampoLlave = $_GET['Id'];
		$IdDependencia = $_GET['Dep'];
		// Se obitene el id de la dependencia
		$SqlDependencia = "select SrDependencia from solicitudesrespuesta where SrSolicitud = $CampoLlave and SrEstado != 'NC'";
		$resultSqlDependencia  = ReturnExecSQL($SqlDependencia);
		$Dependencia = null;
		while ($arr_Variables = TraerArregloSql($resultSqlDependencia, SQL_ASSOC)){
			$SrDependencia = $arr_Variables['SrDependencia'];
			if($SrDependencia == $IdDependencia)
				$Dependencia = '1';
		}
		
		// Se envia la variable $Dependencia a AdminSolicitudesRespuesta.js
		$sOutput = json_encode(htmlentities($Dependencia));
		echo ($sOutput);
	break;
	case '3':
		$CampoLlave = $_GET['Id'];
		// Se obitene la clase de la solicitud
		$SoClaseSolicitud = Sql2Valor("select SoClaseSolicitud from solicitudes where SoId = $CampoLlave");
		$CantidadResponsablesConRespuesta = null;
		if($SoClaseSolicitud == 'MU')
			$CantidadResponsablesConRespuesta = Sql2Valor("select count(*) from solicitudesrespuesta where (SrEstado != 'NC') and SrSolicitud = $CampoLlave");

		// Se envia la variable $CantidadResponsablesConRespuesta a AdminSolicitudesRespuesta.js
		$sOutput = json_encode(htmlentities($CantidadResponsablesConRespuesta));
		echo ($sOutput);
	break;
}