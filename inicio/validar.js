// CREACION DE FUNCION "VALIDAR"
function validar(){

// DECLARACION DE VARIABLES A UTILIZAR
    var username;
    var password;

// RECOGER VALORES DEL FORMULARIO MEDIANTE EL VALOR "ID"
    username = document.getElementById("username").value;
    password = document.getElementById("password").value;
    
// CREACION DE EXPRESION REGULAR PARA VALIDAR CORREO 
// TEXTO@DOMINIO.TEXTO
    correo = /\w+@\w+\.+[a-z]/;
	
// EL CAMPO USERNAME NO PUEDE ESTAR VACIO
    if (username === ""){
        alert ("NO HAS INTRODUCIDO EL CORREO");
        return false;
    }

// EL CAMPO USERNAME NO PUEDE TENER ESPACIOS EN BLANCO
    else if (username == 0){
        alert ("CORREO ELECTRONICO NO ES CORRECTO");
        return false;
    }

// SI LA EXPRESION QUE SE INTRODUCE EN CORREO NO ES VALIDA MUESTRA ERROR
    else if (!correo.test(username)){
		alert ("EL CORREO NO ES VALIDO");
		return false;
    }

// EL CAMPO PASSWORD NO PUEDE ESTAR VACIO
    else if (password === ""){
        alert ("NO HAS INTRODUCIDO LA CONTRASEÑA");
        return false;
    }

// EL CAMPO PASSWORD NO PUEDE TENER ESPACIOS EN BLANCO
    else if (password == 0){
        alert ("NO HAS INTRODUCIDO LA CONTRASEÑA");
        return false;
    }
}