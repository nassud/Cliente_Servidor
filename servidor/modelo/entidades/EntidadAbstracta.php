<?php

abstract class EntidadAbstracta
{

    // Lista de atributos de las entidades que no se serializarán en formato JSON
    const LLAVES_NO_VISIBLES = ['conexion', 'NOMBRE_TABLA', 'convertirArregloAPersona'];

    abstract public function seleccionarTodos();
    abstract public function seleccionarUno($id);
    abstract public function insertar($entidad);
    abstract public function modificar($id, $entidad);
    abstract public function eliminar($id);

    /**
     * Remueve el arreglo parámetro las llaves que no se deben mostrar al serializar en JSON
     */
    protected function serializarJSON($entidad)
    {
        foreach (EntidadAbstracta::LLAVES_NO_VISIBLES as $llaveNoVisible) {
            unset($entidad[$llaveNoVisible]);
        }
        return (object) $entidad;
    }
}
