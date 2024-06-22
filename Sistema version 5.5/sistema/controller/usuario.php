<?php

error_reporting(0);
session_start();
// inicia la session_star para poder verificar si estan logueados o no
//incluyo todos los modelos llamados en el index.php
include '../model/index.php';

//si hay una session $_SESSION['usuario'] me mantengo en la pagina y si no hay una session redirecciono al login
if ($_SESSION['usuario'] == '') {
    header("Location: index.php");
}

if ($_SESSION['tipo'] != 'admin') {
    
  header('Location: index.php');  
}


//creo una variable del model/Artista
$registrar = new Usuarios();


//Defino la variable 'editar' la cual me indica si estoy editando o registarndo en la pantalla
//en caso de decir 'no' el formulario actua como si estuviera registrando a un artista nuevo
//en caso de decir 'si' el formulario actua como si estuviera modificando a un artista
$editar = 'no';

//valido si estoy recibiendo por URL GET el id del artista
// si lo recibo sgnifica que editar el artista
if (isset($_GET['id'])) {
    //asigno el id a una variable
    $id = $_GET['id'];
    //consulto los datos de ese artista
    $consulta = $registrar->detalle($id);
    //convierto en array el resultado obtenido
    $consulta = mysql_fetch_array($consulta);
    //indico que editar esta en si para poder editar
    $editar = 'si';

    //el resultado obtenido en la consulta se lo 
    //asigno a las variables que indican los valores en las vistas
    $tipo_cedula = $consulta['tipo_cedula'];
    $num_cedula = $consulta['num_cedula'];
    $nombre = $consulta['nombre'];
    $apellido = $consulta['apellido'];
    $usuario = $consulta['usuario'];
    $email = $consulta['email'];
    $telefono = $consulta['telefono'];
    $estatus = $consulta['estatus'];
}

//si se envia el formulario presionando el boton enviar
//se recibiran los campos del formulario por Post
if (isset($_POST['guardar'])) {

    //Asigno los valores a las variables
    //function strtolower para colocar todo en minuscula
    $tipo_cedula = $_POST['tipo_cedula'];
    $num_cedula = $_POST['num_cedula'];
    $nombre = strtolower($_POST['nombre']);
    $apellido = strtolower($_POST['apellido']);
    $email = strtolower($_POST['email']);
    $usuario1 = $_POST['usuario'];
    $telefono = $_POST['telefono'];
    $estatus = $_POST['estatus'];
    $clave = md5($_POST['clave']);



    /* consulto el usuario */


    $repite_cedula = $registrar->validocedula($tipo_cedula, $num_cedula);

    $repite_usuario = $registrar->validousuario($usuario1);



    if (count(@$repite_cedula['usuario']) == 0) {

        if (count(@$repite_usuario['usuario']) == 0) {

            if ($editar == 'si') {

                $editar_usuario = $registrar->editar($tp_cedula, $num_cedula, $nombre, $apellido, $direccion, $estado, $telefono, $correo, $num_obras, $estatus, $id);

                //si se guardo correctamente se redirecciona a la consulta principal
                if ($editar_usuario) {

                    header("Location: mensaje.php?msj=editarusuario");
                }
            } else {
                //en el caso de que sea 'no' el valor de la varable editar se registrara un nuevo artista

                $registrar_usuario = $registrar->registro($tipo_cedula, $num_cedula, $nombre, $apellido, $usuario1, @$clave, $telefono, $email, $estatus);

                if ($registrar_usuario) {

                    //si se guardo correctamente se redirecciona a la consulta principal
                    header("Location: mensaje.php?msj=nuevousuario");
                }
            }
        } else {
            $error_usuario = "El usuario ya Existe";
        }
    } else {
        $error_cedula = "Cedula ya Existe";
    }
}


//creo una clase model/EstadosArtista
$estatu = new ListaEstatusArtistas();
//Consulto el listado de estatus de artistas
$listado_estatus = $estatu->listar_estatus();

//se indica que vista se mostrara en la pantalla
$ruta = '../views/usuario/registrar.php';

//se incluye la plantilla
include '../web/layout/index.php';
?>