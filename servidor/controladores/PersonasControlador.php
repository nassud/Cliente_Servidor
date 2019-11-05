<?php
require_once './modelo/entidades/Persona.php';

class PersonasControlador
{

    private $conexion;
    private $metodoSolicitud;
    private $identificadorRegistro;

    private $personaEntidad;

    public function __construct($conexion, $metodoSolicitud, $identificadorRegistro)
    {
        $this->conexion = $conexion;
        $this->metodoSolicitud = $metodoSolicitud;
        $this->identificadorRegistro = $identificadorRegistro;

        $this->personaEntidad = new Persona($conexion);
    }

    public function procesarSolicitud()
    {
        switch ($this->metodoSolicitud) {
            case 'GET': // Solo admitimos solicitudes de lectura
                if ($this->identificadorRegistro) {
                    $respuesta = $this->getPersona($this->identificadorRegistro);
                } else {
                    $respuesta = $this->getPersonas();
                }
                break;
            case 'POST':
                $respuesta = $this->crearPersona();
                break;
            case 'PUT':
                $respuesta = $this->actualizarPersona($this->userId);
                break;
            case 'DELETE':
                $respuesta = $this->borrarPersona($this->userId);
                break;
            default:
                $respuesta = $this->respuestaNoEncontrado();
                break;
        }
        header($respuesta['status_code_header']);
        if ($respuesta['body']) {
            echo $respuesta['body'];
        }
    }

    private function getPersonas()
    {
        $resultado = $this->personaEntidad->leerTodos();
        $respuesta['status_code_header'] = 'HTTP/1.1 200 OK';
        $respuesta['body'] = json_encode($resultado);
        return $respuesta;
    }

}
