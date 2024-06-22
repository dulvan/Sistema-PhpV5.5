 <table width="40%" style="background-color: #FFF;" border="1">
        <tr>
            <td class="ui-state-hover">Artista</td>
            <td class="ui-state-hover">Obra</td>
        </tr>
        <?php while ($valor = mysql_fetch_array($listado_obras_artista)) { ?>
            <tr>
                <td><?php echo ucfirst($valor['apellido']) . ' ' . ucfirst($valor['nombre']); ?></td>
              <!--  <td><a href="detalle_artista.php?id=<?php echo $valor['id_artistas']; ?>">Ver</a></td> -->
                <td><?php echo ucfirst($valor['titulo']); ?></td>
               <!--   <td><a href="detalle_obra.php?id="<?php echo $valor['id_obras']; ?>>Ver</a></td> -->

            </tr>


        <?php }
        ?>

    </table>