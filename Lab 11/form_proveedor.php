<?php
	require_once("utils.php");
	$flag = 1;
	$rfc = $razon = $nombre = $telefono = $banco = $cuenta = $clabe = "";

	$rfc_error = $razon_error = $nombre_error = $telefono_error = $banco_error = $cuenta_error = $clabe_error = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST"){


		$rfc = test_input($_POST["rfc"]);
		$razon = test_input($_POST["razon"]);
		$nombre = test_input($_POST["nombre"]);
		$telefono = test_input($_POST["telefono"]);
		$banco = test_input($_POST["banco"]);
		$cuenta = test_input($_POST["cuenta"]);
		$clabe = test_input($_POST["clabe"]);


		if(empty($_POST["rfc"])){
			$rfc_error = "*Ingresa el RFC";
			$flag = 0;
		}else{

				$expresion = '/A-Z-0-9/';  // 
				if(strlen($_POST["rfc"])!=13 || !(preg_match('/[a-zA-Z]/', $_POST["rfc"])) || !(preg_match('/\d/', $_POST["rfc"]))){ //tiene 13 
					$rfc_error = "*El RFC debe contener 13 caracteres alfanúmericos";
					$flag = 0;
					
				}
		}


		if(empty($_POST["razon"])){
			$razon_error = "*Ingresa la razón social";
			$flag = 0;
		}else{
			if($_POST["razon"]>30){
				$razon_error = "*Razon social demasiado larga (máximo 30 caracteres)";
				$flag = 0;
			}
		}



		if(empty($_POST["nombre"])){
			$nombre_error = "*Ingresa el nombre";
			$flag = 0;
		}else{
			if(strlen($_POST["nombre"])>30){
				$nombre_error = "*Nombre del contacto demasiado largo (máximo 30 caracteres)";
				$flag = 0;
			}else{
				$expresion = '/[0-9]/';  //
				if(preg_match($expresion, $_POST["nombre"])){
					$nombre_error = "*El nombre no puede contener numeros";
					$flag = 0;
				}
			}
		}

		if(empty($_POST["telefono"])){
			$telefono_error = "*Ingresa el teléfono";
			$flag = 0;
		}else{
			
			if(strlen($_POST["telefono"])!=10 || !is_numeric($_POST["telefono"])) { 
				$telefono_error = "*El teléfono debe contener 10 números (no letras)";
				$flag = 0;
			}			
		}

		if(empty($_POST["banco"])){
			$banco_error = "*Ingresa el banco";
			$flag = 0;
		}else{
			$expresion = '/[0-9]/';  //
			if(strlen($_POST["banco"])>30){
				$banco_error = 	"*Nombre del banco demasiado largo (máximo 30 caracteres)";
				$flag = 0;
			}else{
				if(preg_match($expresion, $_POST["banco"])){
					$banco_error = 	"*Nombre del banco no puede contener números";
					$flag = 0;
				}
			}
			
		}

		
		if(empty($_POST["cuenta"])){
			$cuenta_error = "*Ingresa la cuenta";
			$flag = 0;
		}else{

			if(strlen($_POST["cuenta"])!=20 || !(preg_match('/[a-zA-Z]/', $_POST["rfc"])) || !(preg_match('/\d/', $_POST["cuenta"]))){ //tiene 13 
				$cuenta_error = "*La cuenta debe contener exactamente 20 caracteres alfanúmericos";
				$flag = 0;
					
			}
		}

		if(empty($_POST["clabe"])){
			$clabe_error = "*Ingresa la clabe";
			$flag = 0;
		}else{
			if(strlen($_POST["clabe"])!=18 || !is_numeric($_POST["clabe"])){
				$clabe_error = "*La clabe debe contener exactamente 18 caracteres númericos";
				$flag = 0;
			}
		}
		if ($flag==1 && 
			$_POST["rfc"] !="" && $_POST["razon"] != "" &&
			$_POST["nombre"] != "" && $_POST["telefono"] != "" &&
			$_POST["banco"] != "" && $_POST["cuenta"] != "" &&
			$_POST["clabe"] != "" 
		) {

			$info = info($rfc,$razon,$nombre,$telefono,$banco,$cuenta, $clabe);	
				
		}
	}


	
?>