<form method="POST" >

<div align="center">

    <h1 style="color: #467aa7;">Cambio de Contraseña</h1>
    
    <br /><br />
    
<table width="80%" border="1" style="background-color: #F2F3FF">


    <tr>
        <td  class="ui-state-hover">Contraseña <span style="color: #D14;">*</span></td>
        <td><input name="clave" type="password" id="clave" value="" size="30" maxlength="30" />

            <span class=" LV_validation_message LV_invalid">
                <?php //echo $registrar->clave; ?> 
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
        <td><input name="clave2" type="password" id="clave2" value="" size="30" maxlength="30" />

            <span class=" LV_validation_message LV_invalid">
                <?php //echo $registrar->clave2; ?> 
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


</table>
    
    <p><span class=" LV_validation_message LV_invalid"><?php echo @$error; ?></span></p>
    
    <br />
    <input type="button" name="volver" id="volver" value="&lt;&lt;Volver" onclick="location.href='index.php'" />
          
    <input type="submit" name="guardar" id="guardar" value="Guardar" />
    <!-- comentado el mensaje de campos obligatorios-->
        <div align="center"></div>
        <p>Los campos con <span style="color: #D14;">(*)</span> son Obligatorios</p>
        <br />
    </div>
    
    </form>