<?php  
	function _header(){
		include_once("partials/header.html");
	}

	function _buttons(){
		include_once("partials/buttons.html");
	}
	
	function _questions(){
		include_once("partials/questions.html");
	}

	function _references(){
		include_once("partials/references.html");
	}

	function _footer(){
		include_once("partials/footer.html");
	}




	/***************/
	//this function connects with the database
	function connectDb(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "lab14";

		$connection = mysqli_connect($servername,$username,$password,$dbname);

		//check connection, it's false is the connection failed, so we sent a message
		if(!$connection){
			die("Connection failed: ".mysql_connect_error());
		}
		$connection->set_charset("utf8");
		return $connection; 
	}

	//function to disconnect from the database
	function closeDb($mysql){
		mysqli_close($mysql);
		///echo "Ya se desconectó";
	}


	/********	CONSULTAS *******/
	function getProveedores(){
		$connection = connectDb();
		$sql = "SELECT * FROM proveedores";
		$result = mysqli_query($connection,$sql);
		closeDb($connection);
		return $result;
	}

	/****Obtener materiales cuyo costo sea menor al que le paso por parametro ****/
	function getMaterialesPrice($price){
		$conn = connectDb();
		$sql = "SELECT  clave, descripcion, costo FROM materiales WHERE Costo<'".$price."'";
		$result = mysqli_query($conn,$sql);
		closeDb($conn);
		return $result;
	}

	//clave y descripcion de los materiales cuya cantidad mayor a 400
	function getMaterialesCantidad($cantidad){
		$conn = connectDb();
		
		$sql = "SELECT materiales.clave as clave, descripcion, cantidad 
				FROM entregan, materiales
				WHERE entregan.cantidad > $cantidad AND entregan.clave = materiales.clave";
		/*
		$sql = "SELECT Clave, Cantidad
				FROM Entregan
				WHERE  'Entregan.cantidad'>'400'" ;*/

		$result = mysqli_query($conn,$sql);
		closeDb($conn);
		return $result;
	} 

?>