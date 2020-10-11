<?php

defined('BASEPATH') or exit('No direct script access allowed');

class FotoModelo extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getUltimoIdFotos() {
        $sql = "SELECT MAX(idfoto) AS id FROM foto;";
        $resultado = $this->db->query($sql);
        return $resultado->result();
    }

    public function listarIdInmueble($idinmueble) {
        $sql = "SELECT * FROM foto WHERE idinmueble = $idinmueble ;";
        $resultado = $this->db->query($sql);
        return $resultado->result();
    }
    
    public function listarIdInmuebleFoto($idinmueble) {
        $sql = "SELECT nombre FROM foto where idinmueble = $idinmueble limit 1 ;";
        $resultado = $this->db->query($sql);
        return $resultado->result_array();
    }

    public function getNombreFotos($idinmueble) {
        $sql = "SELECT nombre,idinmueble FROM foto WHERE idinmueble = $idinmueble  ";
        $resultado = $this->db->query($sql);
        return $resultado->result();
    }

    public function setFoto($nombre, $idinmueble) {
        $sql = "INSERT INTO foto VALUES (null,\"$nombre\",\"$idinmueble\")";
        $resultado = $this->db->query($sql);
    }

    public function eliminar($idfoto) {
        $sql = "DELETE FROM foto WHERE idfoto = $idfoto;";
        $resultado = $this->db->query($sql);
    }

}
