/**
 * Script Javascript para el consumo de los servicios rest y manipulación del DOM
 */

const HOST = "http://api.clienteservidor.ue";
const CLIENTE = "http://clienteservidor.ue"
const HOST_SCRIPT = "servidor.php";

function obtenerPersonas() {
  $.ajax({
    url: `${HOST}/${HOST_SCRIPT}/personas`
  }).then(function(data) {
    renderizarTablaPersonas(data.body);
  });
}

function renderizarTablaPersonas(arregloPersonas){
    nodoCuerpoTabla = $('#registrosTablaPersonas');
    personasHTML = arregloPersonas.map(persona => {
        return `<tr>
            <td>${persona.primerNombre} ${persona.segundoNombre} ${persona.primerApellido} ${persona.segundoApellido}</td>
            <td>${persona.fechaNacimiento}</td>
            <td>${persona.correoElectronico}</td>
            <td>
              <a href="${CLIENTE}?p=detalle&id=${persona.id}">Ver</a> |
              <a href="${CLIENTE}?p=editar&id=${persona.id}">Editar</a> |
              <a href="${CLIENTE}?id=${persona.id}">Eliminar</a>
            </td>
        </tr>`
    });
    nodoCuerpoTabla.html(personasHTML);
}

function inicializarVista(){
   obtenerPersonas();
}

$(document).ready(function() {
    inicializarVista()
});