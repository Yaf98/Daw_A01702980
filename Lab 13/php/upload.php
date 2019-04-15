<?php
	session_start();
	require_once("utils.php");

	$mensaje_estado="";
	 _header();
	 _navbar();

	//antes que nada que imprima la barra de cerrar sesion
	//primero que se suba la foto 
	//despues que recupere las fotos hasta el momento
	//despues muestra el form 

	$taget_dir = "../upload_images/";	
	$target_file = $taget_dir.basename($_FILES["fileToUpload"]["name"]);
	$upload = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	    	$mensaje_estado.= "<br><p style='color:green;'>File is an image - " . $check["mime"] . ".</p>";
	        //<p style='color:red;'>".$ip['cityName']."</p>
	        $uploadOk = 1;
	    } else {
	    	$mensaje_estado.="<p style='color:red;'>File is not an image.</p>";
	        $uploadOk = 0;
	    }
	}
	
	// Check if file already exists
	if (file_exists($target_file)) {
	    $mensaje_estado.= "<p style='color:red;'>Sorry, file already exists.</p>";
	    $uploadOk = 0;
	}
	
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
	    $mensaje_estado.= "<p style='color:red;''>Sorry, your file is too large.</p>";
	    $uploadOk = 0;
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
	    $mensaje_estado.= "<p style='color:red;'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
	    $uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	     $mensaje_estado.=  "<p style='color:red;'>Sorry, your file was not uploaded.</p>";
	// if everything is ok, try to upload file
	} else {
	    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	         $mensaje_estado.= "<p style='color:green;'>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</p>";
	    }else{
	        $mensaje_estado.= "<p style='color:red;'>Sorry, there was an error uploading your file.</p>";
	    }
	}

	$cont = 0;
	$table = "<table>";
	$files = glob("../upload_images/*.*");
	
	/*RECUPERA LAS IMAGENES QUE HAY */
	
	for ($i=1; $i<count($files); $i++){
		$num = $files[$i];
		$table.="<td><img src='".$num."'size='200' height='200'<td>";
		if($i%3==0){
			$cont = $cont+1;
			$table.="<tr>";
		}
		
	}
	$table .= "</table>";
	$_SESSION['mensaje_estado'] = $mensaje_estado;

	_upload_form();
	echo $table;
	_questions();
	_references();
	_footer();	
	
?>