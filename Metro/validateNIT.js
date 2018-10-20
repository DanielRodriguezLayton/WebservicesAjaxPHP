var DigiVerif, nit, tipoident;
var todo_correcto = true;

function ShowNit(){
	var cod = new Array();
	var i;
	cod = document.getElementById("fn25").value;
	/*alert(cod);*/
        
	var Num1, Num2, Num3 = 0, modulo11;
	var NumPrimos = [];
		
		
		/*Se coloca el limite de los numeros primos calculados, (9)*/
	for (var p = 2; p <= 42; p++) {
			
			/*primos*/
		if (Primos(p)) {
			NumPrimos.push(p);
		}
	}
		
	for (i = 1; i <= cod.length; i++) {
		Num1 = cod[cod.length - i];					
						
			/*Producto con el arreglo de numeros primos*/
		Num2 = Num1 * NumPrimos[i-1];
			
		Num3 = Num3 + Num2;		  			
		
	}
			/*Calculo del Digito de Verificación*/
		modulo11 = Num3 % 11;
				
		DigiVerif = 11 - modulo11;		    
		
		/* Posibles Digitos de Verificación*/
		
		/*if (DigiVerif < 10) {	
		    console.log("Digito de Verificacion " + DigiVerif);*/
			
		if(DigiVerif == 11) {
				
			DigiVerif = 0;
			console.log("Digito de Verificacion " + DigiVerif);
				
		}else if(DigiVerif == 10){
				
			DigiVerif = 1;
			console.log("Digito de Verificacion " + DigiVerif);	
				
		}
/*
	FUNCION NUMEROS PRIMOS   
*/
    function Primos(Nump) {
			
        for (var n = 2; n < Nump; n++) {

            if (Nump % n === 0) {
               return false;
            }

        }
			/*Estos primos no se incluyen en el calculo del Digito de Verificación*/
		if (Nump == 2 || Nump == 5 || Nump == 11 || Nump == 31) {
			return false;
		}

        return Nump !== 1;
    }
		/*return nit  */	    		
		nit = cod + "-" + DigiVerif;
		/*Pasando Valor de NIT a campo f25 para ser guardado en base de datos*/
		tipoident = document.getElementById("f11").value;
		if (tipoident == "NIT") {			
	        document.getElementById("f25").value = nit;
		}
	
		return nit;
}
/*console.log(ShowNit());*/

/*Validate DV*/
function ComprobarDv(){
	
	var dv = document.getElementById("dv").value;
	var tipouser = document.getElementsByName("f7");
	var valoruser = '';
	
	
    for (var i=0; i<tipouser.length; i++) {

        if (tipouser[i].checked == true) { valoruser=tipouser[i].value; }
		    if ( valoruser == "SI") {
			/*console.log("anonimo " + valoruser);*/
			    return todo_correcto;
		}
    }
	
	if (tipoident != "NIT") {
		return todo_correcto;
	}
	
		
	if (dv != DigiVerif || valor == null || /^[0-9]{1}$/ ) {
        alert("El digito de verificacion esta vacio o es incorrecto");
		todo_correcto = false;
        return todo_correcto;
    }
	
	if (dv === DigiVerif) {
	    return todo_correcto;		
	}	
}
/*console.log(ComprobarDv());	*/
