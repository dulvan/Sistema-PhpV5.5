<!-- Incluir los CSS para la apariencia de la tabla -->
<style type="text/css" title="currentStyle">
    @import "../web/css/datatable/demo_page.css";
    @import "../web/css/datatable/demo_table.css";
    @import "../web/css/datatable/jquery.dataTables_themeroller.css";

</style>

<!-- Incluir las librerias de las tablas para los buscadores -->
<script type="text/javascript" language="javascript" src="../web/js/datatable/jquery.dataTables.js"></script>

<!-- script de la libreira para el llamado "script sacado de la pagina de la libreira" -->
<script type="text/javascript" charset="utf-8">
    var asInitVals = new Array();

    $(document).ready(function() {
        var oTable = $('#example').dataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "oLanguage": {
                "sSearch": "Buscar:"
            }
        });

        $("tfoot input").keyup(function() {
            /* Filter on the column (the index) of this element */
            oTable.fnFilter(this.value, $("tfoot input").index(this));
        });


        /*
         * Support functions to provide a little bit of 'user friendlyness' to the textboxes in 
         * the footer
         */
        $("tfoot input").each(function(i) {
            asInitVals[i] = this.value;
        });

        $("tfoot input").focus(function() {
            if (this.className == "search_init")
            {
                this.className = "";
                this.value = "";
            }
        });

        $("tfoot input").blur(function(i) {
            if (this.value == "")
            {
                this.className = "search_init";
                this.value = asInitVals[$("tfoot input").index(this)];
            }
        });
    });
</script>


<div>
    <!-- titulo de la pagina -->
    <div style="float: left;margin-left: 25px;"><h1 style="color: #467aa7;">Usuarios</h1></div>
    <!-- Link para agregar nuevo artista -->
    <div style="float: right; margin-right: 30px;"><h3><a href="usuario.php">Nuevo Usuario</a></h3></div>
</div>
<br />

<div id="container">

    <div id="demo">
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">

            <!-- Encabezado -->
            <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
                    <th>Correo Electronico</th>

                    <th>Ver</th>

                    <?php if ($_SESSION['tipo'] == 'admin') { ?>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    <?php } ?>
                </tr>
            </thead>
            <!-- Listado de registros  -->
            <tbody>
                <?php
                //comienza el ciclo para mostrar el listado de artistas
                while ($lista = mysql_fetch_array($consulta)) {
                    ?>
                    <tr>
                        <td><?php echo ucwords($lista['tipo_cedula']) . $lista['num_cedula']; ?></td>
                        <td><?php echo ucfirst($lista['nombre']); ?></td>
                        <td><?php echo ucfirst($lista['apellido']); ?></td>

                        <td><?php echo ucfirst($lista['usuario']); ?></td>
                        <td><?php echo $lista['email']; ?></td>


                <!-- Links para modificar y ver detalel de artistas
                se pasa parametro por url con el id del artista
                -->
                <td><a href="detalle_usuario.php?id=<?php echo $lista['id_usuarios']; ?>" >
                        <img src="../web/image/buscar.png" width="48px" height="48px" style="text-align: center;" />
                    </a></td>
                <?php if ($_SESSION['tipo'] == 'admin') { ?>
                    <td><a href="usuarioeditar.php?id=<?php echo $lista['id_usuarios']; ?>" >
                            <img src="../web/image/editar.png" width="48px" height="48px" style="text-align: center;" />
                        </a></td>
                    <td><a href="eliminar_usuario.php?id=<?php echo $lista['id_usuarios']; ?>" >
                            <img src="../web/image/eliminar.png" width="48px" height="48px" style="text-align: center;" />
                        </a></td>
                <?php } ?>
                </tr>

                <?php
            }
            ?>  
            </tbody>
            <!--Pie de Pagina con los buscadores -->
            <tfoot>
                <tr>
                    <th><input type="text" name="search_tp_cedula" value="Buscar" class="search_init" /></th>
                    <th><input type="text" name="search_nombre" value="Buscar" class="search_init" /></th>
                    <th><input type="text" name="search_apellido" value="Buscar" class="search_init" /></th>
<!--                    <th><input type="text" name="search_direccion" value="Buscar" class="search_init" /></th>-->
                    <th><input type="text" name="search_estados" value="Buscar" class="search_init" /></th>

                    <th><input type="text" name="search_correo" value="Buscar" class="search_init" /></th>

                    <th></th>
                    <?php if ($_SESSION['tipo'] == 'admin') { ?>
                        <th></th>
                        <th></th>
                        <?php
                    }
                    ?> 
                </tr>
            </tfoot>
        </table>
    </div>
</div>