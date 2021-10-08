<?php

	session_start();
	require 'conexion.php';
	
	if(!isset($_SESSION["id_usuario"])){ // Se valida que el usuario esté logueado.
		header("Location: index.php"); // Se redirecciona en caso de que el usuario no esté logueado. 
	}
	
	$sql = "SELECT id, id_tipo, nombre, apellidos, tipotecno FROM usuarios WHERE tipotecno=".$_SESSION['tipo_tecno']; // Se realiza consulta para validar el tipo de usario
	$result=$mysqli->query($sql);
	$fila = $result->fetch_assoc();
	$row = $result->fetch_assoc();
    
	if($_SESSION['tipo_usuario']==3) { // Si el usuario es tipo 3, es decir aprendiz, se redirecciona al registro.
	
	header("Location: registro.php");
	}
	
	$idtecnoselect = $_SESSION['tipo_tecno'];

	$sql= "SELECT * FROM aprendiz WHERE tecnoacademia = $idtecnoselect";
	$resultado = $mysqli->query($sql);
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link href="css/Style.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
<script>
			$(document).ready(function(){
				$('#mitabla').DataTable({
					"order": [[1, "asc"]],
					"language":{
					"lengthMenu": "Mostrar _MENU_ registros por pagina",
					"info": "Mostrando pagina _PAGE_ de _PAGES_",
						"infoEmpty": "No hay registros disponibles",
						"infoFiltered": "(filtrada de _MAX_ registros)",
						"loadingRecords": "Cargando...",
						"processing":     "Procesando...",
						"search": "Buscar:",
						"zeroRecords":    "No se encontraron registros",
						"paginate": {
							"next":       "Siguiente",
							"previous":   "Anterior"
						},					
					},
					
				});	
			});
			
		</script>
<title>Tecnoacademia Medellin</title>


</head>

<body>
<div id="navega">  
<div id="menu">  
<div id="fijo"> 
    
    <ul>
      <li><a ><?php echo 'Usuario: '.$_SESSION['nombre']. " " .$_SESSION['apellidos']; ?> </a></li>
      <?php if($_SESSION['tipo_usuario']==1 || $_SESSION['tipo_usuario']==4 || $_SESSION['tipo_usuario']==2) { ?>
      <li> </li>
      <li><a>|</a> </li>
      <li><a href="welcome.php">Inicio</a> </li>
      <li><a>|</a></li>
      <?php } ?>
      <li style="float:right"><a class="active" href="logout.php">Cerrar Sesi&oacute;n</a></li>
	</ul>
    
</div>
</div>
</div>

<p>&nbsp;</p>
<h1 class="titulo">Gestión de Aprendices</h1>
<?php if($_SESSION['tipo_usuario']==1 || $_SESSION['tipo_usuario']==4 || $_SESSION['tipo_usuario']==2){ ?><a id="btnsubmit" href="registro.php">Registrar aprendiz</a><?php } ?>
<div style="margin:10px" class="row table-responsive">
  
  <table class="display" id="mitabla">
 <thead>
	<tr>
    <th><strong>  </strong></th>   
    <th><strong>  </strong></th>
    <th><strong>Tipo_doc</strong></th>
    <th><strong>Num_identificacion</strong></th>
	<th><strong>Nombre</strong></th>
    <th><strong>Apellidos</strong></th>
	<th><strong>Fecha_nac</strong></th>
    <th><strong>Fecha_exp</strong></th>  
    <th><strong>Fecha_venc</strong></th>
    <th><strong>Email</strong></th>        
    <th><strong>Tel_fijo</strong></th>
    <th><strong>Tel_celular</strong></th> 
    <th><strong>Direccion</strong></th>  
    <th><strong>Nombre_acud</strong></th>    
    <th><strong>Telefono_acud</strong></th>
    <th><strong>Linea_formacion</strong></th>
	<th><strong>Sub_Area</strong></th>	
	<th><strong>Facilitador</strong></th>        
    <th><strong>Institucion_Educativa</strong></th>           
    <th><strong>Grado</strong></th>    
    <th><strong>Estado</strong></th> 
  </tr>
  <tbody>
  
  <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
  
  <tr>
<td><a href="modificar_aprendiz.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
  
  
    <td><?php if($_SESSION['tipo_usuario']==1 || $_SESSION['tipo_usuario']==4){ ?><a href="#" data-href="eliminar_aprendiz.php?id=<?php echo $row['id'];?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a><?php } ?></td>
	<td><?php echo $row['tipodoc'];?></td>
	<td><?php echo $row['numident'];?></td>
	<td><?php echo $row['nombre'];?></td>
	<td><?php echo $row['apellidos'];?></td>
	<td><?php echo $row['fnac'];?></td>	
	<td><?php echo $row['fexp']; ?></td>
    <td><?php echo $row['fvenc']; ?></td> 
	<td><?php echo $row['email'];?></td>
	<td><?php echo $row['telfijo'];?></td>
	<td><?php echo $row['telcelular'];?></td>
	<td><?php echo $row['dir'];?></td>
	<td><?php echo $row['nomacud'];?></td>
	<td><?php echo $row['telacud'];?></td>
	<td><?php echo $row['linea'];?></td>
	<td><?php echo $row['subarea'];?></td>  
	<td><?php echo $row['facilitador'];?></td>
	<td><?php echo $row['insed'];?></td>
	<td><?php echo $row['grado'];?></td>	
    <td><?php echo $row['estado'];?></td>	
   </tr> 
 <?php } ?>
  </tbody>
</table>
</div>
<!-- Modal -->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Aprendiz</h4>
					</div>
					
					<div class="modal-body">
						¿Desea eliminar el aprendiz?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-danger btn-ok">Eliminar</a>
					</div>
				</div>
			</div>
		</div>
		
		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>	
</body>
</html>