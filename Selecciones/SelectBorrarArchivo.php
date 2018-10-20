<?php
/**
 * Elimina un  archivo del area temporal de carga
 */

require_once ("../Config/Config.php");
require_once ("../Admin/VerificarAcceso.php");
require_once ("../MotorBD/ExpresionesComunes.php");
require ("../Lib/Utilidades.php");
require_once ($PathSGP. "/BD/$BaseDatosMotor/FuncionesSQL.php");
require_once ($PathSGP. "/Lib/InicializarVariableGet.php");
require_once ($PathSGP. "/Lib/InicializarAdmin.php");

InicVarPost('ArchivoBorrar');
$ArchivoBorrar = utf8_decode($ArchivoBorrar);

# Ajusta el nombre del archivo removiendo sus caracteres especiales
# -----------------------------------------------------------------  
$ArchivoBorrar = ajustarNombreArchivo($ArchivoBorrar);

unlink($PathApp  . "/Temp/CargaArchivos/$ArchivoBorrar");
die("OK");
?>