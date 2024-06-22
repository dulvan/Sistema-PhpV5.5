<!-- Titulo de la Pagina-->
<div align="center"style="float: left;margin-left: 25px;"><h1 style="color: #467aa7;"<div align="center">Detalles del Evento</h1></div>
<br/><br/>
<div align="center">


    <?php include '_detalleevento.php'; ?>
    
    <br />

    <a href="evento_artista.php?id=<?php echo $id_evento; ?>" >Agregar Artistas con sus Obras</a>

    <?php include '_detalle_artista.php'; ?>

    <?php if (@$_GET['p'] == 'a') {
        ?>
    <br />
        <input type="button" name="volver" id="volver" value="&lt;&lt;Volver" onclick="location.href = 'agenda.php'" />

    <?php } elseif (@$_GET['p'] == 'e') {
        ?>
        <br />
        <input type="button" name="volver" id="volver" value="&lt;&lt;Volver" onclick="location.href = 'consulta_evento.php'" />
        <?php
    }
    ?>

</div>


<br /><br /><br /><br />