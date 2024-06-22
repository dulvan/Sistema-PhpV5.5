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
    <div  style="float: left;margin-left: 25px;"><h1 style="color: #467aa7;">Obras</h1></div>
    <!-- Link para agregar nuevo artista -->
    <div style="float: right; margin-right: 30px;"><h3><a href="obras.php">Nueva Obra</a></h3></div>
</div>
<br />

<div id="container">

    <div id="demo">
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
            <!-- Encabezado -->
            <thead>
                <tr>
                    <th>Artista</th>
                    <th>Codigo UNA</th>
                    <th>Titulo</th>
                    <th>Tecnica</th>
                   <!-- <th>Dimensiones</th>-->
                    <th>Valor</th>
                    <th>Dispinible para Venta</th>
<!--                    <th>Observaciones</th>-->

                    <!--<th>Publicacion</th>-->
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
                $art = new Artista();
//comienza el ciclo para mostrar el listado de artistas
                while ($lista = mysql_fetch_array($consulta)) {
                    ?>

                    <tr class="gradeC">

                        <td><?php
                            //busco el artista segun el ID
                            $var = $art->busqueda_art($lista['id_artistas']);
                            echo ucfirst($var['nombre']) . ' ' . ucfirst($var['apellido']);
                            ?></td>
                        <td><?php echo $lista['codigo_una']; ?></td>
                        <td><?php echo ucfirst($lista['titulo']); ?></td>
                        <td><?php echo ucfirst($lista['tecnica']); ?></td>
                        <!--<td><?php //echo $lista['dimensiones']; ?></td>-->
                        <td><?php echo $lista['valor']; ?></td>
                        <td><center><?php echo $lista['para_la_venta'] == '1' ? 'Si' : 'No'; ?></center></td>
<!--                <td><?php //echo ucfirst($lista['observaciones']); ?></td>-->
        <!--<td><?php //echo Date('d/m/Y',  strtotime($lista['fecha_obra'])); ?></td>-->
                <!-- Links para modificar y ver detalel de artistas
              se pasa parametro por url con el id del artista
                -->
                <td><a href="detalle_obra.php?id=<?php echo $lista['id_obras']; ?>" ><img src="../web/image/buscar.png" width="48px" height="48px" style="text-align: center;" /></a></td>
               <?php if ($_SESSION['tipo'] == 'admin') { ?>
                <td><a href="obras.php?id=<?php echo $lista['id_obras']; ?>" ><img src="../web/image/editar.png" width="48px" height="48px" style="text-align: center;" /></a></td>
                <td><a href="eliminar_obra.php?id=<?php echo $lista['id_obras']; ?>" ><img src="../web/image/eliminar.png" width="48px" height="48px" style="text-align: center;" /></a></td>
          <?php } ?>       
        </tr>
                <?php
            }
            ?> 
            </tbody>
            <tfoot>
                <!--Pie de Pagina con los buscadores -->
                <tr>
                    <th><input type="text" name="search_id_artistas" value="Buscar" class="search_init" /></th>
                    <th><input type="text" name="search_codigo_una" value="Buscar" class="search_init" /></th>
                    <th><input type="text" name="search_titulo" value="Buscar" class="search_init" /></th>
                    <th><input type="text" name="search_tecnica" value="Buscar" class="search_init" /></th>
                    
                    <th><input type="text" name="search_valor" value="Buscar" class="search_init" /></th>
                    
<!--                    <th><input type="text" name="search_observaciones" value="Buscar" class="search_init" /></th>-->
                    <th><input type="text" name="search_estatus" value="Buscar" class="search_init" /></th>

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