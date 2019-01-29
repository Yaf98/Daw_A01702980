function squares_cubes(){

	let num = prompt('Da un numero');
	let i;

	for(i=1; i<=num; i++){
		
		document.write("<th>"+i+"\n");
		document.write("<th>"+i*i+"\n");
		document.write("<th>"+i*i*i+"\n");
	  	document.write("<br>");
 	  	
	}
}

function sum(){

	let rand1 = Math.floor((Math.random()*1000)+1);
	let rand2 = Math.floor((Math.random()*1000)+1);

	let inicio = performance.now();
	let num = prompt("Cual es el resultado de: " + rand1 + " + " + rand2);
	let fin = performance.now();

	
	if(num==rand2+rand1){
		window.alert("Felicidades, es correcto!!!" + " Tardaste " + ((fin-inicio)/1000).toFixed(3) + " segundos en responder");
		
	}else{
		window.alert("Respuesta incorrecta!" + " Tardaste " + ((fin-inicio)/1000).toFixed(3) + " segundos en responder");
	
	}

}	

function counter(){
	
	/*Cantidad de 0s*/
	/*Cantidad de numeros mayores*/
	/*Cantidad de numeros negativos*/
}

