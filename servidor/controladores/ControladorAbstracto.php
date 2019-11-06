<?php

abstract class ControladorAbstracto {
    const SOLICITUD_CORRECTA = 'HTTP/1.1 200 OK';
    const SOLICITUD_NO_ENCONTRADA = 'HTTP/1.1 404 Not Found';
    const SOLICITUD_CREADA = 'HTTP/1.1 201 Created';
    const SOLICITUD_INCORRECTA = 'HTTP/1.1 400 Bad Request';

    abstract public function procesarSolicitud();

    protected function responderPeticion($cuerpoRespuesta, $estadoSolicitud){
        $respuesta['status_code'] = $estadoSolicitud;
        $respuesta['body'] = $cuerpoRespuesta;
        
        header($respuesta['status_code']);
        if ($respuesta['body']) {
            echo json_encode($respuesta);
        }
    }
}