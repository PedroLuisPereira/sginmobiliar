<br>
<br>

 <!--formulario-->
<div class="w3-container w3-margin-right w3-margin-left">
    <h2 class="w3-panel w3-blue-grey w3-card-4">Nuevo Usuario</h2>
    <div class="w3-container">
        <form onsubmit="return formUsuarioSet()" action="<?php echo htmlspecialchars(RUTA . "usuario/set") ?>" method = "POST">

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
                <input type = "submit" id="c8"  name = "c8" value="Enviar" class="w3-button w3-blue-grey">
            </p>
        </form>
    </div>
</div>

    
 <!--respuesta-->
    <input type="hidden" value="<?php echo $respuesta ?>" id="respuesta"  >


    <!--modal mail -->
    <div>
        <div id="modal" class="w3-modal">
            <div class="w3-modal-content">
                <header class="w3-container w3-teal"> 
                    <span onclick="document.getElementById('modal').style.display = 'none'" 
                          class="w3-button w3-display-topright">&times;</span>
                    <h2><?php echo $respuesta ?></h2>
                </header>
            </div>
        </div>
    </div>

<br>

