<?php 
	
	require_once("util.php");
	$proveedores = getProveedores();
	$table = "<br><table class='table justify-content-center text-center text-white bg-dark'>
				<tr>
					 <th scope='col'>RFC</th>
					 <th scope='col'>Razon Social</th>
				</tr>";

	if(mysqli_num_rows($proveedores)){
		while($row = mysqli_fetch_assoc($proveedores)){
			$table.= "<tr scope='row'>";
			$table.= "<td>".$row["rfc"]."</td>";
			$table.= "<td>".$row["razonSocial"]."</td>";
			$table.= "</tr>";
		}
	}
	$table.="</table><br>";

	echo $table;

?>
