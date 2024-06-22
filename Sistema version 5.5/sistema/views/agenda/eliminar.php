
    <div align="center">

    <h1>Eliminar Evento</h1>
    <br />
    <form method="POST" action="eliminar_evento.php?id=<?php echo $_GET['id']; ?>">

 <?php include '_detalleevento.php'; ?>
    
    <br />

    <?php include '/_detalle_artista.php'; ?>

        <script language="javascript">
            function seguroevento()
            {
                if (confirm("Est\u00e1 seguro que desea eliminar \u00e9ste Evento ?"))
                    return true;
                else
                    return false;
            }
        </script>
        <br />
        <input type="button" name="volver" id="volver" value="&lt;&lt;Volver" onclick="location.href = 'consulta_evento.php'" />
        <input  type="submit" name="eliminar" id="eliminar" value="Eliminar" onclick="return seguroevento()"/>
    </form>
    <br />
</div>  