document.getElementById("squares_cubes").onclick = squares_cubes;
document.getElementById("sum_numbers").onclick = sum_numbers;
document.getElementById("count_numbers").onclick = count_numbers;
document.getElementById("average_row").onclick = average_row;
document.getElementById("reverse_number").onclick = invert_number;

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



function sum_numbers(){

	let rand1 = Math.floor((Math.random()*100)+1);
	let rand2 = Math.floor((Math.random()*100)+1);

	let inicio = performance.now();
	let num = prompt("Cual es el resultado de: " + rand1 + " + " + rand2);
	let fin = performance.now();

	
	if(num==rand2+rand1){
		window.alert("Felicidades, es correcto!!!" + " Tardaste " + ((fin-inicio)/1000).toFixed(3) + " segundos en responder");
		
	}else{
		window.alert("Respuesta incorrecta!" + " Tardaste " + ((fin-inicio)/1000).toFixed(3) + " segundos en responder");
	
	}

}	

function count_numbers(){
	let num = prompt("Cuantos elementos deseas en el arreglo");
	let array = new Array();
	let i, positivos=0, negativos=0, ceros=0;

	for(i=0;i<num;i++){
		array[i] = Math.floor((Math.random()*50)-40);
		window.alert(array[i]);
	}

	for(i=0;i<num;i++){
		if(array[i]==0){
			ceros+=1;
		}else{
			if(array[i]>0){
				positivos+=1;
				window.alert("Positivo");
			}else{
				negativos+=1;
				window.alert("Negativo");
			}
		}
	}
	document.write("Hay " + positivos + " numero(s) positivos <br>")
	document.write("Hay " + ceros + " ceros <br>");
	document.write("Hay " + negativos + " numero(s) negativo <br>");
}

function average_row(){
	let array = new Array();
	let i,j;
	for(i=0;i<10;i++){
		array[i] = new Array();
		for(j=0;j<10;j++){
			array[i][j] = Math.floor((Math.random()*100)+1);
		}
	}

	let suma=0;

	for(i=0;i<10;i++){
		for(j=0;j<10;j++){
			suma = suma+array[i][j];
		}
		window.alert("Promedio = " + suma/10);
		suma = 0;
	}

}
function invert_number(){
	let numero = prompt("Ingresa un numero");
	document.write(numero.split("").reverse().join(""));
	
}



function prueba(){
	let probability = new Object();


}


