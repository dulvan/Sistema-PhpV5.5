
<div align="center">
<h1 style="color: #467aa7;"><?php if ($editar == 'si') {
	if ($_REQUEST["eliminar"]!='si')
   		echo 'Modificar Obra';
	elseif ($_REQUEST["eliminar"]=='si')
   		echo 'Eliminar Obra';
} else {
    echo 'Registrar Obra';
} ?></h1>
    <br />
    <!--
    <p>Los campo con <span style="color: #D14;">*</span> son Obligatorios</p>
    -->

    <form id="form2" name="form2" method="post" action="obras.php
		<?php 
		if ($editar == 'si') 
		{ 
			echo '?id='.$_GET['id']; 
			if ($_REQUEST["eliminar"]=='si')
				echo '&eliminar=si';
		}  
		?>" enctype="multipart/form-data">
        <table width="80%" border="1" style="background-color: #F2F3FF">     
            <tr>
                <td class="ui-state-hover">Artista <span style="color: #D14;">*</span></td>
                <td>  
                    <select name="id_artistas" id="id_artistas">
                        <option value="">Seleccione</option>
                        <?php while ($ar = mysql_fetch_array($listado_artistas)) { ?>

                            <option <?php
                            if ($ar['id_artistas'] == @$id_artistas) {
                                echo 'selected';
                            }
                            ?> value="<?php echo $ar['id_artistas']; ?>"><?php echo ucfirst($ar['tp_cedula']).$ar['num_cedula'].'   -   '. ucfirst($ar['nombre']) . ' ' . ucfirst($ar['apellido']); ?></option>
                    <?php } ?>
                    </select>

<?php echo $registrar->id_artistas; ?> 
                    <script type="text/javascript">
                        var id_artistas = new LiveValidation('id_artistas');
                        id_artistas.add(Validate.Presence);
                    </script>
                </td>
            </tr>

            <tr>
                <td class="ui-state-hover">Codigo UNA <span style="color: #D14;">*</span></td>
                <td><input autocomplete="off" name="codigo_una" value="<?php echo @$codigo_una; ?>" type="<?php echo $editar=="si"? 'hidden':'text'; ?>" id="codigo_una" size="15" maxlength="15" />
<?php echo $registrar->codigo_una; ?>
                     <?php if($editar=="no") { ?>
                    <script type="text/javascript">
                        var codigo_una = new LiveValidation('codigo_una');
                        codigo_una.add(Validate.Presence);
                    </script>
                       <?php } else { echo @$codigo_una; }?>
                </td>
            </tr>
            <tr>
                <td class="ui-state-hover">Titulo <span style="color: #D14;">*</span></td>
                <td><input autocomplete="off" name="titulo" value="<?php echo @$titulo; ?>" type="text" id="titulo" size="30" maxlength="30" />
<?php echo $registrar->titulo; ?>
                    <script type="text/javascript">
                        var titulo = new LiveValidation('titulo');
                        titulo.add(Validate.Presence);
                    </script>
                </td>
            </tr>
            <tr>
                <td class="ui-state-hover">Fecha de Publicacion <span style="color: #D14;">*</span></td>
                <?php $fecha_max = date('d/m/Y');
                //se asigna la fecha por defecto de hoy
                if(@$fecha_obra == ''){
                   $fecha_obra = $fecha_max;
                }
                ?>
                <td><input autocomplete="off" name="fecha_obra" value="<?php echo @$fecha_obra; ?>" type="text" readonly="readonly" id="fecha_obra" />
<?php echo $registrar->fecha_obra; ?>
                    <!-- Validacion de campo -->
                    <script type="text/javascript">
                        var fecha_obra = new LiveValidation('fecha_obra');
                        fecha_obra.add(Validate.Presence);
                    </script>
                    
                    <!-- generacion de calendario -->
                    <script type="text/javascript">
                    $(function() {
                        $("#fecha_obra").datepicker({changeYear:true, changeMonth: true,maxDate: "0",dateFormat: 'dd/mm/yy'},jQuery.extend(jQuery.datepicker.regional['es']));
                    });
                    </script>
                    
                </td>
            </tr>
            <tr>
                <td class="ui-state-hover">Técnica <span style="color: #D14;">*</span></td>
                <td><input autocomplete="off" name="tecnica" value="<?php echo @$tecnica; ?>" type="text" id="tecnica" size="30" maxlength="30" />
