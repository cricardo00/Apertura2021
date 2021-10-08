<!DOCTYPE HTML>

<?php
	
	session_start();
	require '../conexion.php';
	
	if(!isset($_SESSION["id_usuario"])){ // Se valida que el usuario esté logueado.
		header("Location: index.php"); // Se redirecciona en caso de que el usuario no esté logueado. 
	}
	

	$sql = "SELECT id, id_tipo, nombre, apellidos, tipotecno FROM usuarios"; // Se realiza consulta para validar el tipo de usario
	$result=$mysqli->query($sql);
	
	$row = $result->fetch_assoc();
    if($_SESSION['tipo_usuario']==3) { // Si el usuario es tipo 3, es decir aprendiz, se redirecciona al registro.
	
	header("Location: registro.php");
	}

?>


<?php 
 
$sqlap = "Select count(*) AS total from aprendiz";
$resultap = $mysqli->query($sqlap);

$taprendices ="";

while($rowap = $resultap->fetch_assoc()) {
	 $taprendices .= "<p>Aprendices Registrados: </p> ".'<p>'.$rowap['total'].'</p>';
	
}


//$sql = "Select count(*) AS total2 from aprendiz where estado='ACTIVO'";
//$result = $mysqli->query($sql);

//while($row = $result->fetch_assoc()) {
   
//	echo $row['total2'];
	
//	}
	
		
//$sql = "Select count(*) AS total3 from aprendiz where estado='INACTIVO'";
//$result = $mysqli->query($sql);

//while($row = $result->fetch_assoc()) {
   
//	echo "<tr>"."<td>"."<h3>Aprendices Desertados: </h3> "."</td>"."<td>".'<h3 class="text1">'.$row['total3'].'</h3>'."</td>";
	
//	}		
	
	

?>



<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Estadisticas</title>

		<style type="text/css">
			#navega #menu #fijo {  
    position:fixed;  
    font-family:verdana,arial;  
    font-size:11pt;  
    text-align:center;  
    padding: 10px 5px 10px 5px;    /* margen con valores: arriba - derecha - abajo - izquierda */   
    top: 0px;                    /* Distancia hasta el borde superior */  
    left: 0px;            /* Distancia hasta el borde izquierdo */ 
    width:100%;  
    background-color: #FFFFFF;   
    z-index: 1;               /* hace que la capa sea opaca  */  
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0px;
    overflow: hidden;
    background-color: #FFFFFF;
	color: #4F8AAF;
	top:0px;
	font-family: Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
	font-weight: bold;

}

li {
    float: left;
}

li a {
    display: block;
    color: #4F8AAF;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #FFFFFF;
}

.active {
    background-color: #FFFFFF;
	text-decoration: underline;
}
li a:hover {
    background-color: #FFFFFF;
	text-decoration: underline;
}
			
.titulo{
	color: #FFF;
    text-align: center;
    width: 100%;
    margin-top: 70px;
    padding: 7px;
    font-size: 48px;
	font-family: Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
	
}			
		</style>
	</head>
	<body bgcolor="#4F8AAF">
		
<div id="navega">  
	<div id="menu">  
	<div id="fijo"> 

    	<ul>
      		<li><a ><?php echo 'Usuario: '.$_SESSION['nombre']. " " .$_SESSION['apellidos']; ?> </a></li>
      		<?php if($_SESSION['tipo_usuario']==1 || $_SESSION['tipo_usuario']==2 || $_SESSION['tipo_usuario']==4) { ?>
      		<li> </li>
			<li><a href="../welcome.php">Inicio</a> </li>
      		<?php } ?>
      		<li style="float:right"><a class="active" href="logout.php">Cerrar Sesi&oacute;n</a></li>
		</ul>

	</div>
	</div>
	</div>
	<h1 class="titulo">Estadísticas</h1>		
		
		
<script src="code/highcharts.js"></script>
<script src="code/modules/exporting.js"></script>
<script src="code/modules/export-data.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>


<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Aprendices Activos y Desertados'
		
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
				style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
					
                }
            }
        }
		
    },
	
    series: [{
        name: '',
        colorByPoint: true,
        data: [{
			
            name: '<?php echo $taprendices; ?>',
            y: 100,
             
        }, {
            name: '<?php echo $taprendices; ?>',
            y: 10
        }, ]
    }]
});
		</script>

		<br><br>
		
<div id="container2" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>


<script type="text/javascript">

Highcharts.chart('container2', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Browser market shares in January, 2018'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Chrome',
            y: 61.41,
            sliced: true,
            selected: true
        }, {
            name: 'Internet Explorer',
            y: 11.84
        }, {
            name: 'Firefox',
            y: 10.85
        }, {
            name: 'Edge',
            y: 4.67
        }, {
            name: 'Safari',
            y: 4.18
        }, {
            name: 'Sogou Explorer',
            y: 1.64
        }, {
            name: 'Opera',
            y: 1.6
        }, {
            name: 'QQ',
            y: 1.2
        }, {
            name: 'Other',
            y: 2.61
        }]
    }]
});
		</script>
		
		
		
</body>
</html>
