<!doctype html>
<?php
	
	session_start();
	require 'conexion.php';
	
	if(!isset($_SESSION["id_usuario"])){
		header("Location: index.php");
	}
	
	$id=$_POST['id'];
	$nombre_ie=$_POST['nombre_ie'];
	$nombre_ie = strtoupper($nombre_ie);
	$municipio_ie=$_POST['municipio_ie'];
	$tipo_ie=$_POST['tipo_ie'];
	$zona_ie=$_POST['zona_ie'];
	$contacto_ie=$_POST['contacto_ie'];
	$contacto_ie = strtoupper($contacto_ie);
	$telefono_ie=$_POST['telefono_ie'];
	$email_ie=$_POST['emailie'];
	$cargocontacto_ie=$_POST['cargocontacto_ie'];
	$cargocontacto_ie = strtoupper($cargocontacto_ie);

	$sql="UPDATE instituciones SET nombre_ie='$nombre_ie', municipio_ie='$municipio_ie', tipo_ie='$tipo_ie', zona_ie='$zona_ie', contacto_ie='$contacto_ie', telcontacto_ie='$telefono_ie', email_ie='$email_ie', rolcontacto_ie	='$cargocontacto_ie'  WHERE id='$id'";
	$resultado = $mysqli->query($sql);

?>

<html>
<head>
<meta charset="utf-8">
	<link href="css/Style.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<title>Tecnoacademia</title>
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
      <li><a href="gestion_ie.php">Gestión de I.E</a></li>
      <?php } ?>
      <li style="float:right"><a class="active" href="logout.php">Cerrar Sesi&oacute;n</a></li>
	</ul>
    
</div>
</div>
</div>

<center>
<p>&nbsp;</p>
<p>&nbsp; </p>
<p>&nbsp;</p>
<p>&nbsp; </p>		
			
			<?php if($resultado>0){ ?>
				<h1 class="subtitulo">¡ Información modificada !</h1>
				<?php }else{ ?>
				<h1 class="subtitulo">¡ Error al modificar datos !</h1>		
			<?php	} ?>		
			
			<p></p>	<br />
			
           <a class="btn btn-default btn-lg" href="gestion_ie.php">Modificar otra I.E.</a>
			
		</center>
</body>
</html>