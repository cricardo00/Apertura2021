<?php
require 'conexionasis.php';

$sql= "SELECT * FROM usuarios";
$resultado = $mysqli->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Tecnociencia 2019 - Tecnoacademia Medellin</title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet"> 
    <script language="javascript">
        function doSearch(){
            const tableReg = document.getElementById('datos');
            const searchText = document.getElementById('searchTerm').value.toLowerCase();
            let total = 0;
            // Recorremos todas las filas con contenido de la tabla
            for (let i = 1; i < tableReg.rows.length; i++) {
                // Si el td tiene la clase "noSearch" no se busca en su contenido
                if (tableReg.rows[i].classList.contains("noSearch")) {
                    continue;
                }
                let found = false;
                const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                // Recorremos todas las celdas
                for (let j = 0; j < cellsOfRow.length && !found; j++) {
                    const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                    // Buscamos el texto en el contenido de la celda
                    if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
                        found = true;
                        total++;
                    }
                }
                if (found) {
                    tableReg.rows[i].style.display = '';
                } else {
                    // si no ha encontrado ninguna coincidencia, esconde la
                    // fila de la tabla
                    tableReg.rows[i].style.display = 'none';
                }
            }
            // mostramos las coincidencias
            const lastTR=tableReg.rows[tableReg.rows.length-1];
            const td=lastTR.querySelector("td");
            lastTR.classList.remove("hide", "red");
            if (searchText == "") {
                lastTR.classList.add("hide");
            } else if (total) {
                td.innerHTML="Se ha encontrado "+total+" coincidencias"+((total>1)?"s":"");
            } else {
                lastTR.classList.add("red");
                td.innerHTML="No se han encontrado coincidencias";
            }
        }
    </script>
    <style>
        #datos {
            border:1px solid #0b64a1;
            padding:10px;font-size:1em;
        }
        #datos tr:nth-child(even) {
            background: #90caf2;
        }
        #datos td {padding:5px;
        }
        #datos tr.noSearch {
            background:White;font-size:0.8em;
        }
        #datos tr.noSearch td {
            padding-top:10px;text-align:right;
        }
        .hide {
            display:none;
        }
        .red {
            color:Red;
        }
        body {
            font-family: 'Source Sans Pro', sans-serif;
        }
        h1{
            color:  #ea0d2f;
        }
        .azul{
            font-weight: 700;
            color: #1883ba;
        }
        .boton_tecno{
            text-decoration: none;
            padding: 10px;
            font-weight: 600;
            font-size: 20px;
            color: #ffffff;
            background-color: #1883ba;
            border-radius: 6px;
        }
        .boton_tecno:hover{
            color: #1883ba;
            background-color: #ffffff;
          }
    </style>

</head>

<body>
    <form action="registroasistenciaconf.php" method="post">
    <center><img src="images/tecnociencia.jpg" alt="Tecnociencia 2019" width="880" height="300"></center>
    <center><h1>GESTION DE ASISTENCIA - TECNOCIENCIA 2019 - Tecnoacademia Medellin</h1></center>
    <br>
    <center>
        <label class="azul">Datos de Busqueda</label>
        <br><br>
        <label class="azul">Usuario a buscar:</label><input id="searchTerm" type="text" onkeyup="doSearch()"/>
        <br><br>
        <input type="submit" name="Registrar Asistencia" value="Registrar Asistencia" class="boton_tecno">
        &nbsp; &nbsp; &nbsp; &nbsp; 
        <input type="reset" name="Limpiar" value="Limpiar" class="boton_tecno" onclick="javascript:location.reload()">
    <p>
        <table id="datos">
            <tr>
                <th colspan="2"><strong>SEL</strong></th>
                <th><strong>TIPO ID</strong></th>
                <th><strong>IDENTIFICACION</strong></th>
                <th><strong>NOMBRES</strong></th>
                <th><strong>APELLIDOS</strong></th>
                <th><strong>I.E.</strong></th>
            </tr>
            <tr>
                <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                <td><input type="radio" name="gender" id="gender" value="<?php echo $row['numdoc'];?>" required><td>
                <td><?php echo $row['tipodoc'];?></td>
                <td><?php echo $row['numdoc'];?></td>
                <td><?php echo $row['nombres'];?></td>
                <td><?php echo $row['apellidos'];?></td>
                <td><?php echo $row['ieusuario'];?></td>
            </tr>
            <?php } ?>
            <tr class='noSearch hide'>
                <td colspan="5"></td>
            </tr>
        </table>
        </center>
        </form>
    </p>
</body>
</html>