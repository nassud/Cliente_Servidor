<?php
class Persona
{

    // Referencia a la conexión de la BD
    private $conexion;
    const NOMBRE_TABLA = "personas";

    private $id;
    private $tipoDocumento;
    private $numeroDocumento;
    private $primerNombre;
    private $segundoNombre;
    private $primerApellido;
    private $segundoApellido;
    private $fechaNacimiento;
    private $correoElectronico;
    private $avatar;
    private $fechaCreacion;
    private $fechaActualizacion;

    // Constructor que recibe referencia la conexión de la BD
    public function __construct($bd)
    {
        $this->conexion = $bd;
    }

    // Función que nos ayuda a convertir un arreglo que represente una fila en un objeto de tipo Persona
    protected function convertirArregloAPersona($registro)
    {
        $persona = new Persona(null); // Creamos una instancia de Persona sin referencia a la conexión como objeto plano
        $persona->setId($registro['ID']);
        $persona->setTipoDocumento($registro['TIPO_DOCUMENTO']);
        $persona->setNumeroDocumento($registro['NUMERO_DOCUMENTO']);
        $persona->setPrimerNombre($registro['PRIMER_NOMBRE']);
        $persona->setSegundoNombre($registro['SEGUNDO_NOMBRE']);
        $persona->setPrimeroApellido($registro['PRIMER_APELLIDO']);
        $persona->setSegundoApellido($registro['SEGUNDO_APELLIDO']);
        $persona->setFechaNacimiento($registro['FECHA_NACIMIENTO']);
        $persona->setCorreoElectronico($registro['CORREO_ELECTRONICO']);
        $persona->setAvatar($registro['AVATAR']);
        $persona->setFechaCreacion($registro['FECHA_CREACION']);
        $persona->setFechaActualizacion($registro['FECHA_ACTUALIZACION']);
        return $persona;
    }

    /**
     * Consultas a la BD
     */
    public function leerTodos()
    {
        $query = "SELECT
        ID, TIPO_DOCUMENTO, NUMERO_DOCUMENTO, PRIMER_NOMBRE, SEGUNDO_NOMBRE,
         PRIMER_APELLIDO, SEGUNDO_APELLIDO, FECHA_NACIMIENTO, CORREO_ELECTRONICO, AVATAR, FECHA_CREACION. FECHA_ACTUALIZACION
            FROM
                " . $this->NOMBRE_TABLA . " p
            ORDER BY
                p.FECHA_CREACION DESC";

        // Preparar sentencia
        $sentencia = $this->conexion->prepare($query);
        $sentencia->execute();

        // Obtenemos el arreglo de filas traídas desde la tabla en la BD
        $listaRegistros = $sentencia->fetchAll();

        // Ejecutamos la función `convertirArregloAPersona` sobre cada uno de los registros del arreglo `$listaRegistros`
        $listaPersonas = array_map('convertirArregloAPersona', $listaRegistros);

        return $listaPersonas;
    }

    /**
     * GETTERS y SETTERS
     * Con estas funciones/métodos escribimos y leemos los atributos de la clase
     */

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;
    }

    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    public function setNumeroDocumento($numeroDocumento)
    {
        $this->numeroDocumento = $numeroDocumento;
    }

    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }

    public function setPrimerNombre($primerNombre)
    {
        $this->primerNombre = $primerNombre;
    }

    public function getPrimerNombre()
    {
        return $this->primerNombre;
    }

    public function setSegundoNombre($segundoNombre)
    {
        $this->segundoNombre = $segundoNombre;
    }

    public function getSegundoNombre()
    {
        return $this->segundoNombre;
    }

    public function setPrimerApellido($primerApellido)
    {
        $this->primerApellido = $primerApellido;
    }

    public function getPrimerApellido()
    {
        return $this->primerApellido;
    }

    public function setSegundoApellido($segundoApellido)
    {
        $this->segundoApellido = $segundoApellido;
    }

    public function getSegundoApellido()
    {
        return $this->segundoApellido;
    }

    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    public function setCorreoElectronico($correoElectronico)
    {
        $this->correoElectronico = $correoElectronico;
    }

    public function getCorreoElecronico()
    {
        return $this->correoElectronico;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;
    }

    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    public function setFechaActualizacion($fechaActualizacion)
    {
        $this->fechaActualizacion = $fechaActualizacion;
    }

    public function getFechaActualizacion()
    {
        return $this->fechaActualizacion;
    }
}
