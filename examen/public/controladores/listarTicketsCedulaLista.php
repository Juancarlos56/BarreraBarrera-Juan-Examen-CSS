<?php
    //incluir conexión a la base de datos
    session_start();
    include "../../config/conexionBD.php";
    $cedula = $_GET['cedula'];
    $sql = "SELECT u.usu_cedula, u.usu_nombres, u.usu_direccion, u.usu_telefono, v.ve_placa, v.ve_marca, v.ve_modelo, t.tic_numero, t.  tic_fechaIngreso, t.tic_fechaSalida 
            FROM usuario u, vehiculo v, ticket t 
            WHERE (u.usu_cedula LIKE '%$cedula%') AND ((u.usu_codigo = v.usu_codigo) AND (v.ve_codigo = t.ve_codigo))";
    
    //cambiar la consulta para puede buscar por ocurrencias de letras
    $result = $conn->query($sql);
    echo " <table style='width:100%'>
            <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>direccion</th>
            <th>Telefono</th>
            <th>Placa</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Numero de Ticket</th>
            <th>Fecha de Ingreso</th>
            <th>Fecha de Salida</th>

            </tr>";
            
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            $codigo =  $row['usu_codigo'];
            echo " <td>" . $row['usu_cedula'] . "</td>";
            echo " <td>" . $row['usu_nombres'] . "</td>";
            echo " <td>" . $row['usu_direccion'] ."</td>";
            echo " <td>" . $row['usu_telefono'] . "</td>";
            echo " <td>" . $row['ve_placa'] . "</td>";
            echo " <td>" . $row['ve_marca'] . "</td>";
            echo " <td>" . $row['ve_modelo'] . "</td>";
            echo " <td>" . $row['tic_numero'] . "</td>";
            echo " <td>" . $row['tic_fechaIngreso'] . "</td>";
            echo " <td>" . $row['tic_fechaSalida'] . "</td>";
            echo "</tr>";
        }
        
    } else {
        echo "<tr>";
        echo " <td colspan='4'> No existen usuarios registrados en el sistema con esa informacion</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<input type='hidden' id='codigo' name='codigo' value='".$codigo. "'>";
    $_SESSION['codigoCliente'] = $codigo;

    $conn->close();
?>