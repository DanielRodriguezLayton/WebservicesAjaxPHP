<?php
require_once ("../../Config/Config.php");
require_once ($PathSGP . "/Lib/Utilidades.php");
require_once ("../../Login/Cookies.php");



$Url = AjusteCadenaURL(CrearUrlLocal($_SERVER['REQUEST_URI']));
session_name($NombreApp);


session_start();


# Determina si debe permitir el acceso a un usuario en calidad de visitante o no.
# -------------------------------------------------------------------------------
if ( !isset($_SESSION['Session_UsId'])  or !isset($_SESSION['Session_UsTipo'])) {
	SetearSesionVisitante();
}



function SetearSesionVisitante(){
	global $UsId;
	global $UsTipo;
	global $_SESSION;
	$_SESSION['Session_UsId'] = "Visitante";
	$_SESSION['Session_UsTipo'] = "V";
	$_SESSION['Session_UsNombres'] = "Visitante";
	$_SESSION['Session_TuDescripcion'] = 'Usuario';
	$_SESSION['Session_ModalidadLogin'] = "Visitante";
	$UsId=$_SESSION['Session_UsId'];
	$UsTipo=$_SESSION['Session_UsTipo'];
	
}



session_write_close(); 
$AccionDefecto='Mirar';

?>
