<?php

defined('BASEPATH') or exit('No direct script access allowed');

class InmuebleModelo extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function listar($valor) {
        $sql = "SELECT * FROM inmueble where idinmueble like '%$valor%' or
                estado like '%$valor%' or oferta like '%$valor%' or tipo like '%$valor%' or
                valorarriendo like '%$valor%' or valorventa like '%$valor%'
                or ciudad like '%$valor%' or barrio like '%$valor%' order by idinmueble desc";
        $resultado = $this->db->query($sql);
        return $resultado->result();
    }
    
    

    public function listarFront($tipo, $oferta, $ciudad,$de,$hasta) {
        $sql = "SELECT * FROM inmueble where estado = 'Disponible' "
                . "and oferta like '%$oferta%' and tipo like '%$tipo%'"
                . "and ciudad like '%$ciudad%' order by idinmueble desc "
                . "LIMIT $de,$hasta;";
        $resultado = $this->db->query($sql);
        return $resultado->result_array();
    }
    
    public function listarFrontRela($tipo, $oferta, $ciudad) {
        $sql = "SELECT * FROM inmueble where estado = 'Disponible' "
                . "and oferta like '%$oferta%' and tipo like '%$tipo%'"
                . "and ciudad like '%$ciudad%' order by idinmueble desc;";
        $resultado = $this->db->query($sql);
        return $resultado->result_array();
    }
    

    public function contarInmuebles() {
        $sql = "SELECT count(*) as numero FROM inmueble";
        $resultado = $this->db->query($sql);
        return $resultado->row_array();
    }

    public function contarInmueblesPaginacion($tipo,$oferta,$ciudad) {
        $sql = "SELECT count(*) as numero FROM inmueble "
                . "where estado = 'Disponible' "
                . "and oferta like '%$oferta%' and tipo like '%$tipo%' and ciudad like '%$ciudad%'";
        $resultado = $this->db->query($sql);
        return $resultado->row_array();
    }
    
    public function contarEstado($estado) {
        $sql = "SELECT count(*) as numero FROM inmueble where estado = '$estado' ";
        $resultado = $this->db->query($sql);
        return $resultado->row_array();
    }

    public function listarRol() {
        $resultado = $this->db->get("rol");
        return $resultado->result();
    }

    public function consultarId($idinmueble) {
        $this->db->where("idinmueble", $idinmueble);
        $resultado = $this->db->get("inmueble");
        return $resultado->row();
    }

    public function nuevo($data) {
        return $this->db->insert("inmueble", $data);
    }

    public function editar($idinmueble, $data) {
        $this->db->where("idinmueble", $idinmueble);
        return $this->db->update("inmueble", $data);
    }

    public function eliminar($idusuario, $data) {
        $this->db->where("idusuario", $idusuario);
        return $this->db->update("usuario", $data);
    }

    public function ultimoId() {
        $sql = "SELECT MAX(idinmueble) AS id FROM inmueble;";
        $resultado = $this->db->query($sql);
        return $resultado->result();
    }

}
