<?php
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class ServicioRESTPersonasTest extends TestCase
{
    protected $apiREST = 'http://api.clienteservidor.ue/servidor.php/';
    protected $clienteHTTP;

    public function setUp(): void
    {
        $this->clienteHTTP = new Client(['base_uri' => $this->apiREST]);
    }

    /**
     * Prueba que el endpoint de Personas responda con todos los verbos HTTP y código HTTP satisfactorio
     */
    public function testServicioDisponible()
    {
        $respuesta = $this->clienteHTTP->request('GET', 'personas');
        $codigoRespuesta = $respuesta->getStatusCode();
        $this->assertEquals($codigoRespuesta, 200);

        $respuesta = $this->clienteHTTP->request('GET', 'personas/1');
        $codigoRespuesta = $respuesta->getStatusCode();
        $this->assertEquals($codigoRespuesta, 200);

        $respuesta = $this->clienteHTTP->request('POST', 'personas');
        $codigoRespuesta = $respuesta->getStatusCode();
        $this->assertEquals($codigoRespuesta, 200);

        $respuesta = $this->clienteHTTP->request('PUT', 'personas');
        $codigoRespuesta = $respuesta->getStatusCode();
        $this->assertEquals($codigoRespuesta, 200);

        $respuesta = $this->clienteHTTP->request('DELETE', 'personas/0');
        $codigoRespuesta = $respuesta->getStatusCode();
        $this->assertEquals($codigoRespuesta, 200);
    }

    /**
     * Prueba que obtengamos al menos dos registros del servicio
     */
    public function testPersonasDevuelveAlMenosDosRegistros() {
        $respuesta = $this->clienteHTTP->request('GET', 'personas');
        $stringRespuesta = (string) $respuesta->getBody();
        $objetoRespuesta = json_decode($stringRespuesta);
        $this->assertGreaterThan(1, sizeof($objetoRespuesta->body));
    }

    /**
     * Prueba que exista el registro 1 de los datos ejemplo y sus campos concuerden con los esperados
     */
    public function testPersonaUnoExisteYDatosConcuerdan() {
        $respuesta = $this->clienteHTTP->request('GET', 'personas/1');
        $stringRespuesta = (string) $respuesta->getBody();
        $objetoRespuesta = json_decode($stringRespuesta);
        $this->assertEquals(1, $objetoRespuesta->body->id, 'El id devuelto con coincide con el esperado.');
        $this->assertEquals('0987264542', $objetoRespuesta->body->numeroDocumento);
        $this->assertEquals('SEBASTIAN', $objetoRespuesta->body->primerNombre);
    }
}
