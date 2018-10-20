<?php
/**
 * Servicio de consulta de preguntas activas
 * Es invocado desde las interfaces de validaciones.js
 */

require_once ("../Config/Config.php");
require_once ("../Admin/VerificarAcceso.php");
require_once ($PathSGP. "/BD/$BaseDatosMotor/FuncionesSQL.php");
require_once ($PathSGP. "/Ajax/Lista.php");
        
        $PeId = $_POST['Id'];
        
        $PreguntasEncuestaActivasYPermitidas = array();
        
        //Trae el número de preguntas activas diferentes sobre la que estoy editando
        $PreguntasActivasDiferentes = Sql2Valor ("select Count(*) as PeActivas from preguntasencuesta where PeActiva = 1 and PeId != $PeId");
        
        //Consulta que trae la cantidad de preguntas activas
		$PreguntasActivas = Sql2Valor ("select Count(*) as PeActivas from preguntasencuesta where PeActiva = 1");
		
		/*Se guarda en un arreglo tanto el valor de la consulta con las preguntas activas y el valor de la variable global
		con las preguntas que se permiten activar*/
		
		$PreguntasEncuestaActivasYPermitidas["PreguntasActivas"] = $PreguntasActivas;
		$PreguntasEncuestaActivasYPermitidas["PreguntasPermitidas"] = $CantidadPreguntasActivasEncuesta;
		$PreguntasEncuestaActivasYPermitidas["PreguntasActivasDiferentes"] = $PreguntasActivasDiferentes;
		
echo json_encode($PreguntasEncuestaActivasYPermitidas);

?>