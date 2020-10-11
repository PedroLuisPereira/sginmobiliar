<!-- contenido-->
<br>

<div class="w3-container w3-margin-top">
    <div class="w3-row">
        <div class="w3-col s2 w3-left">
            <a class="w3-button w3-blue" title="Agregar Usuario" href="<?php echo base_url() ?>admin/usuario/nuevo">+Usuario</a>
        </div>
        <div class="w3-col s4 w3-center">
            &nbsp
        </div>
        <form>
            <div class="w3-col s6">
                <div w3-rigth >
                    <div class="w3-half ">
                        <input class="w3-input w3-border" name="valor" value="<?php echo $valor ?>" type="search" placeholder="Buscar">
                    </div>
                    <div class="w3-half  ">
                        <input class="w3-button w3-border w3-blue" type="submit" value="Buscar" >
                    </div>
                </div>
            </div>
        </form>
    </div>



    <div class="w3-responsive">
        <table class="w3-table-all w3-margin-top ">
            <thead>
                <tr class="w3-dark-grey"> 
                    <th>Codigo</th>
                    <th>Documento</th>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <?php foreach ($usuarios as $key => $value) : ?>
                <tr>
                    <th><?php echo $value->idusuario ?></th>
                    <th><?php echo $value->documento ?></th>
                    <th><?php echo $value->nombre ?></th>
                    <th><?php echo $value->rol ?></th>
                    <th><?php echo $value->estado ?></th>
                    <th><?php echo $value->correo ?></th>
                    <th><?php echo $value->direccion ?></th>
                    <th><?php echo $value->telefono ?></th>
                    <th>
                        <a class="w3-button w3-deep-orange" title="Editar Usuario" href="<?php echo base_url() ?>admin/usuario/editar/<?php echo $value->idusuario ?>"><i class="fa fa-edit"></i></a>
                        <a class="w3-button w3-green" title="Password" href="<?php echo base_url() ?>admin/usuario/password/<?php echo $value->idusuario ?>"><i class="fa fa-check-square"></i></a>
                        <a class="w3-button w3-red" title="Eliminar Usuario" href="<?php echo base_url() ?>admin/usuario/eliminar/<?php echo $value->idusuario ?>"><i class="fa fa-times-circle"></i></a>
                    </th>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<!--  fin contenido-->
