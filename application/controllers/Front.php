<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/UsuarioModelo');
        $this->load->model('admin/InmuebleModelo');
        $this->load->model('admin/FotoModelo');
        $this->load->library('email');
        $this->load->library(array('session'));
    }

    //*****************
    public function index($pagina = 0, $tipo = 0) {

        #capturar p
        if (NULL !== $this->input->get("p")) {
            $pagina = $this->input->get("p");
        }


        #capturar consultas 
        if (NULL !== $this->input->get("tipo")) {
            $tipo = $this->input->get("tipo");
            $oferta = $this->input->get("oferta");
            $ciudad = $this->input->get("ciudad");
            $cadena = "&tipo=$tipo&oferta=$oferta&ciudad=$ciudad";
        } else {
            $tipo = $oferta = $ciudad = $cadena = "";
        }



        #numero de registros por pagina
        $inmueblesPaginas = 9;

        #numero de paginas en la consulta
        $numeroPaginas = $this->numeroPaginas($tipo, $oferta, $ciudad, $inmueblesPaginas);
        
        #repetir hasta el numero de paginas sea menor o igual a 10
        while ($numeroPaginas > 10) {
            $inmueblesPaginas++;
            $numeroPaginas = $this->numeroPaginas($tipo, $oferta, $ciudad, $inmueblesPaginas);
        }

        #verficar que esta el numero de pagina
        if ($pagina > $numeroPaginas) {
            show_404();
        }

        #calcular desde donde comienza
        if ($pagina > 1) {
            $desde = ($inmueblesPaginas * ($pagina - 1));
        } else {
            $desde = 0;
        }

        #colocar pagiana en 1 si vale cero
        if ($pagina == 0) {
            $pagina = 1;
        }


        #realizar la consulta
        $arrayInmuebles = $this->InmuebleModelo->listarFront($tipo, $oferta, $ciudad, $desde, $inmueblesPaginas);


        #colar foto
        if (count($arrayInmuebles) > 0) {
            for ($index = 0; $index < count($arrayInmuebles); $index++) {
                $idinmueble = $arrayInmuebles[$index]['idinmueble'];
                $arrayNombreFoto = $this->FotoModelo->listarIdInmuebleFoto($idinmueble);
                if (count($arrayNombreFoto) > 0) {
                    $nombreFoto = $arrayNombreFoto[0]['nombre'];
                    $arrayInmuebles[$index]['foto'] = $nombreFoto;
                } else {
                    $arrayInmuebles[$index]['foto'] = '0.jpg';
                }
            }
        }

        #llenar array datos
        $datos['registros'] = $arrayInmuebles;
        $datos['paginas'] = $numeroPaginas;
        $datos['numero'] = $pagina;
        $datos['cadena'] = $cadena;
        $datos['title'] = "SGInmobiliar";

        #llamar a la vista
        $this->load->view('header', $datos);
        $this->load->view('index', $datos);
        $this->load->view('footer', $datos);
    }
    
    public function listar($pagina = 0, $tipo = 0) {

        #capturar p
        if (NULL !== $this->input->get("p")) {
            $pagina = $this->input->get("p");
        }


        #capturar consultas 
        if (NULL !== $this->input->get("tipo")) {
            $tipo = $this->input->get("tipo");
            $oferta = $this->input->get("oferta");
            $ciudad = $this->input->get("ciudad");
            $cadena = "&tipo=$tipo&oferta=$oferta&ciudad=$ciudad";
        } else {
            $tipo = $oferta = $ciudad = $cadena = "";
        }



        #numero de registros por pagina
        $inmueblesPaginas = 9;

        #numero de paginas en la consulta
        $numeroPaginas = $this->numeroPaginas($tipo, $oferta, $ciudad, $inmueblesPaginas);
        
        #repetir hasta que el numero de paginas sea menor o igual a 10
        while ($numeroPaginas > 10) {
            #aumentar paginas por hojo
            $inmueblesPaginas++;
            $numeroPaginas = $this->numeroPaginas($tipo, $oferta, $ciudad, $inmueblesPaginas);
        }

        #verficar que esta el numero de pagina
        if ($pagina > $numeroPaginas) {
            show_404();
        }

        #calcular desde donde comienza
        if ($pagina > 1) {
            $desde = ($inmueblesPaginas * ($pagina - 1));
        } else {
            $desde = 0;
        }

        #colocar pagiana en 1 si vale cero
        if ($pagina == 0) {
            $pagina = 1;
        }


        #realizar la consulta
        $arrayInmuebles = $this->InmuebleModelo->listarFront($tipo, $oferta, $ciudad, $desde, $inmueblesPaginas);


        #colar foto
        if (count($arrayInmuebles) > 0) {
            for ($index = 0; $index < count($arrayInmuebles); $index++) {
                $idinmueble = $arrayInmuebles[$index]['idinmueble'];
                $arrayNombreFoto = $this->FotoModelo->listarIdInmuebleFoto($idinmueble);
                if (count($arrayNombreFoto) > 0) {
                    $nombreFoto = $arrayNombreFoto[0]['nombre'];
                    $arrayInmuebles[$index]['foto'] = $nombreFoto;
                } else {
                    $arrayInmuebles[$index]['foto'] = '0.jpg';
                }
            }
        }

        #llenar array datos
        $datos['registros'] = $arrayInmuebles;
        $datos['paginas'] = $numeroPaginas;
        $datos['numero'] = $pagina;
        $datos['cadena'] = $cadena;
        $datos['title'] = "SGInmobiliar";

        #llamar a la vista
        $this->load->view('header', $datos);
        $this->load->view('listar', $datos);
        $this->load->view('footer', $datos);
    }


    public function nosotros() {

        #colocar titulo
        $datos['title'] = "SGInmobiliar";

        #llamar a la vista
        $this->load->view('header', $datos);
        $this->load->view('nosotros', $datos);
        $this->load->view('footer', $datos);
    }

    public function contacto() {
        #variables respuesta
        $datos["respuesta"] = "";

        #verificar si existe post
        if ($this->input->server("REQUEST_METHOD") == "POST") {

            #verificar si llegan todos los datos 
            if ((!empty($_POST["nombre"])) and ( !empty($_POST["email"])) and ( !empty($_POST["mensaje"]))) {

                #capturar los datos
                $nombre = $this->input->post("nombre");
                $email = $this->input->post("email");
                $mensaje = $this->input->post("mensaje");

                #limpiar datos
                $nombre = $this->test_input($_POST["nombre"]);
                $email = $this->test_input($_POST["email"]);
                $mensaje = $this->test_input($_POST["mensaje"]);

                #enviar correo
                $this->email->from($email, $nombre);
                $this->email->to('sginmobiliar@gmail.com');
                $this->email->cc('druped@hotmail.com');
                $this->email->subject('Interesado de la Pagina Web');
                $this->email->message($mensaje);
                $this->email->send();

                #enviar respuesta
                $datos["respuesta"] = "Email enviado con éxito";
            } else {
                $datos["respuesta"] = "Error al enviar correo";
            }
        }

        #colocar titulo
        $datos['title'] = "SGInmobiliar";

        #llamar a la vista
        $this->load->view('header', $datos);
        $this->load->view('contacto', $datos);
        $this->load->view('footer', $datos);
    }

    public function login() {
        $datos["respuesta"] = "";
        if ($this->input->server("REQUEST_METHOD") == "POST") {

            #capturar datos 
            $correo = $this->input->post("correo");
            $contra = $this->input->post("contra");

            #verificar si existen 
            if (!empty($correo) and ! empty($contra)) {

                #realizar la consulta
                $registro = $this->UsuarioModelo->conultarCorreo($correo);

                #verificar si existe el correo
                if (!empty($registro)) {

                    #verificar contra
                    $contraRegistro = $registro['contra'];
                    $comprobar = password_verify($contra, $contraRegistro);
                    if ($comprobar) {
                        #redirigir al panel 
                        $this->iniciarSesion($registro);
                        redirect(base_url() . "admin/panel");
                    }
                }

                $datos["respuesta"] = "Usuario o password incorrectos";
            }
        }

        #colocar titulo
        $datos['title'] = "SGInmobiliar";

        #llamar a la vista
        $this->load->view('header', $datos);
        $this->load->view('login', $datos);
        $this->load->view('footer', $datos);
    }

    private function numeroPaginas($tipo, $oferta, $ciudad, $inmueblesPagina) {
        $registros = $this->InmuebleModelo->contarInmueblesPaginacion($tipo, $oferta, $ciudad);
        $registros = $registros['numero'];
        $numeroDePaginas = ceil($registros / $inmueblesPagina);
        return $numeroDePaginas;
    }

    public function detalles($idinmueble = 0) {

        #revisar u contacto
        $datos['respuesta'] = $this->contactoMini($idinmueble);

        #realizar consulta 
        $objRegistros = $this->InmuebleModelo->consultarId($idinmueble);

        if (!empty($objRegistros)) {

            #pasar a array
            $datos['registro'] = (array) $objRegistros;

            #buscar fotos
            $objFotos = $this->FotoModelo->listarIdInmueble($idinmueble);

            #verificar fotos
            if (!empty($objFotos)) {
                $datos['fotos'] = json_decode(json_encode($objFotos), true);
            } else {
                show_404();
            }

            $oferta = $datos['registro']['oferta'];
            $datos['registrosRelacionados'] = $this->listarRelacionados($idinmueble, $oferta);


            #llamar a la vista
            $data['title'] = "SGInmobiliar";
            $this->load->view('header', $datos);
            $this->load->view('detalles', $datos);
            $this->load->view('footer', $datos);
        } else {
            show_404();
        }
    }

    private function listarRelacionados($idinmuebleDetalle, $oferta) {
        $tipo = "";
        $ciudad = "";
        $de = 0;
        $hasta = "";

        #realizar la consulta
        $arrayInmuebles = $this->InmuebleModelo->listarFrontRela($tipo, $oferta, $ciudad);
        $numero = count($arrayInmuebles);


        #ver si existen inmuebles
        $contador = 0;
        if (count($arrayInmuebles) > 0) {
            for ($index = 0; $index < $numero; $index++) {
                if ($idinmuebleDetalle == $arrayInmuebles[$index]['idinmueble']) {
                    unset($arrayInmuebles[$index]);
                } else {
                    $idinmueble = $arrayInmuebles[$index]['idinmueble'];
                    $arrayNombreFoto = $this->FotoModelo->listarIdInmuebleFoto($idinmueble);
                    if (count($arrayNombreFoto) > 0) {
                        $nombreFoto = $arrayNombreFoto[0]['nombre'];
                        $arrayInmuebles[$index]['foto'] = $nombreFoto;
                    } else {
                        $arrayInmuebles[$index]['foto'] = '0.jpg';
                    }

                    if ($contador > 2) {
                        unset($arrayInmuebles[$index]);
                    }
                    $contador++;
                }
            }
        }

        return $arrayInmuebles;
    }

    public function iniciarSesion($registro) {
        #llenar datos para crear la sesion
        $data = array(
            'idusuario' => $registro['idusuario'],
            'documento' => $registro['documento'],
            'nombre' => $registro['nombre'],
            'rol' => $registro['rol'],
            'estado' => $registro['estado'],
            'correo' => $registro['correo'],
            'login_in' => TRUE
        );
        $this->session->set_userdata($data);
    }

    public function logout() {
        $data = array('idusuario', 'documento', 'nombre', 'rol', 'estado', 'correo', 'login_in');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
        redirect(base_url());
    }

    private function contactoMini($idinmueble) {

        $respuesta = "";
        if ($this->input->server("REQUEST_METHOD") == "POST") {

            #verificar si llegan todos los datos 
            if ((!empty($_POST["nombre"])) and ( !empty($_POST["email"])) and ( !empty($_POST["telefono"]))) {

                #capturar los datos
                $nombre = $this->input->post("nombre");
                $email = $this->input->post("email");
                $telefono = $this->input->post("telefono");

                #limpiar datos
                $nombre = $this->test_input($_POST["nombre"]);
                $email = $this->test_input($_POST["email"]);
                $telefono = $this->test_input($_POST["telefono"]);

                #enviar correo
                $this->email->from($email, $nombre);
                $this->email->to('sginmobiliar@gmail.com');
                $this->email->cc('druped@hotmail.com');
                $this->email->subject('Interesado de la Pagina Web');
                $this->email->message("Interesado en el inmueble $idinmueble Telefono: " . $telefono);
                $this->email->send();

                #enviar respuesta
                $respuesta = "Email enviado con éxito";
            } else {
                $respuesta = "Error al enviar correo";
            }
        }

        return $respuesta;
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

}
