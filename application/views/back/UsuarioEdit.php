<br>
<br>

 <!--formulario-->
<div class="w3-container w3-margin-right w3-margin-left">
    <h2 class="w3-panel w3-blue-grey w3-card-4">Editar Usuario</h2>
    <div class="w3-container">
        <form action="<?php echo htmlspecialchars(RUTA . "usuario/edit/" . $resultado[0][0]) ?>" method = "POST">
            <p>
                <input type = "text" id="c0" value="<?php echo $resultado[0][0] ?>" title="Codigo" readonly="" name = "c0" maxlength="45" placeholder = "Documento" class="w3-input w3-border" />
            </p>

            <p>
                <input type = "text" title="Documento" id="c1" required="" value="<?php echo $resultado[0][1] ?>" name = "c1" maxlength="45" placeholder = "Documento" class="w3-input w3-border" />
            </p>
            <p>
                <input type = "text" title="Nombre" id="c2" required="" value="<?php echo $resultado[0][2] ?>" name = "c2" maxlength="45" placeholder = "Nombre" class="w3-input w3-border" />
            </p>

            <p>
                
            </p>
            <p>
                <input required="" type = "email" id="c4" title="Correo" value="<?php echo $resultado[0][4] ?>" name = "c4" maxlength="45" placeholder = "Correo" class="w3-input w3-border" />
            </p>
            <p>
                <input required="" type = "password" id="c5" title="Password" value="<?php echo $resultado[0][5] ?>" name = "c5" maxlength="150" placeholder = "Password" class="w3-input w3-border" />
            </p>
            <p>
                <input type = "text" id="c6" title="Direccion" value="<?php echo $resultado[0][6] ?>" name = "c6" maxlength="80" placeholder = "Direccion" class="w3-input w3-border" />
            </p>
            <p>
                <input type = "tel" id="c7" title="Telefono" value="<?php echo $resultado[0][7] ?>" name = "c7" maxlength="45" placeholder = "Telefono" class="w3-input w3-border" />
            </p>

            <p>
                <input type = "submit" id="c8"  name = "c8" value="Guardar" class="w3-button w3-blue-grey">
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
