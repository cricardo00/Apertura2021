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
$tecousu = $_SESSION['tipo_tecno'];
$taprendices ="";

// Total Aprendices
$sqlap = "SELECT count(*) AS total FROM aprendiz WHERE tecnoacademia = $tecousu";
$resultap = $mysqli->query($sqlap);

while($rowap = $resultap->fetch_assoc()) {
	 $taprendices .= $rowap['total'];
}

// ***************  Estado de los Aprendices en la Plataforma ************** //
$taprendicesact = "";
$taprendicesinact = "";
// Total Aprendices Activos
$sqlap = "SELECT count(*) AS activos FROM aprendiz WHERE tecnoacademia = $tecousu AND estado = 'ACTIVO'";
$resultap = $mysqli->query($sqlap);

while($rowap = $resultap->fetch_assoc()) {
	 $taprendicesact .= $rowap['activos'];
}

// Total Aprendices Inactivos
$sqlap = "SELECT count(*) AS inactivos FROM aprendiz WHERE tecnoacademia = $tecousu AND estado = 'INACTIVO'";
$resultap = $mysqli->query($sqlap);

while($rowap = $resultap->fetch_assoc()) {
	 $taprendicesinact .= $rowap['inactivos'];
}

$activos = ($taprendicesact/$taprendices)*100;
$inactivos = ($taprendicesinact/$taprendices)*100;

// ***************  Aprendices en la Plataforma por Genero ************** //
$taprendicesmasc = "";
$taprendicesfem = "";
// Total Aprendices Masculinos
$sqlap = "SELECT count(*) AS masculinos FROM aprendiz WHERE tecnoacademia = $tecousu AND genero = 'MASCULINO'";
$resultap = $mysqli->query($sqlap);

while($rowap = $resultap->fetch_assoc()) {
	 $taprendicesmasc .= $rowap['masculinos'];
}

// Total Aprendices Inactivos
$sqlap = "SELECT count(*) AS femeninos FROM aprendiz WHERE tecnoacademia = $tecousu AND genero = 'FEMENINO'";
$resultap = $mysqli->query($sqlap);

while($rowap = $resultap->fetch_assoc()) {
	 $taprendicesfem .= $rowap['femeninos'];
}

$masculinos = ($taprendicesmasc/$taprendices)*100;
$femeninos = ($taprendicesfem/$taprendices)*100;

// ***************  Aprendices por Linea Tecnoacademia ************** //
$taprendicesING = "";
$taprendicesTICS = "";
$taprendicesNANO = "";
$taprendicesBIO = "";
$taprendicesCB = "";

// Total Aprendices INGENIERIA
$sqlap = "SELECT count(*) AS ING FROM aprendiz WHERE tecnoacademia = $tecousu AND linea = 'INGENIERIA'";
$resultap = $mysqli->query($sqlap);

while($rowap = $resultap->fetch_assoc()) {
	 $taprendicesING .= $rowap['ING'];
}

// Total Aprendices TICS
$sqlap = "SELECT count(*) AS TICS FROM aprendiz WHERE tecnoacademia = $tecousu AND linea = 'TICS'";
$resultap = $mysqli->query($sqlap);

while($rowap = $resultap->fetch_assoc()) {
	 $taprendicesTICS .= $rowap['TICS'];
}

// Total Aprendices NANO
$sqlap = "SELECT count(*) AS NANO FROM aprendiz WHERE tecnoacademia = $tecousu AND linea = 'NANOTECNOLOGIA'";
$resultap = $mysqli->query($sqlap);

while($rowap = $resultap->fetch_assoc()) {
	 $taprendicesNANO .= $rowap['NANO'];
}

// Total Aprendices BIO
$sqlap = "SELECT count(*) AS BIO FROM aprendiz WHERE tecnoacademia = $tecousu AND linea = 'BIOTECNOLOGIA'";
$resultap = $mysqli->query($sqlap);

while($rowap = $resultap->fetch_assoc()) {
	 $taprendicesBIO .= $rowap['BIO'];
}

// Total Aprendices Ciencias Basicas
$sqlap = "SELECT count(*) AS CB FROM aprendiz WHERE tecnoacademia = $tecousu AND linea = 'CIENCIAS BASICAS'";
$resultap = $mysqli->query($sqlap);

while($rowap = $resultap->fetch_assoc()) {
	 $taprendicesCB .= $rowap['CB'];
}

