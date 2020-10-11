<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'Conexion.php';

/**
 * Description of Usuario
 *
 * @author Usuario
 */
class UsuarioModelo extends Conexion {

    public function comprobar($correo, $contra) {
        $sql = "SELECT * FROM usuario where correo = \"$correo\" and contra =\"$contra\";";
        $respuesta = $this->consultaSelect($sql);
        return $respuesta;
    }

    public function comprobarDocCorreo($documento, $correo) {
        $sql = "SELECT * FROM usuario where correo = \"$correo\" or documento =\"$documento\";";
        $respuesta = $this->consultaSelect($sql);
        return $respuesta;
    }

    public function comprobarIdDocCorreo($idusuario, $documento, $correo) {
        $sql = "SELECT * FROM usuario where idusuario<>$idusuario and (correo = \"$correo\" or documento =\"$documento\");";
        $respuesta = $this->consultaSelect($sql);
        return $respuesta;
    }

    public function insert($documento, $nombre, $rol, $correo, $contra, $direccion, $telefono) {
        $sql = "INSERT INTO usuario VALUES (null, '$documento', '$nombre', '$rol', '$correo', '$contra', '$direccion', '$telefono');";
        $respuesta = $this->consultaSimple($sql);
        return $respuesta;
    }

    public function getAll() {
        $sql = "SELECT * FROM usuario";
        $respuesta = $this->consultaSelect($sql);
        return $respuesta;
    }

    public function getIdusuario($idusuario) {
        $sql = "SELECT * FROM usuario where idusuario = $idusuario ";
        $respuesta = $this->consultaSelect($sql);
        return $respuesta;
    }

    public function edit($idusuario, $documento, $nombre, $rol, $correo, $contra, $direccion, $telefono) {
        $sql = "UPDATE usuario SET "
                . "documento = '$documento', nombre = '$nombre', rol = '$rol', "
                . "correo = '$correo', contra = '$contra', direccion = '$direccion', "
                . "telefono = '$telefono' WHERE (idusuario = '$idusuario');";
        $respuesta = $this->consultaSimple($sql);
        return $respuesta;
    }

    public function delete($idusuario) {
        $sql = "DELETE FROM usuario WHERE (idusuario = '$idusuario');";
        $respuesta = $this->consultaSimple($sql);
        return $respuesta;
    }

}
