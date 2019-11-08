<?php
require_once 'EntidadAbstracta.php';

class Persona extends EntidadAbstracta implements JsonSerializable
{

    // Referencia a la conexión de la BD
    private $conexion;
    private $NOMBRE_TABLA = "personas";

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

    // Referencia a función que nos ayuda a convertir un arreglo que represente una fila de la BD en un objeto de tipo Persona
    private $convertirArregloDeBdAPersona;

    // Referencia a función que nos ayuda a convertir un arreglo de JSON en un objeto de tipo Persona
    public $convertirArregloDeJsonAPersona;

    /**
     * Constructor que recibe referencia la conexión de la BD
     */
    public function __construct($bd)
    {
        $this->conexion = $bd;

        // Aquí implementamos la función de conversión de arreglo de BD a objeto. Los nombres de los atributos tienen
        // el formato de los nombres de columna de la base de datos
        $this->convertirArregloDeBdAPersona = function ($registro) {

            $persona = new Persona(null); // Creamos una instancia de Persona sin referencia a la conexión como objeto plano
            $persona->setId($registro['ID']);
            $persona->setTipoDocumento($registro['TIPO_DOCUMENTO']);
            $persona->setNumeroDocumento($registro['NUMERO_DOCUMENTO']);
            $persona->setPrimerNombre($registro['PRIMER_NOMBRE']);
            $persona->setSegundoNombre($registro['SEGUNDO_NOMBRE']);
            $persona->setPrimerApellido($registro['PRIMER_APELLIDO']);
            $persona->setSegundoApellido($registro['SEGUNDO_APELLIDO']);
            $persona->setFechaNacimiento($registro['FECHA_NACIMIENTO']);
            $persona->setCorreoElectronico($registro['CORREO_ELECTRONICO']);
            $persona->setAvatar($registro['AVATAR']);
            $persona->setFechaCreacion($registro['FECHA_CREACION']);
            $persona->setFechaActualizacion($registro['FECHA_ACTUALIZACION']);
            return $persona;
        };

        // Esta función es muy similar a la anterior excepto que espera los nombres de los atributos en formato de objeto
        $this->convertirArregloDeJsonAPersona = function ($registro) {

            $persona = new Persona(null); // Creamos una instancia de Persona sin referencia a la conexión como objeto plano
            // El id solo existe si se trata de una modificación de persona. Si es una inserción, la BD asignará un ID
            if (isset($registro['id'])) {
                $persona->setId($registro['id']);
            }
            $persona->setTipoDocumento($registro['tipoDocumento']);
            $persona->setNumeroDocumento($registro['numeroDocumento']);
            $persona->setPrimerNombre($registro['primerNombre']);
            $persona->setSegundoNombre($registro['segundoNombre']);
            $persona->setPrimerApellido($registro['primerApellido']);
            $persona->setSegundoApellido($registro['segundoApellido']);
            $persona->setFechaNacimiento($registro['fechaNacimiento']);
            $persona->setCorreoElectronico($registro['correoElectronico']);
            $persona->setAvatar($registro['avatar']);
            $persona->setFechaCreacion($registro['fechaCreacion']);
            $persona->setFechaActualizacion($registro['fechaActualizacion']);
            return $persona;
        };
    }

    /**
     * Consulta a la BD todos los registros
     */
    public function seleccionarTodos()
    {
        $query = "SELECT
        ID, TIPO_DOCUMENTO, NUMERO_DOCUMENTO, PRIMER_NOMBRE, SEGUNDO_NOMBRE,
         PRIMER_APELLIDO, SEGUNDO_APELLIDO, FECHA_NACIMIENTO, CORREO_ELECTRONICO, AVATAR, FECHA_CREACION, FECHA_ACTUALIZACION
            FROM
                " . $this->NOMBRE_TABLA . " p
            ORDER BY
                p.FECHA_CREACION DESC";

        // Preparar sentencia
        $sentencia = $this->conexion->prepare($query);
        $sentencia->execute();

        // Obtenemos el arreglo de filas traídas desde la tabla en la BD
        $listaRegistros = $sentencia->fetchAll();

        // Ejecutamos la función `convertirArregloDeBdAPersona` sobre cada uno de los registros del arreglo `$listaRegistros`
        $listaPersonas = array_map($this->convertirArregloDeBdAPersona, $listaRegistros);
        return $listaPersonas;
    }

    /**
     * Consulta a la BD un solo registro con ID `$id` parámetro
     */
    public function seleccionarUno($id)
    {
        $query = "SELECT
        ID, TIPO_DOCUMENTO, NUMERO_DOCUMENTO, PRIMER_NOMBRE, SEGUNDO_NOMBRE,
         PRIMER_APELLIDO, SEGUNDO_APELLIDO, FECHA_NACIMIENTO, CORREO_ELECTRONICO, AVATAR, FECHA_CREACION, FECHA_ACTUALIZACION
            FROM
                " . $this->NOMBRE_TABLA . " p
            WHERE
                p.ID = " . $id;

        // Preparar sentencia
        $sentencia = $this->conexion->prepare($query);
        $sentencia->execute();

        // Obtenemos el arreglo de filas traídas desde la tabla en la BD
        $registro = $sentencia->fetch();
        if ($registro === false) {
            throw new Exception('NO_ENCONTRADO');
        }

        // Ejecutamos la función referenciada en la variable `convertirArregloDeBdAPersona`
        return ($this->convertirArregloDeBdAPersona)($registro);
    }

    public function insertar($entidad)
    {
        $query = "INSERT INTO " . $this->NOMBRE_TABLA . "
        (ID, TIPO_DOCUMENTO, NUMERO_DOCUMENTO, PRIMER_NOMBRE, SEGUNDO_NOMBRE,
         PRIMER_APELLIDO, SEGUNDO_APELLIDO, FECHA_NACIMIENTO, CORREO_ELECTRONICO, AVATAR, FECHA_CREACION, FECHA_ACTUALIZACION)
            VALUES ()";
    }

    public function modificar($entidad)
    {}

    public function eliminar($id)
    {}

    // Implementación de la interface `JsonSerializable` para uso de json_encode con esta clase
    public function jsonSerialize()
    {
        return parent::serializarJSON(get_object_vars($this));
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
