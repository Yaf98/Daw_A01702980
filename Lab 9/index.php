<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css" >
     
        <title>Laboratorio 9</title>
    </head>

    <body>
    	
    		<div></div>
    		<h1>Laboratorio 9</h1>

	        <?php

			    require_once("functions.php");

			    $a = random_array();
			    echo "<div id='scripts_section'>";
	            echo "<h2>Script 1:</h2>";
			    echo "Array: "; display_array($a);
			    echo "<br>Promedio del array: "; echo average($a)."</div><br>";

			    echo "<div id='scripts_section'>";
	            echo "<h2>Script 2:</h2>";
			    $a = random_array();
			    echo "Array: "; echo display_array($a);
			    echo "<br>Mediana del array: "; echo median($a)."</div><br>";

			    echo "<div id='scripts_section'>";
	            echo "<h2>Script 3:</h2>";
			    $a = random_array();
			    echo "Array: "; echo display_array($a);
			    echo "<br>Datos del array en una lista: "; echo list_nums($a)."</div><br>";

			    echo "<div id='scripts_section'>";
	            echo "<h2>Script 4:</h2>";
			    $x = rand(6,10);
			    echo "n = ".$x.", donde 'n' fue generado aleatoriamente<br>";
			    echo "<br>Cuadrados y Cubos desde 1 hasta n son: <br>"; echo squares_cubes($x)."</div><br>";

			    echo "<div id='scripts_section'>";
	            echo "<h2>Script 5:</h2>";
			    echo "<img src='problem.jpg'><br>Solución al problema con PHP: "; echo codeForces(1,2,1,2)."</div>";

	        ?>

	        <br>
	        <section id="article_preguntas">
				<header><strong>Preguntas sobre PHP</strong></header>
				<br>
				<strong>¿Qué hace la función phpinfo()? Describe y discute 3 datos que llamen tu atención.[1]</strong>
				<ul>
					<li>Está función muestra información sobre la configuración de PHP</li>
					<li>Muestra información sobre como se compiló el código php</li>
					<li>Se usa pra ver las opciones de configuración en el sistema</li>
					<li>Es muy útil para depurar</li>
				</ul>

				<strong>¿Qué cambios tendrías que hacer en la configuración del servidor para que pudiera ser apto en un ambiente de producción? [2]</strong>
				<ul>
					<li>Puede ser muy costoso, por lo que existen programas como XAMMP o WAMP. Con ellos se deben descargar las herramientas de desarrollador y cambiar la configuración de php.ini </li>
				</ul>

				<strong>¿Cómo es que si el código está en un archivo con código html que se despliega del lado del cliente, se ejecuta del lado del servidor? [3]</strong>
				<ul>
					<li>Cuando presionamos en un hipervínculo , se hace una petición al servidor por algún método como POST o GET, entonces se ejecuta ahora del lado del servidor</li>
				</ul>

			</section>
			<br>
			<footer>
				<strong>Referencias</strong>
				<nav>
					<a href="http://php.net/manual/es/function.phpinfo.php">[1] http://php.net/manual/es/function.phpinfo.php</a><br>
					<a href="https://www.codementor.io/php/tutorial/how-to-setup-php-development-production-server">[2] https://www.codementor.io/php/tutorial/how-to-setup-php-development-production-server</a><br>
					<a href="http://www.adelat.org/media/docum/nuke_publico/lenguajes_del_lado_servidor_o_cliente.html">[3] http://www.adelat.org/media/docum/nuke_publico/lenguajes_del_lado_servidor_o_cliente.html</a><br>
				</nav>
			</footer>
    </body>
</html>