<?php echo $registrar->tecnica; ?>
                    <!-- Validacion de campo -->
                    <script type="text/javascript">
                        var tecnica = new LiveValidation('tecnica');
                        tecnica.add(Validate.Presence);
                        tecnica.add(Validate.Format, {pattern: /[a-zA-Z]/i});
                    </script>
                </td>
            </tr>
            <tr>
                <td class="ui-state-hover">Dimensiones <span style="color: #D14;">*</span></td>
                <td><input autocomplete="off" name="dimensiones" value="<?php echo @$dimensiones; ?>" type="text" id="dimensiones" size="10" maxlength="10" />
<?php echo $registrar->dimensiones; ?>
                    <!-- Validacion de campo -->
                    <script type="text/javascript"> 
                        var dimensiones = new LiveValidation('dimensiones');
                        dimensiones.add(Validate.Presence);
                    </script>
                </td>
            </tr>
            <tr>
                <td class="ui-state-hover">Valor <span style="color: #D14;">*</span></td>
                <td><input autocomplete="off" name="valor" type="text" value="<?php echo @$valor; ?>" id="valor" size="10" maxlength="10" />
<?php echo $registrar->valor; ?>
                    <!-- Validacion de campo -->
                    <script type="text/javascript">
                        var valor = new LiveValidation('valor');
                        valor.add(Validate.Presence);
                        valor.add(Validate.Numericality);
                    </script>
                </td>
            </tr>
            <tr>
                <td class="ui-state-hover">Para la venta</td>
                <td><input autocomplete="off" name="para_la_venta" type="checkbox" value="1" <?php if (@$para_la_venta == '1') {
                        echo 'checked="TRUE"';
                    } ?> id="venta" />


                </td>
            </tr>
            <tr>
                <td class="ui-state-hover">Observaciones</td>
                <td><textarea  name="observaciones" cols="30" rows="3" id="observaciones" ><?php echo @$observaciones; ?></textarea>
<?php echo $registrar->observaciones; ?>

                </td>
            </tr>
            <tr>
                <td class="ui-state-hover">Foto <span style="color: #D14;">*</span></td>

                <td><input type="file" name="foto" id="foto" value="Examinar" />  
                    <span class=" LV_validation_message LV_invalid">  
                        <?php echo $registrar->foto; ?>
                    </span>
                    <?php  if ($editar == 'no') {   ?> 
                    <!-- Validacion de campo -->
                    <script type="text/javascript">
                        var foto = new LiveValidation('foto');
                        foto.add(Validate.Presence);
                        
                    </script> 
                    <?php } ?>
                    
                    
                     <center>
            <!-- Aqui se muestra la Imagen -->
            <img style="max-width: 300px;" src="<?php echo $ruta = '../obras_fotos/';
                echo $foto; ?>"  />
        </center>
                    
                    
                    </td>    </tr>
            <tr>
                <td class="ui-state-hover">Estatus <span style="color: #D14;">*</span></td>
                <td>  
                    <select name="estatus" id="estatus">
                        <option value="">Seleccione</option>
                            <?php while ($list = mysql_fetch_array($lista_estatus)) { ?>

                            <option <?php
                            if ($list['id_lista_estatus_obras'] == @$estatus) {
                                echo 'selected';
                            }
                            ?> value="<?php echo $list['id_lista_estatus_obras']; ?>"><?php echo ucfirst($list['estatus_obras']); ?></option>
    <?php echo $list['id_lista_estatus_obras'];
} ?>
                    </select>

<?php echo $registrar->estatus; ?> 
                    <!-- Validacion de campo -->
                    <script type="text/javascript">
                        var estatus = new LiveValidation('estatus');
                        estatus.add(Validate.Presence);
                    </script>
                </td>
            </tr>
        </table>
        <p>
            <br />
	   <input type="button" name="volver" id="volver" value="&lt;&lt;Volver" onclick="location.href='consulta_obras.php'" />
                <!-- Boton de Enviar -->
			<?php 
			if ($_REQUEST["eliminar"]!='si')
			{
			?>
            <input type="submit" name="guardar" id="guardar " value="Guardar" />
			<?php 
			}
			elseif ($_REQUEST["eliminar"]=='si')
			{
			?>
			<script language="javascript">
			function seguroobra()
			{
				if(confirm("Est\u00e1 seguro que desea eliminar \u00e9sta obra? \n\n S\u00ed (Aceptar) / No (Cancelar)")) 
					return true;
              	else 
               		return false;
			}
			</script>
			<input type="submit" name="guardar" id="guardar " value="Eliminar" onclick="return seguroobra()"/>
			<?php
			}
			?>
        </p>
        <!-- comentado el mensaje de campos obligatorios-->
<div align="center"></div>
<p>Los campos con <span style="color: #D14;">(*)</span> son Obligatorios</p>
<br />
    </form>
</div>

