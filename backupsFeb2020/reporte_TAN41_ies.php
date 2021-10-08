<?php

	session_start();
	require 'conexion.php';
	
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
	if($_SESSION['tipo_usuario']==2 || $_SESSION['tipo_usuario']==4) { 
	
	header("Location: welcome.php");
	}
	
	$fecha = date("d-m-Y");
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=DG_IES_TANeiva_$fecha.xls");

	/*$mysqli=new mysqli("localhost","root","","tecnoaca_tecnonacional2019");*/
	$mysqli=new mysqli("127.0.0.1","tecnoaca_aperezn","apereznTAM","tecnoaca_tecnonacional2019");
	
	$idtecnorep = 41;

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tecnoacademia Neiva</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="7" bgcolor="#25BABA"><CENTER>
      <strong>Reporte Instituciones Educativas Tecnoacademia 2019</strong>
    </CENTER></td>
  </tr>
  <tr>
    <td><strong>Nombre IE</strong></td>
    <td><strong>Municipio IE</strong></td>
    <td><strong>Tipo IE</strong></td>
    <td><strong>Zona IE</strong></td>
	<td><strong>Contacto IE</strong></td>
	<td><strong>Telefono Contacto IE</strong></td>
	<td><strong>Email Contacto IE</strong></td>
  </tr>
  
<?PHP
		
$query=mysqli_query($mysqli, "SELECT nombre_ie, municipio_ie, tipo_ie, zona_ie, contacto_ie, telcontacto_ie, email_ie FROM instituciones WHERE tecno_ie = $idtecnorep");
while($res=mysqli_fetch_array($query)){		

	$nombre_ie=$res["nombre_ie"];
	$municipio_ie=$res["municipio_ie"];
	$tipo_ie=$res["tipo_ie"];
	$zona_ie=$res["zona_ie"];				
	$contacto_ie=$res["contacto_ie"];
	$telcontacto_ie=$res["telcontacto_ie"];
	$email_ie=$res["email_ie"];
?>  
 <tr>
	<td><?php echo $nombre_ie; ?></td>
	<td><?php echo $municipio_ie; ?></td>
	<td><?php echo $tipo_ie; ?></td>
	<td><?php echo $zona_ie; ?></td>
	<td><?php echo $contacto_ie; ?></td>
	<td><?php echo $telcontacto_ie; ?></td>
	<td><?php echo $email_ie; ?></td>
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>