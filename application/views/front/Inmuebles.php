
<div class="w3-container w3-padding-64 w3-center">

    <!--    formulario-->
    <div class="w3-row">
        <div class="w3-col m3 l3">
            <p style="background-color: red "></p>
        </div>
        <div class="w3-col m6 l6">
            <div class="w3-container w3-blue-grey">
                <h2>Buscar Inmuebles</h2>
            </div>

            <form  class="w3-container w3-card-4 w3-light-grey w3-padding-16" >

                <div class="w3-row-padding">
                    <div class="w3-half">
                        <label>Barrio</label>
                        <input type="text" class="w3-input w3-border w3-round" name="barrio" > 
                    </div>
                    <div class="w3-half">
                        <label >Oferta</label>
                        <select class="w3-input w3-border w3-round" id="estado" onchange="cambiarPrecio()" name="oferta">
                            <option value="Todos">--Todos--</option>
                            <option value="Arriendo">Arriendo</option>
                            <option value="Venta" >Venta</option>
                        </select>
                    </div>
                </div>

                <div class="w3-row-padding">
                    <div class="w3-half">
                        <label>Tipo</label>
                        <select class="w3-input w3-border w3-round"  name="tipo">
                            <option value="Todos">--Todos--</option>
                            <option value= Apartamento >Apartamento</option>
                            <option value= Casa >Casa</option>
                            <option value= Local >Local</option>
                            <option value= Lote >Lote</option>
                        </select>
                    </div>
                    <div class="w3-half" id="precioArriendo">
                        <label >Valor</label>
                        <select class="w3-input w3-border w3-round" name="valor">
                            <option value="0">--Todos--</option>
                            <option value="1" >Menos de 1.000.000</option>
                            <option value="2" >1.000.000 - 2.000.000</option>
                            <option value="3" >2.000.000- 4.000.000</option>
                            <option value="4" >Mas de  4.000.000</option>
                        </select>
                    </div>
                    <div class="w3-half" id="precioVenta" >
                        <label >Valor</label>
                        <select class="w3-input w3-border w3-round" name="valor2">
                            <option value="0">--Todos--</option>
                            <option value="1" >Menos de 100.000.000</option>
                            <option value="2" >100.000.000 - 200.000.000</option>
                            <option value="3" >200.000.000- 400.000.000</option>
                            <option value="4" >Mas de $400.000.000</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="w3-row-padding">
                    <div >
                        <input type="submit"  class="w3-btn w3-blue-grey" value="Buscar">
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>


<!--respuesta-->
<input type="hidden" value="<?php echo $respuesta ?>" id="respuesta"  >




<!--modal-->
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


<!--listado-->

<div class="w3-container">
    <div class="w3-row ">
        <?php
        for ($index = 0; $index < count($arrayDatos); $index++) {
            if ($arrayDatos[$index][2] == "Arriendo-Venta") {
                ?>
                <div class="w3-col m6 l3 tarjeta" style="padding: 1%" >

                    <!--   tarjeta-->
                    <div class="w3-container  w3-card-4 w3-padding-16 ">
                        <h2 class="w3-container  w3-round-small w3-teal"><?php echo $arrayDatos[$index][2] ?></h2>

                        <!--  imagen-->
                        <div class="w3-center  ">
                            <a href="<?php echo RUTA . "inmueble/fotos/" . $arrayDatos[$index][1] ?>" >
                                <img src="<?php echo RUTA . "uploads/" . $arrayDatos[$index][0] ?>" style="height: 200px; width: 220px"  alt="foto"></a>
                        </div>
                        <!--  fin imagen-->

                        <div class="">
                            <h3><strong><?php echo $arrayDatos[$index][3] ?></strong></h3>
                            <strong><?php echo $arrayDatos[$index][7] ?></strong>
                            <p>Valor Arriendo : <?php echo "$ " . number_format($arrayDatos[$index][4]) ?></p>
                            <p>Valor Venta : <?php echo "$ " . number_format($arrayDatos[$index][5]) ?></p>
                            <div class="w3-border-top w3-border-bottom" >
                                <img src="<?php echo RUTA . "public/img/area.png" ?> " alt="baño" width="35" >
                                <?php echo " " . $arrayDatos[$index][8] . " mt2" ?>&nbsp&nbsp
                                <img src="<?php echo RUTA . "public/img/cama2.png" ?> " alt="cama" width="35" >&nbsp
                                <?php echo " " . $arrayDatos[$index][9] ?>&nbsp&nbsp
                                <img src="<?php echo RUTA . "public/img/banera.png" ?> " alt="baño" width="35" >
                                <?php echo " " . $arrayDatos[$index][10] ?>  
                            </div>
                            <a style="margin-top: 5%" class="w3-button w3-blue" href="<?php echo RUTA . "inmueble/fotos/" . $arrayDatos[$index][1] ?>" >Ver mas..</a>
                        </div>


                    </div>
                    <!--   fin tarjeta-->

                </div>

                <?php
            } else {
                ?>
                <div class="w3-col m6 l3 tarjeta " style="padding: 1%" >

                    <!--   tarjeta-->
                    <div class="w3-container  w3-card-4 w3-padding-16 ">
                        <h2 class="w3-container  w3-round-small w3-teal"><?php echo $arrayDatos[$index][2] ?></h2>

                        <!--  imagen-->
                        <div class="w3-center  ">
                            <a href="<?php echo RUTA . "inmueble/fotos/" . $arrayDatos[$index][1] ?>" >
                                <img src="<?php echo RUTA . "uploads/" . $arrayDatos[$index][0] ?>" style="height: 200px; width: 220px" alt="foto"></a>
                        </div>
                        <!--  fin imagen-->

                        <div class="">
                            <h3><strong><?php echo $arrayDatos[$index][3] ?></strong></h3>
                            <strong><?php echo $arrayDatos[$index][5] ?></strong>
                            <p><?php echo $arrayDatos[$index][6] ?></p>
                            <p>Valor: <?php echo "$ " . number_format($arrayDatos[$index][4]) ?></p>
                            <div class="w3-border-top w3-border-bottom" >
                                <img src="<?php echo RUTA . "public/img/area.png" ?> " alt="baño" width="35" >
                                <?php echo " " . $arrayDatos[$index][7] . " mt2" ?>&nbsp&nbsp
                                <img src="<?php echo RUTA . "public/img/cama2.png" ?> " alt="cama" width="35" >&nbsp
                                <?php echo " " . $arrayDatos[$index][8] ?>&nbsp&nbsp
                                <img src="<?php echo RUTA . "public/img/banera.png" ?> " alt="baño" width="35" >
                                <?php echo " " . $arrayDatos[$index][9] ?>  
                            </div>

                            <a style="margin-top: 5%" class="w3-button w3-blue" href="<?php echo RUTA . "inmueble/fotos/" . $arrayDatos[$index][1] ?>" >Ver mas..</a>
                        </div>


                    </div>
                    <!--   fin tarjeta-->

                </div>

            <?php } ?>

        <?php } ?>
    </div>

</div>



<!--javaScript-->
<script>


    precioVenta.style.display = "none";


    function cambiarPrecio() {
        var estado = document.getElementById("estado").value;
        if (estado == "Arriendo") {
            precioArriendo.style.display = "block";
            precioVenta.style.display = "none";
        } 
        if (estado == "Venta") {
            precioVenta.style.display = "block";
            precioArriendo.style.display = "none";
        }
        if (estado == "Venta") {
            precioVenta.style.display = "block";
            precioArriendo.style.display = "none";
        }

    }

</script>






