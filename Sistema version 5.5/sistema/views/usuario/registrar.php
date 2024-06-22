<div align="center">
    <!-- Titulo de la pam -->
    <h1 style="color: #467aa7;"> 
        <?php
        if ($editar == 'si') {
            if ($_REQUEST["eliminar"] != 'si')
                echo 'Modificar Artista';
            elseif ($_REQUEST["eliminar"] == 'si')
                echo 'Eliminar Artista';
        } elseif ($editar == 'no') {
            echo 'Registrar Usuario';
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
        if ($_REQUEST["eliminar"] != 'si')
            echo 'usuario.php?id=' . @$id;
        elseif ($_REQUEST["eliminar"] == 'si')
            echo 'usuario.php?id=' . @$id . "&eliminar=si";
    } else {
        echo 'usuario.php';
    }
    ?>" method="post" name="form">

        <table width="80%" border="1" style="background-color: #F2F3FF">
            <tr>
                <td class="ui-state-hover">Cedula de Identidad <span style="color: #D14;">*</span></td>
                <td>
<?php if ($editar == "no") { ?>
                        <select name="tipo_cedula" id="tipo_cedula">
                            <option <?php echo @$tipo_cedula == 'v' ? 'selected' : ''; ?> value="v">V</option>
                            <option <?php echo @$tipo_cedula == 'e' ? 'selected' : ''; ?> value="e">E</option>
                        </select>
                    <?php } else { ?>
                        <input autocomplete="off" name="tipo_cedula" type="hidden" value="<?php echo @$tipo_cedula; ?>" />
                    <?php } ?>
                    <input autocomplete="off" class="solonumeros" name="num_cedula"  id="num_cedula" value="<?php echo @$num_cedula; ?>" size="8" maxlength="8"  type="<?php echo $editar == "si" ? 'hidden' : 'text'; ?>" />
                    <?php echo $editar == "si" ? ucfirst(@$tipo_cedula) . @$num_cedula : ''; ?>
                        <?php if ($editar == "no") { ?>
                        <span class=" LV_validation_message LV_invalid">
                            <?php echo @$error_cedula; ?>       
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
                <td  class="ui-state-hover">Nombre <span style="color: #D14;">*</span></td>
                <td><input autocomplete="off" class="sololetrasespacio" name="nombre" type="text" id="nombre" value="<?php echo @$nombre; ?>" size="30" maxlength="30" />
                    <span class=" LV_validation_message LV_invalid">
<?php echo $registrar->nombre; ?> 
                    </span>
                    <!-- Validacion de campo -->
                    <script type="text/javascript">
                        var nombre = new LiveValidation('nombre');
                        nombre.add(Validate.Presence);
                        nombre.add(Validate.Length, {minimum: 2});
                        nombre.add(Validate.Length, {maximum: 30});
                        nombre.add(Validate.Format, {pattern: /[a-zA-Z]/i});

                    </script> 
                </td>
            </tr>

            <tr>
                <td  class="ui-state-hover">Apellido <span style="color: #D14;">*</span></td>
                <td><input autocomplete="off" class="sololetrasespacio"  name="apellido" type="text" id="apellido" value="<?php echo @$apellido; ?>" size="30" maxlength="30" />
                    <span class=" LV_validation_message LV_invalid">
<?php echo $registrar->apellido; ?> 
                    </span>
                    <!-- Validacion de campo -->
                    <script type="text/javascript">
                        var apellido = new LiveValidation('apellido');
                        apellido.add(Validate.Presence);
                        apellido.add(Validate.Length, {minimum: 2});
                        apellido.add(Validate.Length, {maximum: 30});
                        apellido.add(Validate.Format, {pattern: /[a-zA-Z]/i});
                    </script> 
                </td>
            </tr>

            <tr>
                <td  class="ui-state-hover">Usuario <span style="color: #D14;">*</span></td>
                <td><input autocomplete="off" class="sololetrasynumeros"  name="usuario" type="text" id="usuario" value="<?php echo @$usuario1; ?>" size="30" maxlength="30" />

                    <span class=" LV_validation_message LV_invalid">
<?php echo @$error_usuario; ?> 
                    </span>
                    <!-- Validacion de campo -->
                    <script type="text/javascript">
                        var usuario = new LiveValidation('usuario');
                        usuario.add(Validate.Presence);

                    </script> 
                </td>
            </tr>
            <tr>
                <td  class="ui-state-hover">Contraseña <span style="color: #D14;">*</span></td>
                <td><input autocomplete="off" name="clave" type="password" id="clave" value="" size="30" maxlength="30" />

                    <span class=" LV_validation_message LV_invalid">
<?php echo $registrar->clave; ?> 
                    </span>
                    <!-- Validacion de campo -->
                    <script type="text/javascript">
                        var clave = new LiveValidation('clave');
                        clave.add(Validate.Presence);
                        clave.add(Validate.Length, {minimum: 8});

                    </script> 
                </td>
            </tr>
            <tr>
                <td  class="ui-state-hover">Confirmar Contraseña <span style="color: #D14;">*</span></td>
                <td><input autocomplete="off" name="clave2" type="password" id="clave2" value="" size="30" maxlength="30" />

                    <span class=" LV_validation_message LV_invalid">
<?php echo $registrar->clave2; ?> 
                    </span>
                    <!-- Validacion de campo -->
                    <script type="text/javascript">
                        var clave2 = new LiveValidation('clave2');
                        clave2.add(Validate.Presence);
                        clave2.add(Validate.Length, {minimum: 8});
                        clave2.add(Validate.Confirmation, {match: 'clave'});


                    </script> 
                </td>
            </tr>

            <tr>
                <td  class="ui-state-hover">Telefono/Contacto <span style="color: #D14;">*</span></td>
                <td><input autocomplete="off" class="solonumeros" name="telefono" type="text" id="telefono" value="<?php echo @$telefono; ?>" size="30" maxlength="30" />

                    <span class=" LV_validation_message LV_invalid">
<?php echo $registrar->telefono; ?> 
                    </span>
                    <!-- Validacion de campo -->
                    <script type="text/javascript">
                        var telefono = new LiveValidation('telefono');

                        telefono.add(Validate.Numericality, {onlyInteger: true});
                    </script> 
                </td>
            </tr>

            <tr>
                <td class="ui-state-hover">Correo Electronico <span style="color: #D14;">*</span></td>
                <td><input autocomplete="off" name="email" type="text" id="email" value="<?php echo @$email; ?>" size="30" maxlength="30" />
                    <span class=" LV_validation_message LV_invalid"> <?php echo $registrar->email; ?> </span>

                    <!-- Validacion de campo -->
                    <script type="text/javascript">
                        var email = new LiveValidation('email');
                        email.add(Validate.Presence);
                        email.add(Validate.Email);
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
                            }
                            ?>
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
            <input type="button" name="volver" id="volver" value="&lt;&lt;Volver" onclick="location.href = 'consulta_usuarios.php'" />
            <?php
            if ($_REQUEST["eliminar"] != 'si') {
                ?>
                <input type="submit" name="guardar" id="guardar" value="Guardar" />
                <?php
            } elseif ($_REQUEST["eliminar"] == 'si') {
                ?>
                <script language="javascript">
                function seguroartista()
                {
                    if (confirm("Est\u00e1 seguro que desea eliminar \u00e9ste artista? \n\n S\u00ed (Aceptar) / No (Cancelar)"))
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

    











