
<br>

<div class="w3-container w3-margin w3-card-4">

    <header class="w3-container" style="padding-top:22px">
        <h3><b><i class="fa fa-edit"></i><?php echo $titulo ?></b></h3>
    </header>

    <div class="w3-container">
        <form enctype="multipart/form-data" onsubmit="return formInmuebleSet()" action="<?php echo htmlspecialchars(base_url() . "admin/panel/password") ?>" method = "POST">

                      
            <p>
                <input type = "password" title="Password actual" id="c3"  name = "p0" maxlength="15" placeholder = "Password actual"  class="w3-input w3-border" /></p>

            <p>
                <input type = "password" title="Nueva Password" id="c4" name = "p1" maxlength="15" placeholder = "Nueva Password" class="w3-input w3-border" /></p>

            <p>
                <input type = "password" title="Confirmar Password" id="c5" name = "p2" maxlength="15" placeholder = "Confirmar Password" class="w3-input w3-border" />
            </p>
            <p>
                <input type = "submit" value = "Guardar" class="w3-button w3-deep-orange" />
            </p>
        </form>
    </div>
</div>
