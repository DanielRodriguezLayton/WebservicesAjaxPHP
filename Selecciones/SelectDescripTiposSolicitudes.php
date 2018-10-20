<?php
/**
 * Servicio de consulta JSON de Tipos de Identificacion
*/

require_once ("../Config/Config.php");
require_once ("../Admin/VerificarAcceso.php");
require_once ($PathSGP. "/Lib/Perfilacion.php");
/*require_once ($PathSGP. "/Lib/InicializarVariableGet.php");*/
require_once ($PathSGP. "/Lib/InicializarAdmin.php");
/*equire_once ($PathSGP. "/Ajax/Lista.php");
require_once ($PathSGP. "/Ajax/ObtenerRegistrosListaJson.php");
*/
$TsId = $_POST['valorsolicitud']; 

     /*CONEXIÓN AL SERVIDOR DE BD*/
/*$conexion = new mysqli("localhost", "pqrsd", "1q2w3e4r", "pqrsd");*/
$conexion = new mysqli($BaseDatosServidor, $BaseDatosUsuario, $BaseDatosPassword, $BaseDatosEsquema);

$mensaje = "";

$CampoLlave = 'TsId';
$CampoDescripcion = 'TsDescripcion';


// Check connection
if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
} 

$sql = "SELECT $CampoDescripcion FROM TiposSolicitudes WHERE $CampoLlave='$TsId' ";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["TsDescripcion"];
    }
} else {
    echo "0 results";
}

$conexion->close();

?>
