<br>
<br>

<div class="w3-container w3-margin-right w3-margin-left">
    <h2 class="w3-panel w3-blue-grey w3-card-4">Agregar Fotos</h2>
    <div class="w3-container">
        <div class="w3-container">
            <form enctype="multipart/form-data" onsubmit="return formInmuebleFotos()" action="<?php echo RUTA . 'inmueble/masFotos/' . $idinmueble ?>" method = "POST">
                <input type = "file"  accept=".jpg" id="c15" name = "c15[]" multiple="" required=""  class="w3-input w3-border" />
                <span style="color: red" >*Máximo 20 archivos con extensión .jpg y máximo 2MB por carga</span><br><br>
                <a class="w3-button w3-blue"  href="<?php echo RUTA . 'inmueble/getAll';?>">Atras</a>
                <input class="w3-button w3-blue-grey" type="submit" value="Agregar mas fotos">
            </form>
        </div>
    </div>
</div>




<!-- Mostrar Fotos Actuales -->
<div class="w3-container w3-margin-right w3-margin-left">
    <h2 class="w3-panel w3-blue-grey w3-card-4">Fotos Actuales</h2>
    <div class="w3-container">
        <div class="w3-container">

            <form action="<?php echo RUTA . 'inmueble/deleteFotos' ?>" method="POST" >
                <?php
                if (count($resultado) > 0) {
                    foreach ($resultado as $campo) {
                        ?>

                        <img src="<?php echo RUTA . "uploads/" . $campo[1] ?>" style="width:200px;height:200px; margin: 2%; border: black 2px solid " alt="foto"/>
                        <input type = "checkbox" name = "<?php echo "c" . $campo[0] ?>"  value = "ON" />

                        <?php
                    }
                }
                ?>
                <br>
                <input type="hidden" value="<?php echo $idinmueble; ?>" name="idinmueble">

                <input class="w3-button w3-red" type="submit" value="Eliminar"> 
            </form>
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
                <h2><?php echo $respuesta ?></h2>
            </header>
        </div>
    </div>
</div>

<br>