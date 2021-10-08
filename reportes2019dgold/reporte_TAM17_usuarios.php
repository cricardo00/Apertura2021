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
	header("Content-Disposition: attachment; filename=DG_Usuarios_TAManizales_$fecha.xls");

	/*$mysqli=new mysqli("localhost","root","","tecnoaca_tecnonacional2019");*/
	$mysqli=new mysqli("127.0.0.1","tecnoaca_aperezn","apereznTAM","tecnoaca_tecnonacional2019");
	
	$idtecnorep = 17;

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tecnoacademia Manizales</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="4" bgcolor="#25BABA"><CENTER>
      <strong>Reporte Usuarios Tecnoacademia 2019</strong>
    </CENTER></td>
  </tr>
  <tr>
    <td><strong>ID Identificador</strong></td>
    <td><strong>Nombres</strong></td>
    <td><strong>Apellidos</strong></td>
    <td><strong>Tipo Usuario</strong></td>  
  </tr>
  
<?PHP
		
$query=mysqli_query($mysqli, "SELECT id_tipo, idusuario, nombre, apellidos FROM usuarios WHERE tipotecno = $idtecnorep");
while($res=mysqli_fetch_array($query)){		

	$id_tipo=$res["id_tipo"];
	$idusuario=$res["idusuario"];
	$nombre=$res["nombre"];
	$apellidos=$res["apellidos"];				

?>  
 <tr>
	<td><?php echo $idusuario; ?></td>
	<td><?php echo $nombre; ?></td>
	<td><?php echo $apellidos; ?></td>
	<td><?php echo $id_tipo; ?></td>
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>