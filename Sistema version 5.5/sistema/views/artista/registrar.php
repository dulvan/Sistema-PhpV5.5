<div align="center">
    <!-- Titulo de la pam -->
<h1 style="color: #467aa7;"> 
    <?php if ($editar == 'si') {
				if ($_REQUEST["eliminar"] != 'si')
					echo 'Modificar Artista';
				elseif ($_REQUEST["eliminar"] == 'si')
					echo 'Eliminar Artista';
} elseif ($editar == 'no') {
    echo 'Registrar Artistas';
}
?>
</h1>
        <br />
        <!--
    <p>Los campo con <span style="color: #D14;">*</span> son Obligatorios</p>
        -->
    <!-- Formulario -->
<form action="<?php
if ($editar == 'si') {
	if ($_REQUEST["eliminar"]!='si'){
    	echo 'artista.php?id=' . @$_GET['id'];
        } elseif ($_REQUEST["eliminar"]=='si') {
    	echo 'artista.php?id=' . @$_GET['id']."&eliminar=si";
        }
} else {
    echo 'artista.php';
}
?>" method="post" name="form" >

    <table width="80%" border="1" style="background-color: #F2F3FF">
            <tr>
                <td class="ui-state-hover">Cedula de Identidad <!--<span style="color: #D14;">*</span>--></td>
                <td>
                    <?php if($editar=="no") { ?>
                    <select name="tp_cedula" id="tp_cedula">
                        <option <?php echo @$tp_cedula == 'v' ? 'selected' : ''; ?> value="v">V</option>
                        <option <?php echo @$tp_cedula == 'e' ? 'selected' : ''; ?> value="e">E</option>
                    </select>
                    <?php } else { ?>
                    <input autocomplete="off" name="tp_cedula" type="hidden" value="<?php echo @$tp_cedula; ?>" />
                    <?php }  ?>
                    <input autocomplete="off" name="num_cedula" class="solonumeros"  id="num_cedula" value="<?php echo @$num_cedula; ?>" size="8" maxlength="8"  type="<?php echo $editar=="si"? 'hidden':'text'; ?>" />
                    <?php echo $editar=="si"? ucfirst(@$tp_cedula).@$num_cedula:''; ?>
                     <?php if($editar=="no") { ?>
                    <span class=" LV_validation_message LV_invalid">
<?php echo $registrar->tp_cedula; ?>       
<?php echo $registrar->num_cedula; ?>
                    </span>
    
                     <!-- Validacion de campo -->
                    <script type="text/javascript">
                        var num_cedula = new LiveValidation('num_cedula');
                        num_cedula.add(Validate.Presence);
                        num_cedula.add(Validate.Length, {minimum: 7});
                        num_cedula.add(Validate.Numericality, {minimum: 1000000});
                        num_cedula.add(Validate.Numericality, {onlyInteger: true});
                    </script> 
                    <?php } ?>

                </td>
            </tr>

            <tr>
                <td  class="ui-state-hover">Nombre del Artista <span style="color: #D14;">*</span></td>
                <td><input autocomplete="off" class="sololetrasespacio" name="nombre" type="text" id="nombre" value="<?php echo @$nombre; ?>" size="30" maxlength="30" />
                    <span class=" LV_validation_message LV_invalid">
<?php echo $registrar->nombre; ?> 
                    </span>
                     <!-- Validacion de campo -->
                    <script type="text/javascript">
                        var nombre = new LiveValidation('nombre');
                        nombre.add(Validate.Presence);
                        nombre.add(Validate.Length, {minimum: 4});
                        nombre.add(Validate.Length, {maximum: 30});
                        nombre.add(Validate.Format, {pattern: /[a-zA-Z]/i});

                    </script> 
                </td>
            </tr>

            <tr>
                <td  class="ui-state-hover">Apellido del Artista <span style="color: #D14;">*</span></td>
                <td><input autocomplete="off" class="sololetrasespacio" name="apellido" type="text" id="apellido" value="<?php echo @$apellido; ?>" size="30" maxlength="30" />
                    <span class=" LV_validation_message LV_invalid">
<?php echo $registrar->apellido; ?> 
                    </span>
                     <!-- Validacion de campo -->
                    <script type="text/javascript">
                        var apellido = new LiveValidation('apellido');
                        apellido.add(Validate.Presence);
                        apellido.add(Validate.Length, {minimum: 4});
                        apellido.add(Validate.Length, {maximum: 30});
                        apellido.add(Validate.Format, {pattern: /[a-zA-Z]/i});
                    </script> 
                </td>
            </tr>

            <tr>
                <td  class="ui-state-hover">Direccion <span style="color: #D14;">*</span></td>
                <td ><textarea name="direccion" cols="40" id="direccion"><?php echo @$direccion; ?></textarea>
                    <span class=" LV_validation_message LV_invalid">
