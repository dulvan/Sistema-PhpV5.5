<table width="40%" style="background-color: #FFF;" border="1">
        <tr>
            <td class="ui-state-hover">
                <strong>Cedula de Identidad</strong>
            </td>
            <td>
                <?php echo ucfirst($lista['tipo_cedula']) . $lista['num_cedula']; ?>
            </td>
        </tr>
        <tr>
            <td class="ui-state-hover"><strong>Nombre</strong></td>
            <td>
                <?php echo ucfirst($lista['nombre']); ?>
            </td>
        </tr>
        <tr>
            <td class="ui-state-hover" >
                <strong>Apellido</strong>
            </td>
            <td>
                <?php echo ucfirst($lista['apellido']); ?>
            </td>
        </tr>
                <tr>
            <td class="ui-state-hover" >
                <strong>Usuario</strong>
            </td>
            <td>
                <?php echo $lista['usuario']; ?>
            </td>
        </tr>
        <tr>
            <td class="ui-state-hover">
                <strong>Correo Electronico</strong>
            </td>
            <td>
                <?php echo ucfirst($lista['email']); ?>
            </td>
        </tr>
        <tr>
            <td class="ui-state-hover" >
                <strong>Telefono/Contacto</strong>
            </td>
            <td>
                <?php echo $lista['telefono']; ?>
            </td>
        </tr>
        <tr>
            <td class="ui-state-hover" >
                <strong>Estatus</strong>
            </td>
            <td>
                <?php echo $lista['estatus']==1?'Activo':'Inactivo'; ?>
            </td>
        </tr>
    </table>