<!doctype html>
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
   	
	$sql = "SELECT id, tipo FROM tipo_usuario";
	$result=$mysqli->query($sql);
	$row = $result->fetch_assoc();
	$bandera = false;

	$sqlta="SELECT * from tecnoacademia WHERE idtecnoacademia =".$_SESSION['tipo_tecno'];
	$resultta = $mysqli->query($sqlta);
	//Guardamos el registro en la variable $rowta
	$rowta = $resultta->fetch_assoc();

	$nombre_ie=$_POST['nombre_ie'];
	$nombre_ie = strtoupper($nombre_ie);
	$municipio_ie=$_POST['municipio_ie'];
	$tipo_ie=$_POST['tipo_ie'];
	$zona_ie=$_POST['zona_ie'];
	$tecnoacademia= $rowta['idtecnoacademia'];
	$contacto_ie=$_POST['contacto_ie'];
	$contacto_ie = strtoupper($contacto_ie);
	$telefono_ie=$_POST['telefono_ie'];
	$email_ie=$_POST['emailie'];

	$query="INSERT INTO instituciones (nombre_ie, municipio_ie, tipo_ie, zona_ie, tecno_ie, contacto_ie, telcontacto_ie, email_ie) VALUES ('$nombre_ie','$municipio_ie','$tipo_ie','$zona_ie','$tecnoacademia','$contacto_ie','$telefono_ie','$email_ie')";
	
	$resultado=$mysqli->query($query);



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
      <?php if($_SESSION['tipo_usuario']==1 || $_SESSION['tipo_usuario']==2) { ?>
      <li> </li>
      <li><a>|</a> </li>
      <li><a href="welcome.php">Inicio</a> </li>
      <li><a>|</a></li>
      <li><a href="gestion_ie.php">Gestión de I.E.</a></li>
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
				<h1 class="subtitulo">¡ Inst. Educativa Registrada!</h1>
				<?php }else{ ?>
				<h1 class="subtitulo">¡ Error al registrar la I.E.</h1>		
			<?php	} ?>		
			
			<p></p>	<br />
			
           <a class="btn btn-default btn-lg" href="registroie.php">Registrar otra I.E.</a>
			
		</center>
</body>
</html>