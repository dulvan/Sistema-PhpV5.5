<div align="center">

    <h1>Eliminar Artistas</h1>
    <br />
    <form method="POST" action="eliminar_artistas.php?id=<?php echo $_GET['id']; ?>">

        <?php include '_detalle.php'; ?>

        <script language="javascript">
            function seguroartista()
            {
                if (confirm("Est\u00e1 seguro que desea eliminar \u00e9ste Artista, con esta accion se eliminaran las Obras y en los eventos relacionados?"))
                    return true;
                else
                    return false;
            }
        </script>
        <br />
        <input type="button" name="volver" id="volver" value="&lt;&lt;Volver" onclick="location.href = 'consulta_artista.php'" />
        <input  type="submit" name="eliminar" id="eliminar" value="Eliminar" onclick="return seguroartista()"/>
    </form>
    <br />
</div>   