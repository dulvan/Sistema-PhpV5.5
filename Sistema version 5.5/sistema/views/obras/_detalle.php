  <table width="70%" style="background-color: #FFF;" border="1">
        <tr>
            <td class="ui-state-hover">
                Foto
            </td>                          
            <td class="ui-state-hover">
                Artista
            </td>
            <td><?php
                $art = new Artista();
                $var = $art->busqueda_art($lista['id_artistas']);
                echo ucfirst($var['nombre']) . ' ' . ucfirst($var['apellido']);
                ?>
            </td>
        </tr>
        <tr>
            <td rowspan="9">
        <center>
            <!-- Aqui se muestra la Imagen -->
            <img style="max-width: 300px;" src="<?php echo $ruta = '../obras_fotos/';
                echo $lista['foto']; ?>"  />
        </center>  
        </td>
        <td class="ui-state-hover">
            Codigo UNA
        </td>
        <td>
<?php echo $lista['codigo_una']; ?>
        </td>
        </tr>
        <tr>
            <td class="ui-state-hover" >
                Titulo
            </td>
            <td>
<?php echo $lista['titulo']; ?>
            </td>
        </tr>
        <tr>
            <td class="ui-state-hover">
                Fecha
            </td>
            <td>
<?php echo Ajustefecha($lista['fecha_obra']); ?>
            </td>
        </tr>
        <tr>
            <td class="ui-state-hover">Técnica</td>
            <td><?php echo $lista['tecnica']; ?></td>
        </tr>
        <tr>
            <td class="ui-state-hover">Dimensiones </td>
            <td><?php echo $lista['dimensiones']; ?></td>
        </tr>
        <tr>
            <td class="ui-state-hover">Valor</td>
            <td><?php echo $lista['valor']; ?></td>
        </tr>
        <tr>
            <td class="ui-state-hover">Para la venta</td>
            <td><?php echo $lista['para_la_venta'] == '1' ? 'Si' : 'No'; ?></td>
        </tr>
        <tr>
            <td class="ui-state-hover">Observaciones</td>
            <td><?php echo $lista['observaciones']; ?></td>
        </tr>

        <tr>
            <td class="ui-state-hover"><p><strong>Estatus</strong></td>
            <td> <?php echo $lista['estatus'] == '1' ? 'Activo' : 'Inactivo'; ?>  </td>
        </tr>
    </table>