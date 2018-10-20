<?php
/**
 * Servicio que consulta las solicitudes de respuesta de un radicado en particular
 */
 
require_once ("../Config/Config.php");
require_once ("../Admin/VerificarAcceso.php");
require_once ("../MotorBD/ExpresionesComunes.php");
require_once ($PathSGP. "/BD/$BaseDatosMotor/FuncionesSQL.php");
require_once ($PathSGP. "/Lib/InicializarVariableGet.php");
require_once ($PathSGP. "/Lib/InicializarAdmin.php");
require_once ($PathSGP. "/Ajax/Lista.php");
require_once ($PathSGP. "/Ajax/ObtenerRegistrosListaJson.php");


InicVarGet("SoRadicadoSolicitud");

# -------------------------------------------------------------------------
# -- Configuracion general del servicio Json. 
# -------------------------------------------------------------------------

$CampoLlave ="SrId";
$CampoDescripcion = "Responsable";

if (empty($SoRadicadoSolicitud)){return;}

// Se obitene el contenido de la solicitud
$sql = "select SrId, " . Concatenar("UsNombres","' '","UsApellidos", "'-'", "EsrNombre") . " as Responsable ".
           " from solicitudesrespuesta
             join solicitudes on SoId = SrSolicitud
             join usuarios on UsId=SrResponsable
             join estadossolicitudrespuesta on EsrId=SrEstado 
             where 1=1 $condicion ";

header("Content-Type: text/plain");
echo(ObtenerRegistrosListaJson($sql, $CampoLlave, $CampoDescripcion, $OrdenarPor));

?>