<?php echo $registrar->direccion; ?> 
                    </span>
                     <!-- Validacion de campo -->
                    <script type="text/javascript">
                        var direccion = new LiveValidation('direccion');
                        direccion.add(Validate.Presence);
                    </script> 
                </td>
            </tr>

            <tr>
                <td  class="ui-state-hover">Estado/Dependencia <span style="color: #D14;">*</span></td>
                <td>  
                    <select name="estado" id="estado">
                        <option value="">Seleccione</option>
<?php while ($lista = mysql_fetch_array($lista_estados)) { ?>

                            <option <?php
    if ($lista['id_estados'] == @$estado) {
        echo 'selected';
    }
    ?> value="<?php echo $lista['id_estados'] ?>"><?php echo $lista['nombre'] ?></option>
<?php } ?>
                    </select>
                    <span class=" LV_validation_message LV_invalid">
<?php echo $registrar->estado; ?> 
                    </span>
                     <!-- Validacion de campo -->
                    <script type="text/javascript">
                        var estado = new LiveValidation('estado');
                        estado.add(Validate.Presence);
                    </script> 
                </td>
            </tr>

            <tr>
                <td  class="ui-state-hover">Telefono/Contacto <span style="color: #D14;">*</span></td>
                <td><input class="solonumeros" name="telefono" type="text" id="telefono" value="<?php echo @$telefono; ?>" size="30" maxlength="30" />
                    
                    <span class=" LV_validation_message LV_invalid">
<?php echo $registrar->telefono; ?> 
                    </span>
                      <!-- Validacion de campo -->
                    <script type="text/javascript">
                        var telefono = new LiveValidation('telefono');
                        telefono.add(Validate.Presence);
                        telefono.add(Validate.Numericality, {onlyInteger: true});
                    </script> 
                </td>
            </tr>

            <tr>
                <td class="ui-state-hover">Correo Electronico <span style="color: #D14;">*</span></td>
                <td><input autocomplete="off" name="correo" type="text" id="correo" value="<?php echo @$correo; ?>" size="30" maxlength="30" />
                    <span class=" LV_validation_message LV_invalid"> <?php echo $registrar->correo; ?> </span>
                   
                     <!-- Validacion de campo -->
                     <script type="text/javascript">
                        var correo = new LiveValidation('correo');
                        correo.add(Validate.Presence);
                        correo.add(Validate.Email);
                    </script> 
                </td>
            </tr>

            <tr>
                <td class="ui-state-hover">Numero de obras <span style="color: #D14;">*</span></td>
                <td><input autocomplete="off" class="solonumeros" name="num_obras" type="text" id="num_obras" value="<?php echo @$num_obras; ?>" size="3" maxlength="3" />
                    <span class=" LV_validation_message LV_invalid"><?php echo $registrar->num_obras; ?> </span>
                     <!-- Validacion de campo -->
                    <script type="text/javascript">
                        var num_obras = new LiveValidation('num_obras');
                        num_obras.add(Validate.Presence);
                        num_obras.add(Validate.Numericality);
                    </script> 
                </td>
            </tr>
            <tr>
                <td class="ui-state-hover">Estatus <span style="color: #D14;">*</span></td>
                <td>  
                    <select name="estatus" id="estatus">
                        <option value="">Seleccione</option>
                        <?php while ($list = mysql_fetch_array($listado_estatus)) { ?>

                            <option <?php
                        if ($list['id_lista_estatus_artista'] == @$estatus) {
                            echo 'selected';
                        }
                        ?> value="<?php echo $list['id_lista_estatus_artista']; ?>"><?php echo ucfirst($list['estatus_artista']); ?></option>
    <?php echo $list['id_lista_estatus_artista'];
} ?>
                    </select>
                    <span class=" LV_validation_message LV_invalid">
<?php echo $registrar->estatus; ?> 
                    </span>
                     <!-- Validacion de campo -->
                    <script type="text/javascript">
                        var estatus = new LiveValidation('estatus');
                        estatus.add(Validate.Presence);
                    </script> 
                </td>
            </tr>
        </table>
     <!-- Boton de Enviar -->
        <p>
            <br />
			<input type="button" name="volver" id="volver" value="&lt;&lt;Volver" onclick="location.href='consulta_artista.php'" />
			<?php 
			if ($_REQUEST["eliminar"]!='si')
			{
			?>
            <input type="submit" name="guardar" id="guardar" value="Guardar" />
			<?php 
			}
			elseif ($_REQUEST["eliminar"]=='si')
			{
			?>
			<script language="javascript">
			function seguroartista()
			{
				if(confirm("Est\u00e1 seguro que desea eliminar \u00e9ste artista? \n\n S\u00ed (Aceptar) / No (Cancelar)")) 
					return true;
              	else 
               		return false;
			}
			</script>
			
			<input type="submit" name="guardar" id="guardar" value="Eliminar"  onclick="return seguroartista()"/>
			<?php
			}
			?>
        </p>
        <!-- comentado el mensaje de campos obligatorios-->
<div align="center"></div>
<p>Los campos con <span style="color: #D14;">(*)</span> son Obligatorios</p>
<br />
    </div>

</form>
