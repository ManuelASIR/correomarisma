// CREACION DE FUNCION "VALIDAR"
function validar(){

// DECLARACION DE VARIABLES A UTILIZAR
    var destinatario;
    var asunto;
    var cuerpo;

// RECOGER VALORES DEL FORMULARIO MEDIANTE EL VALOR "ID"
destinatario = document.getElementById("destinatario").value;
asunto = document.getElementById("asunto").value;
cuerpo = document.getElementById("cuerpo").value;

// CREACION DE EXPRESION REGULAR PARA VALIDAR CORREO 
// TEXTO@DOMINIO.TEXTO
correo = /\w+@\w+\.+[a-z]/;	
	
// EL CAMPO DESTINATARIO NO PUEDE ESTAR VACIO
    if (destinatario === ""){
        alert ("NO HAS ESCRITO EL DESTINATARIO");
        return false;
    }

// EL CAMPO DESTINATARIO NO PUEDE TENER ESPACIOS EN BLANCO
    else if (destinatario == 0){
        alert ("EL DESTINATARIO NO ES CORRECTO");
        return false;
    }

// SI LA EXPRESION QUE SE INTRODUCE EN CORREO NO ES VALIDA MUESTRA ERROR
    else if (!correo.test(destinatario)){
		alert ("EL CORREO NO ES CORRECTO");
		return false;
    }

// EL CAMPO ASUNTO NO PUEDE ESTAR VACIO
    else if (asunto === ""){
        alert ("ESCRIBE EL ASUNTO DEL MENSAJE");
        return false;
    }

// EL CAMPO ASUNTO NO PUEDE TENER ESPACIOS EN BLANCO
    else if (asunto == 0){
        alert ("ESCRIBE UN ASUNTO CORRECTO");
        return false;
    }

// EL CAMPO DE CUERPO NO PUEDE ESTAR VACIO
    else if (cuerpo === ""){
        alert ("ESCRIBE EL MENSAJE");
        return false;
    }

// EL CAMPO CUERPO NO PUEDE TENER ESPACIOS EN BLANCO
    else if (cuerpo == 0){
        alert ("ESCRIBE EL CUERPO DEL MENSAJE");
        return false;
    }
}