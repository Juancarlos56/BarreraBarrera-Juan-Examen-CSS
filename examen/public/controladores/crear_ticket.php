<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
    <style type="text/css" rel="stylesheet" >
        .error{
        color: red;
    }
    </style>
</head>
<body>
    
<?php
        session_start();
        //incluir conexión a la base de datos
        include "../../config/conexionBD.php";
        

        $codigo = $_SESSION['codigoCliente'];
        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
        $placa = isset($_POST["placa"]) ? mb_strtoupper(trim($_POST["placa"]), 'UTF-8') : null;
        $marca = isset($_POST["marca"]) ? mb_strtoupper(trim($_POST["marca"]), 'UTF-8') : null;
        $modelo = isset($_POST["modelo"]) ? mb_strtoupper(trim($_POST["modelo"]), 'UTF-8') : null;
        $numTicket = isset($_POST["numTicket"]) ? trim($_POST["numTicket"]): null;
        date_default_timezone_set("America/Guayaquil");
        $fechaIngreso = date('Y-m-d H:i:s', time());

        $fechaSalida = isset($_POST["fechaSalida"]) ? trim( $_POST["fechaSalida"] ): null;
        
        $cargaDatos = FALSE;

        $sqlVeh = "INSERT INTO vehiculo VALUES (0, '$placa', '$marca', '$modelo','$codigo')";
        $codigoVeh = 0;
        
        
        if ($conn->query($sqlVeh) === TRUE) {
            
            $sql = "SELECT v.ve_codigo FROM vehiculo v WHERE ('$codigo' = v.usu_codigo);";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $codigoVeh = $row['ve_codigo'];
                }
                $sql3 = "INSERT INTO ticket VALUES (0, '$numTicket', '$fechaIngreso', '$fechaSalida','$codigoVeh')";
                if ($conn->query($sql3) === TRUE) {
                    header("Location: ../vista/paginasHTML/listarTickets.html");
                }
            }  else{
                echo "no entro para registro de ticket";
            }  

        } else {

            if($conn->errno == 1062){
                echo '<p>La persona con la cedula '.$cedula.'ya esta registrada en el sistema</p>';
                
            }else{
                echo '<p>Error en la Base de Datos</p>';
            }
        }
    
        //cerrar la base de datos
        $conn->close();
        echo "<a href='../vista/paginasHTML/nuevoTicket.html'>Regresar</a>";
    
    ?>
</body>
 </html>