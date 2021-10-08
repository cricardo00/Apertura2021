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


	$id=$_POST['id'];
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
	
	$estudeps=$_POST['txtEPS'];
	$estudeps = strtoupper($estudeps);
	$gsyrhstud=$_POST['cbxrh'];
	$gsyrhstud = strtoupper($gsyrhstud);

	$email=$_POST['email'];
	$telfijo=$_POST['telfijo'];	
	$telcelular=$_POST['telcelular'];
	$dir=$_POST['dir'];
	$dir = strtoupper($dir);

	$nomacud=$_POST['nomacud'];	
	$nomacud = strtoupper($nomacud);
	$telacud=$_POST['telacud'];
	
	$insed=$_POST['insed'];
	$insed = strtoupper($insed);
	$grado=$_POST['grado'];	
	$grado = strtoupper($grado);

	//$fingre=$_POST['fingre'];

	$estperiodi=$_POST['cbxperiodo'];	
	$estperiodi = strtoupper($estperiodi);

	$linea=$_POST['linea'];
	$linea = strtoupper($linea);
	$subArea=$_POST['subArea'];
	$subArea = strtoupper($subArea);
	$facilitador=$_POST['facilitador'];	
	$facilitador = strtoupper($facilitador);

	$cbxtipformest=$_POST['cbxtipformest'];	
	$cbxtipformest = strtoupper($cbxtipformest);	
	$estado=$_POST['estado'];	
	$estado = strtoupper($estado);
	$feclinuno=$_POST['feclinuno'];	

	$lineados=$_POST['lineados'];
	$lineados = strtoupper($lineados);
	$subAreados=$_POST['subAreados'];
	$subAreados = strtoupper($subAreados);
	$facilitadordos=$_POST['facilitadordos'];	
	$facilitadordos = strtoupper($facilitadordos);

	$cbxtipformestdos=$_POST['cbxtipformestdos'];	
	$cbxtipformestdos = strtoupper($cbxtipformestdos);	
	$estadodos=$_POST['estadodos'];	
	$estadodos = strtoupper($estadodos);

	$var=$_POST['feclindos'];
	if (empty($var)) {
		$feclindos='0000-00-00';
	} else {
		$feclindos=$_POST['feclindos'];
	}
	
	$sql="UPDATE aprendiz SET tipodoc='$tipodoc', numident='$numident', depexp='$depexp', munexp='$munexp', fexp='$fexp', fvenc='$fvenc', nombre='$nombre', apellidos='$apellidos', fnac='$fnac', depnac='$depnac', munnac='$munnac', genero='$genero', estrato='$estrato', grupoEtnico='$gruposetnicos', discapacidad='$discapacidad', poblacionVulnerable='$poblacionvulnerable', epsestud='$estudeps', gsyrh='$gsyrhstud', email='$email', telfijo='$telfijo', telcelular='$telcelular', dir='$dir', nomacud='$nomacud', telacud='$telacud', insed='$insed', grado='$grado', periodoest='$estperiodi', lineauno='$linea', subareauno='$subArea', facilitadoruno='$facilitador', tipformlinestuno='$cbxtipformest', estadouno='$estado', fechestadouno='$feclinuno', lineados='$lineados', subareados='$subAreados', facilitadordos='$facilitadordos', estadodos='$estadodos', fechestadodos='$feclindos', tipformlinestdos='$cbxtipformestdos' WHERE id='$id'";

	$resultado = $mysqli->query($sql);

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
				<h1 class="subtitulo">¡ Información modificada !</h1>
				<?php }else{ ?>
				<h1 class="subtitulo">¡ Error al modificar aprendiz !</h1>		
			<?php	} ?>		
			
			<p></p>	<br />
			
           <a class="btn btn-default btn-lg" href="gestion_aprendices.php">Modificar otro Aprendiz</a>
			
		</center>
</body>
</html>