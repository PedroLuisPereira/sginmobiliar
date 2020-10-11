

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo base_url() ?>public/img/f1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="mb-2">Contacto</h1>
            </div>
        </div>
    </div>
</div>


<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8 mb-5">
                <p style="color: #b93e3e" ><?php echo $respuesta ?></p>
                <form method="POST" class="p-5 bg-white border">

                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="font-weight-bold" for="fullname">Nombre</label>
                            <input type="text" id="fullname" name="nombre" required="" class="form-control" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="email">Email</label>
                            <input type="email" id="email" name="email" required="" class="form-control" placeholder="Email">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="message">Mensaje</label> 
                            <textarea name="mensaje" id="message" cols="30" required="" rows="5" class="form-control" placeholder="Mensaje"></textarea>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Enviar" class="btn btn-primary  py-2 px-4 rounded-0">
                        </div>
                    </div>


                </form>
            </div>

            <div class="col-lg-4">
                <div class="p-4 mb-3 bg-white">
                    <h3 class="h6 text-black mb-3 text-uppercase">Info Contacto</h3>
                    <p class="mb-0 font-weight-bold">Direccion</p>
                    <p class="mb-4">San Antonio Calle 30c #63-74, Cartagena-Colombia</p>

                    <p class="mb-0 font-weight-bold">Teléfono</p>
                    <p class="mb-4"><a href="#">311-3165235</a></p>

                    <p class="mb-0 font-weight-bold">Email</p>
                    <p class="mb-0"><a href="#">sginmobiliar@gmail.com</a></p>

                </div>

            </div>
        </div>
    </div>
</div>






