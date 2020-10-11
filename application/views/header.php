<!DOCTYPE html>
<html lang="es">
    <head>
        <title>SGInmobiliar S.A.S</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/jpg" href="<?php echo base_url() ?>public/img/favicon.jpg" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
        <link rel="stylesheet" href="<?php echo base_url() ?>public/fonts/icomoon/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/magnific-popup.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/jquery-ui.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/mediaelementplayer.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/animate.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>public/fonts/flaticon/font/flaticon.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/fl-bigmug-line.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/aos.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/style.css">

    </head>
    <body>

        <div class="site-loader"></div>

        <!-- menu-->
        <div class="site-wrap">
            <div class="site-mobile-menu">
                <div class="site-mobile-menu-header">
                    <div class="site-mobile-menu-close mt-3">
                        <span class="icon-close2 js-menu-toggle"></span>
                    </div>
                </div>
                <div class="site-mobile-menu-body"></div>
            </div> <!-- .site-mobile-menu -->
            <div class="site-navbar mt-4">
                <div class="container py-1">
                    <div class="row align-items-center">
                        <div class="col-8 col-md-8 col-lg-4">
                            <h1 class="mb-0"><a href="<?php echo base_url() ?>" class="text-white h2 mb-0"><strong>SGInmobiliar<span class="text-danger">.</span></strong></a></h1>
                        </div>
                        <div class="col-4 col-md-4 col-lg-8">
                            <nav class="site-navigation text-right text-md-right" role="navigation">
                                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
                                <ul class="site-menu js-clone-nav d-none d-lg-block">
                                    <li class="active"><a href="<?php echo base_url() ?>">Inicio</a></li>
                                    <li><a href="<?php echo base_url() ?>nosotros">Nosostros</a></li>
                                    <li><a href="<?php echo base_url() ?>contacto">Contacto</a></li>
                                    <?php if ($this->session->login_in==TRUE): ?>
                                    <li><a href="<?php echo base_url() ?>admin/panel">BackEnd</a></li>
                                    <?php else: ?>
                                    <li><a href="<?php echo base_url() ?>login">Login</a></li>
                                    <?php endif;?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--fin menu-->