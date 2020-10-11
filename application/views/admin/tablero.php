<!DOCTYPE html>
<html lang="es">
    <title>W3.CSS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <body>

        <div class="w3-top">

            <div class="w3-bar w3-blue">
                <a href="#" class="w3-bar-item w3-padding-16 w3-button">Inicio</a>
                <a href="#" class="w3-bar-item w3-padding-16 w3-button w3-hide-small">Inmuebles</a>
                <a href="#" class="w3-bar-item w3-padding-16 w3-button w3-hide-small">Usuarios</a>
                <div class="w3-dropdown-hover">
                    <button class="w3-button w3-padding-16 w3-hide-small">Dropdown</button>
                    <div class="w3-dropdown-content w3-bar-block w3-card-4">
                        <a href="#" class="w3-bar-item w3-button">Link 1</a>
                        <a href="#" class="w3-bar-item w3-button">Link 2</a>
                        <a href="#" class="w3-bar-item w3-button">Link 3</a>
                    </div>
                </div>
                <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="myFunction()">&#9776;</a>
            </div>

            <div id="demo" class="w3-bar-block w3-red w3-hide w3-hide-large w3-hide-medium">
                <a href="#" class="w3-bar-item w3-button">Link 1</a>
                <a href="#" class="w3-bar-item w3-button">Link 2</a>
                <a href="#" class="w3-bar-item w3-button">Link 3</a>
            </div>
        </div>



        <!--            contenido-->
        <div class="w3-container">
            <!-- Header -->
            <header class="w3-container" style="padding-top:22px">
                <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
            </header>

            <div class="w3-row-padding w3-margin-bottom">
                <div class="w3-quarter">
                    <div class="w3-container w3-red w3-padding-16">
                        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
                        <div class="w3-right">
                            <h3>52</h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>Messages</h4>
                    </div>
                </div>
                <div class="w3-quarter">
                    <div class="w3-container w3-blue w3-padding-16">
                        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
                        <div class="w3-right">
                            <h3>99</h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>Views</h4>
                    </div>
                </div>
                <div class="w3-quarter">
                    <div class="w3-container w3-teal w3-padding-16">
                        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
                        <div class="w3-right">
                            <h3>23</h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>Shares</h4>
                    </div>
                </div>
                <div class="w3-quarter">
                    <div class="w3-container w3-orange w3-text-white w3-padding-16">
                        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                        <div class="w3-right">
                            <h3>50</h3>
                        </div>
                        <div class="w3-clear"></div>
                        <h4>Users</h4>
                    </div>
                </div>
            </div>

        </div>
        <!--            fin contenido-->
    </div>



    <script>
        function myFunction() {
            var x = document.getElementById("demo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>

</body>
</html>
