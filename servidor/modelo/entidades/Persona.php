<?php 

class Persona {
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

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setTipoDocumento($tipoDocumento) {
        $this->tipoDocumento = $tipoDocumento;
    }

    public function getTipoDocumento() {
        return $this->tipoDocumento;
    }
    
    public function setNumeroDocumento($numeroDocumento) {
        $this->numeroDocumento = $numeroDocumento;
    }

    public function getNumeroDocumento() {
        return $this->numeroDocumento;
    }

    public function setPrimerNombre($primerNombre) {
        $this->primerNombre = $primerNombre;
    }

    public function getPrimerNombre() {
        return $this->primerNombre;
    }
    
    public function setSegundoNombre($segundoNombre) {
        $this->segundoNombre = $segundoNombre;
    }

    public function getSegundoNombre() {
        return $this->segundoNombre;
    }
    
    public function setPrimerApellido($primerApellido) {
        $this->primerApellido = $primerApellido;
    }

    public function getPrimerApellido() {
        return $this->primerApellido;
    }
    
    public function setSegundoApellido($segundoApellido) {
        $this->segundoApellido = $segundoApellido;
    }

    public function getSegundoApellido() {
        return $this->segundoApellido;
    }
    
    public function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }
    
    public function setCorreoElectronico($correoElectronico) {
        $this->correoElectronico = $correoElectronico;
    }

    public function getCorreoElecronico() {
        return $this->correoElectronico;
    }
    
    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    public function getAvatar() {
        return $this->avatar;
    }
}