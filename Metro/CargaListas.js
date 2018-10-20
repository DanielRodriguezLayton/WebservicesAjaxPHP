/**
 * 
 */
$(document).ready(function(){
	
	// Carga de Tipos de Solicitudes
	// ---------------------------------
	$.ajax({
        type: 'GET',
        url: '../../Selecciones/SelectTiposDeSolicitudes.php',
        dataType: 'json',
        success: function (Lista) {
        	actualizarElementosLista('f5',Lista);
         }
    });

	    // Cargar Identificacion poblacional
    // ---------------------------------
    $.ajax({
        type: 'GET',
        url: '../../Selecciones/SelectIdentificacionPoblacional.php',
        dataType: 'json',
        success: function (Lista) {
            actualizarElementosLista('f30',Lista);
        }
    });
    
	
    // Cargar Tipo Solicitnate
    // ---------------------------------
    $.ajax({
        type: 'GET',
        url: '../../Selecciones/SelectTiposDeSolicitante.php',
        dataType: 'json',
        success: function (Lista) {
            actualizarElementosLista('f40',Lista);
        }
    });

	
    // AtencionPreferencial
    // ---------------------------------
    $.ajax({
        type: 'GET',
        url: '../../Selecciones/SelectAtencionPreferencial.php',
        dataType: 'json',
        success: function (Lista) {
            actualizarElementosLista('f8',Lista);
        }
    });
	
	
	// Generos
    // ---------------------------------
    $.ajax({
        type: 'GET',
        url: '../../Selecciones/SelectGeneros.php',
        dataType: 'json',
        success: function (Lista) {
            actualizarElementosLista('f83',Lista);
        }
    });
	
	
	// Tipos persona
    // ---------------------------------
    $.ajax({
        type: 'GET',
        url: '../../Selecciones/SelectTiposPersonas.php',
        dataType: 'json',
        success: function (Lista) {
            actualizarElementosLista('f43',Lista);
        }
    });
	
	
	// Cargar Pais
    // ---------------------------------
    $.ajax({
        type: 'GET',
        url: '../../Selecciones/SelectPais.php',
        dataType: 'json',
        success: function (Lista) {
        	actualizarElementosLista('f17',Lista);
        }
    });
	
	// Cargar Descripción de Tipos Solicitudes
    // ---------------------------------
    /*$.ajax({
        type: 'GET',
        url: '../../Selecciones/SelectDescripTiposSolicitudes.php',
        dataType: 'json',
        success: function (Lista) {
        	actualizarElementosLista('fd1',Lista);
        }
    });
	*/
});

/*FUNCIÓN Jquery */
	// Carga de Tipos de Identificacion
	// --------------------------------
    
function TiposIdent(){
	var cod = document.getElementById("f40").value;
	
	if (cod == 'PN'){
        $.ajax({
            type: 'GET',
            url: '../../Selecciones/SelectTiposIdentificacion.php',
            dataType: 'json',
            success: function (Lista) {
      	        actualizarElementosLista('f11',Lista);
            }
        });		
	}else {
		$.ajax({
            type: 'GET',
            url: '../../Selecciones/SelectTiposIdentificacion2.php',
            dataType: 'json',
            success: function (Lista) {
      	        actualizarElementosLista('f11',Lista);
            }
        });
	}
}

function TiposdescripSolicitudes(){
	var solicitud = $("#f5").val();
	
	/*Consulta POST*/
	
	/*if (solicitud != "") {
		$.post("/../../PQRSD/Selecciones/SelectDescripTiposSolicitudes.php", {valorsolicitud: solicitud}, function(mensaje) {
			$("#fd1").text(mensaje);
		})
	} else {
		("#fd1").text('');
	}*/
	
	/*consulta asyncrona*/
	$.ajax({
		type: 'POST',
		url: '/../../PQRSD/Selecciones/SelectDescripTiposSolicitudes.php',
		data: {
			valorsolicitud: solicitud
		},
		dataType:"html",
		success: function (data) {
			$("#fd1").text(data);
		},
		error: function (data) {
			console.log('Error: ' + data);
		}
	});
	
}