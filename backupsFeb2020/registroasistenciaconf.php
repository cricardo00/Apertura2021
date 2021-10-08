<?php
  //Datos de la Consulta
  $varUsuAsisConf=$_POST["gender"];
  $varConfUsuAsis='SI';

require 'conexionasis.php';

$sql = "SELECT * FROM usuarios WHERE numdoc =".$_POST["gender"];
$resultado = $mysqli->query($sql);
$row = $resultado->fetch_array(MYSQLI_ASSOC);

//Datos del Usuario
$idusuario=$row['tipodoc'];
$idusuario= strtoupper($idusuario);

$numusuario=$row['numdoc'];

$nombreusuario=$row['nombres'];
$nombreusuario= strtoupper($nombreusuario);

$apellidosusuario=$row['apellidos'];
$apellidosusuario= strtoupper($apellidosusuario);

$institucionsusuario=$row['ieusuario'];
$institucionsusuario= strtoupper($institucionsusuario);
	
$query="INSERT INTO asistencia (tipodoc, numdoc, nombres, apellidos, ieusuario, asistenciatecno) VALUES ('$idusuario', '$numusuario', '$nombreusuario', '$apellidosusuario', '$institucionsusuario', '$varConfUsuAsis')";

$resultadoasisconf=$mysqli->query($query);

if($resultadoasisconf>0){
	header("Location: gestionasistenciacdhc.php");
}else{ 
	echo "Error al registrar asistencia del usuario";
} 

?>