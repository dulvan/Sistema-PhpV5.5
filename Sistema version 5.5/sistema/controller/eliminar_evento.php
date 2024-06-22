<?php

error_reporting(0);
session_start();
// inicia la session_star para poder verificar si estan logueados o no
if ($_SESSION['tipo'] != 'admin') {

    header('Location: index.php');
}
//incluyo todos los modelos llamados en el index.php
include '../model/index.php';

//si hay una session $_SESSION['usuario'] me mantengo en la pagina y si no hay una session redirecciono al login
if ($_SESSION['usuario'] == '') {
    header("Location: login.php");
}

//creo una variable con la clase model/Artistas
    $eventos = new Eventos();

if (isset($_POST['eliminar'])) {

    
    
    
    $eventos->eliminar($_GET['id']);

    header('Location: mensaje.php?msj=elievento');
}




//si pasan po el url GET el ID del artista procedo a consultar el artista
if (isset($_GET['id'])) {

    //asigno el id del artista a una variable
    $id_evento = $_GET['id'];



    //utilizo la funcion 'detalle_artista' para consultar un registro en particular
    //el cual verificara el id del artista en la tabla artista
    $lista = $eventos->detalle_evento($id_evento);
    //el resultado lo vuelvo un array
    //para listarlo en la tabla de la vista detalle
    $lista = mysql_fetch_array($lista);
    
    $obra_arista = new EventosObras();
    $listado_obras_artista = $obra_arista->consulta_obras_artista($id_evento);
    


    //se indica que vista se mostrara en la pantalla
$ruta = '../views/agenda/eliminar.php';
} else {
    //en caso de no pasar por url el valor muestro la pantalla inicial
    $ruta = '../views/index.php';
}

//se incluye la plantilla
include '../web/layout/index.php';
   



?>
