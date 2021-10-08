

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



<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tecnoacademia Medellin</title>
<link href="css/index.css" rel="stylesheet" type="text/css">	
<link href="css/estadistica.css" rel="stylesheet" type="text/css">		
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
	
<h1 class="titulo">Estadisticas</h1><br />

	<table>
	<tr>
<?php 
 
$sql = "Select count(*) AS total from aprendiz";
$result = $mysqli->query($sql);

	while($row = $result->fetch_assoc()) {
		echo "<td>"."<h3>Aprendices Registrados: </h3> "."</td>"."<td>".'<h3 class="text1">'.$row['total'].'</h3>'."</td>"."</tr>";
	
	}


$sql = "Select count(*) AS total2 from aprendiz where estado='ACTIVO'";
$result = $mysqli->query($sql);

while($row = $result->fetch_assoc()) {
   
	echo "<tr>"."<td>"."<h3>Aprendices Activos: </h3> "."</td>"."<td>".'<h3 class="text1">'.$row['total2'].'</h3>'."</td>"."</tr>";
	
	}
	
		
$sql = "Select count(*) AS total3 from aprendiz where estado='INACTIVO'";
$result = $mysqli->query($sql);

while($row = $result->fetch_assoc()) {
   
	echo "<tr>"."<td>"."<h3>Aprendices Desertados: </h3> "."</td>"."<td>".'<h3 class="text1">'.$row['total3'].'</h3>'."</td>";
	
	}		
	
	

?>
</tr>	
		
</table>		
</body>
</html>