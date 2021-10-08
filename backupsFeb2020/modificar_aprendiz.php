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

$sqlie="SELECT * from instituciones WHERE tecno_ie=".$_SESSION['tipo_tecno'];
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

$sqlfa="SELECT * from usuarios WHERE id_tipo = 2 && tipotecno=".$_SESSION['tipo_tecno'];
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


// Despegable de  Departamentos//

$sqldep="SELECT DISTINCT nomdepartamento, iddepartamento FROM departamentos ORDER BY nomdepartamento ASC" ;
$resultdep = $mysqli->query($sqldep); //usamos la conexion para dar un resultado a la variable
 
if ($resultdep->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobitdep="";
    while ($rowdep = $resultdep->fetch_array(MYSQLI_ASSOC)) 
    {
        $combobitdep .=" <option value='".$rowdep['iddepartamento']."'>".$rowdep['nomdepartamento']."</option>";
    }
}
else
{
    echo "No hubo resultados";
}

// Despegable de Lineas Tecno //

$sqlinea="SELECT * from lineastecno";
$resultlinea = $mysqli->query($sqlinea); //usamos la conexion para dar un resultado a la variable
 
if ($resultlinea->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobitlinea="";
    while ($rowlinea = $resultlinea->fetch_array(MYSQLI_ASSOC)) 
    {
        $combobitlinea .=" <option value='".$rowlinea['nombrelinea']."'>".$rowlinea['nombrelinea']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else
{
    echo "No hubo resultados";
}

	$id = $_GET['id'];
	
	$sql = "SELECT * FROM aprendiz WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
	$sqldepsel ="SELECT * FROM departamentos WHERE iddepartamento=".$row['depexp'];
	$redepsel = $mysqli->query($sqldepsel);
	$rowdepsel = $redepsel->fetch_array(MYSQLI_ASSOC);

	$sqldepnasel ="SELECT * FROM departamentos WHERE iddepartamento=".$row['depnac'];
	$redepnalsel = $mysqli->query($sqldepnasel);
	$rowdepnasel = $redepnalsel->fetch_array(MYSQLI_ASSOC);

?>

<html>
<head>
<meta charset="utf-8">
<title>Tecnoacademia Medellin</title>
<link href="css/Style.css" rel="stylesheet" type="text/css">
<script language="javascript" src="js/jquery-3.1.1.min.js"></script>	
	
<script language="javascript"> //script para que se muestren los municipios de acuerdo al dep seleccionado.
			$(document).ready(function(){
				$("#depexp_id").change(function () {
 
					$("#depexp_id option:selected").each(function () {
						iddepartamento = $(this).val();
						$.post("getMunicipios.php", { iddepartamento: iddepartamento }, function(data){
							$("#munexp").html(data);
						});            
					});
				})
			});						
</script>	

<script language="javascript"> //script para que se muestren los municipios de acuerdo al dep seleccionado.(nacimiento)
			$(document).ready(function(){
				$("#depnac").change(function () {
 
					$("#depnac option:selected").each(function () {
						iddepartamento = $(this).val();
						$.post("getMunicipios.php", { iddepartamento: iddepartamento }, function(data){
							$("#munnac").html(data);
						});            
					});
				})
			});						
</script>	
	
	
	
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
      <li><a href="gestion_aprendices.php">Gestión del Aprendiz</a></li>
      <?php } ?>
      <li style="float:right"><a class="active" href="logout.php">Cerrar Sesi&oacute;n</a></li>
	</ul>
    
</div>
</div>
</div>
	<h1 class="titulo">Modificaci&oacute;n de Aprendiz</h1>
	
	<form id="registro" name="nuevo_registro" action="actualizar.php" method="POST" > 
	<table id="tab">
	
	<th colspan="5"><h3>DATOS DEL DOCUMENTO DE IDENTIDAD</h3></th>
	<tr>
		<td width="149">Tipo de Identificaci&oacute;n:</td>
		<td width="239"><select name="tipodoc" required class="cajas" id="tipo_doc">
			<option value="<?php echo $row['tipodoc']; ?>" selected><?php echo $row['tipodoc']; ?></option>
			<option value="TI">Tarjeta de Identidad</option>
  			<option value="CC">Cedula de Ciudadanía</option>
  			<option value="CE">Cedula Extranjera</option>
			</select>
		</td>
		<td width="42"></td>
	<td width="111">Número de Identificaci&oacute;n:</td>
		<td width="240"><input name="numident" type="text" required id="cajas2" value="<?php echo $row['numident']; ?>"></td>
	</tr>	
	<td>Departamento de expedici&oacute;n:</td>
	<td>
		<select name="depexp_id" required id="depexp_id" placeholder="Departamento de Expedición">
        <option value="0"> Seleccione </option>
		<option value="<?php echo $row['depexp']; ?>" selected><?php echo $rowdepsel['nomdepartamento']; ?></option>	
    	<?php echo $combobitdep; ?>
		</select>
	</td>
		<td width="42"></td>
	<td>Municipio de expedici&oacute;n:</td>
	<td>
		<select name="munexp" required id="munexp" placeholder="municipio de Expedición">
        <option value="0"> </option>
		<option value="<?php echo $row['munexp']; ?>" selected><?php echo $row['munexp']; ?></option>
		</select>
	</td>
	<tr>
	<td>Fecha de expedición:</td>
	<td><input name="fexp" type="date" required class="cajas" value="<?php echo $row['fexp']; ?>"></td>
	<td width="42"></td>
	<td>Fecha de Vencimiento:</td>
	<td><input name="fvenc" type="date" class="cajas" value="<?php echo $row['fvenc']; ?>"></td>	
	</tr>
		
	<th colspan="5"><h3>DATOS DEL APRENDIZ</h3></th>	
		
	<tr>
	<td>Nombre:</td>
	<td><input name="nombre" type="text" required id="cajas" value="<?php echo $row['nombre']; ?>"></td>
	<td width="42"></td>
	<td>Apellidos:</td>
	<td><input name="apellidos" type="text" required id="cajas" value="<?php echo $row['apellidos']; ?>"></td>	
	</tr>	
	
	<tr>
	<td>Fecha de nacimiento:</td>
	<td><input name="fnac" class="cajas" required type="date" value="<?php echo $row['fnac']; ?>"></td>
	<td width="42"></td>	
		<td>Departamento de nacimiento:</td>
	<td>
		<select name="depnac" required id="depnac" placeholder="Departamento de nacimiento">
        <option value="0"> Seleccione </option>
		<option value="<?php echo $row['depnac']; ?>" selected><?php echo $rowdepnasel['nomdepartamento']; ?></option>
    	<?php echo $combobitdep; ?>
		</select>
	</td>
	</tr>	
	
	<tr>
	<td>Municipio de nacimiento:</td>
	<td><select name="munnac" required id="munnac" placeholder="municipio de nacimiento">
        <option value="0"> </option>
    	<option value="<?php echo $row['munnac']; ?>" selected><?php echo $row['munnac']; ?></option>
		</select>
	</td>
	<td width="42"></td>	
	<td>G&eacute;nero:</td>
	<td><select class="cajas" name="genero" required id="genero">
			<option value="<?php echo $row['genero']; ?>" selected><?php echo $row['genero']; ?></option>
			<option value="Masculino">Masculino</option>
		  	<option value="Femenino">Femenino</option>
		</select>
	</td>
	</tr>	
		
	<tr>
	<td>Estrato Socioecon&oacute;mico:</td>
	<td><select class="cajas" name="estrato" required id="estrato">
		<option value="<?php echo $row['estrato']; ?>" selected><?php echo $row['estrato']; ?></option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		</select>
	</td>
	<td width="42"></td>	
	<td>Grupos &Eacute;tnicos:</td>
	<td><select class="cajas" name="gruposetnicos" required id="gruposetnicos">
		<option value="<?php echo $row['grupoEtnico']; ?>" selected><?php echo $row['grupoEtnico']; ?></option>
 		<option value="NINGUNA"> Ninguna </option>
		<option value="AFROCOLOMBIANO">Afrocolombiano</option>
		<option value="INDIGENA">Indigena</option>
		<option value="NEGRITUDES">Negritudes</option>
		<option value="PALENQUEROS">Palenqueros</option>
		<option value="RAIZAL">Raizal</option>
		</select>
	</td>
	</tr>
	
		<tr>
		  <td>Discapacidad:</td>
		  <td colspan="4"><select class="cajas" name="discapacidad" required id="discapacidad">
			<option value="<?php echo $row['discapacidad']; ?>" selected><?php echo $row['discapacidad']; ?></option>
		    <option value="NINGUNA">Ninguna</option>
		    <option value="DISCAPACITADO COGNITIVO">Discapacitado Cognitivo</option>
		    <option value="DISCAPACITADO COGNITIVO O MENTAL">Discapacitado Cognitivo o Mental</option>
		    <option value="DISCAPACITADO LIMITACION AUDITIVA O SORDA">Discapacitado Limitacion Auditiva o Sorda</option>
		    <option value="DISCAPACITADO LIMITACION FISICA O MOTORA">Discapacitado Limitacion Fisica o Motora</option>
		    <option value="DISCAPACITADO LIMITACION VISUAL O CIEGA">Discapacitado Limitacion Visual o Ciega</option>
		    <option value="DISCAPACITADO MENTAL">Discapacitado Mental</option>
		    <option value="DISCAPACITADOS">Discapacitados</option>
	      </select></td>
    </tr>
		<tr>
		  <td>Poblaci&oacute;n Vulnerable:</td>
		  <td colspan="4"><select class="cajas" name="poblacionvulnerable" required id="poblacionvulnerable">
			<option value="<?php echo $row['poblacionVulnerable']; ?>" selected><?php echo $row['poblacionVulnerable']; ?></option>
		    <option value="NINGUNA">Ninguna</option>
		    <option value="DESPLAZADOS POR LA VIOLENCIA">Desplazados por la Violencia</option>
		    <option value="DESPLAZADOS POR FENÓMENOS NATURALES">Desplazados por Fenomenos Naturales</option>
		    <option value="POBLACION CON DISCAPACIDAD">Poblacion con Discapacidad</option>
		    <option value="ADOLESCENTE DESVINCULADO DE GRUPOS ARMADOS">Adolescente Desvinculado de Grupos Armados</option>
		    <option value="ADOLESCENTE EN CONFLICTO CON LA LEY PENAL">Adolescente en conflicto con la Ley Penal</option>
		    <option value="ADOLESCENTE TRABAJADOR">Adolescente Trabajador</option>
		    <option value="GRUPOS ETNICOS">Grupos Etnicos</option>
		    <option value="INPEC">INPEC</option>
		    <option value="ADOLESCENTES Y JOVENES VULNERABLES">Adolescentes y Jovenes Vulnerables</option>
		    <option value="MUJER CABEZA DE HOGAR">Mujer Cabeza de Hogar</option>
		    <option value="PARTICIPANTES DEL PROGRAMA DE REINTEGRACION - REINTEGRADOS">Participantes del Programa de Reintegracion - Reintegrados</option>
		    <option value="POBLACION VICTIMA DE MINAS ANTIPERSONAL">Poblacion Victima de Minas Antipersonal</option>
		    <option value="PERSONA MAYOR">Persona Mayor</option>
		    <option value="COMUNIDAD LGBTI">Comunidad LGBTI</option>
			<option value="COMUNIDAD ROOM">Comunidad ROOM</option>
	      </select></td>
    </tr>
	<tr>
    <th colspan="5"><h3>DATOS DE CONTACTO</h3></th>
	
	<tr>
	<td>Coreo electrónico:</td>
	<td><input name="email" type="email" required class="cajas" value="<?php echo $row['email']; ?>"></td>
	<td width="42"></td>	
	<td>Teléfono Fijo:</td>
	<td><input name="telfijo" type="number" required class="cajas" value="<?php echo $row['telfijo']; ?>"></td>
	</tr>
	
	<tr>
	<td>Teléfono Celular:</td>
	<td><input name="telcelular" type="number" required class="cajas" value="<?php echo $row['telcelular']; ?>"></td>
	<td width="42"></td>	
	<td>Dirección:</td>
	<td><input name="dir" type="text" required id=cajas value="<?php echo $row['dir']; ?>"></td>
	</tr>
	
		
	<th colspan="5"><h3>DATOS DEL ACUDIENTE</h3></th>	
		
	<tr>
	<td>Nombre y Apellidos:</td>
	<td><input name="nomacud" type="text" required id=cajas value="<?php echo $row['nomacud']; ?>"></div></td>
	<td width="42"></td>	
	<td>Teléfono:</td>
	<td><input name="telacud" type="number" required class="cajas" value="<?php echo $row['telacud']; ?>"></td>
	</tr>
		
		
	<th colspan="5"><h3>DATOS DE FORMACIÓN TECNOACADEMIA</h3></th>	
	
	<tr>
    <td>Línea de Formación:</td>
    <td><select class="cajas" name="linea" id="linea" required>
		<option value="<?php echo $row['linea']; ?>" selected><?php echo $row['linea']; ?></option>
<option value="0"> Seleccione </option>
<?php echo $combobitlinea; ?>
  </select></td>
    <td width="42"></td>
    <td>Sub Area - Linea:</td>
	<td><input name="subArea" type="text" required id="cajas" value="<?php echo $row['subarea']; ?>"></td>
    </tr>
	<tr>
	<td>Facilitador:</td>
	<td><select name="facilitador" required class="cajas" id="facilitador">
	<option value="<?php echo $row['facilitador']; ?>" selected><?php echo $row['facilitador']; ?></option>
<option value="0"> Seleccione </option>
<?php echo $combobitfa; ?>
 </select></td>
	<td width="42"></td>	
	<td>&nbsp;</td>
	<td><input type="hidden" name="id" id="id" value="<?php echo $id; ?>"></td>
	</tr>
	
	<tr>
	  <td>Inst. Edu.:</td>
	  <td><select class="cajas" name="insed" id="insed" required>
	    <option value="<?php echo $row['insed']; ?>" selected><?php echo $row['insed']; ?></option>
	    <option value="0"> Seleccione </option>
	    <?php echo $combobitie; ?>
      </select></td>
	  <td></td>
	  <td>Grado:</td>
	  <td><select class="cajas" name="grado" required id="grado">
	    <option value="<?php echo $row['grado']; ?>" selected><?php echo $row['grado']; ?></option>
	    <option value="Sexto">Sexto</option>
	    <option value="Septimo">Séptimo</option>
	    <option value="Octavo">Octavo</option>
	    <option value="Noveno">Noveno</option>
	    <option value="Decimo">Décimo</option>
	    <option value="Undecimo">Undécimo</option>
	    <option value="Otro">Otro</option>
      </select></td>
	  </tr>
	<tr>
	<td>Fecha Registro</td>
	<td><?php echo $row['fingre']; ?>
		<input type="hidden" name="fingre" id="fingre" value="<?php echo $row['fingre']; ?>"></td>
	<td width="42"></td>	
	<td>Estado:</td>
	<td><select class="cajas" name="estado" required id="estado">
	  <option value="<?php echo $row['estado']; ?>" selected><?php echo $row['estado']; ?></option>
	  <option value="ACTIVO">ACTIVO</option>
	  <option value="INACTIVO">INACTIVO</option>
	  </select></td>
	</tr>
	
	<th colspan="3"><input name="enviar" type="submit" value="Modificar"></th>
				
	</table>
	</form>
	
	</body>

</html>