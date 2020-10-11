<br>

<div class="w3-container w3-margin w3-card-4">

    <!--    agregar mas fotos-->
    <div class="w3-container">
        <h3 class="w3-panel w3-blue w3-card-4">Agregar Fotos</h3>
        <form enctype="multipart/form-data" onsubmit="return formInmuebleFotos()" action="<?php echo base_url() . 'admin/fotos/ver/' . $idinmueble ?>" method = "POST">
            <input type = "file"  id="c15" name = "c16[]" multiple="" required=""  class="w3-input w3-border" />
            <span style="color: red" >*Máximo 20 archivos con extensión .jpeg o .jpg y máximo 2MB por carga</span><br><br>
            <a class="w3-button w3-blue-grey"  href="<?php echo base_url() . 'admin/inmueble'; ?>">Atras</a>
            <input class="w3-button w3-deep-orange" type="submit" value="Agregar mas fotos">
        </form>
    </div>


    <!-- Mostrar Fotos Actuales -->

    <div class="w3-container">
        <h3 class="w3-panel w3-blue w3-card-4">Fotos Actuales</h3>
        <form action="<?php echo base_url() . 'admin/fotos/eliminar' ?>" method="POST" >

            <?php foreach ($registros as $key => $value) : ?>


                <img src="<?php echo base_url() . "uploads/" . $value->nombre ?>" style="width:200px;height:200px; margin: 2%; border: black 2px solid " alt="foto"/>
                <input type = "checkbox" name = "<?php echo "c" . $value->idfoto ?>"  value = "ON" />

            <?php endforeach; ?>


            <br>
            <input type="hidden" value="<?php echo $idinmueble; ?>" name="idinmueble">

            <input class="w3-button w3-red" type="submit" value="Eliminar"> 
        </form>
    </div>


    <br>

</div>
