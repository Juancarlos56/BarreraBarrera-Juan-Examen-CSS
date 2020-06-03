
//Validacion que todos los campos tengan algun atributo 

function validarCamposObligatorios() {
    var bandera = true;
    //obtenemos todos los formularios de la pagina y tomamos 
    //cada elemento del formulario
    for(var i = 0; i < document.forms[0].elements.length; i++){
        var elemento = document.forms[0].elements[i];
        
        if(elemento.value == '' && elemento.type == 'text'){
            
            switch (elemento.id) {
            case 'cedula':
                //si falta la cedula se desplega esto
                document.getElementById('mensajeCedula').innerHTML = 'La cedula esta vacia';
                break;
               
            case 'placa': 
                //si falta la Apellidos se desplega esto
                document.getElementById('mensajeNombres').innerHTML = ' El campo placa  esta vacio';
                break;
            case 'marca': 
                //si falta la direccion se desplega esto
                document.getElementById('mensajeApellidos').innerHTML = 'El campo marca esta vacio';
                break;
            case 'direccion': 
                //si falta el telefono se desplega esto
                document.getElementById('mensajeDireccion').innerHTML = 'El campo direccion esta vacio';
                break;
            case 'numTicket': 
                //si falta el telefono se desplega esto
                document.getElementById('mensajeApellidos').innerHTML = 'El campo numero de ticket esta vacia';
                break;  
            case 'fechaIngreso': 
                //si falta el telefono se desplega esto
                document.getElementById('mensajeCorreo').innerHTML = 'El campo fecha de Ingresoesta vacio';
                break; 
            case 'fechaSalida': 
                //si falta el telefono se desplega esto
                document.getElementById('mensajePW').innerHTML = 'El campo fecha de Salida esta vacio';
                
                break;     
                
            default:
                console.log('default');
            }
            
            elemento.style.border = '1px red solid';
            elemento.className = 'error';
            bandera = false;
        }
    }

    if(!bandera){
        alert('Error: revisar los comentarios');
        return false;
    }else{
        return true;
    }
    
}

function validarNumeros(elemento) {
    var miAscii = '';
    var letrasVal = '';
    var numVal = '';
    var valorCadena = "";

    elemento.value = elemento.value.trim();
    valorCadena = elemento.value.trim() + " ";

    if(elemento.value.length > 0){
        for (var i = 0; i < elemento.value.length; i++) {
            miAscii = elemento.value.charCodeAt(i);
            if(miAscii >= 48 && miAscii <= 57){
               
            }else {
                numVal = valorCadena.substring(0, i) + valorCadena.substring(i+1, elemento.value.length);
                elemento.value = numVal; 
            }
        }
    }else{
        return true;
    }
}

