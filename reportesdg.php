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
      <?php if($_SESSION['tipo_usuario']==1 || $_SESSION['tipo_usuario']==4) { ?>
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
		
<h1 class="titulo">Reportes Estad&iacute;sticos Tecnoacademia Nacional</h1><br />
	
<center><table width="475" class="tables">
<tr>
<td width="85" rowspan="3" align="center" bgcolor="#1E3442"><strong style= "font-size:18px" class="texto">2019</strong></td>
<td bgcolor="#1E3442" align="center">
<strong style= "font-size:18px" class="texto">Reportes de Aprendices Tecnoacademias</strong></td>
</tr>

<tr>
<td align="center"><strong class="texto2">Total Aprendices Tecnoacademia</strong></td>
</tr>

<tr>
<td height="89" align="center"><a href="reportestandg/reporte_aprendiz_excel19.php"><img src="images/excel.png" width="40" height="40"/></a></td>
</tr>
</table>
	
  &nbsp;<br>&nbsp;
	
<table width="475" class="tables">
<tr>
<td width="85" rowspan="3" align="center" bgcolor="#1E3442"><strong style= "font-size:18px" class="texto">2020</strong></td>
<td colspan="3" align="center" bgcolor="#1E3442">
<strong style= "font-size:18px" class="texto">Reportes de Aprendices Tecnoacademias</strong></td>
</tr>

<tr>
<td width="168" align="center"><strong class="texto2">Total Aprendices Tecnoacademia</strong></td>
<td width="47" align="center">&nbsp;</td>
<td width="155" align="center"><strong class="texto2">Total IES Tecnoacademia</strong></td>
</tr>

<tr>
<td height="89" align="center"><a href="reportestandg/reporte_aprendiz_excel20.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td height="89" align="center">&nbsp;</td>
<td height="89" align="center"><a href="reportestandg/reporte_ies_excel20.php"><img src="images/excel.png" width="40" height="40"/></a></td>
</tr>
</table>
</center>	

<br>	
	
</body>
</html>