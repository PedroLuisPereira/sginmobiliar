<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/UsuarioModelo');
        $this->load->library(array('session'));
        $this->sesion();
    }

    public function index() {
        $this->listar();
    }

    public function listar($valor = "") {

        $datos["mensaje"] ="";
        #verificar si existe valor
        if (NULL !== $this->input->get("valor")) {
            $valor = $this->input->get("valor");
            #limpiar datos
            $valor = $this->test_input($valor);
        }

        #realizar la consulta
        $datos["usuarios"] = $this->UsuarioModelo->listar($valor);

        #colocar datos
        $datos["titulo"] = "Usuario";
        $datos["valor"] = $valor;

        #llamar a la vista
        $this->load->view('admin/header', $datos);
        $this->load->view('admin/usuario_listar', $datos);
        $this->load->view('admin/footer');
    }
    
    public function nuevo() {
        $datos["mensaje"] ="";
        if ($this->input->server("REQUEST_METHOD") == "POST") {

            #capturar datos
            $documento = $this->input->post("c1");
            $nombre = $this->input->post("c2");
            $rol = $this->input->post("c3");
            $correo = $this->input->post("c4");
            $contra = $this->input->post("c5");
            $direccion = $this->input->post("c6");
            $telefono = $this->input->post("c7");


            #limpiar datos
            $documento = $this->test_input($documento);
            $nombre = $this->test_input($nombre);
            $rol = $this->test_input($rol);
            $correo = $this->test_input($correo);
            $contra = $this->test_input($contra);
            $direccion = $this->test_input($direccion);
            $telefono = $this->test_input($telefono);
            

            #verificar documento y contra
            $registros = $this->UsuarioModelo->consultarDocCon($documento, $correo);

            #si no existe el registro 
            if (empty($registros)) {
                #crear el data
                $data = array(
                    "documento" => $documento,
                    "nombre" => $nombre,
                    "rol" => $rol,
                    "estado" => 'Activo',
                    "correo" => $correo,
                    "contra" => password_hash($contra, PASSWORD_BCRYPT),
                    "direccion" => $direccion,
                    "telefono" => $telefono
                );


                #llamar al modelo
                $respuesta = $this->UsuarioModelo->nuevo($data);

                if ($respuesta == TRUE) {
                    redirect(base_url() . "admin/usuario/listar");
                } else {
                    $datos["mensaje"] ="Error al guardar el registro";
                }
            } else {
                $datos["mensaje"]= "Error, documento o correo ya existen";
            }
        }


        #Llamar a la vista
        $datos["titulo"] = "Nuevo Usuario";
        $this->load->view('admin/header', $datos);
        $this->load->view('admin/usuario_nuevo');
        $this->load->view('admin/footer');
    }
    
    public function editar($idusuario = 0) {
        $datos["mensaje"] ="";
        if ($this->input->server("REQUEST_METHOD") == "POST") {

            #capturar datos
            $idusuario = $this->input->post("c0");
            $documento = $this->input->post("c1");
            $nombre = $this->input->post("c2");
            $rol = $this->input->post("c3");
            $estado = $this->input->post("c4");
            $correo = $this->input->post("c5");
            $direccion = $this->input->post("c6");
            $telefono = $this->input->post("c7");


            #limpiar los datos 
            $idusuario = $this->test_input($idusuario);
            $documento = $this->test_input($documento);
            $nombre = $this->test_input($nombre);
            $rol = $this->test_input($rol);
            $estado = $this->test_input($estado);
            $correo = $this->test_input($correo);
            $direccion = $this->test_input($direccion);
            $telefono = $this->test_input($telefono);
            

            #verificar documento y contra
            $registros = $this->UsuarioModelo->consultarIdDocCon($idusuario, $documento, $correo);

            #verificar que no existe documento o correo en otro idusuario
            if (empty($registros)) {
                #crear el data
                $data = array(
                    "idusuario" => $idusuario,
                    "documento" => $documento,
                    "nombre" => $nombre,
                    "rol" => $rol,
                    "estado" => $estado,
                    "correo" => $correo,
                    "direccion" => $direccion,
                    "telefono" => $telefono
                );


                #llamar al modelo
                $respuesta = $this->UsuarioModelo->editar($idusuario, $data);

                if ($respuesta == TRUE) {
                    redirect(base_url() . "admin/usuario/listar");
                } else {
                    $datos["mensaje"] ="Error al guardar el registro";
                }
            } else {
                $datos["mensaje"] = "Error, documento o correo ya existen";
            }
        }

        $datos["registros"] = $this->UsuarioModelo->listarId($idusuario);


        #verificar si existen registros
        if (empty($datos["registros"])) {
            show_404();
        } else {

            #Llamar a la vista
            $datos["titulo"] = "Editar Usuario";
            $this->load->view('admin/header', $datos);
            $this->load->view('admin/usuario_editar');
            $this->load->view('admin/footer');
        }
    }
    
    public function eliminar($idusuario = 0) {

        $datos["registros"] = $this->UsuarioModelo->listarId($idusuario);


        #verificar si existen registros
        if (empty($datos["registros"])) {
            show_404();
        } else {

            $data = array("estado" => 0);

            #llamar al modelo
            $datos["registros"] = $this->UsuarioModelo->eliminar($idusuario, $data);

            #Llamar a la vista
            $this->listar();
        }
    }
    
    public function password($idusuario = 0) {
        $datos["mensaje"] ="";
        #comprobar metodo post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            #capturar datos
            //$idusuario = $this->input->post("p0");
            $contra1 = $this->input->post("p1");
            $contra2 = $this->input->post("p2");

            #limpiar datos
            $contra1 = $this->test_input($contra1);
            $contra2 = $this->test_input($contra2);
            
            #vericar que lleguen los dos datos
            if (!empty($contra1) and ! empty($contra2)) {
                if ($contra1 == $contra2) {
                    #encriptar contraseña
                    $contra = password_hash($contra1, PASSWORD_BCRYPT);
                    #crear el data
                    $data = array("contra" => $contra);
                    #llamar al modelo
                    $respuesta = $this->UsuarioModelo->editar($idusuario, $data);
                    $datos["mensaje"] ="Password actualizada";
                }else{
                    $datos["mensaje"] ="Error, no coinciden las contraseñas";
                }
            }
        }


        #verificar que existe el idusuario
        $datos["registro"] = $this->UsuarioModelo->listarId($idusuario);

        if (empty($datos["registro"])) {
            show_404();
        } else {
            $nombre = $datos["registro"]->nombre;
            $datos["titulo"] = "Cambiar Password de $nombre";
            $datos["idusuario"] = $idusuario;
            $this->load->view('admin/header', $datos);
            $this->load->view('admin/usuario_password', $datos);
            $this->load->view('admin/footer');
        }
    }

    private function sesion() {

        if ($this->session->login_in == FALSE) {
            show_404();
        }

        if ($this->session->rol == 'Usuario') {
            show_404();
        }
    }

    public function login() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            $email = $_POST["email"];

            //encriptar password
            $pass = $_POST['password'];
            $passHash = password_hash($pass, PASSWORD_BCRYPT);

            echo password_verify($pass, $passHash);
        }

        $this->load->view('admin/login');
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
