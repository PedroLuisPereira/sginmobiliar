

<!-- carrusel-->
<div class="slide-one-item home-slider owl-carousel">
    <div class="site-blocks-cover overlay" style="background-image: url(<?php echo base_url() ?>public/img/f1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
<!--                    <span class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded"></span>
                    <h1 class="mb-2"></h1>
                    <p class="mb-5"><strong class="h2 text-success font-weight-bold"></strong></p>-->
                    <p><a href="#inmuebles" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">Ver Inmuebles</a></p>
                </div>
            </div>
        </div>
    </div>  

    <div class="site-blocks-cover overlay" style="background-image: url(<?php echo base_url() ?>public/img/f2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
<!--                    <span class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded"></span>
                    <h1 class="mb-2"></h1>
                    <p class="mb-5"><strong class="h2 text-success font-weight-bold"></strong></p>-->
                    <p><a href="#inmuebles" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">Ver Inmuebles</a></p>
                </div>
            </div>
        </div>
    </div>  

    <div class="site-blocks-cover overlay" style="background-image: url(<?php echo base_url() ?>public/img/f3.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
<!--                    <span class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded"></span>
                    <h1 class="mb-2"></h1>
                    <p class="mb-5"><strong class="h2 text-success font-weight-bold"></strong></p>-->
                    <p><a href="#inmuebles" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">Ver Inmuebles</a></p>
                </div>
            </div>
        </div>
    </div>  

    <div class="site-blocks-cover overlay" style="background-image: url(<?php echo base_url() ?>public/img/f4.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
<!--                    <span class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded"></span>
                    <h1 class="mb-2"></h1>
                    <p class="mb-5"><strong class="h2 text-success font-weight-bold"></strong></p>-->
                    <p><a href="#inmuebles" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">Ver Inmuebles</a></p>
                </div>
            </div>
        </div>
    </div>  

    <div class="site-blocks-cover overlay" style="background-image: url(<?php echo base_url() ?>public/img/f5.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
<!--                    <span class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded"></span>
                    <h1 class="mb-2"></h1>
                    <p class="mb-5"><strong class="h2 text-success font-weight-bold"></strong></p>-->
                    <p><a href="#inmuebles" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">Ver Inmuebles</a></p>
                </div>
            </div>
        </div>
    </div>  






</div>
<!--fin carrusel-->

<!--formulario y ordenar-->
<div id="inmuebles" class="site-section site-section-sm pb-0">
    <div class="container">

        <!--formulario-->
        <div class="row">
            <form class="form-search col-md-12" style="margin-top: -100px;">
                <div class="row  align-items-end">
                    <div class="col-md-3">
                        <input type="hidden" name="p" value="0">
                        <label for="tipo">Tipo de Inmueble</label>
                        <div class="select-wrap">
                            <span class="icon icon-arrow_drop_down"></span>
                            <select name="tipo" id="list-types" class="form-control d-block rounded-0">
                                <option value="">--Tipo de Inmueble--</option>
                                <option value="apartamento">Apartamento</option>
                                <option value="casa">Casa</option>
                                <option value="local">Local</option>
                                <option value="lote">Lote</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="oferta">Tipo de Oferta</label>
                        <div class="select-wrap">
                            <span class="icon icon-arrow_drop_down"></span>
                            <select name="oferta" id="offer-types" class="form-control d-block rounded-0">
                                <option value="">--Tipo de Oferta--</option>
                                <option value="arriendo">Para Arriendo</option>
                                <option value="venta">Para Venta</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="ciudad">Ciudad</label>
                        <div class="select-wrap">
                            <span class="icon icon-arrow_drop_down"></span>
                            <select name="ciudad" id="select-city" class="form-control d-block rounded-0">
                                <option value="">--Ciudad--</option>
                                <option value="cartagena">Cartagena</option>
                                <option value="turbaco">Turbaco</option>
                                <option value="arjona">Arjona</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <input type="submit" class="btn btn-success text-white btn-block rounded-0" value="Buscar">
                    </div>
                </div>
            </form>
        </div>  
        <!--fin formulario-->

        <!-- ordenar -->
        <div class="row">
            <div class="col-md-12">
                <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
                    <div class="mr-auto">
                        <!--ordenamiento-->
                        <a href="<?php echo base_url() ?>" class="icon-view view-module active"><span class="icon-view_module"></span></a>
                        <a href="<?php echo base_url()?>listar" class="icon-view view-list"><span class="icon-view_list"></span></a>
                        <!--fin ordenamiento-->
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <div>
                            <a href="#" class="view-list px-3 border-right active">Todos</a>
                            <a href="#" class="view-list px-3 border-right">Para Arriendo</a>
                            <a href="#" class="view-list px-3">Para Venta</a>
                        </div>


                        <div class="select-wrap">
                            <span class="icon icon-arrow_drop_down"></span>
                            <select class="form-control form-control-sm d-block rounded-0">
                                <option value="">Ordenar por</option>
                                <option value="">Precio Ascendente</option>
                                <option value="">Precio Descendente</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--fin ordenar-->
    </div>
