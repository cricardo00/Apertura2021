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
	if($_SESSION['tipo_usuario']==2 || $_SESSION['tipo_usuario']==4) { 
	
	header("Location: welcome.php");
	}
	
	$fecha = date("d-m-Y");
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=DG_Aprendices_TATuquerres_$fecha.xls");

	/*$mysqli=new mysqli("localhost","root","","tecnoaca_tecnonacional2019");*/
	$mysqli=new mysqli("127.0.0.1","tecnoaca_aperezn","apereznTAM","tecnoaca_tecnonacional2019");
	
	$idtecnorep = 52;

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tecnoacademia Tuquerres</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="29" bgcolor="#25BABA"><CENTER>
      <strong>Reporte Aprendices Tecnoacademia 2019</strong>
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
    <td><strong>Email</strong></td>        
    <td><strong>Tel_fijo</strong></td>
    <td><strong>Tel_celular</strong></td> 
    <td><strong>Direccion</strong></td>  
    <td><strong>Nombre_acud</strong></td>    
    <td><strong>Telefono_acud</strong></td>           
    <td><strong>Fecha_ingreso</strong></td>    
    <td><strong>Linea_formacion</strong></td>
	<td><strong>Subarea_formacion</strong></td> 
	<td><strong>Facilitador</strong></td>          
    <td><strong>Inst_Educativa</strong></td>           
    <td><strong>Grado</strong></td>    
    <td><strong>Estado</strong></td>   
  </tr>
  
<?PHP
		
$query=mysqli_query($mysqli, "SELECT tipodoc, numident, depexp, munexp, fexp, fvenc, nombre, apellidos, fnac, depnac, munnac, genero, estrato, grupoEtnico, discapacidad, poblacionVulnerable, email, telfijo, telcelular, dir, nomacud, telacud, fingre, linea, subarea, facilitador, insed, grado, estado FROM aprendiz WHERE tecnoacademia = $idtecnorep");
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
	$emaill=$res["email"];
	$telfijoo=$res["telfijo"];
	$telcelularr=$res["telcelular"];
	$dirr=$res["dir"];
	$nomacudi=$res["nomacud"];
	$telacudi=$res["telacud"];
	$fingree=$res["fingre"];
	$lineaa=$res["linea"];
	$subareas=$res["subarea"];
	$facilitadorr=$res["facilitador"];
	$insedd=$res["insed"];
	$gradoo=$res["grado"];					
	$estadoo=$res["estado"];					

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
   	<td><?php echo $emaill; ?></td>
   	<td><?php echo $telfijoo; ?></td>                     
   	<td><?php echo $telcelularr; ?></td>
   	<td><?php echo $dirr; ?></td>
   	<td><?php echo $nomacudi; ?></td>                     
   	<td><?php echo $telacudi; ?></td>
   	<td><?php echo $fingree; ?></td>
   	<td><?php echo $lineaa; ?></td>
	<td><?php echo $subareas; ?></td>
    <td><?php echo $facilitadorr; ?></td>
	<td><?php echo $insedd; ?></td>
    <td><?php echo $gradoo; ?></td>
    <td><?php echo $estadoo; ?></td>

 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>