//CREACION DE FUNCION PARA VALIDAR
function validar_login(){
	
//DECLARACION DE VARIABLES A USAR
    var usuario;
    var clave;
	
//RECOGER DATOS DE LOS ID DEL FORMULARIO	
	usuario = document.getElementById("usuario").value;
	clave = document.getElementById("clave").value;
	
//SI EL CAMPO "USUARIO" ESTA VACIO MUESTRA MENSAJE DE ERROR
	if(usuario === ""){
			alert ("INTRODUCE UN NOMBRE DE USUARIO");
			return false; 
	}
	
//SI EL CAMPO "CLAVE" ESTA VACIO MUESTRA MENSAJE DE ERROR
	else if (clave === ""){
			alert ("INTRODUCE LA CLAVE");
			return false; 
	}
}