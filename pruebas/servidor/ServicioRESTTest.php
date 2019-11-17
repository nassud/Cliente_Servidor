<?php
use PHPUnit\Framework\TestCase;

class ServicioRESTTest extends TestCase
{
    public function testObtenerLista()
    {
        $respuesta = $this->get('/');
        $respuesta->assertStatus(200);
    }
}