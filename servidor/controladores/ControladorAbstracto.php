<?php

abstract class ControladorAbstracto {
    const SOLICITUD_CORRECTA = 'HTTP/1.1 200 OK';
    const SOLICITUD_NO_ENCONTRADA = 'HTTP/1.1 404 NOT_FOUND';

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