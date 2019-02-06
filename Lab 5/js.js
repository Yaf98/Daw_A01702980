
document.getElementById("password").oninput =  validar;
document.getElementById("submit").onclick =  validar_password;
document.getElementById("u1").onclick =  agregar;

function validar(){

	let contrasena = document.getElementById("password").value;

	let tamano = contrasena.length;

	let mayuscula=0, minuscula=0, caracter=0, numero=0;
	
	for(let i=0; i<tamano;i++){
		
		if(contrasena.charCodeAt(i)>96 && contrasena.charCodeAt(i)<123){ //minuscula
			minuscula = 1;
			//alert("minuscula ya");
		}

		if(contrasena.charCodeAt(i)>64&&contrasena.charCodeAt(i)<91){//mayuscula
			mayuscula = 1;
			//alert("mayuscula ya");
		}

		if(contrasena.charCodeAt(i)>31 && contrasena.charCodeAt(i)<48){ //caracter especial
			caracter = 1;
			//alert("caracter ya");
		}

		if(contrasena.charCodeAt(i)>47 && contrasena.charCodeAt(i)<58){ //numero
			numero = 1;
			//alert("Numero ya");
		}
	}

	if(tamano<8){		
		document.getElementById("tam").innerHTML = "Aún no ingresas 8 caracteres";
	}else{
		document.getElementById("tam").innerHTML = "";
	}

	if(minuscula==0){
		document.getElementById("min").innerHTML = "Aún no ingresas una minúscula";
	}else{
		document.getElementById("min").innerHTML = "";
	}

	if(mayuscula==0){
		document.getElementById("may").innerHTML = "Aún no ingresas una mayúscula";	
	}else{
		document.getElementById("may").innerHTML = "";	
	}

	if(caracter==0){
		document.getElementById("car").innerHTML = "Aún no ingresas caracter especial";	
	}else{
		document.getElementById("car").innerHTML = "";	
	}
	
	if(numero==0){
		document.getElementById("num").innerHTML = "Ingresa al menos un numero";	
	}else{
		document.getElementById("num").innerHTML = "";	
	}

	if(tamano<8||numero==0||mayuscula==0||caracter==0||numero==0){
		return false
	} else{
		return true;
	}
	
}

function validar_password(){

	let contrasena = document.getElementById("password").value;
	let contrasena_confirm = document.getElementById("password_confirm").value;
	
	if(contrasena==contrasena_confirm && validar()==true){
		document.getElementById("ok").innerHTML = "Contraseña validada";	
	}else{
		document.getElementById("ok").innerHTML = "Contraseña invalida por el momento, sigue las instruccions y da click en 'validar' nuevamente";
	}
}

function agregar(){
	document.getElementById("u1").innerHTML = ;	
}