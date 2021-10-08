<!doctype html>

<?php

	

	session_start();

	require 'conexion.php';

	

	if(!isset($_SESSION["id_usuario"])){

		header("Location: index.php");

	}

	

	$sql = "SELECT id, tipo FROM tipo_usuario";

	$result=$mysqli->query($sql);

	$row = $result->fetch_assoc();

	$bandera = false;

// Despegable de Instituciones //

$sqlie="SELECT * from instituciones";
$resultie = $mysqli->query($sqlie); //usamos la conexion para dar un resultado a la variable
 
if ($resultie->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobitie="";
    while ($rowie = $resultie->fetch_array(MYSQLI_ASSOC)) 
    {
        $combobitie .=" <option value='".$rowie['nombre_ie']."'>".$rowie['nombre_ie']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else
{
    echo "No hubo resultados";
}

// Despegable de Facilitadores //

$sqlfa="SELECT * from usuarios WHERE id_tipo = 2";
$resultfa = $mysqli->query($sqlfa); //usamos la conexion para dar un resultado a la variable
 
if ($resultfa->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobitfa="";
    while ($rowfa = $resultfa->fetch_array(MYSQLI_ASSOC)) 
    {
        $combobitfa .=" <option value='".$rowfa['nombre']." ".$rowfa['apellidos']."'>".$rowfa['nombre']."  ".$rowfa['apellidos']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else
{
    echo "No hubo resultados";
}


?>

<html>
<head>
<meta charset="utf-8">
<title>Tecnoacademia Medellin</title>
<link href="css/registro.css" rel="stylesheet" type="text/css">

<link href="css/index.css" rel="stylesheet" type="text/css">
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
	<br /><br />
	
	<h1 class="titulo">Registro de Aprendiz</h1>
	<form id="registro" name="nuevo_registro" action="registro_aprendiz.php" method="POST" > 
<table>
	
	<th colspan=5><h2>DATOS DEL DOCUMENTO DE IDENTIDAD</h2></th>
	<tr>
		
		<td><h3>Tipo de Identificaci&oacute;n:</h3></td>
		<td> <select name="tipodoc" required class="cajas" id="tipo_doc">

  <option value="TI">Tarjeta de Identidad</option>
  <option value="CC">Cedula de Ciudadanía</option>
  <option value="CE">Cedula Extranjera</option>

</select></td>
		<td width="20px"></td>
	<td><h3>Número de Identificaci&oacute;n:</h3></td>
		<td> <input name="numident" type="text" required class="cajas"></td>
	</tr>	
	<t>
	<td><h3>Departamento de expedici&oacute;n:</h3></td>
	<td><select name="depexp_id" required id="name" placeholder="Departamento de Expedición">
        <option value="SE"> Seleccione </option>
    	<option value="Amazonas"> Amazonas</option>
        <option value="Antioquia" selected>Antioquia</option>
        <option value="Arauca">Arauca</option>
        <option value="Atlantico">Atlántico</option>
        <option value="Bolivar">Bolívar</option>
        <option value="Boyaca">Boyacá</option>
        <option value="Caldas">Caldas</option>
        <option value="Caqueta">Caquetá</option>
        <option value="Casanare">Casanare</option>
        <option value="Cauca">Cauca</option>
        <option value="Cesar">Cesar</option>
        <option value="Choco">Chocó</option>
        <option value="Cordoba">Córdoba</option>
        <option value="Cundinamarca">Cundinamarca</option>
        <option value="Guainia">Güainia</option>
        <option value="Guaviare">Guaviare</option>
        <option value="Huila">Huila</option>
        <option value="La Guajira">La Guajira</option>
        <option value="Magdalena">Magdalena</option>
        <option value="Meta">Meta</option>
        <option value="Narino">Nariño</option>
        <option value="Norte de Santander">Norte de Santander</option>
        <option value="Putumayo">Putumayo</option>
        <option value="Quindio">Quindío</option>
        <option value="Risaralda">Risaralda</option>
        <option value="San Andres y Providencia">San Andrés y Providencia</option>
        <option value="Santander">Santander</option>
        <option value="Sucre">Sucre</option>
        <option value="Tolima">Tolima</option>
        <option value="Valle del Cauca">Valle del Cauca</option>
        <option value="Vaupes">Vaupés</option>
        <option value="Vichada">Vichada</option>
</select></td>
		<td width="20px"></td>
	<td><h3>Municipio de expedici&oacute;n:</h3></td>
	<td><input name="munexp" type="text" required class="cajas"></div></td>
	<tr>
	<td><h3>Fecha de expedición:</h3></td>
	<td><input name="fexp" type="date" required class="cajas" ></td>
	<td width="20px"></td>
	<td><h3>Fecha de Vencimiento:</h3></td>
	<td><input name="fvenc" type="date" class="cajas"></td>	
	</tr>
		
	<th colspan=5><h2>DATOS DEL APRENDIZ</h2></th>	
		
	<tr>
	<td><h3>Nombre:</h3></td>
	<td><input name="nombre" type="text" required class="cajas"></td>
	<td width="20px"></td>
	<td><h3>Apellidos:</h3></td>
	<td><input name="apellidos" type="text" required class="cajas"></td>	
	</tr>	
	
	<tr>
	<td><h3>Fecha de nacimiento:</h3></td>
	<td><input name="fnac" class="cajas" required type="date"></td>
	<td width="20px"></td>	
		<td><h3>Departamento de nacimiento:</h3></td>
	<td><select name="depnac" required id="name" placeholder="Departamento de Expedición">
        <option value="SE"> Seleccione </option>
    	<option value="Amazonas"> Amazonas</option>
        <option value="Antioquia" selected>Antioquia</option>
        <option value="Arauca">Arauca</option>
        <option value="Atlantico">Atlántico</option>
        <option value="Bolivar">Bolívar</option>
        <option value="Boyaca">Boyacá</option>
        <option value="Caldas">Caldas</option>
        <option value="Caqueta">Caquetá</option>
        <option value="Casanare">Casanare</option>
        <option value="Cauca">Cauca</option>
        <option value="Cesar">Cesar</option>
        <option value="Choco">Chocó</option>
        <option value="Cordoba">Córdoba</option>
        <option value="Cundinamarca">Cundinamarca</option>
        <option value="Guainia">Güainia</option>
        <option value="Guaviare">Guaviare</option>
        <option value="Huila">Huila</option>
        <option value="La Guajira">La Guajira</option>
        <option value="Magdalena">Magdalena</option>
        <option value="Meta">Meta</option>
        <option value="Narino">Nariño</option>
        <option value="Norte de Santander">Norte de Santander</option>
        <option value="Putumayo">Putumayo</option>
        <option value="Quindio">Quindío</option>
        <option value="Risaralda">Risaralda</option>
        <option value="San Andres y Providencia">San Andrés y Providencia</option>
        <option value="Santander">Santander</option>
        <option value="Sucre">Sucre</option>
        <option value="Tolima">Tolima</option>
        <option value="Valle del Cauca">Valle del Cauca</option>
        <option value="Vaupes">Vaupés</option>
        <option value="Vichada">Vichada</option>
</select></td>
	</tr>	
	
	<tr>
	<td><h3>Municipio de nacimiento:</h3></td>
	<td><input name="munnac" type="text" required class="cajas"></td>
	<td width="20px"></td>	
	<td><h3>G&eacute;nero:</h3></td>
	<td><select class="cajas" name="genero" required id="genero">
		  <option value="Masculino">Masculino</option>
		  <option value="Femenino">Femenino</option>
		</select>
	</td>
	</tr>	
		
	<tr>
	<td><h3>Estrato Socioecon&oacute;mico:</h3></td>
	<td><select class="cajas" name="estrato" required id="estrato">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		</select>
	</td>
	<td width="20px"></td>	
	<td><h3>Poblaci&oacute;n Vulnerable:</h3></td>
	<td><select class="cajas" name="poblacion" required id="poblacion">
 		<option value="Ninguna">Ninguna</option>
		<option value="Grupos Etnicos">Grupos Étnicos</option>
		<option value="Discapacidad">Discapacidad</option>
		<option value="Desplazado">Desplazado</option>
		</select>
	</td>
	</tr>
	
		<th colspan=5><h2>DATOS DE CONTACTO</h2></th>
	
	<tr>
	<td><h3>Coreo electrónico:</h3></td>
	<td><input name="email" type="email" required class="cajas"></td>
	<td width="20px"></td>	
	<td><h3>Teléfono Fijo:</h3></td>
	<td><input name="telfijo" type="number" required class="cajas"></td>
	</tr>
	
	<tr>
	<td><h3>Teléfono Celular:</h3></td>
	<td><input name="telcelular" type="number" required class="cajas"></td>
	<td width="20px"></td>	
	<td><h3>Dirección:</h3></td>
	<td><input name="dir" type="text" required class="cajas"></td>
	</tr>
	
		<tr>
	<td></td>
	<td></td>
	<td width="20px"></td>	
	<td></td>
	<td></td>
	</tr>
		
		
	</table>
	</form>
	
		
	    
 <div class="divf">
 <div class="divform">

<div class="divi"></div>

<h3 style="color:#FFF">//////////</h3>

<h3 class="h3">DATOS DEL ACUDIENTE</h3>

<div class="divi">Nombre y Apellidos: <input name="nomacud"	style="margin-left:39px;" type="text" required class="cajas"></div>

<div class="divi">Teléfono: <input name="telacud" type="number" required class="cajas" style="margin-left:77px;"></div>



<h3 style="color:#FFF">//////////</h3>

<h3 class="h3">DATOS DE FORMACIÓN TECNOACADEMIA</h3>

<div class="divi">Línea de Formación: <select class="cajas" name="linea" required id="linea">

  <option value="Biotecnologia">Biotecnología</option>

  <option value="Ciencias Basicas">Ciencias Basicas - Quimica</option>

  <option value="Diseno y prototipado">Diseño y prototipado</option>

  <option value="Electronica Robotica">Electrónica Robótica</option>

  <option value="Nanotecnologia">Nanotecnología</option>

  <option value="Tecnologias Virtuales">Tecnologías Virtuales</option>

</select></div>



<div class="divi">Facilitador: <select name="facilitador" required class="cajas" id="facilitador" style="margin-left:108px;">
<option value="0"> Seleccione </option>
<?php echo $combobitfa; ?>
 </select></div>

 

 <div class="divi">Convenio: <select style="margin-left:78px;" class="cajas" name="convenio" required id="convenio">

  <option value="Ninguno">Ninguno</option>

  <option value="Explora">Explora</option>

  <option value="Ruta N">Ruta N</option>

  <option value="Loyola">Loyola</option>

  <option value="Semillero Tenoacademia">Semillero Tenoacademia</option>

 </select></div>

 

  <div class="divi">Inst. Edu.: <select style="margin-left:28px;" class="cajas" name="insed" id="insed">
<option value="0"> Seleccione </option>
<?php echo $combobitie; ?>
  </select></div>
 

  <div class="divi">Grado: <select style="margin-left:142px;" class="cajas" name="grado" required id="grado">

  <option value="Sexto">Sexto</option>

  <option value="Septimo">Séptimo</option>

  <option value="Octavo">Octavo</option>

  <option value="Noveno">Noveno</option>

  <option value="Decimo">Décimo</option>

  <option value="Undecimo">Undécimo</option>

  <option value="Otro">Otro</option>
	  

 </select></div>


   <center><input name="enviar" type="submit" value="Registrar"></center>
</table>
 </form>

 </div>

 </div>
  

</body>

</html>