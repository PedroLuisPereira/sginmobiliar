
<div class="w3-container w3-padding-64">
    <div class="w3-row">
        
        
        <div class="w3-col m3 l3">
            <p ></p>
        </div>
        
        
        <div class="w3-col m6 l6">
            <div class="w3-card-4">
                <div class="w3-container w3-teal">
                    <h2>Login</h2>
                </div>
                <form class="w3-container" action="<?php echo htmlspecialchars(RUTA . 'usuario/login') ?>" method="POST">
                    <p>      
                        <label class="w3-text-teal"><b>Usuario</b></label>
                        <input class="w3-input w3-border w3-sand" required="" name="correo" type="text"></p>
                    <p>      
                        <label class="w3-text-teal"><b>Contraseña</b></label>
                        <input class="w3-input w3-border w3-sand" required="" name="contra" type="password"></p>
                    <p>
                        <input type = "submit" value = "Ingresar" name = "ingresar" class="w3-btn w3-teal" /></p>
                </form>
            </div>
        </div>
        
        
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
                <h2>Acceso no Permitido, correo o contraseña errados</h2>
            </header>
        </div>
    </div>
</div>


