<?php 
	function _header(){
		include("partials/header.html");
	}

	function _questions(){
		include("partials/questions.html");
	}

	function _footer(){
		include("partials/footer.html");
	}

	/*FUNCIONES PARA INTERACTUAR CON LA BASE DE DATOS*/

	//funcion para conectarse a la base de datos
	function conectDb(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "proyecto";

        $con = mysqli_connect($servername, $username, $password, $dbname);

        //Check connection
        if (!$con) {
            //die("Connection failed: ".mysqli_connect_error());
            die("Error 505: Internal Sever Error");
        }

        return $con;
    }

	//cierra la conexión con la base de datos
    function closeDb($mysql){
        mysqli_close($mysql);
    }


    function obtener_nombre_contacto(){
        $conn = conectDb();
        //$sql = "INSERT INTO Proveedor(rfc,alias,razon_social,nombre_contacto,telefono_contacto,cuenta_bancaria, banco) VALUES (\"".$rfc."\",\"".$alias."\",\"".$razon."\",\"".$nombre."\",\"".$telefono."\",\"".$cuenta."\",\"".$banco."\")";
        $sql = "SELECT nombre_contacto FROM proveedor";
    	$result = mysqli_query($conn,$sql);
    	closeDb($conn);
    	return $result;
 
    }


?>