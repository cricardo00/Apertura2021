<!DOCTYPE html>
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
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tecnoacademia Medellin</title>
<link href="css/formatos.css" rel="stylesheet" type="text/css">
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
	
<h1 class="titulo">Formatos</h1><br />

<div class="divi"><table>

<tr>
<td width="257" class="textotd">Acta recibido a satisfaccion de bienes</td>
<td width="123" align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Acta Recibido a Satisfaccion de Bienes_V03.xlsx">Descargar</a></td>

<td width="228" class="textotd">Asesoria proyectos</td>
<td width="123" align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Asesoria proyectos.xlsx">Descargar</a></td>

<td width="273" class="textotd">Autorización acudiente de aprendiz</td>
<td width="185" align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Autorización Aprendices acudiente.docx">Descargar</a></td>
</tr>

<tr>
<td class="textotd">Autorización de ingreso de personas externas</td>
<td align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Autorización de ingreso de personas externas.docx">Descargar</a></td>

<td class="textotd">Cronograma mantenimiento preventivo equipos</td>
<td align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Cronograma Mantenimiento Preventivo equipos.xls">Descargar</a></td>

<td class="textotd">Estudio de Mercado materiales de formación</td>
<td align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Estudio de Mercado -materiales de formacion.xlsx">Descargar</a></td>
</tr>

<tr>
<td class="textotd">Guia de Aprendizaje</td>
<td align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Guia de Aprendizaje.docx">Descargar</a></td>

<td class="textotd">Hoja de vida equipos</td>
<td align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Hoja de vida equipos.xls">Descargar</a></td>

<td class="textotd">Informe final supervisión contrato (obra)</td>
<td align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Informe final supervisión contrato (obra).docx">Descargar</a></td>
</tr>

<tr>
<td class="textotd">Informe final supervisión de contrato (prestación de servicios)</td>
<td align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Informe final supervisión de contrato (prestación de servicios).docx">Descargar</a></td>

<td class="textotd">Informe legalizacion desplazamiento del contratista</td>
<td align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Informe legalizacion desplazamiento del contratista_V.01.docx">Descargar</a></td>

<td class="textotd">Informe mensual supervisión de contrato (arrendamiento)</td>
<td align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Informe mensual supervisión de contrato (arrendamiento).docx">Descargar</a></td>
</tr>

<tr>
<td class="textotd">Informe mensual supervisión de contrato (compraventa)</td>
<td align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Informe mensual supervisión de contrato (compraventa).docx">Descargar</a></td>

<td class="textotd">Informe mensual supervisión de contrato (obra)</td>
<td align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Informe mensual supervisión de contrato (obra).docx">Descargar</a></td>

<td class="textotd">Informe mensual supervisión de contrato (prestación de servicios)</td>
<td align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Informe mensual supervisión de contrato (prestación de servicios).docx">Descargar</a></td>
</tr>

<tr>
<td class="textotd">Compromiso Aprendiz 2018</td>
<td align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Compromiso aprendiz 2018.docx">Descargar</a></td>

<td class="textotd">Lista de Asistencia</td>
<td align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Lista de Asistencia.xlsx">Descargar</a></td>

<td class="textotd">Lista de chequeo</td>
<td align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Lista de chequeo.xlsx">Descargar</a></td>

</tr>

<tr>
<td class="textotd">Mantenimiento de equipos</td>
<td align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Mantemiento de equipos.doc">Descargar</a></td>

<td class="textotd">Manual de procedimientos de Tecnoacademia</td>
<td align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Manual de procedimientos de Tecnoacademia 2017 V2.docx">Descargar</a></td>

<td class="textotd">Movimiento de Bienes</td>
<td align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Movimiento de Bienes_V3.xlsx">Descargar</a></td>
</tr>

<tr>
<td class="textotd">Plan de sesion Tecnoacademia</td>
<td align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Plan de sesion Tecnoacademia.xlsx">Descargar</a></td>

<td class="textotd">Protocolo ingreso a laboratorios</td>
<td align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Protocolo ingreso a laboratorios.docx">Descargar</a></td>

<td class="textotd">Salida y prestamo de bienes</td>
<td align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Salida y prestamo de bienes.xls">Descargar</a></td>
</tr>

<tr>
<td class="textotd">Solicitud de Bienes</td>
<td align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Solicitud de Bienes_V02.xlsx">Descargar</a></td>

<td class="textotd">Uso de materiales de formación</td>
<td align="center"><a class="abtn" style="color: #FFFFFF; margin: 10px; font-size: 18px;" href="formatos/Uso de materiales de formacion.xlsx">Descargar</a></td>

</tr>

</table></div>
</body>
</html>