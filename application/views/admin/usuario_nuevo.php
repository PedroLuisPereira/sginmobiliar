<br>

<div class="w3-container w3-margin w3-card-4">

    <header class="w3-container" style="padding-top:22px">
        <h3><b><i class="fa fa-users fa-fw"></i><?php echo $titulo ?></b></h3>
    </header>


    <div class="w3-container">
        <form onsubmit="return formUsuarioSet()" method = "POST">
            <h3 class="w3-panel w3-blue w3-card-4">Datos Básicos</h3>
            <p>
                <input type = "text" id="c1" title="Documento"  name = "c1" maxlength="45"  required="" placeholder = "Documento" class="w3-input w3-border" />
            </p>
            <p>
                <input type = "text" id="c2" title="Nombre"  name = "c2" maxlength="45" required="" placeholder = "Nombre" class="w3-input w3-border" />
            </p>

            <p>
                <select title="Rol" name = "c3" id="c3" class="w3-select" >
                    <option value="--Rol--">--Rol--</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Usuario" >Usuario</option>
                </select>
            </p>
            <p>
                <input type = "email" id="c4" title="Correo"  name = "c4" maxlength="45" required="" placeholder = "Correo" class="w3-input w3-border" />
            </p>
            <p>
                <input type = "password" id="c5" title="Password"  name = "c5" maxlength="150" required="" placeholder = "Password" class="w3-input w3-border" />
            </p>
            <p>
                <input type = "text" id="c6" title="Dirección"  name = "c6" maxlength="80" placeholder = "Direccion" class="w3-input w3-border" />
            </p>
            <p>
                <input type = "tel" id="c7" title="Teléfono"  name = "c7" maxlength="45" placeholder = "Telefono" class="w3-input w3-border" />
            </p>

            <p>
                <a class="w3-button w3-blue-grey" c  href="<?php echo base_url(). 'admin/usuario';?>">Atras</a>
                <input type = "submit" value="Guardar" class="w3-button w3-deep-orange">
            </p>
        </form>
    </div>
</div>





