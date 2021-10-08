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
    if($_SESSION['tipo_usuario']==2 || $_SESSION['tipo_usuario']==4) { 
	
	header("Location: welcome.php");
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
		
<h1 class="titulo">Reportes Estad&iacute;sticos Tecnoacademia Nacional</h1><br />
	
<center><table width="500" class="tables">
<tr>
<td bgcolor="#1E3442" align="center" colspan="8">
<strong style= "font-size:18px" class="texto">.: Reportes Tecnoacademia Bucaramanga :.</strong></td>
</tr>

<tr>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Aprendices</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Usuarios</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Instituciones Educativas</strong></td>
</tr>

<tr>
<td width="97" height="89" align="center"><a href="reporte_TAB68_aprendices.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>

<td width="112" align="center"><a href="reporte_TAB68_usuarios.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>
	
<td width="99" align="center"><a href="reporte_TAB68_ies.php"><img src="images/excel.png" width="40" height="40"/></a></td>
</tr>
</table>
</center>	
<br><br>

<center><table width="500" class="tables">
<tr>
<td bgcolor="#1E3442" align="center" colspan="8">
<strong style= "font-size:18px" class="texto">.: Reportes Tecnoacademia Cali :.</strong></td>
</tr>

<tr>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Aprendices</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Usuarios</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Instituciones Educativas</strong></td>
</tr>

<tr>
<td width="97" height="89" align="center"><a href="reporte_TAC76_aprendices.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>

<td width="112" align="center"><a href="reporte_TAC76_usuarios.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>
	
<td width="99" align="center"><a href="reporte_TAC76_ies.php"><img src="images/excel.png" width="40" height="40"/></a></td>
</tr>
</table>
</center>	
<br><br>

<center><table width="500" class="tables">
<tr>
<td bgcolor="#1E3442" align="center" colspan="8">
<strong style= "font-size:18px" class="texto">.: Reportes Tecnoacademia Cazuc&aacute; :.</strong></td>
</tr>

<tr>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Aprendices</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Usuarios</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Instituciones Educativas</strong></td>
</tr>

<tr>
<td width="97" height="89" align="center"><a href="reporte_TAC25_aprendices.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>

<td width="112" align="center"><a href="reporte_TAC25_usuarios.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>
	
<td width="99" align="center"><a href="reporte_TAC25_ies.php"><img src="images/excel.png" width="40" height="40"/></a></td>
</tr>
</table>
</center>	
<br><br>
	
<center><table width="500" class="tables">
<tr>
<td bgcolor="#1E3442" align="center" colspan="8">
<strong style= "font-size:18px" class="texto">.: Reportes Tecnoacademia C&uacute;cuta :.</strong></td>
</tr>

<tr>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Aprendices</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Usuarios</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Instituciones Educativas</strong></td>
</tr>

<tr>
<td width="97" height="89" align="center"><a href="reporte_TAC54_aprendices.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>

<td width="112" align="center"><a href="reporte_TAC54_usuarios.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>
	
<td width="99" align="center"><a href="reporte_TAC54_ies.php"><img src="images/excel.png" width="40" height="40"/></a></td>
</tr>
</table>
</center>	
<br><br>

<center><table width="500" class="tables">
<tr>
<td bgcolor="#1E3442" align="center" colspan="8">
<strong style= "font-size:18px" class="texto">.: Reportes Tecnoacademia Ibagu&eacute; :.</strong></td>
</tr>

<tr>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Aprendices</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Usuarios</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Instituciones Educativas</strong></td>
</tr>

<tr>
<td width="97" height="89" align="center"><a href="reporte_TAI73_aprendices.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>

<td width="112" align="center"><a href="reporte_TAI73_usuarios.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>
	
<td width="99" align="center"><a href="reporte_TAI73_ies.php"><img src="images/excel.png" width="40" height="40"/></a></td>
</tr>
</table>
</center>	
<br><br>
	
<center><table width="500" class="tables">
<tr>
<td bgcolor="#1E3442" align="center" colspan="8">
<strong style= "font-size:18px" class="texto">.: Reportes Tecnoacademia Manizales :.</strong></td>
</tr>

<tr>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Aprendices</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Usuarios</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Instituciones Educativas</strong></td>
</tr>

<tr>
<td width="97" height="89" align="center"><a href="reporte_TAM17_aprendices.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>

<td width="112" align="center"><a href="reporte_TAM17_usuarios.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>
	
<td width="99" align="center"><a href="reporte_TAM17_ies.php"><img src="images/excel.png" width="40" height="40"/></a></td>
</tr>
</table>
</center>	
<br><br>

<center><table width="500" class="tables">
<tr>
<td bgcolor="#1E3442" align="center" colspan="8">
<strong style= "font-size:18px" class="texto">.: Reportes Tecnoacademia Medell&iacute;n :.</strong></td>
</tr>

<tr>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Aprendices</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Usuarios</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Instituciones Educativas</strong></td>
</tr>

<tr>
<td width="97" height="89" align="center"><a href="reporte_TAM05_aprendices.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>

<td width="112" align="center"><a href="reporte_TAM05_usuarios.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>
	
<td width="99" align="center"><a href="reporte_TAM05_ies.php"><img src="images/excel.png" width="40" height="40"/></a></td>
</tr>
</table>
</center>	
<br><br>

<center><table width="500" class="tables">
<tr>
<td bgcolor="#1E3442" align="center" colspan="8">
<strong style= "font-size:18px" class="texto">.: Reportes Tecnoacademia Neiva :.</strong></td>
</tr>

<tr>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Aprendices</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Usuarios</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Instituciones Educativas</strong></td>
</tr>

<tr>
<td width="97" height="89" align="center"><a href="reporte_TAN41_aprendices.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>

<td width="112" align="center"><a href="reporte_TAN41_usuarios.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>
	
<td width="99" align="center"><a href="reporte_TAN41_ies.php"><img src="images/excel.png" width="40" height="40"/></a></td>
</tr>
</table>
</center>	
<br><br>
	
<center><table width="500" class="tables">
<tr>
<td bgcolor="#1E3442" align="center" colspan="8">
<strong style= "font-size:18px" class="texto">.: Reportes Tecnoacademia Pereira :.</strong></td>
</tr>

<tr>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Aprendices</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Usuarios</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Instituciones Educativas</strong></td>
</tr>

<tr>
<td width="97" height="89" align="center"><a href="reporte_TAP66_aprendices.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>

<td width="112" align="center"><a href="reporte_TAP66_usuarios.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>
	
<td width="99" align="center"><a href="reporte_TAP66_ies.php"><img src="images/excel.png" width="40" height="40"/></a></td>
</tr>
</table>
</center>	
<br><br>

<center><table width="500" class="tables">
<tr>
<td bgcolor="#1E3442" align="center" colspan="8">
<strong style= "font-size:18px" class="texto">.: Reportes Tecnoacademia T&uacute;querres :.</strong></td>
</tr>

<tr>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Aprendices</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Usuarios</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Instituciones Educativas</strong></td>
</tr>

<tr>
<td width="97" height="89" align="center"><a href="reporte_TAT52_aprendices.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>

<td width="112" align="center"><a href="reporte_TAT52_usuarios.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>
	
<td width="99" align="center"><a href="reporte_TAT52_ies.php"><img src="images/excel.png" width="40" height="40"/></a></td>
</tr>
</table>
</center>	
<br><br>

<!-- Reportes Faltantes --> 
	
<center><table width="500" class="tables">
<tr>
<td bgcolor="#1E3442" align="center" colspan="8">
<strong style= "font-size:18px" class="texto">.: Reportes Tecnoacademia Velez - Cimitarra :.</strong></td>
</tr>

<tr>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Aprendices</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Usuarios</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Instituciones Educativas</strong></td>
</tr>

<tr>
<td width="97" height="89" align="center"><a href="reporte_TAV681_aprendices.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>

<td width="112" align="center"><a href="reporte_TAV681_usuarios.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>
	
<td width="99" align="center"><a href="reporte_TAV681_ies.php"><img src="images/excel.png" width="40" height="40"/></a></td>
</tr>
</table>
</center>	
<br><br>

<center><table width="500" class="tables">
<tr>
<td bgcolor="#1E3442" align="center" colspan="8">
<strong style= "font-size:18px" class="texto">.: Reportes Tecnoacademia Codazzi :.</strong></td>
</tr>

<tr>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Aprendices</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Usuarios</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Instituciones Educativas</strong></td>
</tr>

<tr>
<td width="97" height="89" align="center"><a href="reporte_TAC20_aprendices.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>

<td width="112" align="center"><a href="reporte_TAC20_usuarios.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>
	
<td width="99" align="center"><a href="reporte_TAC20_ies.php"><img src="images/excel.png" width="40" height="40"/></a></td>
</tr>
</table>
</center>	
<br><br>
	
<center><table width="500" class="tables">
<tr>
<td bgcolor="#1E3442" align="center" colspan="8">
<strong style= "font-size:18px" class="texto">.: Reportes Tecnoacademia Quindio :.</strong></td>
</tr>

<tr>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Aprendices</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Usuarios</strong></td>
<td align="center" width="20">&nbsp;</td>
<td align="center" colspan="1" width="110"><strong class="texto2">Reporte Instituciones Educativas</strong></td>
</tr>

<tr>
<td width="97" height="89" align="center"><a href="reporte_TAQ63_aprendices.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>

<td width="112" align="center"><a href="reporte_TAQ63_usuarios.php"><img src="images/excel.png" width="40" height="40"/></a></td>
<td width="20" align="center">&nbsp;</td>
	
<td width="99" align="center"><a href="reporte_TAQ63_ies.php"><img src="images/excel.png" width="40" height="40"/></a></td>
</tr>
</table>
</center>
	
</body>
</html>