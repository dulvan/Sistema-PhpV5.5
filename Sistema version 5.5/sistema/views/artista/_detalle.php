<table width="40%" style="background-color: #FFF;" border="1">
        <tr>
            <td class="ui-state-hover">
                <strong>Cedula de Identidad</strong>
            </td>
            <td>
                <?php echo ucfirst($lista['tp_cedula']) . $lista['num_cedula']; ?>
            </td>
        </tr>
        <tr>
            <td class="ui-state-hover"><strong>Nombre del Artista</strong></td>
            <td>
                <?php echo ucfirst($lista['nombre']); ?>
            </td>
        </tr>
        <tr>
            <td class="ui-state-hover" >
                <strong>Apellido del Artista</strong>
            </td>
            <td>
                <?php echo ucfirst($lista['apellido']); ?>
            </td>
        </tr>
        <tr>
            <td class="ui-state-hover">
                <strong>Direccion</strong>
            </td>
            <td>
                <?php echo ucfirst($lista['direccion']); ?>
            </td>
        </tr>
        <tr>
            <td class="ui-state-hover">
                <strong>Estado/Dependencia</strong>
            </td>
            <td>  
                <?php echo $lista['estados']; ?>
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
                <strong>Correo Electronico</strong>
            </td>
            <td>
                <?php echo $lista['correo']; ?>
            </td>
        </tr>
        <tr>
            <td class="ui-state-hover" >
                <strong>Numero de obras</strong>
            </td>
            <td>
                <?php echo $lista['num_obras']; ?>
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