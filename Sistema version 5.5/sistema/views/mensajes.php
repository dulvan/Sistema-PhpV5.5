<?php
$id = @$_GET['msj'];

if ($id == 'eliobra') {
    $mensaje = 'Se ha eliminado satisfactoriamente la Obra';
    $ruta = 'consulta_obras.php';
} elseif ($id == 'eliartista') {
    $mensaje = 'Se ha eliminado satisfactoriamente el Artista';
    $ruta = 'consulta_artista.php';
}
elseif ($id == 'elievento') {
    $mensaje = 'Se ha eliminado satisfactoriamente el Evento';
    $ruta = 'consulta_evento.php';
}
elseif ($id == 'nuevoevento') {
    $mensaje = 'Se ha guardado satisfactoriamente un Evento';
    $ruta = 'consulta_evento.php';
}
elseif ($id == 'editarevento') {
    $mensaje = 'Se ha modificado satisfactoriamente el Evento';
    $ruta = 'consulta_evento.php';
}
elseif ($id == 'nuevoartista') {
    $mensaje = 'Se ha guardado satisfactoriamente un Artista';
    $ruta = 'consulta_artista.php';
}
elseif ($id == 'editarartista') {
    $mensaje = 'Se ha modificado satisfactoriamente el Artista';
    $ruta = 'consulta_artista.php';
}
elseif ($id == 'eliartista') {
    $mensaje = 'Se ha eliminado satisfactoriamente el Artista';
    $ruta = 'consulta_artista.php';
}

elseif ($id == 'nuevoobra') {
    $mensaje = 'Se ha guardado satisfactoriamente una Obra';
    $ruta = 'consulta_obras.php';
}
elseif ($id == 'editarobra') {
    $mensaje = 'Se ha modificado satisfactoriamente la Obra';
    $ruta = 'consulta_obras.php';
}
elseif ($id == 'nuevousuario') {
    $mensaje = 'Se ha guardado satisfactoriamente el usuario';
    $ruta = 'consulta_usuarios.php';
}
elseif ($id == 'eliusuario') {
    $mensaje = 'Se ha eliminado satisfactoriamente el Usuario';
    $ruta = 'consulta_usuarios.php';
}
elseif ($id == 'cambioclave') {
    $mensaje = 'Se ha cambiado la Contraseña Satisfactoriamente';
    $ruta = 'index.php';
}
elseif ($id == 'editarusuario') {
    $mensaje = 'Se ha modificado satisfactoriamente el Usuario';
    $ruta = 'consulta_usuarios.php';
}


?>

<div align="center" style="margin-top: 50px;">
    <table  width="40%" style="background-color: #FFF;" border="1">
        <tr>
            <td style="text-align: center;" class="ui-state-hover">
                Mensaje
            </td>
        </tr>
        <tr>

            <td>
<?php echo @$mensaje; ?>
            </td>
        </tr>
    </table>
    <br />

    <input type="button" name="volver" id="volver" value=" Aceptar " onclick="location.href = '<?php echo $ruta; ?>'" />

</div>
