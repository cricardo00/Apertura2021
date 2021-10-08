<?php
	require ('conexion.php');
	
	$iddepartamento = $_POST['iddepartamento'];
	
	$queryM = "SELECT iddepartamento, id, nommunicipio FROM departamentos WHERE iddepartamento = '$iddepartamento' ORDER BY nommunicipio ASC";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option value='0'>Seleccionar Municipio</option>";
	
	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['nommunicipio']."'>".$rowM['nommunicipio']."</option>";
	}
	
	echo $html;
?>