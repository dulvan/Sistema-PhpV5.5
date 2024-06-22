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
    <div  style="float: left;margin-left: 25px;"><h1 style="color: #467aa7;">Eventos</h1></div>
    <!-- Link para agregar nuevo artista -->
    <div style="float: right; margin-right: 30px;"><h3><a href="nuevo_evento.php">Nuevo Evento</a></h3></div>
</div>
<br />
<div id="container">

    <div id="demo">
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">

            <!-- Encabezado -->
            <thead>
                <tr>
                    <th>Nombre</th>

                    <th>Lugar</th>
                    <th>Estado</th>
                    <th>Encargado</th>
                    <th>Desde</th>
                    <th>Hasta</th>
                    
                    <th>Ver</th>
                    <?php if ($_SESSION['tipo'] == 'admin') { ?>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    <?php } ?>
<!--    <th>Modificar</th>
<th>Eliminar</th> -->
                </tr>
            </thead> <!-- Listado de registros  -->
            <tbody>
                <?php
                //comienza el ciclo para mostrar el listado de artistas
                $class_estados = new Estados();
                $class_usuario = new Usuarios();
                while ($lista = mysql_fetch_array($consulta)) {
                    ?>
                    <tr>

                        <td><?php echo $lista['nombre']; ?></td>

                        <td><?php echo $lista['lugar']; ?></td>
                        <td><?php $valor_estado = $class_estados->detalle($lista['estado']);
                echo $valor_estado['nombre'];
                    ?></td>
                        <td><?php $valor_usuario = $class_usuario->detalle2($lista['usuario_encargado']);
                        echo $valor_usuario['usuario'];
                        ?></td>


                        <td><?php echo Ajustefecha($lista['fecha_evento_inicio']) . ' ' . $lista['hora_inicio']; ?></td>
                        <td><?php echo Ajustefecha($lista['fecha_evento_fin']) . ' ' . $lista['hora_fin']; ?></td>
                        
                        <td><a href="detalle_evento.php?id=<?php echo $lista['id_eventos']; ?>&p=e" ><img src="../web/image/buscar.png" width="48px" height="48px" style="text-align: center;" /></a></td>

    <?php if ($_SESSION['tipo'] == 'admin') { ?>
                            <td><a href="nuevo_evento.php?id=<?php echo $lista['id_eventos']; ?>" ><img src="../web/image/editar.png" width="48px" height="48px" style="text-align: center;" /></a></td>

                            <td><a href="eliminar_evento.php?id=<?php echo $lista['id_eventos']; ?>" ><img src="../web/image/eliminar.png" width="48px" height="48px" style="text-align: center;" /></a></td>

                    <?php } ?>
                    </tr>

                    <?php
                }
                ?>  
            </tbody>


            <!--Pie de Pagina con los buscadores -->
            <tfoot>
                <tr>

                    <th><input type="text" name="search_b" value="Buscar" class="search_init" /></th>

                    <th><input type="text" name="search_d" value="Buscar" class="search_init" /></th>
                    <th><input type="text" name="search_e" value="Buscar" class="search_init" /></th>
                    <th><input type="text" name="search_f" value="Buscar" class="search_init" /></th>
                    <th><input type="text" name="search_g" value="Buscar" class="search_init" /></th>
                    <th><input type="text" name="search_h" value="Buscar" class="search_init" /></th>
                    
                    <th></th>
<?php if ($_SESSION['tipo'] == 'admin') { ?>

                        <th></th>
                        <th></th>
<?php } ?>
                </tr>
            </tfoot>


        </table>


    </div>

</div>