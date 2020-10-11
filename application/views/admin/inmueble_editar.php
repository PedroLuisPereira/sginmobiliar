
<br>
<div class="w3-container w3-margin w3-card-4">
    <header class="w3-container" style="padding-top:22px">
        <h3><b><i class="fa fa-edit"></i><?php echo $titulo ?></b></h3>
    </header>
    <div class="w3-container">
            <form action="<?php echo htmlspecialchars(base_url() . "admin/inmueble/editar/$resultado->idinmueble") ?>" method = "POST">

                <p>
                    <input type="hidden" id="c0" value="<?php echo $resultado->idinmueble ?>" name="c0"/></p>
                <p>


                <h3 class="w3-panel w3-blue w3-card-4">Datos de la Oferta</h3>
                <p>
                    <select name="c1" title="Estado" class="w3-select" >
                        <option <?php if ($resultado->estado == "Disponible") echo "selected" ?> value="Disponible">Disponible</option>
                        <option <?php if ($resultado->estado == "No Disponible") echo "selected" ?> value="No Disponible">No Disponible</option>
                    </select>
                </p>
                <p>
                    <select name="c2"  title="Oferta" class="w3-select" >
                        <option <?php if ($resultado->oferta == "Arriendo") echo "selected" ?> value="Arriendo">Arriendo</option>
                        <option <?php if ($resultado->oferta == "Venta") echo "selected" ?> value="Venta" >Venta</option>
                        <option <?php if ($resultado->oferta == "Arriendo-Venta") echo "selected" ?> value="Arriendo-Venta" >Arriendo-Venta</option>
                    </select>
                </p>
                <p> 

 

                    <select title="Tipo de Inmueble" name = "c3" class="w3-select" >
                        <option <?php if ($resultado->tipo == "Apartamento") echo " selected" ?> value="Apartamento" >Apartamento</option>
                        <option <?php if ($resultado->tipo == "Casa") echo " selected" ?> value="Casa" >Casa</option>
                        <option <?php if ($resultado->tipo == "Local") echo " selected" ?> value="Local" >Local</option>
                        <option <?php if ($resultado->tipo == "Lote") echo " selected" ?> value="Lote" >Lote</option>
                    </select>
                </p>

                <p>
                    <input type = "text" title="Valor Arriendo" value="<?php echo $resultado->valorarriendo ?>" name = "c4" maxlength="15" placeholder = "Valor Arriendo" onkeyup="format(this)" onchange="format(this)" class="w3-input w3-border" />
                </p>
                
                <p>
                    <input type = "text" title="Valor Venta" value="<?php echo $resultado->valorventa ?>" name = "c5" maxlength="20" placeholder = "Valor Venta" onkeyup="format(this)" onchange="format(this)" class="w3-input w3-border" />
                </p>

                <p>
                    <input type = "text" title="Valor Administración" value="<?php echo $resultado->valoradmin ?>" name = "c6" maxlength="15" placeholder = "Valor Administración" onkeyup="format(this)" onchange="format(this)" class="w3-input w3-border" />
                </p>

                <h3 class="w3-panel w3-blue w3-card-4">Datos de la Ubicación</h3>

                <p>
                    <select title="Ciudad" name = "c7" class="w3-select" >
                        <option <?php if ($resultado->ciudad == "Cartagena") echo " selected" ?> value="Cartagena" >Cartagena</option>
                        <option <?php if ($resultado->ciudad == "Turbaco") echo " selected" ?> value="Turbaco" >Turbaco</option>
                        <option <?php if ($resultado->ciudad == "Arjona") echo " selected" ?> value="Arjona" >Arjona</option>
                    </select>
                </p>

                <p>
                    <input type = "text" maxlength="28" title="Barrio" value="<?php echo $resultado->barrio ?>" required="" name = "c8" placeholder = "Barrio"   class="w3-input w3-border"/>
                </p>

                <p>
                    <input type = "text" title="Dirección" value="<?php echo $resultado->direccion ?>" required="" name="c9" maxlength="100" placeholder = "Dirección" value = "" class="w3-input w3-border"/>
                </p>

                <h3 class="w3-panel w3-blue w3-card-4">Otros Datos</h3>
                <p>
                    <input type = "number" title="Area" value="<?php echo $resultado->area ?>" required="" name = "c10" max="1000000" placeholder = "Area"  class="w3-input w3-border"/>
                </p>

                <p>
                    <input type = "number" title="Habitaciones" value="<?php echo $resultado->habitaciones ?>" required="" name = "c11" max="1000000" placeholder = "Habitaciones"  class="w3-input w3-border"/>
                </p>

                <p>
                    <input type = "number" title="Baños" value="<?php echo $resultado->baños ?>" required="" name = "c12" max="1000000" placeholder = "Baños"  class="w3-input w3-border"/>
                </p>

                <p>
                    <input type = "number" title="Piso" value="<?php echo $resultado->piso ?>" required="" name = "c13" max="1000000" placeholder = "Piso"  class="w3-input w3-border"/>
                </p>

                <p>
                    <input type = "number" title="Estrato" value="<?php echo $resultado->estrato ?>" required="" name = "c14" max="1000000" placeholder = "Estrato" class="w3-input w3-border"/>
                </p>

                <h3 class="w3-panel w3-blue w3-card-4">Descripción</h3>
                <p>
                    <textarea name = "c15" title="Descripción" class="w3-input w3-border" maxlength="2000" placeholder = "Descripción"><?php echo $resultado->descripcion ?></textarea>
                </p>

                <h3 class="w3-panel w3-blue w3-card-4" >Propietario</h3>
                <p>
                    <select name="c16" title="Propietario" class="w3-input w3-border" >
                        <option <?php if ($resultado->idcliente == "1") echo " selected" ?> value="1">SGInmobiliar</option>
                    </select>
                </p>

                <p>
                    <a class="w3-button w3-blue-grey" c  href="<?php echo base_url(). 'admin/inmueble';?>">Atras</a>
                    <input type = "submit" value = "Guardar" class="w3-button w3-deep-orange" />
                </p>
            </form>
         </div>
    </div>
</div>