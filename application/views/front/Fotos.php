

<!--imagenes-->
<div class="w3-container w3-padding-64" >
    <div class="w3-content w3-display-container">
        <?php
        if (count($arrayFotos) > 0) {
            foreach ($arrayFotos as $campo) {
                ?>
                <img src="<?php echo RUTA . "uploads/" . $campo[1] ?>" class="mySlides" style="width: 100%; max-height: 500px; border: 3px solid black;  display: none"  alt="foto"></a>
                <?php
            }
        }
        ?>
        <button class="w3-button w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
        <button class="w3-button w3-display-right" onclick="plusDivs(+1)">&#10095;</button>
    </div>
</div>


<!--descripcion-->

<div class="w3-container">
    <h2>Características</h2>

    <table class="w3-table-all">
        <thead>
            <tr class="w3-teal">
                <th>Item</th>
                <th>Valor</th>
                <th>Item</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tr>
            <td>Oferta</td>
            <td><?php echo $arrayInmueble[0][2]?></td>
            <td>Barrio</td>
            <td><?php echo $arrayInmueble[0][8]?></td>
        </tr>
        <tr>
            <td>Tipo</td>
            <td><?php echo $arrayInmueble[0][3]?></td>
            <td>Área</td>
            <td><?php echo $arrayInmueble[0][10]?></td>
        </tr>
        <tr>
            <td>Valor Arriendo</td>
            <td><?php echo number_format($arrayInmueble[0][4])?></td>
            <td>Habitaciones</td>
            <td><?php echo $arrayInmueble[0][11]?></td>
        </tr>
        <tr>
            <td>Valor Venta</td>
            <td><?php echo number_format($arrayInmueble[0][5])?></td>
            <td>Baños</td>
            <td><?php echo $arrayInmueble[0][12]?></td>
        </tr>
        <tr>
            <td>Valor Administración</td>
            <td><?php echo $arrayInmueble[0][6]?></td>
            <td>Piso</td>
            <td><?php echo $arrayInmueble[0][13]?></td>
        </tr>
        <tr>
            <td>Ciudad</td>
            <td><?php echo $arrayInmueble[0][7]?></td>
            <td>Estrato</td>
            <td><?php echo $arrayInmueble[0][14]?></td>
        </tr>
    </table>
    
    
    <h2>Descripción</h2>
    
    <textarea class ="w3-input w3-border w3-light-grey" rows="8"  ><?php echo $arrayInmueble[0][15]?></textarea>

</div>

<bR>
<bR>


<!--respuesta-->
<input type="hidden" value="<?php echo $respuesta ?>" id="respuesta"  >


<!--modal mail -->
<div>
    <div id="modal" class="w3-modal">
        <div class="w3-modal-content">
            <header class="w3-container w3-teal"> 
                <span onclick="document.getElementById('modal').style.display = 'none'" 
                      class="w3-button w3-display-topright">&times;</span>
                <h2>Correo enviado con éxito</h2>
            </header>
        </div>
    </div>
</div>


<!--Contact Container -->
<div class="w3-container w3-padding-64 w3-theme-l5" id="contact">
    <div class="w3-row">
        <div class="w3-col m5">
            <div class="w3-padding-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Contacto</span></div>
            <h3>Dirección</h3>
            <p>San Antonio Calle 30c #63-74 Apto 901 Edf. Baleares Barena.</p>
            <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>  Cartagena</p>
            <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>  3113165235</p>
            <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>  sginmobiliar@gmail.com</p>
        </div>
        <div class="w3-col m7">
            <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="<?php echo RUTA . 'front/index/email' ?>" method="POST" target="_blank">
                <div class="w3-section">      
                    <label>Nombre</label>
                    <input class="w3-input" type="text" name="name" required>
                </div>
                <div class="w3-section">      
                    <label>Email</label>
                    <input class="w3-input" type="email" name="email" required>
                </div>
                <div class="w3-section">      
                    <label>Mensaje</label>
                    <input class="w3-input" type="text" name="message" required>
                </div>  
                <input class="w3-check" type="checkbox" checked name="Like">
                <label>Me gusta</label>
                <button type="submit" class="w3-button w3-right w3-blue">Enviar</button>
            </form>
        </div>
    </div>
</div>



<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
        showDivs(slideIndex += n);
    }

    function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        if (n > x.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = x.length
        }
        ;
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex - 1].style.display = "block";
    }

</script>



