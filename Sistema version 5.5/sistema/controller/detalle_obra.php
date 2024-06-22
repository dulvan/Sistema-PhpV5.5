<?php
error_reporting(0);
session_start();
// inicia la session_star para poder verificar si estan logueados o no
//incluyo todos los modelos llamados en el index.php
include '../model/index.php';

//si hay una session $_SESSION['usuario'] me mantengo en la pagina y si no hay una session redirecciono al login
if ($_SESSION['usuario'] == '') {
    header("Location: login.php");
}

//si pasan po el url GET el ID de la obra procedo a consultar el artista
if (isset($_GET['id'])) {
    
    //asigno el id de la obra a una variable
    $id_obra = $_GET['id'];

    //creo una variable con la clase model/Obras
    $obras = new Obras();

    //utilizo la funcion 'detalle_obra' para consultar un registro en particular
    //el cual verificara el id de la obra en la tabla obras
    $lista = $obras->detalle_obra($id_obra);
    //el resultado lo vuelvo un array
    //para listarlo en la tabla de la vista detalle
    $lista = mysql_fetch_array($lista);

//
    $ruta = '../views/obras/detalles.php';
} else {
    //en caso de no pasar por url el valor muestro la pantalla inicial
    $ruta = '../views/index.php';
}
//se incluye la plantilla
include '../web/layout/index.php';
?>
