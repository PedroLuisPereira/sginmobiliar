<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?php echo base_url() ?>public/img/f1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="mb-2">Login</h1>
            </div>
        </div>
    </div>
</div> 

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8 mb-5">
                <p style="color: #b93e3e" ><?php echo $respuesta ?></p>
                <form action="<?php echo htmlspecialchars(base_url() . "login") ?>" method="POST" class="p-5 bg-white border">
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="font-weight-bold" for="fullname">Usuario</label>
                            <input type="text" id="fullname" name="correo" class="form-control" placeholder="Usuario">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="email">Password</label>
                            <input type="password" id="pas" name="contra" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Ingresar" class="btn btn-primary  py-2 px-4 rounded-0">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
