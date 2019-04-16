<?php 
	
	require_once("util.php");
	$cantidad = $_POST['cantidad'];
	$materiales_cantidad_mayor400 = getMaterialesCantidad($cantidad);
	$table = "<br><table class='table justify-content-center text-center text-white bg-dark'>
				<tr>
					 <th scope='col'>Clave</th>
					 <th scope='col'>Descripción</th>
					 <th scope='col'>Cantidad</th>
				</tr>";

	if(mysqli_num_rows($materiales_cantidad_mayor400)){
			while($row = mysqli_fetch_assoc($materiales_cantidad_mayor400)){
				$table.= "<tr scope='row'>";
				$table.= "<td>".$row["clave"]."</td>";
				$table.= "<td>".$row["descripcion"]."</td>";
				$table.= "<td>".$row["cantidad"]."</td>";
				$table.= "</tr>";
			}
		}

	$table.="</table><br>";
	echo $table;

?>
