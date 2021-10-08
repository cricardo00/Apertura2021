<?php

	session_start();
	require 'conexion.php';
	
	if(!isset($_SESSION["id_usuario"])){
		header("Location: index.php");
	}
	
	$idUsuario = $_SESSION['id_usuario'];
	
	$sql = "SELECT id_tipo FROM usuarios";
	$result=$mysqli->query($sql);
	
	$row = $result->fetch_assoc();
    if($_SESSION['tipo_usuario']==3) { 
	
	header("Location: registro.php");
	}
	
$fecha = date("d-m-Y");
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=BD_Aprendices_Tecnoacademia_$fecha.xls");


		$mysqli=new mysqli("sql111.260mb.net","n260m_19587928","tecnoaca","n260m_19587928_tecnoacademia");

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tecnoacademia Medellin</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="32" bgcolor="#25BABA"><CENTER><strong>Aprendices Tecnoacademia 2017</strong></CENTER></td>
  </tr>
  <tr>
    <td><strong>Tipo_doc</strong></td>
    <td><strong>Num_identificacion</strong></td>
    <td><strong>Pais_exp</strong></td>
    <td><strong>Departamento_exp</strong></td>
    <td><strong>Municipio_exp</strong></td>
    <td><strong>Fecha_venc</strong></td>
    <td><strong>Nombre</strong></td>
    <td><strong>Apellidos</strong></td>
    <td><strong>Fecha_nac</strong></td>
    <td><strong>Pais_nac</strong></td>
    <td><strong>Departamento_nac</strong></td>
    <td><strong>Municipio_nac</strong></td>
    <td><strong>Genero</strong></td>
    <td><strong>Estrato</strong></td>    
    <td><strong>Poblacion</strong></td>
    <td><strong>Email</strong></td>        
    <td><strong>Tel_fijo</strong></td>
    <td><strong>Tel_celular</strong></td> 
    <td><strong>Direccion</strong></td>  
    <td><strong>Barrio</strong></td>    
	<td><strong>Municipio</strong></td>        
    <td><strong>Nombre_acud</strong></td>    
    <td><strong>Telefono_acud</strong></td>           
    <td><strong>Fecha_ingreso</strong></td>    
    <td><strong>Dia_formacion</strong></td>    
    <td><strong>Linea_formacion</strong></td>    
	<td><strong>Facilitador</strong></td>        
    <td><strong>Convenio</strong></td>    
    <td><strong>Institucion_Educativa</strong></td>           
    <td><strong>Municipio_I.E</strong></td>    
    <td><strong>Grado</strong></td>    
    <td><strong>Estado</strong></td>   
  </tr>
  
<?PHP
		
$query=mysqli_query($mysqli, "SELECT tipodoc, numident, paisexp, depexp, munexp, fvenc, nombre, apellidos, fnac, paisnac, depnac, munnac, genero, estrato, poblacion, email, telfijo, telcelular, dir, barrio, munic, nomacud, telacud, fingre, dform, linea, facilitador, convenio, insed, minsed, grado, estado FROM aprendiz");
while($res=mysqli_fetch_array($query)){		

	$tipodocu=$res["tipodoc"];
	$numidenti=$res["numident"];
	$paisexpe=$res["paisexp"];
	$depexpe=$res["depexp"];
	$munexpe=$res["munexp"];
	$fvenci=$res["fvenc"];	
	$nombres=$res["nombre"];
	$apellidoss=$res["apellidos"];
	$fnaci=$res["fnac"];
	$paisnaci=$res["paisnac"];
	$depnaci=$res["depnac"];
	$munnaci=$res["munnac"];
	$generoo=$res["genero"];
	$estratoo=$res["estrato"];
	$poblacionn=$res["poblacion"];
	$emaill=$res["email"];
	$telfijoo=$res["telfijo"];
	$telcelularr=$res["telcelular"];
	$dirr=$res["dir"];
	$barrioo=$res["barrio"];
	$munici=$res["munic"];
	$nomacudi=$res["nomacud"];
	$telacudi=$res["telacud"];
	$fingree=$res["fingre"];
	$dforma=$res["dform"];
	$lineaa=$res["linea"];
	$facilitadorr=$res["facilitador"];
	$convenioo=$res["convenio"];
	$insedd=$res["insed"];
	$minsedd=$res["minsed"];
	$gradoo=$res["grado"];					
	$estadoo=$res["estado"];					

?>  
 <tr>
	<td><?php echo $tipodocu; ?></td>
	<td><?php echo $numidenti; ?></td>
	<td><?php echo $paisexpe; ?></td>
	<td><?php echo $depexpe; ?></td>
	<td><?php echo $munexpe; ?></td>
	<td><?php echo $fvenci; ?></td>                     
   	<td><?php echo $nombres; ?></td>                     
   	<td><?php echo $apellidoss; ?></td> 
    <td><?php echo $fnaci; ?></td>                     
   	<td><?php echo $paisnaci; ?></td>                     
   	<td><?php echo $depnaci; ?></td>
   	<td><?php echo $munnaci; ?></td>                     
   	<td><?php echo $generoo; ?></td>
   	<td><?php echo $estratoo; ?></td>
   	<td><?php echo $poblacionn; ?></td>    
   	<td><?php echo $emaill; ?></td>
   	<td><?php echo $telfijoo; ?></td>                     
   	<td><?php echo $telcelularr; ?></td>
   	<td><?php echo $dirr; ?></td>
   	<td><?php echo $barrioo; ?></td>    
   	<td><?php echo $munici; ?></td>
   	<td><?php echo $nomacudi; ?></td>                     
   	<td><?php echo $telacudi; ?></td>
   	<td><?php echo $fingree; ?></td>
   	<td><?php echo $dforma; ?></td>   
    <td><?php echo $lineaa; ?></td>  
    <td><?php echo $facilitadorr; ?></td>
    <td><?php echo $convenioo; ?></td>
    <td><?php echo $insedd; ?></td>
    <td><?php echo $minsedd; ?></td>
    <td><?php echo $gradoo; ?></td>
    <td><?php echo $estadoo; ?></td>


 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>