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

	$usuario=$_POST['usuario'];
	$contrasena=$_POST['contrasena'];
	$roltecno=$_POST['roltecno']='2';
	$idusuario=$_POST['idusuario'];
	$nombres=$_POST['nombres'];
	$nombres = strtoupper($nombres);
	$apellidos=$_POST['apellidos'];
	$apellidos = strtoupper($apellidos);
	$tecnoacademia=$_SESSION['tipo_tecno'];
	
	$queryval="SELECT * FROM usuarios WHERE idusuario = $idusuario";
	$resultval=$mysqli->query($queryval);
	
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
      <li><a href="gestion_usuarios.php">Gestión de Usuarios</a></li>
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
	<?php if(mysqli_num_rows($resultval)>0){ ?>
	<h1 class="subtitulo">¡ El Usuario ya se encuentra Registrado !</h1>
	<?php } else{ ?>
		<?php $query="INSERT INTO usuarios (usuario, password, id_tipo, idusuario, nombre, apellidos, tipotecno) VALUES ('$usuario',SHA1('$contrasena'),'$roltecno', '$idusuario', '$nombres','$apellidos','$tecnoacademia')";
		$resultado=$mysqli->query($query); ?>
				<?php if($resultado>0){ ?>
				<h1 class="subtitulo">¡ Usuario Registrado !</h1>
				<?php }else{ ?>
				<h1 class="subtitulo">¡ Error al registrar usuario !</h1>		
				<?php	} ?>	
	<?php } ?>

			<p></p>	<br />
			
           <a class="btn btn-default btn-lg" href="registrousuarios.php">Registrar otro Usuario</a>
			
		</center>
</body>
</html>