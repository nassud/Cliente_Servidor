/**
 * Script Javascript para el consumo de los servicios rest y manipulación del DOM
 */

const HOST = "http://api.clienteservidor.ue";
const HOST_SCRIPT = "servidor.php";

function renderizarTablaPersonas(arregloPersonas) {
  nodoCuerpoTabla = $("#registrosTablaPersonas");
  personasHTML = arregloPersonas.map(persona => {
    return `<tr>
              <td>${persona.primerNombre} ${persona.segundoNombre} ${persona.primerApellido} ${persona.segundoApellido}</td>
              <td>${persona.fechaNacimiento}</td>
              <td>${persona.correoElectronico}</td>
              <td>
              <a href="?p=detalle&id=${persona.id}">Ver</a> |
              <a href="?p=editar&id=${persona.id}">Editar</a> |
              <a href="?id=${persona.id}">Eliminar</a>
            </td>
          </tr>`;
  });
  nodoCuerpoTabla.html(personasHTML);
}

function renderizarDetallePersona(objetoPersona) {
  const tipoDocumento =  $("#formularioDetallePersona #tipo_documento");
  tipoDocumento.val(objetoPersona["tipoDocumento"]);
  const tipoDocumento =  $("#formularioDetallePersona #numero_documento");
  tipoDocumento.val(objetoPersona["numeroDocumento"]);
  const tipoDocumento =  $("#formularioDetallePersona #primer_nombre");
  tipoDocumento.val(objetoPersona["primerNombre"]);
  const tipoDocumento =  $("#formularioDetallePersona #segundo_nombre");
  tipoDocumento.val(objetoPersona["segundoNombre"]);
  const tipoDocumento =  $("#formularioDetallePersona #primer_apellido");
  tipoDocumento.val(objetoPersona["primerApellido"]);
  const tipoDocumento =  $("#formularioDetallePersona #segundo_apellido");
  tipoDocumento.val(objetoPersona["segundoApellido"]);
}

function obtenerPersonas() {
  $.ajax({
    url: `${HOST}/${HOST_SCRIPT}/personas`
  }).then(function(data) {
    renderizarTablaPersonas(data.body);
  });
}

function obtenerPersona(id) {
  $.ajax({
    url: `${HOST}/${HOST_SCRIPT}/personas/${id}`
  }).then(function(data) {
    renderizarDetallePersona(data.body);
  });
}

function inicializarVista() {
  obtenerPersonas();
}
