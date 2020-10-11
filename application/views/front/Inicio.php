<!--        Image Header -->
<!-- <div class="w3-display-container w3-animate-opacity">
    <img src="<?php echo RUTA ?>public/img/f3.jpg" alt="Apartamentos" style="width:100%;min-height:350px;max-height:600px;">
    <div class="w3-container w3-display-bottomleft w3-margin-bottom">
        <a href="<?php echo RUTA ?>inmuebles" class="w3-button w3-xlarge w3-teal w3-hover-teal">BUSCAR INMUEBLES</a>
    </div> 
</div>
-->
<br>

<!-- <div class="w3-content w3-section" style="max-width:1100px"> -->
<div class="w3-display-container w3-animate-opacity">
    <img class="mySlides w3-border" src="<?php echo RUTA ?>public/img/f1.jpg" style="width:100%">
    <img class="mySlides w3-border" src="<?php echo RUTA ?>public/img/f2.jpg" style="width:100%">
    <img class="mySlides w3-border" src="<?php echo RUTA ?>public/img/f3.jpg" style="width:100%">
    <img class="mySlides w3-border" src="<?php echo RUTA ?>public/img/f4.jpg" style="width:100%">
    <img class="mySlides w3-border" src="<?php echo RUTA ?>public/img/f5.jpg" style="width:100%">
    <div class="w3-display-middle w3-large">
        <a class="w3-button w3-blue w3-round-xlarge" href="<?php echo RUTA ?>inmuebles">Encuentre su Inmueble</a>
    </div>


</div>




<!-- script -->
<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 3000); // Change image every 2 seconds
    }
</script>


<!--Nosotros -->
<div class="w3-container w3-padding-32 w3-center nosotros " id="nosotros">
    <h2 class="w3-xxxlarge">Nosotros</h2>

    <div class="w3-row"><br>

        <div class="w3-quarter">
            <a href="#nosotros" onclick="document.getElementById('m01').style.display = 'block'">
                <img src="<?php echo RUTA ?>public/img/logo.jpg" alt="Nosotros" style="width:45%" class="w3-circle w3-hover-opacity"></a>
            <h3>QUIENES SOMOS</h3>
        </div>

        <div class="w3-quarter">
            <a href="#nosotros" onclick="document.getElementById('m02').style.display = 'block'">
                <img src="<?php echo RUTA ?>public/img/3.jpg" alt="Mision" style="width:45%" class="w3-circle w3-hover-opacity"></a>
            <h3>MISION</h3>

        </div>

        <div class="w3-quarter">
            <a href="#nosotros" onclick="document.getElementById('m03').style.display = 'block'">
                <img src="<?php echo RUTA ?>public/img/4.jpg" alt="Vision" style="width:45%" class="w3-circle w3-hover-opacity"></a>
            <h3>VISION</h3>
        </div>

        <div class="w3-quarter">
            <a href="#nosotros" onclick="document.getElementById('m04').style.display = 'block'">
                <img src="<?php echo RUTA ?>public/img/5.jpg" alt="Valores" style="width:45%" class="w3-circle w3-hover-opacity"></a>
            <h3>VALORES</h3>
        </div>

    </div>
</div>


<!--imagen cartagena-->
<img src="<?php echo RUTA ?>public/img/f62.jpg" alt="Cartagena" style="width:100%" class="w3-hover-opacity">


<!-- Modal quienes somos -->
<div id="m01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-top">
        <header class="w3-container w3-cyan w3-display-container">
            <span onclick="document.getElementById('m01').style.display = 'none'" class="w3-button w3-cyan w3-display-topright"><i class="fa fa-remove"></i></span>
            <h4>QUIENES SOMOS</h4>
        </header>
        <div class="w3-container">
            <p ALIGN="justify"><strong>SGInmobiliar SAS</strong>, Somos una empresa del sector inmobiliario que ofrece un nuevo modelo de gestión, con el objetivo
                principal de brindar la mejor opción en el proceso de contratación o adquisición de inmuebles que nuestros clientes requieran.
                <br><br>Brindamos un servicio de calidad que se diferencia por el aprovechamiento de la oportunidad, apuntando a la plena satisfacción
                de nuestros clientes con especial en la confiabilidad, rapidez y eficacia en toda la información y gestión que dentro de la empresa se lleve acabo.
            </p>

        </div>
    </div>
</div>

<!--Modal mision -->
<div id="m02" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-top">
        <header class="w3-container w3-red w3-display-container">
            <span onclick="document.getElementById('m02').style.display = 'none'" class="w3-button w3-red w3-display-topright"><i class="fa fa-remove"></i></span>
            <h4>MISIÓN</h4>
        </header>
        <div class="w3-container">
            <p ALIGN="justify"><strong>SGInmobiliar SAS,</strong>Brindar a nuestros clientes la mejor gestión inmobiliaria del mercado con el apoyo de
                un recurso humano calificado y un atención personalizada y de excelente calidad,
                dando a conocer nuestro portafolio de servicio para desarrollar de manera óptima
                los requerimientos de nuestros clientes. </p>

        </div>
    </div>
</div>


<!--Modal vision -->
<div id="m03" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-top">
        <header class="w3-container w3-light-green w3-display-container">
            <span onclick="document.getElementById('m03').style.display = 'none'" class="w3-button w3-light-green w3-display-topright"><i class="fa fa-remove"></i></span>
            <h4>VISIÓN</h4>
        </header>
        <div class="w3-container">
            <p ALIGN="justify"><strong>SGInmobiliar SAS,</strong> Para el año 2020 seremos una empresa reconocida en el gremio inmobiliario a nivel nacional
                e internacional contando con el mejor equipo humano y desarrollo impecable de
                la logística de nuestros procesos, posicionándonos día a día como una de las
                empresas de gestión integral inmobiliaria, con los más altos estándares de calidad,
                con una gestión optima mediante una mejora continua de los procesos para satisfacer
                las necesidades de nuestros clientes </p>

        </div>
    </div>
</div>

<!--Modal valores -->
<div id="m04" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-top">
        <header class="w3-container w3-orange w3-display-container">
            <span onclick="document.getElementById('m04').style.display = 'none'" class="w3-button w3-orange w3-display-topright"><i class="fa fa-remove"></i></span>
            <h4>VALORES</h4>
        </header>
        <div class="w3-container">
            <p ALIGN="justify"><strong>SGInmobiliar SAS,</strong> Somos una empresa formada por un equipo de profesionales altamente calificados y
                orientados a brindar respuesta a las necesidades de nuestros clientes, sustentados en
                valores como la profesionalidad, seriedad, calidad humana y fiel cumplimiento de los
                compromisos adquiridos con nuestros clientes. </p>

        </div>
    </div>
</div>


<!--respuesta-->
<input type="hidden" value="<?php echo $respuesta ?>" id="respuesta">


<!--modal mail -->
<div>
    <div id="modal" class="w3-modal">
        <div class="w3-modal-content">
            <header class="w3-container w3-teal">
                <span onclick="document.getElementById('modal').style.display = 'none'" class="w3-button w3-display-topright">&times;</span>
                <h2><?php echo $respuesta ?></h2>
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
            <form class="w3-container w3-card-4 w3-padding-16 w3-white" action="<?php echo htmlspecialchars(RUTA . 'front/index/email') ?>" method="POST">
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

