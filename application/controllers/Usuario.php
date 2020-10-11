<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'application/models/UsuarioModelo.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Usuario
 */
class Usuario extends CI_Controller {

    public function login() {
        $respuesta = "";

        #validar datos de entrada
        if (isset($_POST["correo"], $_POST["contra"])) {
            #capturar los datos
            $correo = $this->test_input($_POST["correo"]);
            $contra = $this->test_input($_POST["contra"]);



            #hacer las validaciones
            /*             * ******************* */

            #realizar la consulta
            $objModelo = new UsuarioModelo();
            $resultado = $objModelo->comprobar($correo, $contra);


            #verificar la consulta
            if (count($resultado) > 0) {
                #crear la sesion 
                $_SESSION["session"] = TRUE;
                $_SESSION["idusuario"] = $resultado[0]["idusuario"];
                $_SESSION["nombre"] = $resultado[0]["nombre"];
                
                $datos["respuesta"] = "";
                
                $this->load->view('plantillas/Cabecera');
                $this->load->view('front/Inicio',$datos);
                $this->load->view('plantillas/Pie');
            } else {
                $datos["respuesta"] = "Error al ingresar,correo o contraseña errados ";

                $this->load->view('plantillas/Cabecera');
                $this->load->view('front/Login', $datos);
                $this->load->view('plantillas/Pie');
            }
        } else {
            $datos["respuesta"] = $respuesta;

            #llamar a la vista
            $this->load->view('plantillas/Cabecera');
            $this->load->view('front/Login', $datos);
            $this->load->view('plantillas/Pie');
        }
    }

    /**
     * Registra un nuevo usuario a la base de datos
     *
     * Recibe los parametros de la vista, los procesa y los guarda en la base de datos
     *
     * @access public
     * @param string $user user name of the account
     * @return Account
     */
    public function set() {
        if (!isset($_SESSION["session"])) {
            show_404();
        }

        $respuesta = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["c1"], $_POST["c2"], $_POST["c3"], $_POST["c4"], $_POST["c5"], $_POST["c6"], $_POST["c7"])) {


                #capturar datos 
                $documento = $this->test_input($_POST["c1"]);
                $nombre = $this->test_input($_POST["c2"]);
                $rol = $this->test_input($_POST["c3"]);
                $correo = $this->test_input($_POST["c4"]);
                $contra = $this->test_input($_POST["c5"]);
                $direccion = $this->test_input($_POST["c6"]);
                $telefono = $this->test_input($_POST["c7"]);

                //----------------------------------------------------
                #limpiarlos 
                //----------------------------------------------------
                //---------------------------------------------------
                #comprobar que no se repita cedula y correo 
                $objModelo = new UsuarioModelo();
                $resultado = $objModelo->comprobarDocCorreo($documento, $correo);
                if (count($resultado) > 0) {
                    $respuesta = "Error, Documento o Correo ya existen";
                } else {
                    #Guardar datos 
                    $respuesta = $objModelo->insert($documento, $nombre, $rol, $correo, $contra, $direccion, $telefono);
                    if ($respuesta) {
                        $respuesta = "Usuario creado exitosamente";
                    }
                }
                
            }
        }

        #llenar array datos
        $datos["respuesta"] = $respuesta;
        
        #llamar a la vista
        $this->load->view('plantillas/Cabecera');
        $this->load->view('back/UsuarioSet', $datos);
        $this->load->view('plantillas/Pie');
    }

    public function getAll() {
        if (!isset($_SESSION["session"])) {
            show_404();
        }

        #realizar la consulta
        $objModelo = new UsuarioModelo();
        $datos["resultado"] = $objModelo->getAll();

        #llamar a la vista
        $this->load->view('plantillas/Cabecera');
        $this->load->view('back/UsuarioGetAll', $datos);
        $this->load->view('plantillas/Pie');
    }

    public function edit($idusuario = 0) {
        if (!isset($_SESSION["session"])) {
            show_404();
        }

        $datos["respuesta"] = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_POST["c1"], $_POST["c2"], $_POST["c3"], $_POST["c4"], $_POST["c5"], $_POST["c6"], $_POST["c7"])) {
                #capturar datos
                $idusuario = $this->test_input($_POST["c0"]);
                $documento = $this->test_input($_POST["c1"]);
                $nombre = $this->test_input($_POST["c2"]);
                $rol = $this->test_input($_POST["c3"]);
                $correo = $this->test_input($_POST["c4"]);
                $contra = $this->test_input($_POST["c5"]);
                $direccion = $this->test_input($_POST["c6"]);
                $telefono = $this->test_input($_POST["c7"]);


                #Guardar datos 
                $objModelo = new UsuarioModelo();
                $respuesta = $objModelo->comprobarIdDocCorreo($idusuario, $documento, $correo);
                if (count($respuesta) > 0) {
                    $datos["respuesta"] = "Error, ya existe es número de documento o correo";
                } else {
                    $respuesta = $objModelo->edit($idusuario, $documento, $nombre, $rol, $correo, $contra, $direccion, $telefono);
                    if ($respuesta) {
                        $datos["respuesta"] = "Usuario actualizado exitosamente";
                    }
                }
            }
        }

        $objModelo = new UsuarioModelo();

        $datos["resultado"] = $objModelo->getIdusuario($idusuario);


        #verificar que exista el id
        if (count($datos["resultado"]) == 0) {
            show_404();
        } else {
            $this->load->view('plantillas/Cabecera');
            $this->load->view('back/UsuarioEdit', $datos);
            $this->load->view('plantillas/Pie');
        }
    }

    public function delete($idusuario = 0) {
        if (!isset($_SESSION["session"])) {
            show_404();
        }

        $objModelo = new UsuarioModelo();


        $datos["resultado"] = $objModelo->getIdusuario($idusuario);

        #verificar que exista el id
        if (count($datos["resultado"]) == 0) {
            show_404();
        } else {
            $objModelo->delete($idusuario);
            $this->getAll();
        }
    }

    private function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function cerrarSesion() {
        session_unset();
        session_destroy();
        
        $datos["respuesta"] = "";

        $this->load->view('plantillas/Cabecera');
        $this->load->view('front/Inicio',$datos);
        $this->load->view('plantillas/Pie');
    }

}
