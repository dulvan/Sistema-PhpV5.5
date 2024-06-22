<?php $class_usuario = new Usuarios(); ?>

<table width="40%" style="background-color: #FFF;" border="1">

    <tr>
        <td class="ui-state-hover" >
            <strong>Usuario</strong>
        </td>
        <td>
            <?php $valor_usuario = $class_usuario->detalle2($lista['usuario']);
            echo $valor_usuario['usuario'];
            ?>
        </td>
    </tr>
    <tr>
        <td class="ui-state-hover" >
            <strong>Fecha</strong>
        </td>
        <td>
<?php echo Ajustefecha($lista['fecha_reg']); ?>
        </td>
    </tr>
    <tr>
        <td class="ui-state-hover" >
            <strong>Hora</strong>
        </td>
        <td>
<?php echo $lista['hora_reg']; ?>
        </td>
    </tr>
    <tr>
        <td class="ui-state-hover" >
            <strong>Tabla</strong>
        </td>
        <td>
<?php echo $lista['tabla']; ?>
        </td>
    </tr>
    <tr>
        <td class="ui-state-hover" >
            <strong>Operacion</strong>
        </td>
        <td>
<?php echo $lista['operacion']; ?>
        </td>
    </tr>
    <tr>
        <td class="ui-state-hover" >
            <strong>Direccion IP</strong>
        </td>
        <td>
<?php echo $lista['direccion_ip']; ?>
        </td>
    </tr>
    <tr>
        <td class="ui-state-hover" >
            <strong>Observacion</strong>
        </td>
        <td>
<?php echo $lista['observacion']; ?>
        </td>
    </tr>

</table>

<br /><br />







