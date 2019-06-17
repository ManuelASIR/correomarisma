// CREACION DE FUNCION "VALIDAR"
function validar(){

// DECLARACION DE VARIABLES A UTILIZAR
    var nombre;
    var usuario;
    var clave;
    var reclave;
    var telefono;
	
// RECOGER VALORES DEL FORMULARIO MEDIANTE EL VALOR "ID"
    nombre = document.getElementById("nombre").value;
    usuario = document.getElementById("usuario").value;
    clave = document.getElementById("clave").value;
    reclave = document.getElementById("reclave").value;
    telefono = document.getElementById("telefono").value;

// LOS CAMPOS NO PUEDEN ESTAR VACIOS 
    if (nombre === "" || usuario === "" || clave === "" || reclave === "" || telefono === "" ){
        alert ("COMPLETA TODOS LOS CAMPOS"); 
        return false; 
    }

// LOS CAMPOS NO PUEDEN TENER SOLO ESPACIOS EN BLANCO
    else if (nombre ==0 || usuario==0 || clave ==0 || reclave ==0 || telefono ==0 ){
        alert("NO SE PERMITEN ESPACIOS EN BLANCO");
        return false;
    }

// LONGITUD MAXIMA DEL NOMBRE
    else if (nombre.length>20){
        alert ("EL NOMBRE ES DEMASIADO LARGO");
        return false;
    }

// LONGITUD MINIMA DE LA CLAVE DE USUARIO
    else if (clave.length<5){
        alert ("LA CLAVE ES DEMASIADO CORTA (MINIMO 5 CARACTERES)");
        return false;
    }

// LA CLAVE Y EL USUARIO NO PUEDEN SER IDENTICAS
	else if (clave === usuario){
        alert ("LA CLAVE NO PUEDE SER IGUAL QUE EL NOMBRE DE USUARIO")
        return false;
    }

// LA CLAVE Y LA CONFIRMACION DE LA CLAVE TIENEN QUE SER IGUALES
    else if (clave != reclave){
        alert ("LAS CLAVES NO COINCIDEN")
        return false;
    }

// LONGITUD MAXIMA DEL TELEFONO
    else if (telefono.length>=10){
        alert ("EL TELEFONO TIENE DEMASIADOS NUMEROS");
        return false;
    }

// LONGITUD MINIMA DEL TELEFONO
    else if (telefono.length<9){
        alert ("EL TELEFONO NO ES UN NUMERO REAL");
        return false;
    }
   
// LA FUNCION "ISNAN" OBLIGA A SOLO PERMITIR NUMEROS   
    else if (isNaN(telefono)){
        alert("ESCRIBA CORRECTAMENTE EL TELEFONO");
        return false;
    }
}  