<?php
    //incluir conexión a la base de datos
    session_start();
    include "../../config/conexionBD.php";
    $cedula = $_GET['cedula'];
    $codigo = 0;
    $sql = "SELECT u.usu_codigo, u.usu_cedula, u.usu_nombres, u.usu_direccion, u.usu_telefono FROM usuario u WHERE u.usu_cedula LIKE '%$cedula%';";
    
    //cambiar la consulta para puede buscar por ocurrencias de letras
    $result = $conn->query($sql);
    echo " <table>
            <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>direccion</th>
            <th>Telefono</th>
            </tr>";
            
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            $codigo =  $row['usu_codigo'];
            echo " <td>" . $row['usu_cedula'] . "</td>";
            echo " <td>" . $row['usu_nombres'] . "</td>";
            echo " <td>" . $row['usu_direccion'] ."</td>";
            echo " <td>" . $row['usu_telefono'] . "</td>";
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