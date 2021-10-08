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
	
	
	$sql= "SELECT * FROM instituciones WHERE tecno_ie=".$fila['tipotecno']; // Se realiza consulta para seleccionar y mostrar datos segun la tecnoacademia 
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
	
<title>Tecnoacademia</title>
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
      <?php } ?>
      <li style="float:right"><a class="active" href="logout.php">Cerrar Sesi&oacute;n</a></li>
	</ul>
    
</div>
</div>
</div>

<h1 class="titulo2">Gestión de Inst. Educativas</h1>
<?php if($_SESSION['tipo_usuario']==1 || $_SESSION['tipo_usuario']==4){ ?><a id="btnsubmit" href="registroie.php">Registrar I.E.</a><?php } ?>
	
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
	
<div style="margin:10px" class="row table-responsive">
  
  <table class="display" id="mitabla">
 <thead>
	<tr>
    <th><strong>  </strong></th>   
    <th><strong>  </strong></th>
    <th><strong>Nombre</strong></th>
    <th><strong>Municipio</strong></th>
    <th><strong>Tipo</strong></th>
    <th><strong>Zona</strong></th>
	<th><strong>Contacto de la I.E.</strong></th>
	<th><strong>Cargo Contacto</strong></th>	
	<th><strong>Telefono Contacto</strong></th>
	<th><strong>Email Contacto</strong></th>
    </tr>
  <tbody>
  
  <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
  
  <tr>
	<td><?php if($_SESSION['tipo_usuario']==1 || $_SESSION['tipo_usuario']==4  ){ ?><a href="modificar_ie.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-pencil"></span></a><?php } ?></td>
	  
    <td>
		<?php if($_SESSION['tipo_usuario']==1 || $_SESSION['tipo_usuario']==4  ){ ?><a href="#" data-href="eliminar_ie.php?id=<?php echo $row['id'];?>" data-toggle="modal" data-target="#confirm-delete"><span class="glyphicon glyphicon-trash"></span></a><?php } ?></td>
	  
	<td><?php echo $row['nombre_ie'];?></td>
	<td><?php echo $row['municipio_ie'];?></td>
	<td><?php echo $row['tipo_ie'];?></td>
	<td><?php echo $row['zona_ie'];?></td>
	<td><?php echo $row['contacto_ie'];?></td>
	<td><?php echo $row['rolcontacto_ie'];?></td>
	<td><?php echo $row['telcontacto_ie'];?></td>
	<td><?php echo $row['email_ie'];?></td>
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
						<h4 class="modal-title" id="myModalLabel">Eliminar I.E.</h4>
					</div>
					
					<div class="modal-body">
						¿Desea eliminar la Inst. Educativa?
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