<div align="center">

    <h1>Eliminar Usuario</h1>
    <br />
    <form method="POST" action="eliminar_usuario.php?id=<?php echo $_GET['id']; ?>">

        <?php include '_detalle.php'; ?>

        <script language="javascript">
            function seguroartista()
            {
                if (confirm("Est\u00e1 seguro que desea eliminar \u00e9ste Usuario?"))
                    return true;
                else
                    return false;
            }
        </script>
        <br />
        <input type="button" name="volver" id="volver" value="&lt;&lt;Volver" onclick="location.href = 'consulta_usuarios.php'" />
        <input  type="submit" name="eliminar" id="eliminar" value="Eliminar" onclick="return seguroartista()"/>
    </form>
    <br />
</div>   