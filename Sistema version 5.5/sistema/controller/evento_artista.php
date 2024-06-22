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

//si pasan po el url GET el ID de la obra procedo a consultar el artista
if (isset($_GET['id'])) {

    //asigno el id de la obra a una variable
    $id_evento = $_GET['id'];

    $class_evento = new Eventos();

    $evento = $class_evento->detalle_evento($id_evento);

    $artista = new Artista();
    $listado_artistas = $artista->listar_artistas();

    if (isset($_POST['id_artistas'])) {

        $id_artista = $_POST['id_artistas'];

        if ($id_artista != null) {

            $obras = new Obras();

            $listado_obras = $obras->obras_artistas($id_artista);
            $listadoobras = $obras->obras_artistas($id_artista);

            if (isset($_POST['guardar'])) {

                while ($row = mysql_fetch_array($listado_obras)) {
                    $id_obra = $row['id_obras'];
                    if (@$id_obra == @$_POST[$id_obra]) {

                        $class_evento_obra = new EventosObras();

                        if ($class_evento_obra->registrar($id_evento, $id_obra, $id_artista)) {
                            
                        }
                    }
                    $guardo = 'si';
                }

                if (@$guardo == 'si') {
                    $id_artista = null;
                    $listadoobras = array();
                }
            }
        }
    }


    $obra_arista = new EventosObras();
    $listado_obras_artista = $obra_arista->consulta_obras_artista($id_evento);


    $ruta = '../views/agenda/artista_evento.php';
} else {
    //en caso de no pasar por url el valor muestro la pantalla inicial
    $ruta = '../views/index.php';
}
//se incluye la plantilla
include '../web/layout/index.php';
?>
