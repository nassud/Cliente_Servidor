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
                    $respuesta = $this->seleccionarPersona($this->identificadorRegistro);
                } else {
                    $respuesta = $this->seleccionarPersonas();
                }
                break;
            case 'POST': // Admitimos creación de un registro
                $respuesta = $this->insertarPersona();
                break;
            case 'PUT': // Admitimos la actualización de un registro
                $respuesta = $this->modificarPersona($this->identificadorRegistro);
                break;
            case 'DELETE': // Admitimos el borrado de un registro
                $respuesta = $this->eliminarPersona($this->identificadorRegistro);
                break;
            default: // El método utilizado no es válido así que respondemos con error
                $respuesta = $this->respuestaNoEncontrado();
                break;
        }

        parent::responderPeticion($respuesta, ControladorAbstracto::SOLICITUD_CORRECTA);
    }

    private function seleccionarPersonas()
    {
        return $this->personaEntidad->seleccionarTodos();
    }

    private function seleccionarPersona($id)
    {
        try {
            $resultado = $this->personaEntidad->seleccionarUno($id);
            return $resultado;
        } catch (Exception $excepcion) {
            return $excepcion->getMessage();
        }
    }

    private function insertarPersona()
    {
        // Obtiene la entrada POST y la decodifica desde JSON a forma de arreglo
        $personaEnArreglo = (array) json_decode(file_get_contents('php://input'), true);
        $personaEnObjeto = ($this->personaEntidad->convertirArregloDeJsonAPersona)($personaEnArreglo);
        $this->personaEntidad->insertar($personaEnObjeto);
    }

    private function modificarPersona()
    {
        $id = $this->identificadorRegistro;
        try {
            $personaEnArreglo = (array) json_decode(file_get_contents('php://input'), true);
            $personaEnObjeto = ($this->personaEntidad->convertirArregloDeJsonAPersona)($personaEnArreglo);
            $resultado = $this->personaEntidad->modificar($id, $personaEnObjeto);

            return $resultado;
        } catch (Exception $excepcion) {
            return $excepcion->getMessage();
        }
    }

    private function eliminarPersona()
    {

        $id = $this->identificadorRegistro;
        try {
            $resultado = $this->personaEntidad->seleccionarUno($id);
            $this->personaEntidad->eliminar($id);

        } catch (Exception $excepcion) {
            return $excepcion->getMessage();
        }
    }

    private function respuestaNoEncontrado()
    {
        print("La RUTA o el MÉTODO utilizado no son correctos");
    }
}
