<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once 'application/models/InmuebleModelo.php';

/**
 * Description of Inmueble
 *
 * @author Usuario
 */
class Inmueble extends CI_Controller {
    /*
     * Realiza la consulta de los inmuebles, recibe los parametros por GET y devuelve un array con 
     * los inmuebles mas un mensaje de respuesta.
     */

    public function index() {

        //comprobar si se hizo la consulta
        if (isset($_GET["barrio"])) {

            #obtener los datos
            $barrio = $_GET["barrio"];
            $oferta = $_GET["oferta"];
            $tipo = $_GET["tipo"];
            $valorArriendo = $_GET["valor"];
            $valorVenta = $_GET["valor2"];

            #varibales auxiliares
            $valorArriendo1 = 0;
            $valorArriendo2 = 0;
            $valorVenta1 = 0;
            $valorVenta2 = 0;

            if ($oferta == "Todos") {
                $oferta = "";
            }

            if ($tipo == "Todos") {
                $tipo = "";
            }


            #buscar los valores arriendo 
            switch ($valorArriendo) {
                case 0:
                    $valorArriendo1 = 0;
                    $valorArriendo2 = 999999999;
                    break;

                case 1:
                    $valorArriendo1 = 0;
                    $valorArriendo2 = 1000000;
                    break;
                case 2:
                    $valorArriendo1 = 1000001;
                    $valorArriendo2 = 2000000;
                    break;
                case 3:
                    $valorArriendo1 = 2000001;
                    $valorArriendo2 = 4000000;
                    break;
                case 4:
                    $valorArriendo1 = 4000001;
                    $valorArriendo2 = 999999999;
                    break;
            }

            #buscar los valores arriendo 
            switch ($valorVenta) {
                case 0:
                    $valorVenta1 = 0;
                    $valorVenta2 = 9999999999;
                    break;
                case 1:
                    $valorVenta1 = 0;
                    $valorVenta2 = 100000000;
                    break;
                case 2:
                    $valorVenta1 = 100000001;
                    $valorVenta2 = 200000000;
                    break;
                case 3:
                    $valorVenta1 = 200000001;
                    $valorVenta2 = 400000000;
                    break;
                case 4:
                    $valorVenta1 = 400000001;
                    $valorVenta2 = 9999999999;
                    break;
            }
        } else {
            $barrio = "";
            $oferta = "";
            $tipo = "";
            $valorArriendo1 = "0";
            $valorArriendo2 = "999999999999";
            $valorVenta1 = "0";
            $valorVenta2 = "99999999999999";
        }

        $respuesta = "";

        $objModelo = new InmuebleModelo();
        $arrayInmueble = $objModelo->getInmuebles($barrio, $oferta, $tipo, $valorArriendo1, $valorArriendo2, $valorVenta1, $valorVenta2);


        #Crear los datos a mostrar 
        if (count($arrayInmueble) > 0) {
            #obtener id de cada inmuebles
            $registros = 0;
            for ($index = 0; $index < count($arrayInmueble); $index++) {

                #Obtener los datos de cada inmueble
                $idinmueble = $arrayInmueble[$index][0];
                $estado = $arrayInmueble[$index][1];
                $oferta = $arrayInmueble[$index][2];
                $tipo = $arrayInmueble[$index][3];
                $valorarriendo = $arrayInmueble[$index][4];
                $valorventa = $arrayInmueble[$index][5];
                $valoradmin = $arrayInmueble[$index][6];
                $ciudad = $arrayInmueble[$index][7];
                $barrio = $arrayInmueble[$index][8];
                $direccion = $arrayInmueble[$index][9];
                $area = $arrayInmueble[$index][10];
                $habitaciones = $arrayInmueble[$index][11];
                $banios = $arrayInmueble[$index][12];
                $piso = $arrayInmueble[$index][13];
                $estrato = $arrayInmueble[$index][14];
                $descripcion = $arrayInmueble[$index][15];



                $nombreFoto = "";

                #buscar foto principal
                #obtener todas las fotos de cada inmueble
                $objModelo = NULL;
                $objModelo = new InmuebleModelo();
                $arrayFotos = $objModelo->getFotos($idinmueble);




                #verificar si tiene foto
                if (count($arrayFotos) > 0) {
                    #sacar el nombre de la foto principal
                    $nombreFoto = $arrayFotos[0][1];
                    #llenar un registro con los datos
                    if ($estado == "Disponible") {
                        if ($oferta == "Arriendo") {
                            $arrayfila = array($nombreFoto, $idinmueble, $oferta, $tipo, $valorarriendo, $ciudad, $barrio, $area, $habitaciones, $banios);
                        }

                        if ($oferta == "Venta") {
                            $arrayfila = array($nombreFoto, $idinmueble, $oferta, $tipo, $valorventa, $ciudad, $barrio, $area, $habitaciones, $banios);
                        }

                        if ($oferta == "Arriendo-Venta") {
                            $arrayfila = array($nombreFoto, $idinmueble, $oferta, $tipo, $valorarriendo, $valorventa, $ciudad, $barrio, $area, $habitaciones, $banios);
                        }


                        #agregar el registro al array
                        $arrayDatos[$registros] = $arrayfila;
                        $registros++;
                    }
                } else {
                    //cuando no tiene foto 
                }
            }
        } else {
            $respuesta = "No se encontraron inmuebles con esos valores";
        }



        #llamar a la vista
        $datos["arrayDatos"] = $arrayDatos;
        $datos["respuesta"] = $respuesta;

//        echo('<pre>');
//        print_r($datos);
//        echo('</pre>');


        $this->load->view('plantillas/Cabecera');
        $this->load->view('front/Inmuebles', $datos);
        $this->load->view('plantillas/Pie');
    }