$ING = ($taprendicesING/$taprendices)*100;
$TICS = ($taprendicesTICS/$taprendices)*100;
$NANO = ($taprendicesNANO/$taprendices)*100;
$BIO = ($taprendicesBIO/$taprendices)*100;
$CB = ($taprendicesCB/$taprendices)*100;

?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Estadisticas</title>
		<link href="estilograficas.css" rel="stylesheet" type="text/css">
	</head>
	<body bgcolor="#4F8AAF">
	<div id="navega">  
	<div id="menu">  
	<div id="fijo"> 

		<ul>
		  <li><a ><?php echo 'Usuario: '.$_SESSION['nombre']. " " .$_SESSION['apellidos']; ?> </a></li>
		  <?php if($_SESSION['tipo_usuario']==1 || $_SESSION['tipo_usuario']==2 || $_SESSION['tipo_usuario']==4) { ?>
		  <li> </li>
		  <li><a>|</a> </li>
		  <li><a href="../welcome.php">Inicio</a> </li>
		  <li><a>|</a></li>
		  <?php } ?>
		  <li style="float:right"><a class="active" href="../logout.php">Cerrar Sesi&oacute;n</a></li>
		</ul>

	</div>
	</div>
	</div>
		<h1 class="titulo">Estadísticas Tecnoacademia</h1>
		
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="code/highcharts.js"></script>
		<script src="code/modules/exporting.js"></script>
		<script src="code/modules/export-data.js"></script>
		
<!-- {Grafica de Total de Aprendices } -->
<div id="containerTA" style="min-width: 310px; height: 400px; max-width: 700px; margin: 0 auto">
<script type="text/javascript">	
Highcharts.chart('containerTA', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Total Aprendices Tecnoacademia 2019'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                //enabled: false,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            },
			showInLegend: true
        }
    },
    series: [{
        name: 'Totales',
        colorByPoint: true,
        data: [{
            name: 'Aprendices Activos <?php echo $taprendicesact; ?>',
            y: <?php echo $activos; ?>,
            sliced: true,
            selected: true,
        }, {
            name: 'Aprendices Inactivos <?php echo $taprendicesinact; ?>',
            y: <?php echo $inactivos; ?>
        }]
    }]
});
</script>
</div>
<br><br><br>

<!-- {Grafica de Aprendices por Genero } -->
<div id="containerAxG" style="min-width: 310px; height: 400px; max-width: 700px; margin: 0 auto">
<script type="text/javascript">
Highcharts.chart('containerAxG', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Total Aprendices Tecnoacademia por Genero 2019'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                //enabled: false,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            },
			showInLegend: true
        }
    },
    series: [{
        name: 'Totales',
        colorByPoint: true,
        data: [{
            name: 'Masculinos <?php echo $taprendicesmasc; ?>',
            y: <?php echo $masculinos; ?>,
            sliced: true,
            selected: true,
        }, {
            name: 'Femeninos <?php echo $taprendicesfem; ?>',
            y: <?php echo $femeninos; ?>
        }]
    }]
});
</script>
</div>

<br><br><br>

<!-- {Grafica de Aprendices por lINEA TA } -->
<div id="containerAxLTA" style="min-width: 310px; height: 400px; max-width: 700px; margin: 0 auto">
<script type="text/javascript">
Highcharts.chart('containerAxLTA', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Total Aprendices Tecnoacademia por Linea 2019'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                //enabled: false,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            },
			showInLegend: true
        }
    },
    series: [{
        name: 'Totales',
        colorByPoint: true,
        data: [{
            name: 'Ingenieria <?php echo $taprendicesING; ?>',
            y: <?php echo $ING; ?>,
            sliced: true,
            selected: true,
        }, {
            name: 'TIC´s <?php echo $taprendicesTICS; ?>',
            y: <?php echo $TICS; ?>
        }, {
            name: 'Nanotecnologia <?php echo $taprendicesNANO; ?>',
            y: <?php echo $NANO; ?>
        }, {
            name: 'Biotecnologia <?php echo $taprendicesBIO; ?>',
            y: <?php echo $BIO; ?>
        }, {
            name: 'Ciencias Basicas <?php echo $taprendicesCB; ?>',
            y: <?php echo $CB; ?>
        }]
    }]
});
</script>
</div>
</body>
</html>
