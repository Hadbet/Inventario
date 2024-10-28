<?php

class LocalConector
{
    private $host = "127.0.0.1:3306";
    private $usuario = "u909553968_UserInventario";
    private $clave = "Grammer2024Inventario";
    private $db = "u909553968_Inventario";
    public $conexion;

    public function conectar()
    {
        $con = mysqli_connect($this->host, $this->usuario, $this->clave, $this->db);
        return $con;
    }
}

?>