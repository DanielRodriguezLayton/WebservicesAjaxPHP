<?php
/**
 * Servicio consulta el contenido de la solicitud
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

$CampoLlave = $_GET['Id'];

// Se obitene el contenido de la solicitud
$SrId = Sql2Valor("select SrId from solicitudesrespuesta where SrSolicitud = $CampoLlave and SrEstado != 'NC'");

// Se envia la variable $SrId a AdminSolicitudesRespuesta.js
$sOutput = json_encode(htmlentities($SrId));
echo ($sOutput);