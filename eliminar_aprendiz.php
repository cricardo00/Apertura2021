<!doctype html>
<?php
	
	session_start();
	require 'conexion.php';
	
	if(!isset($_SESSION["id_usuario"])){
		header("Location: index.php");
	}
	
	$idUsuario = $_SESSION['id_usuario'];
	   	
	$id=$_GET['id'];	
		
	$query="DELETE FROM aprendiz WHERE id='$id'";
	
	$resultado=$mysqli->query($query);



?>

<html>
<head>
<meta charset="utf-8">
	<link href="css/css.css" rel="stylesheet" type="text/css">
	<link href="css/index.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<title>Tecnoacademia</title>
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
      <li><a href="gestion_aprendices.php">Gestión del Aprendiz</a></li>
      <?php } ?>
      <li style="float:right"><a class="active" href="logout.php">Cerrar Sesi&oacute;n</a></li>
	</ul>
    
</div>
</div>
</div>

<p>&nbsp;</p>
<p>&nbsp; </p>
<p>&nbsp;</p>
<p>&nbsp; </p>
<h1 class="titulo">Gesti&oacute;n de Aprendices</h1>
<center>	
<p>&nbsp;</p>
<p>&nbsp; </p>
<p>&nbsp;</p>
<p>&nbsp; </p>				
			<?php if($resultado>0){ ?>
				<h1 class="subtitulo">¡ Aprendiz Eliminado !</h1>
				<?php }else{ ?>
				<h1 class="subtitulo">¡ Error al eliminar aprendiz !</h1>		
			<?php	} ?>		
			
			<p></p>	<br />
			
           <a class="btn btn-default btn-lg" href="gestion_aprendices.php">Eliminar otro Aprendiz</a>
			
		</center>
</body>
</html>