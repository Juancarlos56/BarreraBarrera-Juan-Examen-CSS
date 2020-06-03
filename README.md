# BarreraBarrera-Juan-Examen
## Examen Interciclo 
##### Desarrollado por: Juan Carlos Barrera Barrera
##### Materia: Hipermedial

Explicacion de lo que hice 
Agregacion de pantallasas de la base de datos, selects, inserts, ajax  


#### El diagrama E-R de la solución propuesta.

![](https://github.com/Juancarlos56/BarreraBarrera-Juan-Examen/blob/master/examen/informe/estructura.PNG)

#### Explicacion de lo que se hizo
- La base de datos se creó se le coloco el nombre de "examen", que contiene a las tuplas "usuarios", “vehiculos” y “ticket”. La tabla vehiculos tiene la llave foranea de los usuarios, mientras que la tabla ticket tiene la llave foranea de los vehiculos 
- Ademas se creo insert desde php para la insercion de vehiculos y ticket 
- La insercion de usuarios se lo realizo desde la mimsma base de datos 
###### Se creo dos paginas HTML: 
- La pagina listarTickets.html se encuntra una tabla con la lista de los usuarios, vehiculos, tickets   
- La pagian nuevoTicket.html se encuntra el formulario para llenar la informacion de los vehiculos y de los tickets atraves de la cedula del usuario, esta pagina cuenta con js para validacion de campos y ademas ajax para obtener la informacion de dicho usuario pasando como parametro la cedula

#### Agregacion de pantallasas de la base de datos, selects, inserts, ajax y funcionamiento de la pagina 

##### Pantallasos de la base de Datos
- Pantallaso del insert en la tabla de los usuarios
![](https://github.com/Juancarlos56/BarreraBarrera-Juan-Examen/blob/master/examen/informe/baseExamen.PNG)
##### Pantallasos de los Selects

- crearTickets.php 
```sh
    $sql = "SELECT v.ve_codigo FROM vehiculo v WHERE ('$codigo' = v.usu_codigo);";
    $result = $conn->query($sql);
```
- Select para listar Tickets con toda la informacion 
```sh
   $sql = "SELECT u.usu_cedula, u.usu_nombres, u.usu_direccion, u.usu_telefono, v.ve_placa, v.ve_marca, v.ve_modelo, t.tic_numero, t.  tic_fechaIngreso, t.tic_fechaSalida 
            FROM usuario u, vehiculo v, ticket t 
            WHERE (u.usu_cedula LIKE '%$cedula%') AND ((u.usu_codigo = v.usu_codigo) AND (v.ve_codigo = t.ve_codigo))";
```
- Select para buscar usuarios por cedula para el registro del ticket 
```sh
-  $sql = "SELECT u.usu_codigo, u.usu_cedula, u.usu_nombres, u.usu_direccion, u.usu_telefono FROM usuario u WHERE u.usu_cedula LIKE '%$cedula%';";
```
##### Pantallasos de los inserts
-  crearTickets.php 
```sh
    $sqlVeh = "INSERT INTO vehiculo VALUES (0, '$placa', '$marca', '$modelo','$codigo')";
    $sql3 = "INSERT INTO ticket VALUES (0, '$numTicket', '$fechaIngreso',
```
##### Pantallasos de ajax
```sh
function buscarPorCedula() {
    var cedula = document.getElementById("cedula").value;
    if (cedula == "") {
        document.getElementById("informacion").innerHTML = "";
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //alert("llegue");
                document.getElementById("informacion").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../../controladores/listarTelefonosCedula.php?cedula=" + cedula, true);
        xmlhttp.send();
    }
    return false;
}
```

##### Pantallasos del funcionamiento de la pagina
- Base de datos 
![](https://github.com/Juancarlos56/BarreraBarrera-Juan-Examen/blob/master/examen/informe/baseExamen.PNG)

- Interfaz para crar un ticket 
![](https://github.com/Juancarlos56/BarreraBarrera-Juan-Examen/blob/master/examen/informe/crearUsuarioInterfaz.PNG)

- Guardar ticket ingresado
![](https://github.com/Juancarlos56/BarreraBarrera-Juan-Examen/blob/master/examen/informe/crearUsuarioInterfaz.PNG)

- Guardar vehiculos ingresado
![](https://github.com/Juancarlos56/BarreraBarrera-Juan-Examen/blob/master/examen/informe/insertUsuarios.PNG)

- Insercion de datos en ticket 
![](https://github.com/Juancarlos56/BarreraBarrera-Juan-Examen/blob/master/examen/informe/guardadoDatoInsert.PNG)

- Insercion de datos en vehiculo 
![](https://github.com/Juancarlos56/BarreraBarrera-Juan-Examen/blob/master/examen/informe/gurardadoDatosInsertVeh.PNG)

- Lista de los usuarios, vehiculos, tickets 
![](https://github.com/Juancarlos56/BarreraBarrera-Juan-Examen/blob/master/examen/informe/listarUusario.PNG)


#### En el informe se debe incluir la información de GitHub (usuario y URL del repositorio de la práctica)
    USUARIO: Juancarlos
    URL: https://github.com/Juancarlos56/BarreraBarrera-Juan-Examen

Nombre de estudiante: ________Juan Barrera_____________________