    /*
     * Publica un nuevo inmueble, 
     */

    public function set() {
        //verificar que esta iniciada la session 
        if (!isset($_SESSION["session"])) {
            // No acceso
            show_404();
        }

        $datos["respuesta"] = "";

        //verificar que se reciben por POST los datos
        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            // verificar si existen los datos
            if (isset($_POST["c1"], $_POST["c2"], $_POST["c3"], $_POST["c4"], $_POST["c5"], $_POST["c6"], $_POST["c7"], $_POST["c8"], $_POST["c9"], $_POST["c10"], $_POST["c11"], $_POST["c12"], $_POST["c13"], $_POST["c14"])) {

                #Capturar y limpiar los datos
                $estado = "Disponible";
                $oferta = $this->test_input($_POST["c1"]);
                $tipo = $this->test_input($_POST["c2"]);
                $valorarriendo = $this->test_input($_POST["c3"]);
                $valorventa = $this->test_input($_POST["c4"]);
                $valoradmin = $this->test_input($_POST["c5"]);
                $ciudad = $this->test_input($_POST["c6"]);
                $barrio = $this->test_input($_POST["c7"]);
                $direccion = $this->test_input($_POST["c8"]);
                $area = $this->test_input($_POST["c9"]);
                $habitaciones = $this->test_input($_POST["c10"]);
                $baños = $this->test_input($_POST["c11"]);
                $piso = $this->test_input($_POST["c12"]);
                $estrato = $this->test_input($_POST["c13"]);
                $descripcion = $this->test_input($_POST["c14"]);
                $idcliente = 1;


                #formaterar lo valores numericos 
                $valorarriendo = $this->farmatoNumero($valorarriendo);
                $valorventa = $this->farmatoNumero($valorventa);
                $valoradmin = $this->farmatoNumero($valoradmin);



                #Lamar al modelo y realizar el insert
                $objModelo = new InmuebleModelo();
                $respuesta = $objModelo->insert($estado, $oferta, $tipo, $valorarriendo, $valorventa, $valoradmin, $ciudad, $barrio, $direccion, $area, $habitaciones, $baños, $piso, $estrato, $descripcion, $idcliente);

                #Verificar el Numero de fotos subidas 
                $numeroFotos = count($_FILES["c15"]);

                //buscar id del inmueble
                $arrayRespuesta = $objModelo->getUltimoId();
                $idinmueble = $arrayRespuesta[0][0];
                $objModelo = NULL;



                // si se subieron fotos configuarlas y subirlas 
                if ($numeroFotos > 0) {
                    $this->configurarFotos($idinmueble);
                }
                $datos["respuesta"] = "Datos guardados exitosamente";
            }
        }

