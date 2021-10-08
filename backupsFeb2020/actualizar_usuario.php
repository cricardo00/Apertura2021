<!doctype html>
<?php
	
	session_start();
	require 'conexion.php';
	
	if(!isset($_SESSION["id_usuario"])){
		header("Location: index.php");
	}
	
	$id=$_POST['id'];
	$usuario=$_POST['usuario'];
	$password=$_POST['password'];
	$idusuario=$_POST['idusuario'];
	$nombre=$_POST['nombre'];
	$nombre = strtoupper($nombre);
	$apellidos=$_POST['apellidos'];
	$apellidos = strtoupper($apellidos);
	
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
      <?php if($_SESSION['tipo_usuario']==1 || $_SESSION['tipo_usuario']==4) { ?>
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
		<?php 
		$sql="UPDATE usuarios SET usuario='$usuario', password = SHA1('$password'), nombre='$nombre', idusuario='$idusuario', apellidos='$apellidos'  WHERE id='$id'";
		$resultado = $mysqli->query($sql);
	?>
				<?php if($resultado>0){ ?>
				<h1 class="subtitulo">¡ Información modificada !</h1>
				<?php }else{ ?>
				<h1 class="subtitulo">¡ Error al modificar Usuario !</h1>		
				<?php	} ?>	
	<?php } ?>
			
			<p></p>	<br />
			
           <a class="btn btn-default btn-lg" href="gestion_usuarios.php">Modificar otro Usuario</a>
			
		</center>
</body>
</html>