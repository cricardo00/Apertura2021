<?php

	session_start();
	require 'conexion2019.php';
	
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

	$mysqli=new mysqli("127.0.0.1","tecnoaca_aperezn","apereznTAM","tecnoaca_tecnonacional2019");

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
    <td colspan="30" bgcolor="#25BABA"><CENTER>
      <strong>Aprendices Tecnoacademia 2019</strong>
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
	<td><strong>Tecnoacademia</strong></td>  
  </tr>
  
<?PHP
	
//$query=mysqli_query($mysqli, "SELECT * FROM aprendiz");
$query=mysqli_query($mysqli, "SELECT aprendiz.tipodoc, aprendiz.numident, aprendiz.depexp, aprendiz.munexp, aprendiz.fexp, aprendiz.fvenc, aprendiz.nombre, aprendiz.apellidos, aprendiz.fnac, aprendiz.depnac, aprendiz.munnac, aprendiz.genero, aprendiz.estrato, aprendiz.grupoEtnico, aprendiz.discapacidad, aprendiz.poblacionVulnerable, aprendiz.email, aprendiz.telfijo, aprendiz.telcelular, aprendiz.dir, aprendiz.nomacud, aprendiz.telacud, aprendiz.fingre, aprendiz.linea, aprendiz.subarea, aprendiz.facilitador, aprendiz.insed, aprendiz.grado, aprendiz.estado, tecnoacademia.nombretecno FROM aprendiz INNER JOIN tecnoacademia ON aprendiz.tecnoacademia=tecnoacademia.idtecnoacademia");

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
	$tecnorepdg=$res["nombretecno"];	

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
	<td><?php echo $tecnorepdg; ?></td>
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>