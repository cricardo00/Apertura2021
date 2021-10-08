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

// Despegable de Tecnoacademias //

$sqlie="SELECT * from tecnoacademia WHERE idtecnoacademia =".$_SESSION['tipo_tecno'];
$resultie = $mysqli->query($sqlie); //usamos la conexion para dar un resultado a la variable
 
if ($resultie->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobitie="";
    while ($rowie = $resultie->fetch_array(MYSQLI_ASSOC)) 
    {
        $combobitie .=" <option value='".$rowie['idtecnoacademia']."'>".$rowie['nombretecno']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
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
<link href="css/Style.css" rel="stylesheet" type="text/css">
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
      <li><a href="gestion_usuarios.php">Gestión de Usuarios</a></li>
      <?php } ?>
      <li style="float:right"><a class="active" href="logout.php">Cerrar Sesi&oacute;n</a></li>
	</ul>
    
</div>
</div>
</div>
	
	<h1 class="titulo">Registro de Usuarios</h1>
	<form id="registro" name="nuevo_registro" action="registro_usuario.php" method="POST" > 
	<table id="tab">
	
	<th colspan="5"><h3>DATOS DE INGRESO</h2></th>
	<tr>
		<td>Usuario:</td>
		<td><input id="cajas2" name="usuario" type="text" required></td>
		<td width="20"></td>
	<td>Contrase&ntilde;a:</td>
		<td><input id="cajas2" name="contrasena" type="password" required></td>
	</tr>	
	<td>Rol en la Plataforma:</td>
	<td><select name="roltecno" required id="roltecno" placeholder="Rol en la Plataforma" disabled>
        <option value="2" selected>Facilitador</option>
		</select></td>
		<td width="20"></td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<th colspan="5"><h3>DATOS DEL USUARIO</h2></th>	
	  
    <tr>
      <td>Identificaci&oacute;n:</td>
      <td><input name="idusuario" type="number" required></td>
      <td></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
	<td>Nombre:</td>
	<td><input id="cajas" name="nombres" type="text" required></td>
	<td width="20"></td>
	<td>Apellidos:</td>
	<td><input id="cajas" name="apellidos" type="text" required></td>	
	</tr>	
	
	<tr>
	<td>Tecnoacademia:</td>
	<td>
	<select class="cajas" name="tecnoacademia" id="tecnoacademia" disabled>
		<?php echo $combobitie; ?>
  	</select>	
	</td>
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