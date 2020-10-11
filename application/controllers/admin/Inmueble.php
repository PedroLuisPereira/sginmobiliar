<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inmueble extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/InmuebleModelo');
        $this->load->model('admin/FotoModelo');
        $this->load->library(array('session'));
        $this->sesion();
    }

    public function index() {
        $this->listar();
    }

    public function listar($valor = "") {
        $datos["mensaje"] = "";
        #verificar si existe valor
        if (NULL !== $this->input->get("valor")) {
            $valor = $this->input->get("valor");
        }

        #limpiar datos
        $valor = $this->test_input($valor);

        #realizar la consulta
        $datos["registros"] = $this->InmuebleModelo->listar($valor);
        $datos["titulo"] = "Inmuebles";
        $datos["valor"] = $valor;

        #llamar a la vista
        $this->load->view('admin/header', $datos);
        $this->load->view('admin/inmueble_listar');
        $this->load->view('admin/footer');
    }

    public function nuevo() {
        $datos['mensaje'] = "";

        if ($this->input->server("REQUEST_METHOD") == "POST") {

            #capturar datos
            $estado = "Disponible";
            $oferta = $this->input->post("c1");
            $tipo = $this->input->post("c2");
            $valorarriendo = $this->input->post("c3");
            $valorventa = $this->input->post("c4");
            $valoradmin = $this->input->post("c5");
            $ciudad = $this->input->post("c6");
            $barrio = $this->input->post("c7");
            $direccion = $this->input->post("c8");
            $area = $this->input->post("c9");
            $habitaciones = $this->input->post("c10");
            $baños = $this->input->post("c11");
            $piso = $this->input->post("c12");
            $estrato = $this->input->post("c13");
            $descripcion = $this->input->post("c14");
            $idcliente = $this->input->post("c15");


            #limpiar datos
            $oferta = $this->test_input($oferta);
            $tipo = $this->test_input($tipo);
            $valorarriendo = $this->test_input($valorarriendo);
            $valorventa = $this->test_input($valorventa);
            $valoradmin = $this->test_input($valoradmin);
            $ciudad = $this->test_input($ciudad);
            $barrio = $this->test_input($barrio);
            $direccion = $this->test_input($direccion);
            $area = $this->test_input($area);
            $habitaciones = $this->test_input($habitaciones);
            $baños = $this->test_input($baños);
            $piso = $this->test_input($piso);
            $estrato = $this->test_input($estrato);
            $descripcion = $this->test_input($descripcion);
            $idcliente = $this->test_input($idcliente);



            #formaterar lo valores numericos
            $valorarriendo = $this->farmatoNumero($valorarriendo);
            $valorventa = $this->farmatoNumero($valorventa);
            $valoradmin = $this->farmatoNumero($valoradmin);

            #crear el data
            $data = array(
                "estado" => $estado,
                "oferta" => $oferta,
                "tipo" => $tipo,
                "valorarriendo" => $valorarriendo,
                "valorventa" => $valorventa,
                "valoradmin" => $valoradmin,
                "ciudad" => $ciudad,
                "barrio" => $barrio,
                "direccion" => $direccion,
                "area" => $area,
                "habitaciones" => $habitaciones,
                "baños" => $baños,
                "piso" => $piso,
                "estrato" => $estrato,
                "descripcion" => $descripcion,
                "idcliente" => $idcliente,
            );



            #llamar al modelo
            $respuesta = $this->InmuebleModelo->nuevo($data);

            #buscar ultimo idinmueble
            $respuestaId = $this->InmuebleModelo->ultimoId();
            $idinmueble = $respuestaId[0]->id;

            #guardar fotos
            $arrayFotos = $_FILES["c16"];
            $respuestaFotos = $this->guardarFotos($idinmueble, $arrayFotos);


            if ($respuesta == TRUE) {
                redirect(base_url() . "admin/inmueble");
            } else {
                $datos['mensaje'] = "Error al guardar el registro";
            }
        }


        #llamar a la vista
        $datos["titulo"] = "Publicar Inmueble";
        $this->load->view('admin/header', $datos);
        $this->load->view('admin/inmueble_nuevo', $datos);
        $this->load->view('admin/footer');
    }

    public function editar($idinmueble = 0) {

        $datos["mensaje"] = "";

        if ($this->input->server("REQUEST_METHOD") == "POST") {

            #capturar datos
            $idinmueble = $this->input->post("c0");
            $estado = $this->input->post("c1");
            $oferta = $this->input->post("c2");
            $tipo = $this->input->post("c3");
            $valorarriendo = $this->input->post("c4");
            $valorventa = $this->input->post("c5");
            $valoradmin = $this->input->post("c6");
            $ciudad = $this->input->post("c7");
            $barrio = $this->input->post("c8");
            $direccion = $this->input->post("c9");
            $area = $this->input->post("c10");
            $habitaciones = $this->input->post("c11");
            $baños = $this->input->post("c12");
            $piso = $this->input->post("c13");
            $estrato = $this->input->post("c14");
            $descripcion = $this->input->post("c15");
            $idcliente = $this->input->post("c16");

            #limpiar datos
            $idinmueble = $this->test_input($idinmueble);
            $oferta = $this->test_input($oferta);
            $tipo = $this->test_input($tipo);
            $valorarriendo = $this->test_input($valorarriendo);
            $valorventa = $this->test_input($valorventa);
            $valoradmin = $this->test_input($valoradmin);
            $ciudad = $this->test_input($ciudad);
            $barrio = $this->test_input($barrio);
            $direccion = $this->test_input($direccion);
            $area = $this->test_input($area);
            $habitaciones = $this->test_input($habitaciones);
            $baños = $this->test_input($baños);
            $piso = $this->test_input($piso);
            $estrato = $this->test_input($estrato);
            $descripcion = $this->test_input($descripcion);
            $idcliente = $this->test_input($idcliente);

            #formaterar lo valores numericos 
            $valorarriendo = $this->farmatoNumero($valorarriendo);
            $valorventa = $this->farmatoNumero($valorventa);
            $valoradmin = $this->farmatoNumero($valoradmin);

            #crear el data
            $data = array(
                "idinmueble" => $idinmueble,
                "estado" => $estado,
                "oferta" => $oferta,
                "tipo" => $tipo,
                "valorarriendo" => $valorarriendo,
                "valorventa" => $valorventa,
                "valoradmin" => $valoradmin,
                "ciudad" => $ciudad,
                "barrio" => $barrio,
                "direccion" => $direccion,
                "area" => $area,
                "habitaciones" => $habitaciones,
                "baños" => $baños,
                "piso" => $piso,
                "estrato" => $estrato,
                "descripcion" => $descripcion,
                "idcliente" => $idcliente,
            );


            #llamar al modelo
            $respuesta = $this->InmuebleModelo->editar($idinmueble, $data);

            if ($respuesta == TRUE) {
                redirect(base_url() . "admin/inmueble/listar");
            } else {

                $datos['mensaje'] = "Error al guardar el registro";
            }
        }


        #realizar consulta 
        $datos["resultado"] = $this->InmuebleModelo->consultarId($idinmueble);

        if (isset($datos["resultado"])) {
            #llamar a la vista
            $datos["titulo"] = "Editar Inmueble";
            $this->load->view('admin/header', $datos);
            $this->load->view('admin/inmueble_editar', $datos);
            $this->load->view('admin/footer');
        } else {
            show_404();
        }
    }

    private function eliminar($idinmueble = 0) {

        $datos["mensaje"] = "";

        if ($this->input->server("REQUEST_METHOD") == "POST") {

            #capturar datos
            $idinmueble = $this->input->post("c0");
            $estado = $this->input->post("c1");
            $oferta = $this->input->post("c2");
            $tipo = $this->input->post("c3");
            $valorarriendo = $this->input->post("c4");
            $valorventa = $this->input->post("c5");
            $valoradmin = $this->input->post("c6");
            $ciudad = $this->input->post("c7");
            $barrio = $this->input->post("c8");
            $direccion = $this->input->post("c9");
            $area = $this->input->post("c10");
            $habitaciones = $this->input->post("c11");
            $baños = $this->input->post("c12");
            $piso = $this->input->post("c13");
            $estrato = $this->input->post("c14");
            $descripcion = $this->input->post("c15");
            $idcliente = $this->input->post("c16");

            #limpiar datos
            $idinmueble = $this->test_input($idinmueble);
            $oferta = $this->test_input($oferta);
            $tipo = $this->test_input($tipo);
            $valorarriendo = $this->test_input($valorarriendo);
            $valorventa = $this->test_input($valorventa);
            $valoradmin = $this->test_input($valoradmin);
            $ciudad = $this->test_input($ciudad);
            $barrio = $this->test_input($barrio);
            $direccion = $this->test_input($direccion);
            $area = $this->test_input($area);
            $habitaciones = $this->test_input($habitaciones);
            $baños = $this->test_input($baños);
            $piso = $this->test_input($piso);
            $estrato = $this->test_input($estrato);
            $descripcion = $this->test_input($descripcion);
            $idcliente = $this->test_input($idcliente);

            #formaterar lo valores numericos 
            $valorarriendo = $this->farmatoNumero($valorarriendo);
            $valorventa = $this->farmatoNumero($valorventa);
            $valoradmin = $this->farmatoNumero($valoradmin);

            #crear el data
            $data = array(
                "idinmueble" => $idinmueble,
                "estado" => $estado,
                "oferta" => $oferta,
                "tipo" => $tipo,
                "valorarriendo" => $valorarriendo,
                "valorventa" => $valorventa,
                "valoradmin" => $valoradmin,
                "ciudad" => $ciudad,
                "barrio" => $barrio,
                "direccion" => $direccion,
                "area" => $area,
                "habitaciones" => $habitaciones,
                "baños" => $baños,
                "piso" => $piso,
                "estrato" => $estrato,
                "descripcion" => $descripcion,
                "idcliente" => $idcliente,
            );


            #llamar al modelo
            $respuesta = $this->InmuebleModelo->editar($idinmueble, $data);

            if ($respuesta == TRUE) {
                redirect(base_url() . "admin/inmueble/listar");
            } else {

                $datos['mensaje'] = "Error al guardar el registro";
            }
        }


        #realizar consulta 
        $datos["resultado"] = $this->InmuebleModelo->consultarId($idinmueble);

        if (isset($datos["resultado"])) {

            #eliminar fotos en base de datos
            #eliminar fotos en uploads
            #eliminar inmueble
            $datos["resultado"] = $this->InmuebleModelo->eliminar($idinmueble);

            #llamar a la vista
            $datos["titulo"] = "Editar Inmueble";
            $this->load->view('admin/header', $datos);
            $this->load->view('admin/inmueble_editar', $datos);
            $this->load->view('admin/footer');
        } else {
            show_404();
        }
    }

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

    private function guardarFotos($idinmueble, $arrayFotos) {
        #Verificar el Numero de fotos subidas
        $numeroFotos = count($arrayFotos["name"]);

        // si se subieron fotos configuarlas y subirlas 
        if ($numeroFotos > 0) {
            $this->configurarFotos($idinmueble, $numeroFotos);
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

    private function test_input($data) {
        $caracteres = array("<", ">", "(", ")", "/", "'", "[", "]", "{", "}", "\\");
        $data = str_replace($caracteres, " ", $data);
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = strip_tags($data);
        return $data;
    }

    private function sesion() {

        if ($this->session->login_in == FALSE) {
            show_404();
        }
    }

}
