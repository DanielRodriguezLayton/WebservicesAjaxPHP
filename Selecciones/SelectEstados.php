<?php
/**
 * Servicio de consulta los estados segun el pais
 * Es invocado desde las interfaces de FormaAgregarSolicitudes.js
 */

require_once ("../Config/Config.php");
require_once ("../Admin/VerificarAcceso.php");
require_once ("../MotorBD/ExpresionesComunes.php");
require_once ($PathSGP. "/BD/$BaseDatosMotor/FuncionesSQL.php");
require_once ($PathSGP. "/Lib/InicializarVariableGet.php");
require_once ($PathSGP. "/Lib/InicializarAdmin.php");
require_once ($PathSGP. "/Ajax/Lista.php");

InicVarGetSimple('PaiId');

$CampoLlave = 'EstId';
$CampoDescripcion = 'EstNombre';

$sql = "select $CampoLlave, $CampoDescripcion
        from estados
        where EstPais = '$PaiId'
        order by 2 ";

# -------------------------------------------------------------------------
# -- Ejecucion de del query y transformacion Json.
# -------------------------------------------------------------------------

$lista = new Lista();
header("Content-Type: text/plain");

$result = ReturnExecSQL($sql);
while ($arr_Variables = TraerArregloSql($result, SQL_ASSOC)){
    $lista->agregarElemento($arr_Variables[$CampoLlave],  urlencode($arr_Variables[$CampoDescripcion]));
}

echo json_encode($lista);