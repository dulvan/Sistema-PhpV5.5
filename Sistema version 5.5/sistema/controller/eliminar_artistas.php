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
$artista = new Artista();
if (isset($_POST['eliminar'])) {

    $artista->eliminar($_GET['id']);
  
  header('Location: mensaje.php?msj=eliartista');
    
    

    //header('Location: mensaje.php?msj=eliartista');
}
//si pasan po el url GET el ID del artista procedo a consultar el artista
if (isset($_GET['id'])) {

    //asigno el id del artista a una variable
    $id_artista = $_GET['id'];

    //utilizo la funcion 'detalle_artista' para consultar un registro en particular
    //el cual verificara el id del artista en la tabla artista
    $lista = $artista->detalle_artista($id_artista);
    //el resultado lo vuelvo un array
    //para listarlo en la tabla de la vista detalle
    $lista = mysql_fetch_array($lista);   
 
    
/*      $art = new Artista();
if(isset($_POST['eliminar'])){
   $_GET['id'];
  $art->eliminar($_GET['id']);
  
  header('Location: mensaje.php?msj=eliobra');
    
    
}*/
    
    
    
        //se indica que vista se mostrara en la pantalla
    $ruta = '../views/artista/eliminar.php';
}
//se incluye la plantilla
include '../web/layout/index.php';
?>