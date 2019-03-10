<?php 
	function _header(){
		include("partials/header.html");
	}


	function _form(){
		include("partials/form_proveedor.html");
	}

	function _success(){
		include("partials/success.html");
	}
	function _questions(){
		include("partials/questions.html");
	}

	function _footer(){
		include("partials/footer.html");
	}

	function _confirmation($mensaje){
		echo "<h1>$mensaje</h1>";
	}

	function test_input($data){
	    $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
    }

    function info($rfc, $razon, $nombre, $telefono, $banco, $cuenta, $clabe){
        $cadena =  "<br>Información del proveedor registrado<br>
        <table border = '1' width='100%''>
            <tr>
                <td>RFC</td>
                <td>".$rfc."</td>
            </tr>
            <tr>
                <td>Razon Social </td>
                <td>".$razon."</td>
            </tr>
            <tr>
                <td>Nombre del contacto </td>
                <td>".$nombre."</td>
            </tr>
            <tr>
                <td>Teléfono del contacto </td>
                <td>".$telefono."</td>
            </tr>
            <tr>
                <td>Banco </td>
                <td>".$banco."</td>
            </tr>
            <tr>
                <td>Cuenta bancaria </td>
                <td>".$cuenta."</td>
            </tr>
        <table>";
        return $cadena;
    }

    
 ?>