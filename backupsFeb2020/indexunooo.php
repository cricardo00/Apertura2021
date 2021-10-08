
<?php
	require('conexion.php');
	
	session_start();
	
		
	if(isset($_SESSION["id_usuario"])){
		header("Location: welcome.php");
	}
	
	if(!empty($_POST))
	{
		$usuario = mysqli_real_escape_string($mysqli,$_POST['usuario']);
		$password = mysqli_real_escape_string($mysqli,$_POST['password']);
		$error = '';
		
		$sha1_pass = sha1($password);
		
		$sql = "SELECT id, id_tipo, nombre, apellidos, tipotecno FROM usuarios WHERE usuario = '$usuario' AND password = '$sha1_pass'";
		$result=$mysqli->query($sql);
		$rows = $result->num_rows;
		
		
		
		if($rows > 0) {
			$row = $result->fetch_assoc();
			$_SESSION['nombre']= $row['nombre'];
			$_SESSION['apellidos']= $row['apellidos'];
			$_SESSION["id_usuario"] = $row["id_tipo"];
			$_SESSION['tipo_usuario'] = $row['id_tipo'];
			$_SESSION['usuario'] = $row['id'];
			$_SESSION['tipo_tecno'] = $row['tipotecno'];
			
			if($_SESSION['tipo_usuario']==3) {
			header("Location: registro.php");
			}
			if($_SESSION['tipo_usuario']==5){
				header("Location: reportesdg.php");
			}
			else{
			header("location: welcome.php");}
			}
		else {				
			$error = 'Usuario o Clave incorrecta.' ;
		}
	}
?>


<html>
	<head meta charset="utf-8">
	<title>Tecnoacademia</title>
   <link href="css/Style.css" rel="stylesheet" type="text/css">
   <meta name="viewport" content="width=device-width, initial-scale=1">
		
    
	</head>
	
	<body>
    <h1 class="titulo3">Tecnoacademia</h1>
	   
	<div class="contenedor">
      <p>Inicio de Sesi&oacute;n</p>
    <hr>

		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" > 
			<div><label>Usuario:</label><br /><input id="usuario" name="usuario" type="text" ></div>
			<br />
			<div><label>Contrase&ntilde;a:</label><input id="password" name="password" type="password"></div>
			<br />
			<img  class="logo" src="images/logo_tecno.png">
			<input name="login"  type="submit" value="Entrar">
            
		</form>
		<div style = "font-size:16px; color:#cc0000;"><?php echo isset($error) ? utf8_decode($error) : '' ; ?></div>
		</div>
			
</body>
</html>		