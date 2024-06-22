<div align="center">

    <h1 style="color: #467aa7;"> 
        <?php
        if (@$editar == 'si') {
            echo 'Editar Evento';
        } elseif (@$editar == 'no') {
            echo 'Nuevo Evento';
        }
        ?>
    </h1>


    <br/>
    <!-- comentado el mensaje de campos obligatorios
    <p>Los campo con <span style="color: #D14;">*</span> son Obligatorios</p>
    -->
    <script>
        $(function() {
            $("#fecha_evento_inicio").datepicker({
                defaultDate: "+1w",
                dateFormat: 'dd/mm/yy',
                changeMonth: true,
                minDate: 0,
                numberOfMonths: 3,
                onClose: function(selectedDate) {
                    $("#fecha_evento_fin").datepicker("option", "minDate", selectedDate);
                }
            }, jQuery.extend(jQuery.datepicker.regional['es']));
            $("#fecha_evento_fin").datepicker({
                defaultDate: "+1w",
                dateFormat: 'dd/mm/yy',
                changeMonth: true,
                numberOfMonths: 3,
                onClose: function(selectedDate) {
                    $("#fecha_evento_inicio").datepicker("option", "maxDate", selectedDate);
                }
            }, jQuery.extend(jQuery.datepicker.regional['es']));
        });
    </script>

    <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" >


        <table width="80%" border="1" style="background-color: #F2F3FF">
            <tr>
                <td class="ui-state-hover">Nombre del Evento <span style="color: #D14;">*</span></td>
                <td><input autocomplete="off" name="nombre" type="text" value="<?php echo @$nombre; ?>" id="nombre" size="50" maxlength="255" />
                    <script type="text/javascript">
                        var nombre = new LiveValidation('nombre');
                        nombre.add(Validate.Presence);
                    </script>
                </td>
            </tr>
            <tr>
                <td class="ui-state-hover">Descripcion del Evento <span style="color: #D14;">*</span></td>
                <td><textarea name="descripcion" rows="2"  id="descripcion" ><?php echo @$descripcion; ?></textarea>
                    <script type="text/javascript">
                        var descripcion = new LiveValidation('descripcion');
                        descripcion.add(Validate.Presence);
                    </script>
                </td>
            </tr>

            <tr>
                <td class="ui-state-hover">Lugar del Evento <span style="color: #D14;">*</span></td>
                <td><textarea name="lugar" rows="2" id="lugar" ><?php echo @$lugar; ?></textarea>
                    <script type="text/javascript">
                        var lugar = new LiveValidation('lugar');
                        lugar.add(Validate.Presence);
                    </script>
                </td>
            </tr>


            <tr>
                <td  class="ui-state-hover">Estado/Dependencia <span style="color: #D14;">*</span></td>
                <td>  
                    <select name="estado" id="estado">
                        <option value="">Seleccione</option>
<?php while ($lista = mysql_fetch_array($lista_estados)) { ?>

                            <option value="<?php echo $lista['id_estados']; ?>" <?php echo $estado==$lista['id_estados']?'Selected':''; ?> ><?php echo $lista['nombre'] ?></option>
<?php } ?>
                    </select>
                    <script type="text/javascript">
                        var estado = new LiveValidation('estado');
                        estado.add(Validate.Presence);
                    </script>                
                </td>
            </tr>

            <tr>
                <td  class="ui-state-hover">Usuario Encargado <span style="color: #D14;">*</span></td>
                <td>  
                    <select name="usuario_encargado" id="usuario_encargado">
                        <option value="">Seleccione</option>
<?php while ($lista2 = mysql_fetch_array($listado_usuarios)) { ?>

                            <option value="<?php echo $lista2['id_usuarios']; ?>" <?php echo $usuario_encargado==$lista2['id_usuarios']?'Selected':''; ?> ><?php echo $lista2['usuario'] ?></option>
<?php } ?>
                    </select>
                    <script type="text/javascript">
                        var usuario_encargado = new LiveValidation('usuario_encargado');
                        usuario_encargado.add(Validate.Presence);
                    </script>
                </td>
            </tr>

            <tr>
                <td  class="ui-state-hover">Fecha Desde <span style="color: #D14;">*</span></td>
                <td>
                    <?php 
                    if(@$fecha_evento_inicio == ''){
                        $fecha_evento_inicio = date('Y-m-d');
                    }
                    ?>
                    
                    <input readonly="readonly" type="text" value="<?php echo Ajustefecha(@$fecha_evento_inicio); ?>" id="fecha_evento_inicio" name="fecha_evento_inicio" />
                    <script type="text/javascript">
                        var fecha_evento_inicio = new LiveValidation('fecha_evento_inicio');
                        fecha_evento_inicio.add(Validate.Presence);
                    </script>
                </td>
            </tr>
            <tr>
                <td  class="ui-state-hover">Fecha Hasta <span style="color: #D14;">*</span></td>
                <td>
                    <?php 
                    if(@$fecha_evento_fin == ''){
                        $fecha_evento_fin = date('Y-m-d');
                    }
                    ?>
                    <input readonly="readonly" type="text"  value="<?php echo Ajustefecha(@$fecha_evento_fin); ?>" id="fecha_evento_fin" name="fecha_evento_fin" />
                    <script type="text/javascript">
                        var fecha_evento_fin = new LiveValidation('fecha_evento_fin');
                        fecha_evento_fin.add(Validate.Presence);
                    </script>
                </td>

            </tr>
            <tr>
                <td  class="ui-state-hover">Hora Desde <span style="color: #D14;">*</span></td>
                <td><input autocomplete="off" type="text" id="hora_inicio"  value="<?php echo @$hora_inicio; ?>" name="hora_inicio" />
                    <script type="text/javascript">
                        var hora_inicio = new LiveValidation('hora_inicio');
                        hora_inicio.add(Validate.Presence);
                    </script>
                </td>

            </tr>
            <tr>
                <td  class="ui-state-hover">Hora Hasta <span style="color: #D14;">*</span></td>
                <td><input autocomplete="off" type="text" id="hora_fin"  value="<?php echo @$hora_fin; ?>" name="hora_fin" />
                    <script type="text/javascript">
                        var hora_fin = new LiveValidation('hora_fin');
                        hora_fin.add(Validate.Presence);
                    </script>
                </td>

            </tr>
            <tr>
                <td class="ui-state-hover">Estatus <span style="color: #D14;">*</span></td>
                <td>  
                    <select name="estatus" id="estatus">
                        <option value=""  >Seleccione</option>
                        <option value="1" <?php echo $estatus=='1'?'Selected':''; ?>>Activo</option>
                        <option value="2" <?php echo $estatus=='2'?'Selected':''; ?>>Inactivo</option>

                    </select>
                    <script type="text/javascript">
                        var estatus = new LiveValidation('estatus');
                        estatus.add(Validate.Presence);
                    </script>
                </td>
            </tr>

        </table>
        <p>
            <!-- instalando el boton de volver en el nuevo evento -->
            <br />
            <input type="button" name="volver" id="volver" value="&lt;&lt;Volver" onclick="location.href = 'consulta_evento.php'" value="<<Volver" name="volver"/>
            <input type="submit" name="guardar" id="guardar " value="Guardar" />

    </form>
</p>
<!-- comentado el mensaje de campos obligatorios-->
<div align="center"></div>
<p>Los campos con <span style="color: #D14;">(*)</span> son Obligatorios</p>
<br />

</div>