</div>
<!--fin formulario y ordenar-->

<!--inmuebles-->
<div class="site-section site-section-sm bg-light">
    <div class="container">
        <div class="row mb-5">

            <?php foreach ($registros as $key => $value) : ?>

                <div  class="col-md-6 col-lg-4 mb-4">
                    <div style="background-color: #eee " class="property-entry h-100">
                        <a href="<?php echo base_url() . 'detalles/' . $value['idinmueble'] ?>" class="property-thumbnail">
                            <div class="offer-type-wrap">
                                <?php if ($value['oferta'] == "Venta"): ?>
                                    <span class="offer-type bg-danger">Venta</span>
                                    <span class="offer-type bg-info"><?php echo $value['tipo'] ?></span>
                                <?php elseif ($value['oferta'] == "Arriendo") : ?>
                                    <span class="offer-type bg-success">Arriendo</span>
                                    <span class="offer-type bg-info"><?php echo $value['tipo'] ?></span>
                                <?php else: ?>
                                    <span class="offer-type bg-danger">Venta</span>
                                    <span class="offer-type bg-success">Arriendo</span>
                                    <span class="offer-type bg-info"><?php echo $value['tipo'] ?></span>
                                <?php endif; ?>     
                            </div>
                            <img src="<?php echo base_url() ?>uploads/<?php echo $value['foto'] ?>" style="height: 230px; width: auto;display:block; margin: auto" >
                        </a>
                        <div class="p-4 property-body">
                            <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                            <h2 class="property-title"><a href="<?php echo base_url() . 'detalles/' . $value['idinmueble'] ?>"><?php echo $value['ciudad'] ?></a></h2>
                            <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span><?php echo $value['barrio'] ?></span>
                            <?php if ($value['oferta'] == "Venta"): ?>
                                <strong class="property-price text-primary mb-3 d-block text-danger">$ <?php echo number_format($value['valorventa']) ?></strong> 
                            <?php elseif ($value['oferta'] == "Arriendo") : ?>
                                <strong class="property-price text-primary mb-3 d-block text-success">$ <?php echo number_format($value['valorarriendo']) ?></strong> 
                            <?php else: ?>
                                <strong class="property-price text-primary mb-3 d-block text-success">$ <?php echo number_format($value['valorarriendo']) . ' - $ ' . number_format($value['valorventa']) ?></strong> 
                            <?php endif; ?>    

                            <ul class="property-specs-wrap mb-3 mb-lg-0">
                                <li>
                                    <span class="property-specs">Habitaciones</span>
                                    <span class="property-specs-number"><?php echo $value['habitaciones'] ?> <sup>+</sup></span>

                                </li>
                                <li>
                                    <span class="property-specs">Baños</span>
                                    <span class="property-specs-number"><?php echo $value['baños'] ?></span>

                                </li>
                                <li>
                                    <span class="property-specs">Área</span>
                                    <span class="property-specs-number"><?php echo $value['area'] ?></span>

                                </li>
                            </ul>

                        </div>
                    </div>
                </div>

            <?php endforeach; ?>


        </div>
        <!--fin inmuebles-->

        <!-- numero-->
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="site-pagination">
                    <?php for ($i = 0; $i < $paginas; $i++): ?>
                        <a href="<?php echo base_url() ."?p=".($i + 1).$cadena?>" <?php if($numero == $i+1) echo 'class="active"'  ?> ><?php echo $i + 1 ?></a>
                    <?php endfor; ?>
                </div>
            </div>  
        </div>

        <!--numero-->
    </div>
</div>
<!--fin inmuebles-->

