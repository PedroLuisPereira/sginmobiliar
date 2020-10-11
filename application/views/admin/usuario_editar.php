
<br>

<div class="w3-container w3-margin w3-card-4">
    <header class="w3-container" style="padding-top:22px">
        <h3><b><i class="fa fa-edit"></i><?php echo $titulo ?></b></h3>
    </header>
    <div class="w3-container">
        <form onsubmit="return formUsuarioSet()" method = "POST">
            <h3 class="w3-panel w3-blue w3-card-4">Datos Básicos</h3>
            <p>
                <input type = "hidden" value="<?php echo $registros->idusuario ?>"  id="c0" name = "c0"  />
            </p>
            
            <p>
                <input type = "text" value="<?php echo $registros->documento ?>" id="c1" title="Documento"  name = "c1" maxlength="45"  required="" placeholder = "Documento" class="w3-input w3-border" />
            </p>
            <p>
                <input type = "text" value="<?php echo $registros->nombre ?>" id="c2" title="Nombre"  name = "c2" maxlength="45" required="" placeholder = "Nombre" class="w3-input w3-border" />
            </p>

            <p>
                <select title="Rol" name = "c3" id="c3" class="w3-select" >
                    <option <?php if ($registros->rol == "Administrador") echo "selected" ?> value="Administrador">Administrador</option>
                    <option <?php if ($registros->rol == "Usuario") echo "selected" ?> value="Usuario" >Usuario</option>
                </select>
            </p>
            
            <p>
                <select title="Estado" name = "c4" id="c4" class="w3-select" >
                    <option <?php if ($registros->estado == "Activo") echo "selected" ?> value="Activo">Activo</option>
                    <option <?php if ($registros->estado == "Inactivo") echo "selected" ?> value="Inactivo" >Inactivo</option>
                </select>
            </p>
            <p>
                <input type = "email" value="<?php echo $registros->correo ?>" id="c5" title="Correo"  name = "c5" maxlength="45" required="" placeholder = "Correo" class="w3-input w3-border" />
            </p>
           
            <p>
                <input type = "text" value="<?php echo $registros->direccion ?>" id="c6" title="Dirección"  name = "c6" maxlength="80" placeholder = "Direccion" class="w3-input w3-border" />
            </p>
            <p>
                <input type = "tel" value="<?php echo $registros->telefono ?>" id="c7" title="Teléfono"  name = "c7" maxlength="45" placeholder = "Telefono" class="w3-input w3-border" />
            </p>

            <p>
                <a class="w3-button w3-blue-grey" c  href="<?php echo base_url(). 'admin/usuario';?>">Atras</a>
                <input type = "submit" value="Guardar" class="w3-button w3-deep-orange">
            </p>
        </form>
    </div>
</div>





