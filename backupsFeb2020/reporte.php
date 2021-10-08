<!DOCTYPE html>
<?php
	
	session_start();
	require 'conexion.php';
	
	if(!isset($_SESSION["id_usuario"])){
		header("Location: index.php");
	}
	
	$idUsuario = $_SESSION['id_usuario'];
	
	$sql = "SELECT id, id_tipo, nombre, apellidos FROM usuarios";
	$result=$mysqli->query($sql);
	
	$row = $result->fetch_assoc();
    if($_SESSION['tipo_usuario']==3) { 
	
	header("Location: registro.php");
	}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tecnoacademia Medellin</title>
<link href="css/Style.css" rel="stylesheet" type="text/css">
</head>
	
<body>
	
<div id="navega">  
<div id="menu">  
<div id="fijo"> 
    <ul>
      <li><a ><?php echo 'Usuario: '.$_SESSION['nombre']. " " .$_SESSION['apellidos']; ?> </a></li>
      <?php if($_SESSION['tipo_usuario']==1 || $_SESSION['tipo_usuario']==2) { ?>
      <li> </li>
      <li><a>|</a> </li>
      <li><a href="welcome.php">Inicio</a> </li>
      <li><a>|</a></li>
      <?php } ?>
      <li style="float:right"><a class="active" href="logout.php">Cerrar Sesi&oacute;n</a></li>
	</ul>	
</div>
</div>
</div>
		
<h1 class="titulo">Reportes</h1><br />
	
<center><table width="717" class="tables">
<tr>
<td bgcolor="#1E3442" align="center" colspan="8">
<strong style= "font-size:18px" class="texto">Reportes de Aprendices Tecnoacademia</strong></td>
</tr>

<tr>
<td align="center" colspan="1" width="97"><strong class="texto2">Aprendices Tecnoacademia</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="112"><strong class="texto2">Aprendices Ciencias Básicas</strong></td>
<td align="center" colspan="1" width="99"><strong class="texto2">Aprendices Biotecnología</strong></td>
<td align="center" colspan="1" width="109"><strong class="texto2">Aprendices Nanotecnología</strong></td>
<td align="center" colspan="1" width="17">&nbsp;</td>
<td align="center" colspan="1" width="103"><strong class="texto2">Aprendices Ingeniería</strong></td>
<td align="center" colspan="1" width="124"><strong class="texto2">Aprendices Tecnologías Virtuales</strong></td>
</tr>

<tr>
<td width="97" height="89" align="center"><a href="reporte_aprendiz_excel19.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>

<td width="112" align="center"><a href="reporte_aprendiz_excel_CB19.php"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="99" align="center"><a href="reporte_aprendiz_excel_Bio19.php"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="109" align="center"><a href="reporte_aprendiz_excel_Nano19.php"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="17" align="center">&nbsp;</td>

<td width="103" align="center"><a href="reporte_aprendiz_excel_IN19.php"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="124" align="center"><a href="reporte_aprendiz_excel_TV19.php"><img src="images/excel.png" width="40" height="40"/></a></td>

</tr>
</table></center>	

<br>	
	
</body>
</html>