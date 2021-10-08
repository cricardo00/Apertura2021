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
<link href="css/reporte.css" rel="stylesheet" type="text/css">
<link href="css/index.css" rel="stylesheet" type="text/css">	
	
</head>
<body bgcolor="#458989">
	
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
	<br /> <br />
	
<h1 class="titulo">Reportes</h1><br />
	
<center><table bgcolor="#FFFFFF" border="2" width="748">
<tr>
<td bgcolor="#894589" align="center" colspan="7">
<strong style= "font-size:18px" class="texto">Aprendices Tecnoacademia Medellin 2018</strong></td>
</tr>

<tr>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Tecnoacademia</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Biotecnologia</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Ciencias Básicas</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Diseño y Prototipado</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Electrónica Robótica</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Nanotecnología</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Tecnologías Virtuales</strong></td>
</tr>

<tr>
<td width="100" height="89" align="center"><a href="reporte_aprendiz_excel18.php"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="reporte_aprendiz_excel_Bio18.php"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="reporte_aprendiz_excel_CB18.php"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="reporte_aprendiz_excel_DP18.php"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="reporte_aprendiz_excel_ER18.php"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="reporte_aprendiz_excel_Nano18.php"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="reporte_aprendiz_excel_TV18.php"><img src="images/excel.png" width="40" height="40"/></a></td>

</tr>
</table></center>	

<br>	
	
<center><table bgcolor="#FFFFFF" border="2" width="748">
<tr>
<td bgcolor="#894589" align="center" colspan="7">
<strong style= "font-size:18px" class="texto">Aprendices Tecnoacademia Medellin 2017</strong></td>
</tr>

<tr>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Tecnoacademia</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Biotecnologia</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Ciencias Básicas</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Diseño y Prototipado</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Electrónica Robótica</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Nanotecnología</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Tecnologías Virtuales</strong></td>
</tr>

<tr>
<td width="100" height="89" align="center"><a href="reporte_aprendiz_excel.php"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="reporte_aprendiz_excel_Bio.php"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="reporte_aprendiz_excel_CB.php"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="reporte_aprendiz_excel_DP.php"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="reporte_aprendiz_excel_ER.php"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="reporte_aprendiz_excel_Nano.php"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="reporte_aprendiz_excel_TV.php"><img src="images/excel.png" width="40" height="40"/></a></td>

</tr>
</table></center>

<br>	
	
<center><table bgcolor="#FFFFFF" border="2" width="748">
<tr>
<td bgcolor="#894589" align="center" colspan="7">
<strong style= "font-size:18px" class="texto">Aprendices Tecnoacademia Medellin 2016</strong></td>
</tr>

<tr>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Tecnoacademia</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Biotecnologia</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Ciencias Básicas</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Diseño y Prototipado</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Electrónica Robótica</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Nanotecnología</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Tecnologías Virtuales</strong></td>
</tr>

<tr>
<td width="100" height="89" align="center"><a href="Reportes/2016/Aprendices Tecnoacademia 2016.xlsx"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="Reportes/2016/Aprendices_Biotecnologia_2016.xlsx"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="Reportes/2016/Aprendices_Ciencias Basicas_2016.xlsx"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="Reportes/2016/Aprendices_Diseño y Prototipado_2016.xlsx"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="Reportes/2016/Aprendices_Electronica Robotica_2016.xlsx"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="Reportes/2016/Aprendices_Nanotecnologia_2016.xlsx"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="Reportes/2016/Aprendices_Tec_Virtuales_2016.xlsx"><img src="images/excel.png" width="40" height="40"/></a></td>

</tr>
</table></center>

<br>	
	
<center><table bgcolor="#FFFFFF" border="2" width="748">
<tr>
<td bgcolor="#894589" align="center" colspan="7">
<strong style= "font-size:18px" class="texto">Aprendices Tecnoacademia Medellin 2015</strong></td>
</tr>

<tr>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Tecnoacademia</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Biotecnologia</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Ciencias Básicas</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Diseño y Prototipado</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Electrónica Robótica</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Nanotecnología</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Tecnologías Virtuales</strong></td>
</tr>

<tr>
<td width="100" height="89" align="center"><a href="Reportes/2015/Aprendices Tecnoacademia 2015.xlsx"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="Reportes/2015/Aprendices_Biotecnologia_2015.xlsx"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="Reportes/2015/Aprendices_Ciencias Basicas_2015.xlsx"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="Reportes/2015/Aprendices_Diseño y Prototipado_2015.xlsx"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="Reportes/2015/Aprendices_Electronica Robotica_2015.xlsx"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="Reportes/2015/Aprendices_Nanotecnologia_2015.xlsx"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="Reportes/2015/Aprendices_Tec Virtuales_2015.xlsx"><img src="images/excel.png" width="40" height="40"/></a></td>

</tr>
</table></center>

<br>	
	
<center><table bgcolor="#FFFFFF" border="2" width="748">
<tr>
<td bgcolor="#894589" align="center" colspan="7">
<strong style= "font-size:18px" class="texto">Aprendices Tecnoacademia Medellin 2014</strong></td>
</tr>

<tr>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Tecnoacademia</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Biotecnologia</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Ciencias Básicas</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Diseño y Prototipado</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Electrónica Robótica</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Nanotecnología</strong></td>
<td align="center" colspan="1" width="100"><strong class="texto2">Aprendices Tecnologías Virtuales</strong></td>
</tr>

<tr>
<td width="100" height="89" align="center"><a href="Reportes/2014/Aprendices Tecnoacademia 2014.xlsx"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="Reportes/2014/Aprendices_Biotecnologia_2014.xlsx"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="Reportes/2014/Aprendices_Ciencias Basicas_2014.xlsx"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="Reportes/2014/Aprendices_Diseño y Prototipado_2014.xlsx"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="Reportes/2014/Aprendices_Electronica Robotica_2014.xlsx"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="Reportes/2014/Aprendices_Nanotecnologia_2014.xlsx"><img src="images/excel.png" width="40" height="40"/></a></td>

<td width="100" align="center"><a href="Reportes/2014/Aprendices_Tec Virtuales_2014.xlsx"><img src="images/excel.png" width="40" height="40"/></a></td>

</tr>
</table></center>

<br /> <br />


</body>
</html>