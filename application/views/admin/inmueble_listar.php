<!-- contenido-->
<br>


<div class="w3-container w3-margin-top">
    <div class="w3-row">

        <div class="w3-col s2 w3-left">
            <a class="w3-button w3-blue" title="Publicar Inmueble" href="<?php echo base_url() ?>admin/inmueble/nuevo">+ Inmueble</a>
        </div>

        <div class="w3-col s1 w3-center">
            &nbsp
        </div>

        <div class="w3-col s9 w3-right ">
            <form>
                <div class="w3-half ">
                    <input class="w3-input w3-border" value="<?php echo $valor ?>"  name="valor" type="search" placeholder="Buscar">
                </div>
                <div class="w3-half  ">
                    <input class="w3-button w3-border w3-blue" type="submit" value="Buscar" >
                </div>
            </form>
        </div>


    </div>

    <div class="w3-responsive">
        <table class="w3-table-all w3-margin-top ">
            <thead>
                <tr class="w3-dark-grey"> 
                    <th>Codigo</th>
                    <th>Estado</th>
                    <th>Oferta</th>
                    <th>Tipo</th>
                    <th>Valor Arriendo</th>
                    <th>Valor Venta</th>
                    <th>Ciudad</th>
                    <th>Barrio</th>
                    <th>Opciones</th>
                </tr>
            </thead>

            <?php foreach ($registros as $key => $value) : ?>
                <tr>
                    <th><a href="#"><?php echo $value->idinmueble ?></a></th>
                    <th><?php echo $value->estado ?></th>
                    <th><?php echo $value->oferta ?></th>
                    <th><?php echo $value->tipo ?></th>
                    <th><?php echo number_format($value->valorarriendo) ?></th>
                    <th><?php echo number_format($value->valorventa) ?></th>
                    <th><?php echo $value->ciudad ?></th>
                    <th><?php echo $value->barrio ?></th>
                    <th>
                        <a class="w3-button w3-deep-orange" title="Editar" href="<?php echo base_url() ?>admin/inmueble/editar/<?php echo $value->idinmueble ?>"><i class="fa fa-edit"></i></a>
                        <a class="w3-button w3-green" title="Ver Fotos" href="<?php echo base_url() ?>admin/fotos/ver/<?php echo $value->idinmueble ?>"><i class="fa fa-camera"></i></a>
<!--                        <a class="w3-button w3-red" title="Eliminar Inmueble" href="<?php echo base_url() ?>admin/panel<?php echo $value->idinmueble ?>"><i class="fa fa-times-circle"></i></a>-->
                    </th>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<!--  fin contenido-->
