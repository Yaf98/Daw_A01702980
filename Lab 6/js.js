document.getElementById("show_hide").onclick = show;
document.getElementById("change_color_size").onmouseover = change_color_size;
document.getElementById("change_color_size").onmouseout = back_default;
document.getElementById("password").oninput =  validar;
document.getElementById("submit").onclick =  validar_password;
document.getElementById("body").onload =  time;
document.getElementById("reminder").onclick =  stop;


function show(){
	let x = document.getElementById("hidden_image");
	if(x.style.visibility=='hidden'){
		x.style.visibility = 'visible';
	}else{
		x.style.visibility = 'hidden';
	}
}


function change_color_size(){
	document.getElementById("change_color_size").style.color ="blue";
	document.getElementById("change_color_size").style.fontSize = "40px";
}

function back_default(){
	document.getElementById("change_color_size").style.color ="black";
	document.getElementById("change_color_size").style.fontSize = "20px";	
}

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
		document.getElementById("tam").style.color ="red";	
		document.getElementById("tam").innerHTML = "Aún no ingresas 8 caracteres  ";

	}else{
		document.getElementById("tam").style.color ="green";	
		document.getElementById("tam").innerHTML = "Contiene al menos 8 caracteres  ";
	}

	if(minuscula==0){
		document.getElementById("min").style.color ="red";	
		document.getElementById("min").innerHTML = "Aún no ingresas una minúscula  ";
	}else{
		document.getElementById("min").style.color ="green";	
		document.getElementById("min").innerHTML = "Contiene una minúscula  ";
	}

	if(mayuscula==0){
		document.getElementById("may").style.color ="red";	
		document.getElementById("may").innerHTML = "Aún no ingresas una mayúscula  ";	
	}else{
		document.getElementById("may").style.color ="green";	
		document.getElementById("may").innerHTML = "Contiene una mayúscula  ";	
	}

	if(caracter==0){
		document.getElementById("car").style.color ="red";	
		document.getElementById("car").innerHTML = "Aún no ingresas caracter especial  ";	
	}else{
		document.getElementById("car").style.color ="green";	
		document.getElementById("car").innerHTML = "Contiene un caracter especial  ";	
	}
	
	if(numero==0){
		document.getElementById("num").style.color ="red";	
		document.getElementById("num").innerHTML = "Ingresa al menos un numero  ";	
	}else{
		document.getElementById("num").style.color ="green";	
		document.getElementById("num").innerHTML = "Contiene un numero  ";	
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
		document.getElementById("ok").style.color ="green";
		document.getElementById("ok").innerHTML = "Contraseña validada, cumple con las caracteristicas";	
	}else{
		document.getElementById("ok").style.color ="red";
		document.getElementById("ok").innerHTML = "Contraseña inválida por el momento, sigue las instruccions y da click en 'validar' nuevamente";
	}
	
}

var x;

function time(){
	 x = setInterval(send_message,2000)
}

function send_message(){
	//alert("Ya validaste tu contraseña\nSi no lo has hecho, ¿qué esperas? Validala en este sitio" );
}

function stop(){
	clearInterval(x);
	alert("Ya no volverá a molestar :)")
}

function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
}

 function mostrar(){
    document.getElementById("oculto").style.display="block";
}