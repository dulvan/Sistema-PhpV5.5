<?php

error_reporting(0);
session_start();
// inicia la session_star para poder verificar si estan logueados o no
//incluyo todos los modelos llamados en el index.php
include '../model/index.php';

$editar = 'no';
//si hay una session $_SESSION['usuario'] me mantengo en la pagina y si no hay una session redirecciono al login
if ($_SESSION['usuario'] == '') {
    header("Location: index.php");
}
$class_eventos = new Eventos();

if (isset($_GET['id'])) {
    //asigno el id a una variable
    $id = $_GET['id'];
    //consulto los datos de ese artista
    $consulta = $class_eventos->detalle_evento($id);
    //convierto en array el resultado obtenido
    $consulta = mysql_fetch_array($consulta);
    //indico que editar esta en si para poder editar
    $editar = 'si';

    $nombre = $consulta['nombre'];
    $descripcion = $consulta['descripcion'];
    $lugar = $consulta['lugar'];
    $estado = $consulta['estado'];
    $usuario_encargado = $consulta['usuario_encargado'];
    $fecha_evento_inicio = $consulta['fecha_evento_inicio'];
    $fecha_evento_fin = $consulta['fecha_evento_fin'];
    $hora_inicio = $consulta['hora_inicio'];
    $hora_fin = $consulta['hora_fin'];
    $estatus = $consulta['estatus'];
}

$class_estados = new Estados();
$lista_estados = $class_estados->listado();


$class_usuarios = new Usuarios();
$listado_usuarios = $class_usuarios->listado();


//si se envia el formulario presionando el boton enviar
//se recibiran los campos del formulario por Post
if (isset($_POST['guardar'])) {

    $nombre = $_POST['nombre'];
    $lugar = $_POST['lugar'];
    $estado = $_POST['estado'];
    $descripcion = $_POST['descripcion'];
    $usuario_encargado = $_POST['usuario_encargado'];
    $fecha_evento_inicio = Ajustefechaguardar($_POST['fecha_evento_inicio']);
    $fecha_evento_fin = Ajustefechaguardar($_POST['fecha_evento_fin']);
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fin = $_POST['hora_fin'];
    $imagen_evento = '';
    $estatus = $_POST['estatus'];



    if ($editar == 'si') {

        if ($class_eventos->editar_eventos($nombre, $lugar, $estado, $usuario_encargado, $descripcion, $fecha_evento_inicio, $fecha_evento_fin, $hora_inicio, $hora_fin, $imagen_evento, $estatus, $id)) {
            //si se guardo correctamente se redirecciona a la consulta principal
           header("Location: mensaje.php?msj=editarevento");
        }
    } else {


        if ($class_eventos->registrar_eventos($nombre, $lugar, $estado, $usuario_encargado, $descripcion, $fecha_evento_inicio, $fecha_evento_fin, $hora_inicio, $hora_fin, $imagen_evento, $estatus)) {

            $id_evento_creado = $class_eventos->ultimo_registro();
            $id_evento_creado = mysql_fetch_array($id_evento_creado);
            
//            header('Location: evento_artista.php?id=' . $id_evento_creado['id_eventos']);
            
            header("Location: mensaje.php?msj=nuevoevento");
//            colocando el msj de nueevo evento
//            ($id == 'nuevoevento') {
//    $mensaje = 'Se ha guardado satisfactoriamente un Evento';
//    $ruta = 'consulta_evento.php';
            
        } else {
            
        }
    }
}




//se indica que vista se mostrara en la pantalla
$ruta = '../views/agenda/nuevo_evento.php';

//se incluye la plantilla
include '../web/layout/index.php';
?>
