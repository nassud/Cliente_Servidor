<?php
require_once 'ControladorAbstracto.php';
require_once './modelo/entidades/Persona.php';

class PersonasControlador extends ControladorAbstracto
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

    // Implementamos la función abstracta de `ControladorAbstracto`
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
            case 'POST': // Admitimos creación de un registro
                $respuesta = $this->crearPersona();
                break;
            case 'PUT': // Admitimos la actualización de un registro
                $respuesta = $this->actualizarPersona($this->identificadorRegistro);
                break;
            case 'DELETE': // Admitimos el borrado de un registro
                $respuesta = $this->borrarPersona($this->identificadorRegistro);
                break;
            default: // El método utilizado no es válido así que respondemos con error
                $respuesta = $this->respuestaNoEncontrado();
                break;
        }

        parent::responderPeticion($respuesta, ControladorAbstracto::SOLICITUD_CORRECTA);
    }

    private function getPersonas()
    {
        return $this->personaEntidad->leerTodos();
    }

    private function getPersona($id)
    {
        try {
            $resultado = $this->personaEntidad->leerUno($id);
            return $resultado;
        } catch (Exception $excepcion) {
            return $excepcion->getMessage();
        }
    }

}
