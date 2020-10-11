<br>
<br>
<br>

<div class="w3-row">
    <div class="w3-col l4 m2 s1 "><p></p></div>
    <form action="<?php echo RUTA . 'inmueble/getAll' ?> ">
        <div class="w3-col l6 m7 s7  w3-center"><input class="w3-input w3-border" placeholder="Buscar inmueble..." name="valor" type="search"></div>
        <div class="w3-col l2 m3 s4  w3-right"><input class="w3-button w3-blue w3-round-xlarge" style="margin-left: 15px" type="submit" value="Buscar" ></div>
    </form>
</div>


<br>

<!--tabla-->
<div class="w3-container">
    <div class="w3-responsive">
        <table class="w3-table-all">
            <thead>
                <tr class="w3-blue-grey">
                    <th>Código</th>
                    <th>Estado</th>
                    <th>Oferta</th>
                    <th>Tipo</th>
                    <th>Valor Arriendo</th>
                    <th>Valor Venta</th>
                    <th>Valor Admin</th>
                    <th>Ciudad</th>
                    <th>Barrio</th>
                    <th>Editar</th>
                    <th>Fotos</th>
                </tr>
            </thead>
            <?php foreach ($resultado as $campo): ?>
                <tr>
                    <td><?php echo $campo[0] ?></td>
                    <td><?php echo $campo[1] ?></td>
                    <td><?php echo $campo[2] ?></td>
                    <td><?php echo $campo[3] ?></td>
                    <td><?php echo number_format($campo[4]) ?></td>
                    <td><?php echo number_format($campo[5]) ?></td>
                    <td><?php echo number_format($campo[6]) ?></td>
                    <td><?php echo $campo[7] ?></td>
                    <td><?php echo $campo[8] ?></td>
                    <td><a href='<?php echo RUTA . "inmueble/edit/" . $campo[0] ?>'class="w3-button w3-teal" >Editar</a></td>
                    <td><a href='<?php echo RUTA . "inmueble/getFotos/" . $campo[0] ?>'class="w3-button w3-indigo" >Fotos</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<br>