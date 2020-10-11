<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Fotos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/InmuebleModelo');
        $this->load->model('admin/FotoModelo');
        $this->load->library(array('session'));
        $this->sesion();
    }

    public function ver($idinmueble = 0) {

        if ($this->input->server("REQUEST_METHOD") == "POST") {
            $arrayFotos = $_FILES["c16"];
            $respuestaFotos = $this->guardarFotos($idinmueble, $arrayFotos);
        }

        $datos["mensaje"] = "";
        $datos["titulo"] = "Inmuebles";
        $datos["registros"] = $this->FotoModelo->listarIdinmueble($idinmueble);
        $datos["idinmueble"] = $idinmueble;


        #llamar a la vista
        $this->load->view('admin/header', $datos);
        $this->load->view('admin/fotos_listar', $datos);
        $this->load->view('admin/footer');
    }

    public function eliminar() {
        $datos["mensaje"] = "";
        if ($this->input->server("REQUEST_METHOD") == "POST") {
            #obtener id inmueble 
            $idinmueble = $_POST["idinmueble"];


            # verificar que existe el inmueble
            #buscar fotos del inmueble
            $objeto = $this->FotoModelo->listarIdInmueble($idinmueble);
            #convertir a array
            $array = json_decode(json_encode($objeto), True);

            if (isset($array) == NULL) {
                show_404();
            } else {

                for ($index = 0; $index < count($array); $index++) {
                    $idfoto = $array[$index]["idfoto"];
                    $nombre = $array[$index]["nombre"];

                    if (isset($_REQUEST["c" . $idfoto])) {
                        $ruta = base_url() . "uploads/" . $nombre;
                        $file = "uploads/" . $nombre;

                        if (is_readable($file) && unlink($file)) {
                            $respuesta = $this->FotoModelo->eliminar($idfoto);
                        } else {
                            show_404();
                        }
                    } else {
                        
                    }
                }
            }
        }

        $datos["titulo"] = "Inmuebles";
        $datos["registros"] = $this->FotoModelo->listarIdinmueble($idinmueble);
        $datos["idinmueble"] = $idinmueble;


        #llamar a la vista
        $this->load->view('admin/header', $datos);
        $this->load->view('admin/fotos_listar', $datos);
        $this->load->view('admin/footer');
    }

    private function guardarFotos($idinmueble, $arrayFotos) {
        #Verificar el Numero de fotos subidas
        $numeroFotos = count($arrayFotos["name"]);

        // si se subieron fotos configuarlas y subirlas 
        if ($numeroFotos > 0) {
            $this->configurarFotos($idinmueble, $numeroFotos);
        }
    }

    private function sesion() {

        if ($this->session->login_in == FALSE) {
            show_404();
        }
    }

    private function configurarFotos($idinmueble, $numeroFotos) {

        #obtener numero de fotos
        $cont = 0;
        $peso = 0;

        if ($numeroFotos > 20) {
            $numeroFotos = 20;
        }


        #subir cada uno de los archivos
        while ($cont < $numeroFotos) {
            #obener los datos 
            $nombre = $_FILES["c16"]["name"][$cont];
            $tipo = $_FILES["c16"]["type"][$cont];
            $temporal = $_FILES["c16"]["tmp_name"][$cont];
            $error = $_FILES["c16"]["error"][$cont];
            $tamanio = $_FILES["c16"]["size"][$cont];

            #buscar extension        
            $i = strpos($nombre, ".");
            $tamañoCadena = strlen($nombre);
            $posicion = $tamañoCadena - $i;
            $extension = substr($nombre, -$posicion + 1);

            #verificar el peso 
            $peso = $peso + $tamanio;


            #verificar que sea la extension y que el peso no supere 
            if (($extension == "jpg" or $extension == "jpeg") and $peso <= 2097000) {

                #obtener id foto y se le suma 1
                $respuesta = $this->FotoModelo->getUltimoIDFotos();
                $idfoto = $respuesta[0]->id + 1;


                #colocar consecutivo al nombre para que no se repita y la extension
                $nombre = $idinmueble . "_" . $idfoto . "." . $extension;


                #guardar en la tabla fotos
                $respueta = $this->FotoModelo->setFoto($nombre, $idinmueble);

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

    private function do_upload($nombre) {

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpeg|jpg';
        $config['max_size'] = 500000;
        $config['max_width'] = 1024000;
        $config['max_height'] = 768000;
        $this->load->library('upload', $config);


        if (!$this->upload->do_upload($nombre)) {
            echo "error";
        }
    }

}
