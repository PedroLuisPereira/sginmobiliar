<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>SGInmobiliar- Apartamentos y Casas para Arriendo o Venta</title>
        <meta charset="UTF-8">
        <link rel="icon" type="image/jpg" href="<?php echo RUTA ?>public/img/favicon.jpg" />
        <link rel="icon" type="image/jpg" href="public/img/favicon.jpg" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="<?php echo RUTA ?>public/js/validar.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
        <style> .w3-lobster {  font-family: "Lobster", serif;} </style>
        <style>.mySlides {display:none;}</style>
    </head> 


    <body>
        <!--         Navbar -->
        <div class="w3-top">
            <div class="w3-bar w3-cyan w3-left-align">
                <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
                <a href="<?php echo RUTA ?>" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>SGInmobiliar</a>
                <a href="<?php echo RUTA ?>#nosotros" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Nosotros</a>
                <a href="<?php echo RUTA ?>inmuebles" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Inmuebles</a>
                <a href="<?php echo RUTA ?>#contact" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Contacto</a>

                <?php if (isset($_SESSION["session"])) { ?>
                    <a href="<?php echo RUTA . "usuario/cerrarSesion" ?>" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-teal">Cerrar Sesión</a>
                    <div class="w3-dropdown-hover w3-hide-small">
                        <button class="w3-button" title="Inmuebles">Inmuebles<i class="fa fa-caret-down"></i></button>     
                        <div class="w3-dropdown-content w3-card-4 w3-bar-block">
                            <a href="<?php echo RUTA . "inmueble/set" ?>" class="w3-bar-item w3-button">Publicar</a>
                            <a href="<?php echo RUTA . "inmueble/getAll" ?>" class="w3-bar-item w3-button">Consultar</a>
                        </div>
                    </div>
                    <div class="w3-dropdown-hover w3-hide-small">
                        <button class="w3-button" title="Usuario">Usuario<i class="fa fa-caret-down"></i></button>     
                        <div class="w3-dropdown-content w3-card-4 w3-bar-block">
                            <a href="<?php echo RUTA . "usuario/set" ?>" class="w3-bar-item w3-button">Nuevo</a>
                            <a href="<?php echo RUTA . "usuario/getAll" ?>" class="w3-bar-item w3-button">Consultar</a>
                        </div>
                    </div>
                <?php } else { ?>
                    <a href="<?php echo RUTA ?>login" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-teal" title="Search"><i>Login</i></a>
                <?php } ?>
            </div>
        </div>



        <!-- Navbar on small screens -->
        <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
            <a href="<?php echo RUTA ?>#nosotros" class="w3-bar-item w3-button">Nosotros</a>
            <a href="<?php echo RUTA ?>#nosotros" class="w3-bar-item w3-button">Nosotros</a>
            <a href="<?php echo RUTA ?>inmuebles" class="w3-bar-item w3-button">Inmuebles</a>
            <a href="<?php echo RUTA ?>#contact" class="w3-bar-item w3-button">Contacto</a>
            <?php if (isset($_SESSION["session"])) { ?>

                <div class="w3-dropdown-hover">
                    <button class="w3-button ">Inmuebles</button>
                    <div class="w3-dropdown-content w3-bar-block w3-card-4">
                        <a href="<?php echo RUTA . "inmueble/set" ?>" class="w3-bar-item  w3-button">Publicar</a>
                        <a href="<?php echo RUTA . "inmueble/getAll" ?>" class="w3-bar-item  w3-button">Consultar</a>
                    </div>
                </div>

                <div class="w3-dropdown-hover">
                    <button class="w3-button ">Usuario</button>
                    <div class="w3-dropdown-content w3-bar-block w3-card-4">
                        <a href="<?php echo RUTA . "usuario/set" ?>" class="w3-bar-item  w3-button">Nuevo</a>
                        <a href="<?php echo RUTA . "usuario/getAll" ?>" class="w3-bar-item  w3-button">Consultar</a>
                    </div>
                </div>

                <a href="<?php echo RUTA . "usuario/cerrarSesion" ?>" class="w3-bar-item w3-button" >Cerrar Sesión</a>
            <?php } else { ?>
                <a href="<?php echo RUTA ?>login" class="w3-bar-item w3-button" title="Search"><i>Login</i></a>
            <?php } ?>
        </div>



