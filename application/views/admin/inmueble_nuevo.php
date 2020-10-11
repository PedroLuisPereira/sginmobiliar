
<br>

<div class="w3-container w3-margin w3-card-4">

    <header class="w3-container" style="padding-top:22px">
        <h3><b><i class="fa fa-share-alt"></i><?php echo $titulo ?></b></h3>
    </header>

    <div class="w3-container">
        <form enctype="multipart/form-data" onsubmit="return formInmuebleSet()" action="<?php echo htmlspecialchars(base_url() . "admin/inmueble/nuevo") ?>" method = "POST">

            <h3 class="w3-panel w3-blue w3-card-4">Datos de la Oferta</h3>
            <p>
                <select title="Oferta" name="c1" id="c1" class="w3-select" >
                    <option value="--oferta--">--Oferta--</option>
                    <option value="Arriendo">Arriendo</option>
                    <option value="Venta" >Venta</option>
                    <option value="Arriendo-Venta" >Arriendo-Venta</option>
                </select>
            </p>

            <p>
                <select title="Tipo de Inmueble" name="c2" id="c2" class="w3-select" >
                    <option value="--Tipo de Inmueble--">--Tipo de Inmueble--</option>
                    <option value="Apartamento" >Apartamento</option>
                    <option value="Casa" >Casa</option>
                    <option value="Local" >Local</option>
                    <option value="Lote" >Lote</option>
                </select>
            </p>

            <p>
                <input type = "text" title="Valor Arriendo" id="c3"  name = "c3" maxlength="15" placeholder = "Valor Arriendo" onkeyup="format(this)" onchange="format(this)" class="w3-input w3-border" /></p>

            <p>
                <input type = "text" title="Valor Venta" id="c4" name = "c4" maxlength="20" placeholder = "Valor Venta" onkeyup="format(this)" onchange="format(this)" class="w3-input w3-border" /></p>

            <p>
                <input type = "text" title="Valor Administración" id="c5" name = "c5" maxlength="15" placeholder = "Valor Administración" onkeyup="format(this)" onchange="format(this)" class="w3-input w3-border" />
            </p>

            <h3 class="w3-panel w3-blue w3-card-4">Datos de la Ubicación</h3>

            <p>
                <select title="Ciudad" name = "c6" id="c6" class="w3-select" >
                    <option value="--Ciudad--">--Ciudad--</option>
                    <option value="Cartagena" >Cartagena</option>
                    <option value="Turbaco" >Turbaco</option>
                    <option value="Arjona" >Arjona</option>
                </select>
            </p>

            <p>
                <input type = "text" title="Barrio" maxlength="45" required="" name = "c7" placeholder = "Barrio"   class="w3-input w3-border"/>
            </p>

            <p>
                <input type = "text" title="Dirección" required="" name="c8" maxlength="100" placeholder = "Dirección" value = "" class="w3-input w3-border"/>
            </p>

            <h3 class="w3-panel w3-blue w3-card-4">Otros Datos</h3>
            <p>
                <input type = "number" title="Area" required="" name = "c9" max="1000000" placeholder = "Area"  class="w3-input w3-border"/>
            </p>

            <p>
                <input type = "number" title="Habitaciones" required="" name = "c10" max="1000000" placeholder = "Habitaciones"  class="w3-input w3-border"/>
            </p>

            <p>
                <input type = "number" title="Baños" required="" name = "c11" max="1000000" placeholder = "Baños"  class="w3-input w3-border"/>
            </p>

            <p>
                <input type = "number" title="Piso" required="" name = "c12" max="1000000" placeholder = "Piso"  class="w3-input w3-border"/>
            </p>

            <p>
                <input type = "number" title="Estrato" required="" name = "c13" max="1000000" placeholder = "Estrato" class="w3-input w3-border"/>
            </p>

            <h3 class="w3-panel w3-blue w3-card-4">Descripción</h3>
            <p>
                <textarea name = "c14" title="Descripción" class="w3-input w3-border" maxlength="2000" placeholder = "Descripción"></textarea>
            </p>

            <h3 class="w3-panel w3-blue w3-card-4" >Propietario</h3>
            <p>
                <select title="Cliente" name = "c15" id="c15" class="w3-input w3-border" >
                    <option value="1">SGInmobiliar</option>
                </select>
            </p>
            <h3 class="w3-panel w3-blue w3-card-4">Fotos</h3>
            <p>
                <input type = "file" id="c16" name = "c16[]" multiple="" required="" class="w3-input w3-border" />
                <span style="color: red" >*Máximo 20 archivos con extensión .jpg o .jpeg y máximo 2MB por carga</span>
            </p>
            <p>
                <input type = "submit" value = "Guardar" class="w3-button w3-deep-orange" />
            </p>
        </form>
    </div>
</div>