        #llamar a la vista
        $this->load->view('plantillas/Cabecera');
        $this->load->view('back/InmuebleSet', $datos);
        $this->load->view('plantillas/Pie');
    }

    /*
     * Formater los numero para quitarles los separadores de .
     */

    private function farmatoNumero($numero) {

        #Convertir a array
        $array1 = str_split($numero);
        $array2 = array();
        for ($index = 0; $index < count($array1); $index++) {
            if ($array1[$index] != ".") {
                $array2[$index] = $array1[$index];
            }
        }

        $numero = implode($array2);
        return $numero;
    }

    
    /*
     * Realizar una consulta de todos los inmuebles en el back-end
     * recibe un valor a buscar y devuelve un array con todos los inmuebles 
     */
    public function getAll($valor = "") {

        #verficar la sesion
        if (!isset($_SESSION["session"])) {
        // No acceso
            show_404();
        }

        if (isset($_GET["valor"])) {
            $valor = $_GET["valor"];
        } else {
            $valor = "";
        }


        #realizar la consulta
        $objModelo = new InmuebleModelo();
        $datos["resultado"] = $objModelo->getAll($valor);


        #Llamar a las vistas
        $this->load->view('plantillas/Cabecera');
        $this->load->view('back/InmuebleGetAll', $datos);
        $this->load->view('plantillas/Pie');
    }

    
    
    public function get() {

        if (!isset($_SESSION["session"])) {
        // No acceso
            show_404();
        }


        $this->load->view('front/Cabecera');
        $this->load->view('back/SetInmueble');
        $this->load->view('front/Pie');
    }

    
    /*
     * Editar una pueblicacio recibe los datos por Post y vuelve una respueta  
     */
    public function edit($idinmueble = 0) {

        if (!isset($_SESSION["session"])) {
        // No acceso
            show_404();
        }

        $datos["respuesta"] = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            /* -----------------------------------------------------------------
             * verificar si existen todos los valores
             * --------------------------------------------------------------
             */
            if (isset($_POST["c0"], $_POST["c1"], $_POST["c2"], $_POST["c3"], $_POST["c4"], $_POST["c5"], $_POST["c6"], $_POST["c7"], $_POST["c8"], $_POST["c9"], $_POST["c10"], $_POST["c11"], $_POST["c12"], $_POST["c13"], $_POST["c14"], $_POST["c15"], $_POST["c16"])) {
                #Capturar los datos
                $idinmueble = $this->test_input($_POST["c0"]);
                $estado = $this->test_input($_POST["c1"]);
                $oferta = $this->test_input($_POST["c2"]);
                $tipo = $this->test_input($_POST["c3"]);
                $valorarriendo = $this->test_input($_POST["c4"]);
                $valorventa = $this->test_input($_POST["c5"]);
                $valoradmin = $this->test_input($_POST["c6"]);
                $ciudad = $this->test_input($_POST["c7"]);
                $barrio = $this->test_input($_POST["c8"]);
                $direccion = $this->test_input($_POST["c9"]);
                $area = $this->test_input($_POST["c10"]);
                $habitaciones = $this->test_input($_POST["c11"]);
                $banios = $this->test_input($_POST["c12"]);
                $piso = $this->test_input($_POST["c13"]);
                $estrato = $this->test_input($_POST["c14"]);
                $descripcion = $this->test_input($_POST["c15"]);
                $idcliente = $this->test_input($_POST["c16"]);


                /* -----------------------------------------------------------------
                 * Limpiar los datos
                 * --------------------------------------------------------------
                 */

                #formaterar lo valores numericos
                $valorarriendo = $this->farmatoNumero($valorarriendo);
                $valorventa = $this->farmatoNumero($valorventa);
                $valoradmin = $this->farmatoNumero($valoradmin);

                #Lamar al modelo
                $objModelo = new InmuebleModelo();
                $respuesta = $objModelo->edit($idinmueble, $estado, $oferta, $tipo, $valorarriendo, $valorventa, $valoradmin, $ciudad, $barrio, $direccion, $area, $habitaciones, $banios, $piso, $estrato, $descripcion, $idcliente);
                $datos["respuesta"] = "Datos guardados exitosamente";
            }
        }


        $objModelo = NULL;
        $objModelo = new InmuebleModelo();
        $datos["resultado"] = $objModelo->getIdinmueble($idinmueble);
        $datos["idinmueble"] = $idinmueble;

        $this->load->view('plantillas/Cabecera');
        $this->load->view('back/InmuebleEdit', $datos);
        $this->load->view('plantillas/Pie');
    }

    /*
     * Consultar todas las fotos de un inmueble
     */
    public function getFotos($idinmueble = 0) {

        if (!isset($_SESSION["session"])) {
        // No acceso
            show_404();
        }

        //realizar la consulta
        $objModelo = new InmuebleModelo();
        $datos["resultado"] = $objModelo->getFotos($idinmueble);
        $datos["idinmueble"] = $idinmueble;
        $datos["respuesta"] = "";


        #llamar a la vista
        $this->load->view('plantillas/Cabecera');
        $this->load->view('back/InmuebleFotos', $datos);
        $this->load->view('plantillas/Pie');
    }

    /*
     * Agregar mas fotos a un apueblicacion 
     */
    public function masFotos($idinmueble = 0) {

        if (!isset($_SESSION["session"])) {
        // No acceso
            show_404();
        }

        #Numero de fotos y la variable file c15
        $numeroFotos = count($_FILES["c15"]);


        if ($numeroFotos > 0) {
            $this->configurarFotos($idinmueble);
        }

        $datos["respuesta"] = "Datos guardados exitosamente";
        $datos["idinmueble"] = $idinmueble;

        $objModelo = new InmuebleModelo();
        $datos["resultado"] = $objModelo->getFotos($idinmueble);



        #llamar a la vista
        $this->load->view('plantillas/Cabecera');
        $this->load->view('back/InmuebleFotos', $datos);
        $this->load->view('plantillas/Pie');
    }

    //Eliminar una foto
    public function deleteFotos() {
    
        #obtener id inmueble 
        $idinmueble = $_POST["idinmueble"];

        # verificar que existe el inmueble
        $objModelo = new InmuebleModelo();
        $arrayRespuesta = $objModelo->getFotos($idinmueble);

        if (count($arrayRespuesta) == 0) {
            show_404();
        } else {
            $error = 0;
            for ($index = 0; $index < count($arrayRespuesta); $index++) {
                $idfoto = $arrayRespuesta[$index][0];
                $nombre = $arrayRespuesta[$index][1];

                if (isset($_REQUEST["c" . $idfoto])) {
                    $ruta = RUTA . "uploads/" . $nombre;

                    $file = "uploads/" . $nombre;

                    if (is_readable($file) && unlink($file)) {
                        $respuesta = $objModelo->deleteFoto($idfoto);
                    } else {
                        show_404();
                    }
                }
            }

            #Realizar consulta
            $objModelo = new InmuebleModelo();
            $datos["resultado"] = $objModelo->getFotos($idinmueble);
            $datos["idinmueble"] = $idinmueble;
            $datos["respuesta"] = "Fotos eliminadas exitosamente";


            #llamar a la vista
            $this->load->view('plantillas/Cabecera');
            $this->load->view('back/InmuebleFotos', $datos);
            $this->load->view('plantillas/Pie');
        }
    }

    /*
     * Gurdar las fotos subidas 
     */
    private function configurarFotos($idinmueble) {

        if (!isset($_SESSION["session"])) {
        // No acceso
            show_404();
        }


        #obtener numero de fotos
        $numeroFotos = (count($_FILES["c15"]["name"]));
        $cont = 0;
        $peso = 0;

        if ($numeroFotos > 20) {
            $numeroFotos = 20;
        }


        #subir cada uno de los archivos
        while ($cont < $numeroFotos) {
            #obener los datos 
            $nombre = $_FILES["c15"]["name"][$cont];
            $tipo = $_FILES["c15"]["type"][$cont];
            $temporal = $_FILES["c15"]["tmp_name"][$cont];
            $error = $_FILES["c15"]["error"][$cont];
            $tamanio = $_FILES["c15"]["size"][$cont];

            #verificar la extension
            $extension = substr($nombre, -3);

            #verificar el peso 
            $peso = $peso + $tamanio;

            #verificar que sea la extension y que el peso no supere 
            if ($extension == "jpg" and $peso <= 2097000) {

                #obtener id foto y se le suma 1
                $objModelo = new InmuebleModelo();
                $arrayArchivo = $objModelo->getUltimoIdFotos();
                $idfoto = $arrayArchivo[0][0] + 1;

                #colocar consecutivo al nombre para que no se repita y la extension
                $nombre = $idinmueble . "_" . $idfoto . ".jpg";


                #establecer la ruta
                $ruta = "uploads/" . $nombre;
                
                #guardar en la tabla fotos
                $objModelo = NULL;
                $objModelo = new InmuebleModelo();
                $respueta = $objModelo->setFoto($nombre, $ruta, $idinmueble);


                #crear el array
                $foto = array(
                    "name" => $nombre,
                    "type" => $tipo,
                    "tmp_name" => $temporal,
                    "error" => $error,
                    "size" => $tamanio
                );


                #crear archivo imagen
                $_FILES["imagen"] = $foto;

                #subir cada foto
                $this->do_upload("imagen");
            }

            #aumentar contador
            $cont++;
        }
    }

    /*
     * Subir cada foto
     */
    private function do_upload($nombre) {

        if (!isset($_SESSION["session"])) {
            // No acceso
            show_404();
        }

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 500000;
        $config['max_width'] = 1024000;
        $config['max_height'] = 768000;
        $this->load->library('upload', $config);

        //if (!$this->upload->do_upload('userfile')) {
        if (!$this->upload->do_upload($nombre)) {
            // $error = array('error' => $this->upload->display_errors());
            // $this->load->view('back/upload_form', $error);
            echo "error";
        } else {
            // $datos = array('upload_data' => $this->upload->data());
            // $this->load->view('back/upload_success', $datos);
        }
    }

    public function fotos($idinmueble) {
        $objModelo = new InmuebleModelo();
        $arrayFotos = $objModelo->getFotos($idinmueble);
        $datos["arrayFotos"] = $arrayFotos;

        $objModelo = NULL;
        $objModelo = new InmuebleModelo();
        $arrayInmueble = $objModelo->getIdinmueble($idinmueble);
        $datos["arrayInmueble"] = $arrayInmueble;

        $datos["respuesta"] = "";

        if (count($arrayFotos) > 0 && count($arrayInmueble) > 0) {
            $this->load->view('plantillas/Cabecera');
            $this->load->view('front/Fotos', $datos);
            $this->load->view('plantillas/Pie');
        } else {
            show_404();
        }
    }

    /*
     * limpiar las cadenas
     */
    private function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

}
