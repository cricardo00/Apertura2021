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

?>

<html>
<head>
<meta charset="utf-8">
<title>Tecnoacademia</title>
<link href="css/Style.css" rel="stylesheet" type="text/css">
<script language="javascript" src="js/jquery-3.1.1.min.js"></script>	
	
<script language="javascript"> //script para que se muestren los municipios de acuerdo al dep seleccionado.
			$(document).ready(function(){
				$("#departamento_ie").change(function () {
 
					$("#departamento_ie option:selected").each(function () {
						iddepartamento = $(this).val();
						$.post("getMunicipios.php", { iddepartamento: iddepartamento }, function(data){
							$("#municipio_ie").html(data);
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
      <?php if($_SESSION['tipo_usuario']==1 || $_SESSION['tipo_usuario']==2 || $_SESSION['tipo_usuario']==4) { ?>
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
	
	<h1 class="titulo">Registro de Inst. Educativas</h1>
	<form id="registro" name="nuevo_registro" action="registro_ie.php" method="POST" > 
	<table id="tab">
	
	<th colspan="5"><h3>DATOS DE LA I.E.</h3></th>
	<tr>
		<td>Nombre:</td>
		<td><input id="cajas2" name="nombre_ie" type="text" required></td>
		<td width="20"></td>
	
		<td>Tipo de I.E.</td>
		<td><select name="tipo_ie" required id="tipo_ie" placeholder="Tipo de I.E">
        <option value="Publica" selected>Pública</option>
		<option value="Privada">Privada</option>
		<option value="0">Seleccione</option>
			
		</select></td>
		
	</tr>	
	<td>Departamento I.E:</td>
	<td><select class="cajas" name="departamento_ie" id="departamento_ie" required placeholder="departamento de Expedición">
	  <option value="0"> Seleccione </option>
	  <?php echo $combobitdep; ?>
	  </select></td>
	<td>&nbsp;</td>
	<td>Municipio I.E:</td>
	<td><select class="cajas" name="municipio_ie" id="municipio_ie" required placeholder="municipio de Expedición">
	  <option value="0"> Seleccione </option>
	  </select></td>
	</tr>

	</tr>	
	<td>Zona de la I.E:</td>
	<td><select class="cajas" name="zona_ie" id="zona_ie" required placeholder="zona_ie">
	  <option value="0"> Seleccione </option>
	  <option value="Rural">Rural</option>
	  <option value="Urbana" selected>Urbana</option>
	  </select></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>	
	<td>&nbsp;</td>
	</tr>
	
	<tr>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  <td></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  </tr>
	<tr>
	  <td colspan="2">DATOS DE CONTACTO DE LA I.E.</td>
	  <td></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
	  </tr>
	<tr>
	  <td>Nombres y Apellidos:</td>
	  <td><input id="cajas" name="contacto_ie" type="text" required></td>
	  <td></td>
	  <td>Num. Telefonico:</td>
	  <td><input name="telefono_ie" type="number" required></td>
	  </tr>
	<tr>
	<td>Email:</td>
	<td><input name="emailie" type="email" required></td>
		
	<td width="20"></td>
		
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
    <tr>
	<td colspan="3"><input name="enviar" type="submit" value="Registrar"></td>	
	</tr>
	  
	  </table>
	
	</form>
	
	</body>

</html>