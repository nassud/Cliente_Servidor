<?php

class Basedatos
{

    // Datos de conexión a la base de datos
    private $host = "localhost"; // Este es el nombre de dominio donde escucha la BD
    private $nombre_bd = "api_db"; // El nombre de la base de datos
    private $usuario = "root"; // El usuario que usaremos para autenticarnos
    private $clave = ""; // La clave del usuario
    public $conexion; // Referencia a nuestra objeto de conexión a la BD

    // Función para obtener conexión a la base de datos
    public function getConexion()
    {
        $this->conexion = null;
        try {
            $this->conexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->nombre_bd, $this->usuario, $this->clave);
            $this->conexion->exec("set names utf8");
        } catch (PDOException $excepcion) { // Si ocurre un error lo atrapamos e imprimimos el error
            echo "Error de conexión: " . $excepcion->getMessage();
        }

        return $this->conexion;
    }
}
