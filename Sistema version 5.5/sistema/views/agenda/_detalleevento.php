<div align="center">
<table width="40%" style="background-color: #FFF;" border="1">
        <tr>
            <td class="ui-state-hover">
                <strong>Nombre</strong>
            </td>
            <td>
                <?php echo $lista['nombre']; ?>
            </td>
        </tr>
        <tr>
            <td class="ui-state-hover">
                <strong>Descripcion</strong>
            </td>
            <td>
                <?php echo $lista['descripcion']; ?>
            </td>
        </tr>
        <tr>
            <td class="ui-state-hover">
                <strong>Lugar</strong>
            </td>
            <td>
                <?php echo $lista['lugar']; ?>
            </td>
        </tr>
        <tr>
            <td class="ui-state-hover">
                <strong>Estado/Dependencia</strong>
            </td>
            <td>
                <?php 
                 $class_estados = new Estados();
                $class_usuario = new Usuarios();
                
                $valor_estado = $class_estados->detalle($lista['estado']);
                echo $valor_estado['nombre']; ?>
            </td>
        </tr>
        <tr>
            <td class="ui-state-hover">
                <strong>Usuario Encargado</strong>
            </td>
            <td>
                <?php  $valor_usuario = $class_usuario->detalle2($lista['usuario_encargado']);
                        echo $valor_usuario['usuario']; ?>
            </td>
        </tr>
        <tr>
            <td class="ui-state-hover">
                <strong>Desde</strong>
            </td>
            <td>
                <?php echo Ajustefecha($lista['fecha_evento_inicio']) . ' ' . $lista['hora_inicio']; ?>
            </td>
        </tr>
        <tr>
            <td class="ui-state-hover">
                <strong>Hasta</strong>
            </td>
            <td>
                <?php echo Ajustefecha($lista['fecha_evento_fin']) . ' ' . $lista['hora_fin']; ?>
            </td>
        </tr>
        <tr>
            <td class="ui-state-hover">
                <strong>Estatus</strong>
            </td>
            <td>
                <?php echo $lista['estatus'] == 1 ? 'Activo' : 'Inactivo'; ?>
            </td>
        </tr>
    </table>

</div>
   