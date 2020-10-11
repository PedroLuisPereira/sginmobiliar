<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/InmuebleModelo');
        $this->load->model('admin/UsuarioModelo');
        $this->load->library(array('session'));
        $this->sesion();
    }

    public function index() {
        $datos["mensaje"] ="";
        $datos["inmuebles"] = $this->InmuebleModelo->contarInmuebles();
        $datos["disponible"] = $this->InmuebleModelo->contarEstado("Disponible");
        $datos["nodisponible"] = $this->InmuebleModelo->contarEstado("No Disponible");

        $datos["titulo"] = "Panel Administrador";

        $this->load->view('admin/header', $datos);
        $this->load->view('admin/dashboard', $datos);
        $this->load->view('admin/footer');
    }

    public function password() {
        $datos["mensaje"] ="";
        #comprobar metodo post
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            #capturar datos
            $contra0 = $this->input->post("p0");
            
            #limpiar
            $contra0 = $this->test_input($contra0);
            #realizar la consulta
            $correo = $this->session->correo;
            
            $registro = $this->UsuarioModelo->conultarCorreo($correo);

            #verificar si existe el correo
            if (!empty($registro)) {
                #verificar contra
                $contraRegistro = $registro['contra'];
                $comprobar = password_verify($contra0, $contraRegistro);
                if ($comprobar) {
                    #capturar contras
                    $contra1 = $this->input->post("p1");
                    $contra2 = $this->input->post("p2");

                    #limpiar contras 
                    $contra1 = $this->test_input($contra1);
                    $contra2 = $this->test_input($contra2);
                    
                    #vericar que lleguen los dos datos
                    if (!empty($contra1) and ! empty($contra2)) {
                        if ($contra1 == $contra2) {
                            #encriptar contraseña
                            $contra = password_hash($contra1, PASSWORD_BCRYPT);
                            //$contra = $contra1;
                            #crear el data
                            $data = array("contra" => $contra);
                            #llamar al modelo
                            $idusuario = $this->session->idusuario;
                            $respuesta = $this->UsuarioModelo->editar($idusuario, $data);
                            $datos['mensaje'] = "Password actualizada";
                        } else {
                            $datos['mensaje'] = "Error, no coinciden las password";
                        }
                    }
                }else{
                    $datos['mensaje'] = "Error, password errada";
                }
            }
        }



        $datos["titulo"] = "Cambiar Password";

        $this->load->view('admin/header', $datos);
        $this->load->view('admin/password', $datos);
        $this->load->view('admin/footer');
    }

    private function sesion() {

        if ($this->session->login_in == FALSE) {
            show_404();
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

}
