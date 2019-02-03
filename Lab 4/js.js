/*
	El profesor dijo que podíamos usar cualquier cosa para imprimir resultados, no únicamente document.write()
	Yo use alert()
	Terminar js
*/

document.getElementById("squares_cubes").onclick = squares_cubes;
document.getElementById("sum_numbers").onclick = sum_numbers;
document.getElementById("count_numbers").onclick = count_numbers;
document.getElementById("average_row").onclick = average_row;
document.getElementById("invert_number").onclick = invert_number;
document.getElementById("problem_solution").onclick = problem_solution;

function squares_cubes(){
	let num = prompt('Da un numero');
	let i;

	let string = "";

	for(i=1; i<=num; i++){
		string = string + "     " + i + "              "+ i*i + "             " + i*i*i + "\n";
	}

	alert("Numero   Cuadrado   Cubo\n" + string);	
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
	}

	let string="";

	for (i=0;i<num;i++) {
		string = string+"," +array[i];
			
	}

	for(i=0;i<num;i++){
		if(array[i]==0){
			ceros+=1;
		}else{
			if(array[i]>0){
				positivos+=1;
			}else{
				negativos+=1;
			}
		}
	}
	string = string + "\nHay " + positivos + " numero(s) positivos" + "\nHay " + ceros + " ceros " + "\nHay " + negativos + " numero(s) negativo";
	alert("Arreglo generado: " + string);
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
	
	let string ="";
	for(i=0;i<10;i++){
		for(j=0;j<10;j++){
			suma = suma+array[i][j];
			string = string + array[i][j] + "  "; 
			
		}
		string = string + "Promedio = " + (suma/10) + "\n";
		suma = 0;
	}
	alert("Matriz con promedio por fila: " + "\n" + string);
}

function invert_number(){
	let numero = prompt("Ingresa un numero");
	alert("El numero invertido es: " + numero.split("").reverse().join(""))
	
	
}

class Game{

	constructor(a,b,c,d){
		this.a = a;
		this.b = b;
		this.c = c;
		this.d = d;
	}

	getp(){
		
		return (this.a/this.b);
	}

	getq(){
	
		return ((1-this.a/this.b)*(1-this.c/this.d));
	}

	print_probability(){
		return(this.getp()/(1-this.getq()));
	}
}

function problem_solution(){
	let a = prompt("Ingresa a: ");
	let b = prompt("Ingresa b: ");
	let c = prompt("Ingresa c: ");
	let d = prompt("Ingresa d: ");

	let archers_game =  new Game(a,b,c,d);
	window.alert(archers_game.print_probability());
}



