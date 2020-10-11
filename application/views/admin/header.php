<!DOCTYPE html>
<html lang="es" >
    <title>SGInmobiliar</title>
    <link rel="icon" type="image/jpg" href="<?php echo base_url() ?>public/img/favicon.jpg" />
    <script src="<?php echo base_url() ?>public/js/validar.js" type="text/javascript"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    </style>
    <body class="w3-light-grey">

        <!-- Top container -->
        <div class="w3-bar w3-top w3-dark-grey w3-large" style="z-index:4">
            <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
            <span class="w3-bar-item w3-right">SGInmobiliar</span>
        </div>


        <!-- Sidebar/menu -->

        <nav class="w3-sidebar w3-collapse w3-dark-grey w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
            <div class="w3-container w3-row">
                <div class="w3-col s4">
                    <img src="<?php echo base_url() ?>public/img/hombre.png" class="w3-circle w3-margin-right" style="width:46px">
                </div>
                <div class="w3-col s8 w3-bar">
                    <span>Bienvenido, <strong><?php echo $this->session->nombre; ?></strong></span><br>
                    <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
                    <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
                    <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
                </div>
            </div>
            <div class="w3-container">
                <h5>Dashboard</h5>
            </div>
            <hr>
            <div class="w3-bar-block">
                <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
                <a href="<?php echo base_url(); ?>admin/panel" class="w3-bar-item w3-button w3-padding"><i class="fa fa-dashboard"></i>Panel</a>
                <a href="<?php echo base_url(); ?>admin/inmueble" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home fa-fw"></i>Inmuebles</a>
                <?php if ($this->session->rol=='Administrador'): ?>
                    <a href="<?php echo base_url(); ?>admin/usuario" class="w3-bar-item w3-button w3-padding"><i class="fa fa-user fa-fw"></i>Usuarios</a>
                <?php endif; ?> 
                <hr>
                <button class="w3-button w3-block w3-left-align" onclick="myAccFunc()">Cuenta <i class="fa fa-caret-down"></i></button>
                <div id="demoAcc" class="w3-hide w3-white w3-card">
                    <a href="<?php echo base_url(); ?>admin/panel/password" class="w3-bar-item w3-button">Cambiar password</a>
                    <a href="<?php echo base_url(); ?>logout" class="w3-bar-item w3-button">Cerrar Sesión</a>
                </div>
                <hr>
                <a href="<?php echo base_url(); ?>" class="w3-bar-item w3-button">FronEnd</a>
              <!--            <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Traffic</a>
                              <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bullseye fa-fw"></i>  Geo</a>
                              <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Orders</a>
                              <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>  News</a>
                              <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bank fa-fw"></i>  General</a>
                              <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-history fa-fw"></i>  History</a>
                              <a href="#" class="w3-bar-item w3-button w3-padding"><i class="fa fa-cog fa-fw"></i>  Settings</a><br><br>-->
            </div>
        </nav>


        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:300px;margin-top:43px;">


            <!--respuesta-->
            <input type="hidden" value="<?php echo $mensaje?>" id="respuesta"  >


            <!--modal mail -->
            <div>
                <div id="modal" class="w3-modal">
                    <div class="w3-modal-content">
                        <header class="w3-container w3-light-grey"> 
                            <span onclick="document.getElementById('modal').style.display = 'none'" 
                                  class="w3-button w3-display-topright">&times;</span>
                            <h2><?php echo $mensaje ?></h2>
                        </header>
                    </div>
                </div>
            </div>

