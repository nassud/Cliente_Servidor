<?php
use Persona;
use PHPUnit\Framework\TestCase;

class EntidadPersonaTest extends TestCase
{
    protected $arregloPersona;
    protected $personaEntidad;

    public function setUp(): void
    {
        $this->arregloPersona = [
            'tipoDocumento' => 'cc',
            'numeroDocumento' => '12345',
            'primerNombre' => 'sebastian',
            'segundoNombre' => 'johan',
            'primerApellido' => 'gomez',
            'segundoApellido' => 'dussan',
            'fechaNacimiento' => '13/09/1985',
            'correoElectronico' => 'sgomezd@ue.edu.co',
            'avatar' => 'miAvatar',
        ];
        $this->personaEntidad = new Persona(null);
    }

    public function testConvertirArregloDeJsonAPersonaNulo()
    {
        $resultado = ($this->personaEntidad->convertirArregloDeJsonAPersona)(null);
        $this->assertNull($resultado->getTipoDocumento());
        $this->assertNull($resultado->getNumeroDocumento());
        $this->assertNull($resultado->getPrimerNombre());
        $this->assertNull($resultado->getPrimerApellido());
    }

    public function testConvertirArregloDeJsonAPersonaConDatos()
    {
        $resultado = ($this->personaEntidad->convertirArregloDeJsonAPersona)($this->arregloPersona);
        $this->assertSame($resultado->getTipoDocumento(), $this->arregloPersona['tipoDocumento']);
        $this->assertSame($resultado->getNumeroDocumento(), $this->arregloPersona['numeroDocumento']);
        $this->assertSame($resultado->getPrimerNombre(), $this->arregloPersona['primerNombre']);
        $this->assertSame($resultado->getPrimerApellido(), $this->arregloPersona['primerApellido']);
    }
}
