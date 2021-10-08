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

	$mysqli=new mysqli("127.0.0.1","tecnoaca_aperezn","apereznTAM","tecnoaca_tecnonacional2020");
	
	$idtecnorep = $_SESSION['tipo_tecno'];

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Tecnoacademia Medellin</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="40" bgcolor="#25BABA"><CENTER>
      <strong>Aprendices Tecnoacademia 2020</strong> - Tecnologías Virtuales
    </CENTER></td>
  </tr>
  <tr>
    <td><strong>Tipo_doc</strong></td>
    <td><strong>Num_identificacion</strong></td>
    <td><strong>Departamento_exp</strong></td>
    <td><strong>Municipio_exp</strong></td>
    <td><strong>Fecha_exp</strong></td>
	<td><strong>Fecha_venc</strong></td>
    <td><strong>Nombre</strong></td>
    <td><strong>Apellidos</strong></td>
    <td><strong>Fecha_nac</strong></td>
    <td><strong>Departamento_nac</strong></td>
    <td><strong>Municipio_nac</strong></td>
    <td><strong>Genero</strong></td>
    <td><strong>Estrato</strong></td>
	<td><strong>Grupo Etnico</strong></td>  
	<td><strong>Discapacidad</strong></td>  
	<td><strong>Poblacion Vulnerable</strong></td>
	<td><strong>EPS</strong></td>
	<td><strong>GS-RH</strong></td>
    <td><strong>Email</strong></td>        
    <td><strong>Tel_fijo</strong></td>
    <td><strong>Tel_celular</strong></td> 
    <td><strong>Direccion</strong></td>  
    <td><strong>Nombre_acud</strong></td>    
    <td><strong>Telefono_acud</strong></td> 
	<td><strong>Inst_Educativa</strong></td>           
    <td><strong>Grado</strong></td>
    <td><strong>Fecha_ingreso</strong></td>
	<td><strong>Periodicidad</strong></td>
    <td><strong>Linea_formacion01</strong></td>
	<td><strong>Subarea_formacion01</strong></td> 
	<td><strong>Facilitador01</strong></td>          
    <td><strong>Tipo_Formacion01</strong></td>      
    <td><strong>Estado01</strong></td>
	<td><strong>Fecha01</strong></td>
	<td><strong>Linea_formacion02</strong></td>
	<td><strong>Subarea_formacion02</strong></td> 
	<td><strong>Facilitador02</strong></td>          
    <td><strong>Tipo_Formacion02</strong></td>      
    <td><strong>Estado02</strong></td>
	<td><strong>Fecha02</strong></td>  
  </tr>
  
<?PHP
		
$query=mysqli_query($mysqli, "SELECT * FROM aprendiz WHERE tecnoacademia = $idtecnorep AND linea = 'TICS'");
while($res=mysqli_fetch_array($query)){		

	$tipodocu=$res["tipodoc"];
	$numidenti=$res["numident"];
	$depexpe=$res["depexp"];
	$munexpe=$res["munexp"];
	$fexpe=$res["fexp"];	
	$fvenci=$res["fvenc"];	
	$nombres=$res["nombre"];
	$apellidoss=$res["apellidos"];
	$fnaci=$res["fnac"];
	$depnaci=$res["depnac"];
	$munnaci=$res["munnac"];
	$generoo=$res["genero"];
	$estratoo=$res["estrato"];
	
	$grupoEtnicoo=$res["grupoEtnico"];
	$discapacidades=$res["discapacidad"];
	$poblacionVulnerables=$res["poblacionVulnerable"];
	$epsestudian=$res["epsestud"];
	$gsyrhest=$res["gsyrh"];
	
	$emaill=$res["email"];
	$telfijoo=$res["telfijo"];
	$telcelularr=$res["telcelular"];
	$dirr=$res["dir"];
	
	$nomacudi=$res["nomacud"];
	$telacudi=$res["telacud"];
	
	$insedd=$res["insed"];
	$gradoo=$res["grado"];	
	$fingreest=$res["fingre"];
	$periodiestu=$res["periodoest"];
	
	$lineaunoest=$res["lineauno"];
	$subareaunoest=$res["subareauno"];
	$facilitadorunoest=$res["facilitadoruno"];		
	$tipformlinestunoest=$res["tipformlinestuno"];					
	$estadounoest=$res["estadouno"];	
	$fechestadounoest=$res["fechestadouno"];
	
	$lineadosest=$res["lineados"];
	$subareadosest=$res["subareados"];
	$facilitadordosest=$res["facilitadordos"];	
	$tipformlinestdosest=$res["tipformlinestdos"];
	$estadodosest=$res["estadodos"];					
	$fechestadodosest=$res["fechestadodos"];						
					

?>  
 <tr>
	<td><?php echo $tipodocu; ?></td>
	<td><?php echo $numidenti; ?></td>
	<td><?php echo $depexpe; ?></td>
	<td><?php echo $munexpe; ?></td>
	<td><?php echo $fexpe; ?></td> 
	<td><?php echo $fvenci; ?></td>                     
   	<td><?php echo $nombres; ?></td>                     
   	<td><?php echo $apellidoss; ?></td> 
    <td><?php echo $fnaci; ?></td>                             
   	<td><?php echo $depnaci; ?></td>
   	<td><?php echo $munnaci; ?></td>                     
   	<td><?php echo $generoo; ?></td>
   	<td><?php echo $estratoo; ?></td>
	<td><?php echo $grupoEtnicoo; ?></td>
	<td><?php echo $discapacidades; ?></td>
	<td><?php echo $poblacionVulnerables; ?></td>
	<td><?php echo $epsestudian; ?></td> 
	<td><?php echo $gsyrhest; ?></td> 
   	<td><?php echo $emaill; ?></td>
   	<td><?php echo $telfijoo; ?></td>                     
   	<td><?php echo $telcelularr; ?></td>
   	<td><?php echo $dirr; ?></td>
   	<td><?php echo $nomacudi; ?></td>                     
   	<td><?php echo $telacudi; ?></td>
	<td><?php echo $insedd; ?></td>
    <td><?php echo $gradoo; ?></td>
	<td><?php echo $fingreest; ?></td>
   	<td><?php echo $periodiestu; ?></td> 
   	<td><?php echo $lineaunoest; ?></td>
	<td><?php echo $subareaunoest; ?></td>
	<td><?php echo $facilitadorunoest; ?></td> 
	<td><?php echo $tipformlinestunoest; ?></td> 
	<td><?php echo $estadounoest; ?></td> 
	<td><?php echo $fechestadounoest; ?></td> 
	<td><?php echo $lineadosest; ?></td>
	<td><?php echo $subareadosest; ?></td>
	<td><?php echo $facilitadordosest; ?></td> 
	<td><?php echo $tipformlinestdosest; ?></td> 
	<td><?php echo $estadodosest; ?></td> 
	<td><?php echo $fechestadodosest; ?></td> 
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>