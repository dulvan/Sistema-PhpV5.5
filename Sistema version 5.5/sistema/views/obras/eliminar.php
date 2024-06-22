<div align="center">

    <h1>Eliminar Obra</h1>
    <br />
    <form method="POST" action="eliminar_obra.php?id=<?php echo $_GET['id']; ?>">

        <?php include '_detalle.php'; ?>

        <script language="javascript">
            function seguroobra()
            {
                if (confirm("Est\u00e1 seguro que desea eliminar \u00e9sta obra, con esta accion se eliminaran las Obras en los eventos relacionados?"))
                    return true;
                else
                    return false;
            }
        </script>
<br />
        <input type="button" name="volver" id="volver" value="&lt;&lt;Volver" onclick="location.href = 'consulta_obras.php'" />
        <input  type="submit" name="eliminar" id="eliminar" value="Eliminar" onclick="return seguroobra()"/>
    </form>
<br />
</div>   