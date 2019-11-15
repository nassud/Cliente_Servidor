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
              <a class='elimina' onclick='eliminarPersona(${persona.id})'">Eliminar</a>
            </td>
          </tr>`;
  });
  nodoCuerpoTabla.html(personasHTML);
}

function renderizarDetallePersona(objetoPersona) {
  $("#formularioDetallePersona #id").val(
    objetoPersona["id"]
  );
  $("#formularioDetallePersona #tipo_documento").val(
    objetoPersona["tipoDocumento"]
  );
  $("#formularioDetallePersona #numero_documento").val(
    objetoPersona["numeroDocumento"]
  );
  $("#formularioDetallePersona #primer_nombre").val(
    objetoPersona["primerNombre"]
  );
  $("#formularioDetallePersona #segundo_nombre").val(
    objetoPersona["segundoNombre"]
  );
  $("#formularioDetallePersona #primer_apellido").val(
    objetoPersona["primerApellido"]
  );
  $("#formularioDetallePersona #segundo_apellido").val(
    objetoPersona["segundoApellido"]
  );
  $("#formularioDetallePersona #correoe").val(
    objetoPersona["correoElectronico"]
  );
  $("#formularioDetallePersona #cumpleanos").val(
    objetoPersona["fechaNacimiento"]
  );
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
    if (data.body === "NO_ENCONTRADO") {
      location.href = "?p=404";
    }
    renderizarDetallePersona(data.body);
  });
}

function crearPersona(persona) {
  console.log(persona);
  $.ajax({
    url: `${HOST}/${HOST_SCRIPT}/personas`,
    method: "POST",
    data: JSON.stringify(persona)
  }).then(function(data) {
    alert(data);
    location.href = "?p=inicio";
  });
}

function modificarPersona(persona) {
  $.ajax({
    url: `${HOST}/${HOST_SCRIPT}/personas/${persona.id}`,
    method: "PUT",
    data: JSON.stringify(persona)
  }).then(function(data) {
    alert(data);
    location.href = "?p=inicio";
  });
}

function eliminarPersona(id) {
  let flag = confirm("Esta seguro que desea eliminar la informacion");
  if(flag == true){
    $.ajax({
      url: `${HOST}/${HOST_SCRIPT}/personas/${id}`,
      method: "DELETE"
    }).then(function(data) {
      alert(data);
      location.href = "?p=inicio";
    });
}
}
