<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conexion {

    private $servername = "localhost";
    #Local 
    // private $username = "root";
    // private $password = "";
    // private $dbname = "pagina";
    
    #prueba
//    private $username = "id9586197_root";
//    private $password = "pedroluis01";
//    private $dbname   = "id9586197_pagina";
    
    #produccion
    private $username = "u551131647_sg";
    private $password = "sginmobiliar2019";
    private $dbname   = "u551131647_sgbd";

    
    public $objCon;
    public $conn;

    //*************************MySql orientado a objeto*********************************///
    public function abriConexion() {
        // Create connection
        $this->objCon = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($this->objCon->connect_error) {
            die("Connection failed: " . $this->objCon->connect_error);
        } else {
            //echo "Connected successfully";
        }
    }

    public function cerrarConexion() {
        $this->objCon->close();
    }

    public function consultaSimple($sql) {
        $this->abriConexion();
        if ($this->objCon->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $this->objCon->error;
        }
        $this->cerrarConexion();
        return TRUE;
    }

    public function consultaSelect($sql) {
        $this->abriConexion();
        $resultado = array();
        $result = $this->objCon->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $resultado[] = $row;
            }
        } else {
            
        }
        $result->free();
        $this->cerrarConexion();
        return $resultado;
    }

}
?>



