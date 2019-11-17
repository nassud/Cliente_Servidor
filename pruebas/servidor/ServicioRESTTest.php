<?php
use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

class ServicioRESTTest extends TestCase
{
    protected $apiREST = 'http://api.clienteservidor.ue/servidor.php/';
    protected $clienteHTTP;

    public function setUp(): void
    {
        $this->clienteHTTP = new Client(['base_uri' => $this->apiREST]);
    }

    public function testObtenerLista()
    {
        $respuesta = $this->clienteHTTP->request('GET', 'personas');
        $codigoRespuesta = $respuesta->getStatusCode();
        $this->assertEquals($codigoRespuesta, 200);
    }
}
