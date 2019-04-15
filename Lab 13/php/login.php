<?php
   
    require_once("utils.php");
    session_start();

   	$flag = 1;
    if(isset($_POST["submit"])){
    	if(isset($_POST["username"]) && isset($_POST["password"])) {
        
	        if($_POST["username"]=="" || $_POST["password"]==""){
	        	$flag = 0;
	        }

	        if($flag==0){
	        	$_SESSION['error_incompleto'] = "<p style='color:red;'>*Por favor ingresa todos los datos</p>";	
	        	_header();
	        	unset($_SESSION['error']);	
			    _login_form();
			    _footer();
	        		//mensaje de introduce todos los campos
	        }else{
	        	$usuario = login(htmlspecialchars($_POST["username"]), htmlspecialchars($_POST["password"]));
	        
		        if($usuario!=""){
		            $_SESSION["nombre_usuario"] = $usuario;
		            _header();
		           	_navbar();
		           
		            
		         	$cont = 0;
					$table = "<table align='center'>";
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
					
					 _upload_form();
					echo $table;
					_questions();
					_references();
					_footer();
		           
		        
		        }else{
		        	$_SESSION['error'] = "<p style='color:red;'>*Usuario o contraseña incorrecta</p>";	     
			        _header();
			        _login_form();
			        _footer();
		     
		        }
	        }

	    }else{
	    	unset($_SESSION['error']);	    	
	    	_header();
	    	_login_form();
	    	_footer();
	    	
	    }
    }
    
    
?>

