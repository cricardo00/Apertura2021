<!doctype html>
<?php
	
	session_start();
	require 'conexion.php';
	
	if(!isset($_SESSION["id_usuario"])){ // Se valida que el usuario esté logueado.
		header("Location: index.php"); // Se redirecciona en caso de que el usuario no esté logueado. 
	}
	

	$sql = "SELECT id, id_tipo, nombre, apellidos, tipotecno FROM usuarios"; // Se realiza consulta para validar el tipo de usario
	$result=$mysqli->query($sql);
	
	$row = $result->fetch_assoc();
    if($_SESSION['tipo_usuario']==3) { // Si el usuario es tipo 3, es decir aprendiz, se redirecciona al registro.
	
	header("Location: registro.php");
	}

?>

 

<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
		<title>Tecnoacademia</title>
    <link href="css/Style.css" rel="stylesheet" type="text/css">	
	</head>
	
	<body>

	<div id="navega">  
	<div id="menu">  
	<div id="fijo"> 

    	<ul>
      		<li><a ><?php echo 'Usuario: '.$_SESSION['nombre']. " " .$_SESSION['apellidos']; ?> </a></li>
      		<?php if($_SESSION['tipo_usuario']==1 || $_SESSION['tipo_usuario']==2 || $_SESSION['tipo_usuario']==4) { ?>
      		<li> </li>
      		<?php } ?>
      		<li style="float:right"><a class="active" href="logout.php">Cerrar Sesi&oacute;n</a></li>
		</ul>

	</div>
	</div>
	</div>
	<h1 class="titulo">Bienvenido</h1>
			
	<div class="menup">
	<a href="gestion_usuarios.php"><img class="icon" src="images/users_icon.png"></a>
	<a href="gestion_ie.php"><img class="icon" src="images/educational institutions_icon.png"></a>	
    <a href="gestion_aprendices.php"><img class="icon" src="images/student_icon.png"></a>
    <a href="http://compromiso.sena.edu.co" target="_blank"> <img class="icon" src="images/formats_icon.png"></a>
    <a href="reporte.php"><img class="icon" src="images/reports_icon.png"></a>
    <a href="graficas/estadisticas.php"><img class="icon" src="images/statistics_icon.png"></a>
		
		<!--  Modulos en Proceso de Construccion
    <a href="gestion_grupos.php"><img src="images/Grupos Icon.png" width="113" height="145"></a>
    <img src="images/EDT Icon.png" width="113" height="145">
    <img src="images/Fichas Icon.png" width="113" height="145">
    <img src="images/Proyectos Icon.png" width="113" height="145">
	<a href="gestion_grupos.php"><img src="images/Grupos Icon.png" width="113" height="145"></a>
    -->
    </div>
    
	          
</body>
</html>