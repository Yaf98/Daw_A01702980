<?php 
	function _header(){
		include("../partials/header.html");
	}

    function _navbar(){
        include("../partials/navbar.html");
    }

	function _login_form(){
		include("../partials/login_form.html");
	}
    

    function _upload_form(){
        include("../partials/upload_form.html");
    }

    function _questions(){
        include("../partials/questions.html");
    }

     function _references(){
        include("../partials/referencias.html");
    }

	function _footer(){
		include("../partials/footer.html");
	}

    
    /******/

	function login($username, $password) {
        $usuario = "";
        
        if ($username == "Manuel Yafté" && $password == "123") {
            $usuario = $username;
        } 
        
        return $usuario;
    }
    
 ?>