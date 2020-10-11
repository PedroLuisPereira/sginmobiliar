<br>
<br>
<br>


<!--tabla-->
<div class="w3-container">
    <div class="w3-responsive">
        <table class="w3-table-all">
            <thead>
                <tr class="w3-blue-grey">
                    <th>Código</th>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Correo</th>
                    <th>Contra</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <?php foreach ($resultado as $campo): ?>
            <tr>
                <td><?php echo $campo[0]?></td>
                <td><?php echo $campo[1]?></td>
                <td><?php echo $campo[2]?></td>
                <td><?php echo $campo[3]?></td>
                <td><?php echo $campo[4]?></td>
                <td><?php echo $campo[5]?></td>
                <td><?php echo $campo[6]?></td>
                <td><?php echo $campo[7]?></td>
                <td><a href='<?php echo RUTA."usuario/edit/".$campo[0] ?>' class="w3-button w3-blue" >Editar</a></td>
                <td><a href='<?php echo RUTA."usuario/delete/".$campo[0] ?>' class="w3-button w3-red" >Eliminar</a></td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>

<br>
