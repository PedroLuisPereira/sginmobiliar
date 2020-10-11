
<!--imagen principal-->
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo base_url() ?>uploads/<?php echo $fotos[0]['nombre'] ?>);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Detalles del Inmueble</span>
                <h1 class="mb-2"><?php echo $registro['barrio'] . "-" . $registro['ciudad'] ?></h1>
                <?php if ($registro['oferta'] == "Venta"): ?>
                    <p class="mb-5"><strong class="h2 text-success font-weight-bold"><?php echo "$ " . number_format($registro['valorventa']) ?></strong></p>    
                <?php elseif ($registro['oferta'] == "Arriendo") : ?>
                    <p class="mb-5"><strong class="h2 text-success font-weight-bold"><?php echo "$ " . number_format($registro['valorarriendo']) ?></strong></p>                        
                <?php else: ?>
                    <p class="mb-5"><strong class="h2 text-success font-weight-bold"><?php echo "Venta $ " . number_format($registro['valorventa']) ?></strong></p>    
                    <p class="mb-5"><strong class="h2 text-success font-weight-bold"><?php echo "Arriendo $ " . number_format($registro['valorarriendo']) ?></strong></p>    
                <?php endif; ?> 

            </div>
        </div>
    </div>
</div>
<!--fin imagen principal-->


<div class="site-section site-section-sm">
    <div class="container">
        <div class="row">
            <!--informacion del inmueble-->
            <div class="col-lg-8">
                <div>
                    <div class="slide-one-item home-slider owl-carousel">
                        <?php foreach ($fotos as $key => $value) : ?>
                            <div><img src="<?php echo base_url() ?>uploads/<?php echo $value['nombre'] ?>" style="height: 400px; width: auto;display:block; margin: auto" alt="Image" ></div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="bg-white property-body border-bottom border-left border-right">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <?php if ($registro['oferta'] == "Venta"): ?>
                                <strong class="text-success h1 mb-3"><?php echo "$ " . number_format($registro['valorventa']) ?></strong>
                            <?php elseif ($registro['oferta'] == "Arriendo") : ?>
                                <strong class="text-success h1 mb-3"><?php echo "$ " . number_format($registro['valorarriendo']) ?></strong>
                            <?php else: ?>
                                <strong class="text-success h1 mb-3"><?php echo "$ " . number_format($registro['valorventa']) ?></strong>
                            <?php endif; ?> 

                        </div>
                        <div class="col-md-6">
                            <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                                <li>
                                    <span class="property-specs">Habitaciones</span>
                                    <span class="property-specs-number"><?php echo ($registro['habitaciones']) ?><sup>+</sup></span>

                                </li>
                                <li>
                                    <span class="property-specs">Baños</span>
                                    <span class="property-specs-number"><?php echo ($registro['baños']) ?></span>

                                </li>
                                <li>
                                    <span class="property-specs">Área</span>
                                    <span class="property-specs-number"><?php echo ($registro['area']) ?></span>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">Tipo de Inmueble</span>
                            <strong class="d-block"><?php echo ($registro['tipo']) ?></strong>
                        </div>
                        <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">Tipo de Oferta</span>
                            <strong class="d-block"><?php echo ($registro['oferta']) ?></strong>
                        </div>
                        <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                            <span class="d-inline-block text-black mb-0 caption-text">Ubicacion</span>
                            <strong class="d-block"><?php echo $registro['barrio'] . "-" . $registro['ciudad'] ?></strong>
                        </div>
                    </div>
                    <h2 class="h4 text-black">Más Información</h2>
                    <textarea class="form-control" rows="10" ><?php echo ($registro['descripcion']) ?></textarea>

                    <div class="row no-gutters mt-5">
                        <div class="col-12">
                            <h2 class="h4 text-black mb-3">Galería</h2>
                        </div>
                        <?php foreach ($fotos as $key => $value) : ?>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <a href="<?php echo base_url() ?>uploads/<?php echo $value['nombre'] ?>" class="image-popup gal-item">
                                    <img src="<?php echo base_url() ?>uploads/<?php echo $value['nombre'] ?>" style="height: 100px; width: auto;display:block; margin: auto" alt="Image" ></a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!--fin informacion del inmueble-->
            <!--contacto -->
            <div class="col-lg-4">

                <div class="bg-white widget border rounded">

                    <h3 class="h4 text-black widget-title mb-3">Contacto</h3>
                    <p style="color: #b93e3e" ><?php echo $respuesta ?></p>
                    <form method="POST" class="form-contact-agent">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="nombre" required="" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Teléfono</label>
                            <input type="tel" id="phone" name="telefono" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" id="phone" class="btn btn-primary" value="Enviar">
                        </div>
                    </form>
                </div>

                <div class="bg-white widget border rounded">
                    <h3 class="h4 text-black widget-title mb-3">S&G Inmobiliar</h3>
                    <p class="mb-0 font-weight-bold" >Direccion</p>
                    <p>San Antonio Calle 30c #63-74, Cartagena-Colombia</p>

                    <p class="mb-0 font-weight-bold">Teléfono</p>
                    <p class="mb-4"><a href="#">311-3165235</a></p>

                    <p class="mb-0 font-weight-bold">Email</p>
                    <p class="mb-0"><a href="#">sginmobiliar@gmail.com</a></p>
                </div>
            </div>
            <!--fin contacto-->
        </div>
    </div>
</div>


<!--inmuebles relacionados-->
<div class="site-section site-section-sm bg-light">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="site-section-title mb-5">
                    <h2>Inmuebles Relacionados</h2>
                </div>
            </div>
        </div>
        
        <div class="row mb-5">
            <?php foreach ($registrosRelacionados as $key => $value) : ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="property-entry h-100">
                    <a href="<?php echo base_url() . 'front/detalles/' . $value['idinmueble'] ?>" class="property-thumbnail">
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
                        <img src="<?php echo base_url() ?>uploads/<?php echo $value['foto'] ?>" alt="Image" style="height: 200px; width: auto;display:block; margin: auto"  >
                        <!--class="img-fluid"-->
                    </a>
                    <div class="p-4 property-body">
                        <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                        <h2 class="property-title"><a href="<?php echo base_url() . 'front/detalles/' . $value['idinmueble'] ?>"><?php echo $value['ciudad'] ?></a></h2>
                        <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span><?php echo $value['barrio'] ?></span>
                        <?php if ($value['oferta'] == "Venta"): ?>
                                <strong class="property-price text-primary mb-3 d-block text-danger">$ <?php echo number_format($value['valorventa']) ?></strong> 
                            <?php elseif ($value['oferta'] == "Arriendo") : ?>
                                <strong class="property-price text-primary mb-3 d-block text-success">$ <?php echo number_format($value['valorarriendo']) ?></strong> 
                            <?php else: ?>
                                <strong class="property-price text-primary mb-3 d-block text-success">$ <?php echo number_format($value['valorarriendo']) . ' - $ ' . number_format($value['valorarriendo']) ?></strong> 
                            <?php endif; ?>  
                        <ul class="property-specs-wrap mb-3 mb-lg-0">
                            <li>
                                <span class="property-specs">Habitaciones</span>
                                <span class="property-specs-number"><?php echo $value['habitaciones']?><sup>+</sup></span>

                            </li>
                            <li>
                                <span class="property-specs">Baños</span>
                                <span class="property-specs-number"><?php echo $value['baños']?></span>

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
    </div>
</div>
<!--fin inmuebles relacionados-->