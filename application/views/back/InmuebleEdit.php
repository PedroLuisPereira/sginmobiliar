<br>
<br>

<div class="w3-container w3-margin-right w3-margin-left">
    <h2 class="w3-panel w3-blue-grey w3-card-4">Editar Inmueble</h2>
    <div class="w3-container">
        <div class="w3-container">
            <form action="<?php echo htmlspecialchars(RUTA . "inmueble/edit/$idinmueble") ?>" method = "POST">

                <p>
                    <input type="text" id="c0" readonly="" value="<?php echo $resultado[0][0] ?>" title="Código" name="c0" maxlength="15"  class="w3-input w3-border" /></p>
                <p>


                <h3 class="w3-panel w3-blue w3-card-4">Datos de la Oferta</h3>
                <p>
                    <select name="c1" title="Estado" class="w3-select" >
                        <option <?php if ($resultado[0][1] == "Disponible") echo "selected" ?> value="Disponible">Disponible</option>
                        <option <?php if ($resultado[0][1] == "No Disponible") echo "selected" ?> value="No Disponible">No Disponible</option>
                    </select>
                </p>
                <p>
                    <select name="c2"  title="Oferta" class="w3-select" >
                        <option <?php if ($resultado[0][2] == "Arriendo") echo "selected" ?> value="Arriendo">Arriendo</option>
                        <option <?php if ($resultado[0][2] == "Venta") echo "selected" ?> value="Venta" >Venta</option>
                        <option <?php if ($resultado[0][2] == "Arriendo-Venta") echo "selected" ?> value="Arriendo-Venta" >Arriendo-Venta</option>
                    </select>
                </p>
                <p>
                    <select title="Tipo de Inmueble" name = "c3" class="w3-select" >
                        <option <?php if ($resultado[0][3] == "Apartamento") echo " selected" ?> value="Apartamento" >Apartamento</option>
                        <option <?php if ($resultado[0][3] == "Casa") echo " selected" ?> value="Casa" >Casa</option>
                        <option <?php if ($resultado[0][3] == "Local") echo " selected" ?> value="Local" >Local</option>
                        <option <?php if ($resultado[0][3] == "Lote") echo " selected" ?> value="Lote" >Lote</option>
                    </select>
                </p>

                <p>
                    <input type = "text" title="Valor Arriendo" value="<?php echo $resultado[0][4] ?>" name = "c4" maxlength="15" placeholder = "Valor Arriendo" onkeyup="format(this)" onchange="format(this)" class="w3-input w3-border" />
                </p>
                
                <p>
                    <input type = "text" title="Valor Venta" value="<?php echo $resultado[0][5] ?>" name = "c5" maxlength="20" placeholder = "Valor Venta" onkeyup="format(this)" onchange="format(this)" class="w3-input w3-border" />
                </p>

                <p>
                    <input type = "text" title="Valor Administración" value="<?php echo $resultado[0][6] ?>" name = "c6" maxlength="15" placeholder = "Valor Administración" onkeyup="format(this)" onchange="format(this)" class="w3-input w3-border" />
                </p>

                <h3 class="w3-panel w3-blue w3-card-4">Datos de la Ubicación</h3>

                <p>
                    <select title="Ciudad" name = "c7" class="w3-select" >
                        <option <?php if ($resultado[0][7] == "Cartagena") echo " selected" ?> value="Cartagena" >Cartagena</option>
                        <option <?php if ($resultado[0][7] == "Turbaco") echo " selected" ?> value="Turbaco" >Turbaco</option>
                        <option <?php if ($resultado[0][7] == "Arjona") echo " selected" ?> value="Arjona" >Arjona</option>
                    </select>
                </p>

                <p>
                    <input type = "text" maxlength="28" title="Barrio" value="<?php echo $resultado[0][8] ?>" required="" name = "c8" placeholder = "Barrio"   class="w3-input w3-border"/>
                </p>

                <p>
                    <input type = "text" title="Dirección" value="<?php echo $resultado[0][9] ?>" required="" name="c9" maxlength="100" placeholder = "Dirección" value = "" class="w3-input w3-border"/>
                </p>

                <h3 class="w3-panel w3-blue w3-card-4">Otros Datos</h3>
                <p>
                    <input type = "number" title="Area" value="<?php echo $resultado[0][10] ?>" required="" name = "c10" max="1000000" placeholder = "Area"  class="w3-input w3-border"/>
                </p>

                <p>
                    <input type = "number" title="Habitaciones" value="<?php echo $resultado[0][11] ?>" required="" name = "c11" max="1000000" placeholder = "Habitaciones"  class="w3-input w3-border"/>
                </p>

                <p>
                    <input type = "number" title="Baños" value="<?php echo $resultado[0][12] ?>" required="" name = "c12" max="1000000" placeholder = "Baños"  class="w3-input w3-border"/>
                </p>

                <p>
                    <input type = "number" title="Piso" value="<?php echo $resultado[0][13] ?>" required="" name = "c13" max="1000000" placeholder = "Piso"  class="w3-input w3-border"/>
                </p>

                <p>
                    <input type = "number" title="Estrato" value="<?php echo $resultado[0][14] ?>" required="" name = "c14" max="1000000" placeholder = "Estrato" class="w3-input w3-border"/>
                </p>

                <h3 class="w3-panel w3-blue w3-card-4">Descripción</h3>
                <p>
                    <textarea name = "c15" title="Descripción" class="w3-input w3-border" maxlength="2000" placeholder = "Descripción"><?php echo $resultado[0][15] ?></textarea>
                </p>

                <h3 class="w3-panel w3-blue w3-card-4" >Propietario</h3>
                <p>
                    <select name="c16" title="Propietario" class="w3-input w3-border" >
                        <option <?php if ($resultado[0][16] == "1") echo " selected" ?> value="1">SGInmobiliar</option>
                    </select>
                </p>

                <p>
                    <a class="w3-button w3-blue"  href="<?php echo RUTA . 'inmueble/getAll';?>">Atras</a>
                    <input type = "submit" value = "Guardar" class="w3-button w3-blue-grey" />
                </p>
            </form>
         </div>
    </div>
</div>

<!--respuesta-->
<input type="hidden" value="<?php echo $respuesta ?>" id="respuesta"  >


<!--modal mail -->
<div>
    <div id="modal" class="w3-modal">
        <div class="w3-modal-content">
            <header class="w3-container w3-teal"> 
                <span onclick="document.getElementById('modal').style.display = 'none'" 
                      class="w3-button w3-display-topright">&times;</span>
                <h2><?php echo $respuesta ?></h2>
            </header>
        </div>
    </div>
</div>

<br>

