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
            "aaSorting": [[ 0, "desc" ]],
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
<?php $class_usuario = new Usuarios(); ?>

<div>
    <!-- titulo de la pagina -->
    <div style="float: left;margin-left: 25px;"><h1 style="color: #467aa7;">Bitacora</h1></div>
</div>
<br />
   <div style="float: right">
        
       <a target="_blank" href="../web/dompdf/dompdf.php?nombrefile=Reporte.pdf&id=<?php echo $id; ?>&base_path=./../controller/&input_file=../../controller/exportar.php" >Exportar a PDF</a>

    </div>
<div id="container">

 
    
    <div id="demo">
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="example">

            <!-- Encabezado -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Direccion IP</th>
                    <th>Operacion</th>
                    <th>Tabla</th>
                    <th>Observacion</th>
                    <th>Ver</th>
                </tr>
            </thead>
            <!-- Listado de registros  -->
            <tbody>
                <?php
                //comienza el ciclo para mostrar el listado de artistas
                while ($lista = mysql_fetch_array($consulta)) {
                    ?>
                    <tr>
                        <td><?php echo $lista['id_bitacora']; ?></td>
                        <td><?php $valor_usuario = $class_usuario->detalle2($lista['usuario']);
                        echo $valor_usuario['usuario']; ?></td>
                        <td><?php echo Ajustefecha($lista['fecha_reg']); ?></td>
                        <td><?php echo $lista['hora_reg']; ?></td>

                        <td><?php echo $lista['direccion_ip']; ?></td>
                        <td><?php echo $lista['operacion']; ?></td>
                        <td><?php echo $lista['tabla']; ?></td>
                        <td><center><?php echo $lista['observacion']; ?></center></td>
            
                <td><a href="detalle_bitacora.php?id=<?php echo $lista['id_bitacora']; ?>" >
                        <img src="../web/image/buscar.png" width="48px" height="48px" style="text-align: center;" />
                    </a></td>

                </tr>

                <?php
            }
            ?>  
            </tbody>
            <!--Pie de Pagina con los buscadores -->
            <tfoot>
                <tr>
                    <th><input type="text" name="search_id" value="Buscar" class="search_init" /></th>
                    <th><input type="text" name="search_tp_cedula" value="Buscar" class="search_init" /></th>
                    <th><input type="text" name="search_nombre" value="Buscar" class="search_init" /></th>
                    <th><input type="text" name="search_apellido" value="Buscar" class="search_init" /></th>
<!--                    <th><input type="text" name="search_direccion" value="Buscar" class="search_init" /></th>-->
                    <th><input type="text" name="search_estados" value="Buscar" class="search_init" /></th>
                    <th><input type="text" name="search_telefono" value="Buscar" class="search_init" /></th>
                    <th><input type="text" name="search_correo" value="Buscar" class="search_init" /></th>
                    <th><input type="text" name="search_num_obras" value="Buscar" class="search_init" /></th>
                    <th></th>
                   
                </tr>
            </tfoot>
        </table>
    </div>
</div>