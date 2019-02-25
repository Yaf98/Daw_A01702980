<?php

	/*
		Comments on php
		It's not case sensitive
		$ use to declare variables
		With echo I can print html tags
	
	*/

	function random_array(){
		$my_array = array();
		for($x=0; $x<10; $x++){
			$my_array[$x] = rand(1,10);
		}
		return 	$my_array;
	}

	function display_array($arr){
		for($x=0; $x<10; $x++){
			echo $arr[$x]." ";
		}
	}

	//FUNCIONES EN PHP
	function average($arr){
		$sum = 0;
		for($x=0; $x<10; $x++){
			$sum = $sum+ $arr[$x];
		}

		return $sum/10;
	}

	function median($arr){
				
		sort($arr);
				
		$n = count($arr);
		$mid = $n/2;

		if($n%2==0){
			return ($arr[$mid]+$arr[$mid-1])/2;
		}else{
			return $arr[$mid];
		}
		
		
	}

	function list_nums($arr){
		$string = "<ul>";
		for($i=0; $i<10; $i++){
			$string.= "<li>".$arr[$i]."</li>";		
		}
		$string .= "<li>Promedio: ".average($arr)."</li>"."<li>Mediana: ".median($arr)."</li><li>Arreglo ordenado de menor a mayor: ";

		sort($arr);

		for($i=0; $i<10; $i++){
			$string.= " ".$arr[$i];		
		}
		$string.= "</li><li>Arreglo ordenado de mayor a menor";

		for($i=9; $i>=0; $i--){
			$string.= " ".$arr[$i];		
		}
		$string.= "</li>";
		return $string;

	}


	function squares_cubes($n){
		$string = "<table><th>Numero</th><th>Cuadrado</th><th>Cubo</th>";
		
		for($i=1; $i<$n; $i++){
			$string.= "<tr><td>".$i."</td><td>".$i*$i."</td>"."<td>".$i*$i*$i."</td></tr>";
		}
			
		$string.= "</table>";
		echo $string;
	}


	function codeForces($a,$b,$c,$d){
		$p = $a/$b;
		$q = (1-$a/$b)*(1-$c/$d);
		$probability = $p/(1-$q);
		return $probability;
	}



?>