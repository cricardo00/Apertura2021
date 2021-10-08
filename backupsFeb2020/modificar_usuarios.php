<!doctype html>
<?php
	
	session_start();
	require 'conexion.php';
	
	if(!isset($_SESSION["id_usuario"])){
		header("Location: index.php");
	}
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM usuarios WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);

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
<title>Tecnoacademia</title>
<link href="css/Style.css" rel="stylesheet" type="text/css">
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
    <h1 class="titulo">Modificar Usuario</h1>
 
<form id="actualizar" name="actualizar" action="actualizar_usuario.php" method="POST" >  
<table>
	
	<table id="tab">
	
	<th colspan="5"><h3>DATOS DE INGRESO</h2></th>
	<tr>
		<td>Usuario:</td>
		<td width="239"><input value="<?php echo $row['usuario']; ?>" id="cajas2" name="usuario" type="text" required> </td>
		<td width="14"></td>
	<td width="103">Contrase&ntilde;a:</td>
		<td width="251"><input id="cajas2" name="password" type="password" required></td>
	</tr>	
	<td width="174">Rol en la Plataforma:</td>
	<td>
		<select name="roltecno" required id="roltecno" placeholder="Rol en la Plataforma" disabled>
        <option value="1" <?php if($row['id_tipo']=='1') echo 'selected'; ?>>Administrador</option>
        <option value="2" <?php if($row['id_tipo']=='2') echo 'selected'; ?>>Facilitador</option>
        <option value="3" <?php if($row['id_tipo']=='3') echo 'selected'; ?>>Aprendiz</option>
        <option value="4" <?php if($row['id_tipo']=='4') echo 'selected'; ?>>Lideres</option>
        <option value="5" <?php if($row['id_tipo']=='5') echo 'selected'; ?>>Directivo</option>
		</select>
		</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	<tr>
	<th colspan="5"><h3>DATOS DEL USUARIO</h2></th>	
	  
    <tr>
      <td>Identificaci&oacute;n:</td>
      <td><input name="idusuario" type="number" required value="<?php echo $row['idusuario']; ?>"></td>
      <td></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
	<td>Nombre:</td>
	<td><input value="<?php echo $row['nombre']; ?>" id="cajas" name="nombre" type="text" required></td>
	<td width="14"></td>
	<td>Apellidos:</td>
	<td><input value="<?php echo $row['apellidos']; ?>" id="cajas" name="apellidos" type="text" required></td>	
	</tr>	
	
	<tr>
	<td width="174">Tecnoacademia:</td>	
	<td>
		<select class="cajas" name="tecnoacademia" id="tecnoacademia" disabled>
		<?php echo $combobitie; ?>
  	</select>	
		</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	</tr>
	
	
	<th colspan="4"><input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>"/>
   <input name="enviar" type="submit" value="Modificar">
 </th>
				
	</table>
	</form>

</body>
</html>