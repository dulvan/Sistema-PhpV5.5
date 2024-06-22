<?php
setlocale(LC_TIME, 'es_VE'); # Localiza en español es_Venezuela
date_default_timezone_set('America/Caracas');
//Incluyo todos los Modelos de la carpeta Model
include '../model/BDculturaconexion.php';
include '../model/EstatusUsuario.php';
include '../model/Login.php';
include '../model/Artista.php';
include '../model/Estados.php';
include '../model/ListaEstatusArtistas.php';
include '../model/Usuarios.php';
include '../model/Obras.php';
include '../model/ListaEstatusObra.php';
include '../model/Eventos.php';
include '../model/EventosObras.php';
include '../model/Bitacora.php';

function Ajustefecha($fecha) {
    if ($fecha != '') {
        $fecha = date('d/m/Y', strtotime($fecha));

        return $fecha;
    } else {
        return '';
    }
}

function Ajustefechaguardar($fecha) {
    if ($fecha != '') {

        $fecha_array = explode('/', $fecha);
        $fecha = $fecha_array[2] . '-' . $fecha_array[1] . '-' . $fecha_array[0];
        //$fecha = date('Y-m-d', strtotime($fecha));

        return $fecha;
    } else {
        return null;
    }
}

if ($_SESSION['usuario'] != '') {

    $id_user = $_SESSION['usuario'];
    $valida = new Usuarios();
    $datos = $valida->detalle2($id_user);

    if ($datos['cambioclave'] == 's') {

        if (@$cambio == TRUE) {
            
        } else {
            header("Location: cambioclave.php");
        }
    }
}
?>