<?php

	session_start();
	require 'conexion2020.php';
	
	if(!isset($_SESSION["id_usuario"])){
		header("Location: index.php");
	}
	
	$idUsuario = $_SESSION['id_usuario'];
	
	$sql = "SELECT id_tipo FROM usuarios";
	$result=$mysqli->query($sql);
	
	$row = $result->fetch_assoc();
    if($_SESSION['tipo_usuario']==3) { 
	
	header("Location: registro.php");
	}
	
	$fecha = date("d-m-Y");
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=BD_IES_Tecnoacademia_$fecha.xls");

	$mysqli=new mysqli("127.0.0.1","tecnoaca_aperezn","apereznTAM","tecnoaca_tecnonacional2020");

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Tecnoacademia Medellin</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="5" bgcolor="#25BABA"><CENTER>
      <strong>IES Tecnoacademia 2020</strong>
    </CENTER></td>
  </tr>
  <tr>
    <td><strong>nombre_ie</strong></td>
    <td><strong>municipio_ie</strong></td>
    <td><strong>tipo_ie</strong></td>
    <td><strong>zona_ie</strong></td>
    <td><strong>tecno_ie</strong></td>
  </tr>
  
<?PHP
		
//$query=mysqli_query($mysqli, "SELECT * FROM aprendiz");
	
$query=mysqli_query($mysqli, "SELECT instituciones.nombre_ie, instituciones.municipio_ie, instituciones.tipo_ie, instituciones.zona_ie, tecnoacademia.nombretecno FROM instituciones INNER JOIN tecnoacademia ON instituciones.tecno_ie=tecnoacademia.idtecnoacademia");
	
while($res=mysqli_fetch_array($query)){		

	$nombre_ie=$res["nombre_ie"];
	$municipio_ie=$res["municipio_ie"];
	$tipo_ie=$res["tipo_ie"];
	$zona_ie=$res["zona_ie"];
	
	$dgtecnoreport=$res["nombretecno"];
	
?>  
 <tr>
	<td><?php echo $nombre_ie; ?></td>
	<td><?php echo $municipio_ie; ?></td>
	<td><?php echo $tipo_ie; ?></td>
	<td><?php echo $zona_ie; ?></td>
	<td><?php echo $dgtecnoreport; ?></td> 
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>