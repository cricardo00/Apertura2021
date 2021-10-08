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



	$tipodoc=$_POST['tipodoc'];
	$numident=$_POST['numident'];
	$depexp=$_POST['depexp_id'];
	$depexp = strtoupper($depexp);
	$munexp=$_POST['munexp'];
	$munexp = strtoupper($munexp);
	$fexp=$_POST['fexp'];
	$fvenc=$_POST['fvenc'];
	$nombre=$_POST['nombre'];
	$nombre = strtoupper($nombre);
	$apellidos=$_POST['apellidos'];
	$apellidos = strtoupper($apellidos);
	$fnac=$_POST['fnac'];
	$depnac=$_POST['depnac'];
	$depnac = strtoupper($depnac);
	$munnac=$_POST['munnac'];
	$munnac = strtoupper($munnac);
	$genero=$_POST['genero'];
	$genero = strtoupper($genero);
	$estrato=$_POST['estrato'];

	$gruposetnicos=$_POST['gruposetnicos'];
	$gruposetnicos = strtoupper($gruposetnicos);
	$discapacidad=$_POST['discapacidad'];
	$discapacidad = strtoupper($discapacidad);
	$poblacionvulnerable=$_POST['poblacionvulnerable'];
	$poblacionvulnerable = strtoupper($poblacionvulnerable);

	$email=$_POST['email'];
	$telfijo=$_POST['telfijo'];	
	$telcelular=$_POST['telcelular'];
	$dir=$_POST['dir'];
	$dir = strtoupper($dir);
	$nomacud=$_POST['nomacud'];	
	$nomacud = strtoupper($nomacud);
	$telacud=$_POST['telacud'];
	$fingre=date("Y/m/d");	
	$linea=$_POST['linea'];
	$linea = strtoupper($linea);
	$subArea=$_POST['subArea'];
	$subArea = strtoupper($subArea);
	$facilitador=$_POST['facilitador'];	
	$facilitador = strtoupper($facilitador);	
	$insed=$_POST['insed'];
	$insed = strtoupper($insed);
	$grado=$_POST['grado'];	
	$grado = strtoupper($grado);
	$estado="ACTIVO";
	$tecnoacademia= $rowta['idtecnoacademia'];
	
		
	$query="INSERT INTO aprendiz (tipodoc, numident, depexp, munexp, fexp, fvenc, nombre, apellidos, fnac, depnac, munnac, genero, estrato, grupoEtnico, discapacidad, poblacionVulnerable, email, telfijo, telcelular, dir, nomacud, telacud, fingre, linea, subarea, facilitador, insed, grado, estado, tecnoacademia) VALUES ('$tipodoc','$numident','$depexp','$munexp','$fexp','$fvenc','$nombre','$apellidos', '$fnac','$depnac','$munnac','$genero','$estrato','$gruposetnicos','$discapacidad','$poblacionvulnerable','$email','$telfijo','$telcelular','$dir','$nomacud','$telacud','$fingre','$linea','$subArea', '$facilitador','$insed','$grado','$estado', '$tecnoacademia')";
	
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


<center>	
<div id="navega">  
<div id="menu">  
<div id="fijo"> 
    
    <ul>
      <li><a ><?php echo 'Usuario: '.$_SESSION['nombre']. " " .$_SESSION['apellidos']; ?> </a></li>
      <?php if($_SESSION['tipo_usuario']==1 || $_SESSION['tipo_usuario']==2 || $_SESSION['tipo_usuario']==4) { ?>
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
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp; </p>				
			<?php if($resultado>0){ ?>
  <h1 class="subtitulo">¡ Aprendiz Registrado !</h1>
				<?php }else{ ?>
				<h1 class="subtitulo">¡ Error al registrar aprendiz !</h1>		
			<?php	} ?>		
			
			<p></p>	<br />
			
           <a class="btn btn-default btn-lg" href="registro.php">Registrar otro Aprendiz</a>
			
		</center>
</body>
</html>