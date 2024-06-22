<br />
<br />
<br />


<form id="form1" name="form1" method="post" action="login.php">
    <div align="center">            
        <table width="55%" border="1" style="background-color: #F2F3FF">
            <tr>
                <td rowspan="5" style="text-align: center;"><img src="../web/image/usuario.png" alt="titulo" width="128px" style="margin-top: 16px;" /></td>
                <td class="ui-state-hover" colspan="2">
            <center><strong>Ingreso al Sistema</strong></center>
            </td>
            </tr>
            <tr>
                <td  class="ui-state-hover">
                    Usuario
                </td>
                <td>
                    <input style="width: 95%;" name="usuario" type="text" size="30" maxlength="50" id="usuario" autocomplete="off" />
                    <!-- Validacion de campo -->
                    <script type="text/javascript">
                        var usuario = new LiveValidation('usuario');
                        usuario.add(Validate.Presence);
                    </script> 
                </td>
            </tr>
            <tr>
                <td class="ui-state-hover">
                    Contraseña
                </td>
                <td>
                    <input  style="width: 95%;" name="clave" type="password" id="clave" size="30" maxlength="50" autocomplete="off" />
                    <!-- Validacion de campo -->
                    <script type="text/javascript">
                        var clave = new LiveValidation('clave');
                        clave.add(Validate.Presence);
                    </script> 
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="boton" id="boton" value="Aceptar" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
            <center>
                <span class=" LV_validation_message LV_invalid">
                    <?php
                    //mensaje de error que se imprime
                    echo @$mensaje;
                    ?>
                </span>
            </center>
            </td>
            </tr>
        </table>
    </div>
</form>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />