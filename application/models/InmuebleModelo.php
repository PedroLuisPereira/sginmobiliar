<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'Conexion.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InmuebleModelo
 *
 * @author Usuario
 */
class InmuebleModelo extends Conexion {

    public function insert($estado, $oferta, $tipo, $valorarriendo, $valorventa, $valoradmin, $ciudad, $barrio, $direccion, $area, $habitaciones, $banios, $piso, $estrato, $descripcion, $idcliente) {
        $sql = "INSERT INTO inmueble VALUES (null,\"$estado\",\"$oferta\",\"$tipo\",\"$valorarriendo\",\"$valorventa\",\"$valoradmin\","
                . "\"$ciudad\",\"$barrio\",\"$direccion\",\"$area\",\"$habitaciones\",\"$banios\","
                . "\"$piso\",\"$estrato\",\"$descripcion\",\"$idcliente\")";
        $respuesta = $this->consultaSimple($sql);
        return $respuesta;
    }

    public function getUltimoId() {
        $sql = "SELECT MAX(idinmueble) AS id FROM inmueble;";
        $respuesta = $this->consultaSelect($sql);
        return $respuesta;
    }

    public function getUltimoIdFotos() {
        $sql = "SELECT MAX(idfoto) AS id FROM foto;";
        $respuesta = $this->consultaSelect($sql);
        return $respuesta;
    }
    
    public function getFotos($idinmueble) {
        $sql = "SELECT * FROM foto WHERE idinmueble = $idinmueble ;";
        $respuesta = $this->consultaSelect($sql);
        return $respuesta;
    }
    
     public function getNombreFotos($idinmueble) {
        $sql = "SELECT nombre,idinmueble FROM foto WHERE idinmueble = $idinmueble  ";
        $respuesta = $this->consultaSelect($sql);
        return $respuesta;
    }

    public function setFoto($nombre, $ruta, $idinmueble) {
        $sql = "INSERT INTO foto VALUES (null,\"$nombre\",\"$ruta\",\"$idinmueble\")";
        $this->consultaSimple($sql);
    }

    public function getAll($valor) {
        $sql = "SELECT * FROM inmueble where 
                idinmueble like '%$valor%' or estado        like '%$valor%' or oferta      like '%$valor%' or 
                tipo       like '%$valor%' or valorarriendo like '%$valor%' or valorventa like '%$valor%' or 
                valoradmin like '%$valor%' or ciudad        like '%$valor%' or barrio     like '%$valor%' or 
                direccion  like '%$valor%' order by idinmueble desc ;";
        $respuesta = $this->consultaSelect($sql);
        return $respuesta;
    }
    
    public function getAllFront() {
        $sql = "SELECT * FROM inmueble where estado = 'Disponible' order by idinmueble desc ;";
        $respuesta = $this->consultaSelect($sql);
        return $respuesta;
    }
    
    public function getIdinmueble($idinmueble) {
        $sql = "SELECT * FROM inmueble where idinmueble = $idinmueble ;";
        $respuesta = $this->consultaSelect($sql);
        return $respuesta;
    }
    
    public function edit($idinmueble, $estado, $oferta, $tipo, $valorarriendo, $valorventa, $valoradmin, $ciudad, $barrio, $direccion, $area, $habitaciones, $banios, $piso, $estrato, $descripcion, $idcliente) {
        $sql = "UPDATE inmueble SET estado = '$estado', oferta = '$oferta', tipo = '$tipo',"
                . " valorarriendo = '$valorarriendo', valorventa = '$valorventa',"
                . " valoradmin = '$valoradmin', ciudad = '$ciudad', barrio = '$barrio',"
                . " direccion = '$direccion', area = '$area', habitaciones = '$habitaciones',"
                . " banios = '$banios', piso = '$piso', estrato = '$estrato', descripcion = '$descripcion', "
                . "idcliente = '$idcliente' WHERE (idinmueble = '$idinmueble')";
        $respuesta = $this->consultaSimple($sql);
        return $respuesta;
    }
    
    public function deleteFoto($idfoto) {
        $sql = "DELETE FROM foto WHERE foto.idfoto = $idfoto;";
        $respuesta = $this->consultaSimple($sql);
        return $respuesta;
    }
    
    public function getInmuebles($barrio, $oferta, $tipo,$valorArriendo1, $valorArriendo2, $valorVenta1, $valorVenta2){
        $sql = "SELECT * FROM inmueble where
            inmueble.estado =   'Disponible' and
            inmueble.barrio like '%$barrio%' and
            inmueble.oferta like '%$oferta%' and
            inmueble.tipo   like '%$tipo%' and
            inmueble.valorarriendo >=$valorArriendo1 and  
            inmueble.valorarriendo <=$valorArriendo2 and  
            inmueble.valorventa    >=$valorVenta1 and 
            inmueble.valorventa    <=$valorVenta2 order by inmueble.idinmueble desc ;";
        $respuesta = $this->consultaSelect($sql);
        return $respuesta;
    }

}
