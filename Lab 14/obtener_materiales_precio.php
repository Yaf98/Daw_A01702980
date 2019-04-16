<?php 
	
	require_once("util.php");
	$price = $_POST['precio'];
	$materiales_less150 = getMaterialesPrice($price);
	$table = "<br><table class='table justify-content-center text-center text-white bg-dark'>
				<tr>
					 <th scope='col'>Clave</th>
					 <th scope='col'>Descripción</th>
					 <th scope='col'>Costo</th>
				</tr>";

	if(mysqli_num_rows($materiales_less150)){
			while($row = mysqli_fetch_assoc($materiales_less150)){
				$table.= "<tr scope='row'>";
				$table.= "<td>".$row["clave"]."</td>";
				$table.= "<td>".$row["descripcion"]."</td>";
				$table.= "<td>".$row["costo"]."</td>";
				$table.= "</tr>";
			}
		}

	$table.="</table><br>";
	echo $table;

?>
