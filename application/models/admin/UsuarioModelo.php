<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UsuarioModelo extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function conultarCorreo($correo) {
        $this->db->where("correo", $correo);
        $this->db->where("estado", "Activo");
        $resultado = $this->db->get("usuario");
        return $resultado->row_array();
    }

    public function listar($valor) {
        $sql = "SELECT * FROM usuario where idusuario like '%$valor%' or
                documento like '%$valor%' or nombre    like '%$valor%' or rol like '%$valor%' or estado like '%$valor%' or
                correo    like '%$valor%' or direccion like '%$valor%' or telefono like '%$valor%' order by nombre";
        $resultado = $this->db->query($sql);
        return $resultado->result();
    }

    public function consultarDocCon($documento, $correo) {
        $this->db->where("documento", $documento);
        $this->db->or_where("correo", "$correo");
        $resultado = $this->db->get("usuario");
        return $resultado->result();
    }

    public function consultarIdDocCon($idusuario, $documento, $correo) {
        $sql = "SELECT * FROM usuario where idusuario <> $idusuario and (documento = '$documento'  or correo = '$correo');";
        $resultado = $this->db->query($sql);
        return $resultado->result();
    }

    public function listarRol() {
        $resultado = $this->db->get("rol");
        return $resultado->result();
    }

    public function listarId($idusuario) {
        $this->db->where("idusuario", $idusuario);
        $resultado = $this->db->get("usuario");
        return $resultado->row();
    }

    public function nuevo($data) {
        return $this->db->insert("usuario", $data);
    }

    public function editar($idusuario, $data) {
        $this->db->where("idusuario", $idusuario);
        return $this->db->update("usuario", $data);
    }
    
    public function eliminar($idusuario, $data) {
        $this->db->where("idusuario", $idusuario);
        return $this->db->delete('usuario');
    }

}
