/**
 * Script Javascript para el consumo de los servicios rest y manipulación del DOM
 */

const HOST = "http://api.clienteservidor.ue";
const HOST_SCRIPT = "servidor.php";

//************************
//  RENDERIZADO
//************************

/**
 * A partir de una lista de objetos persona, genera el HTML para la tabla de personas
 * @param {array} arregloPersonas
 */
function renderizarTablaPersonas(arregloPersonas) {
  nodoCuerpoTabla = $("#registrosTablaPersonas");
  personasHTML = arregloPersonas.map(persona => {
    return `<tr>
              <td>${persona.tipoDocumento} ${persona.numeroDocumento}</td>
              <td>${persona.primerNombre} ${persona.segundoNombre} ${persona.primerApellido} ${persona.segundoApellido}</td>
              <td>${persona.fechaNacimiento}</td>
              <td>${persona.correoElectronico}</td>
              <td>
              <a href="?p=detalle&id=${persona.id}">Ver</a> |
              <a href="?p=editar&id=${persona.id}">Editar</a> |
              <a href="#" class='elimina' onclick='eliminarPersona(${persona.id})'">Eliminar</a>
            </td>
          </tr>`;
  });
  nodoCuerpoTabla.html(personasHTML);
}

/**
 * A partir de un objeto persona, setea los valores para cada campo del formulario
 * @param {json} objetoPersona
 */
function renderizarDetallePersona(objetoPersona) {
  $("#formularioDetallePersona #id").val(objetoPersona["id"]);
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

//************************
//  SOLICITUDES A LOS ENDPOINTS DEL SERVICIO REST
//************************

/**
 * Genera una solicitud GET al servicio de personas
 */
function obtenerPersonas() {
  $.ajax({
    url: `${HOST}/${HOST_SCRIPT}/personas`
  }).then(function(data) {
    renderizarTablaPersonas(data.body);
  });
}

/**
 * Genera una solicitud GET al servicio de personas
 * @param {int} id - Identificador del registro
 */
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

/**
 * Genera una solicitud POST al servicio de personas
 * @param {json} persona - Objeto persona con los datos del registro
 */
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

/**
 * Genera una solicitud PATCH al servicio de personas
 * @param {json} persona - Objeto persona con los datos del registro
 */
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

/**
 * Genera una solicitud DELETE al servicio de personas
 * @param {int} id - Identificador del registro
 */
function eliminarPersona(id) {
  let flag = confirm("¿Está seguro de eliminar el registro?");
  if (flag == true) {
    $.ajax({
      url: `${HOST}/${HOST_SCRIPT}/personas/${id}`,
      method: "DELETE"
    }).then(function(data) {
      alert(data);
      location.href = "?p=inicio";
    });
  }
}

//************************
//  VALIDACIÓN
//************************

function validarNoVacio(valor) {
  return valor && valor !== "";
}

function validarFormulario() {
  let esValido = true;
  let mensajeError = "Se presentaron errores: \n";

  const campoTipoDocumento = $("#formularioDetallePersona #tipo_documento");
  const camposFormulario = $(
    "#formularioDetallePersona input:not([type=hidden])"
  );

  //Limpiar los estilos de error de todos los campos
  campoTipoDocumento.removeClass("Error");
  for (let i = 0; i < camposFormulario.length; i++) {
    const campo = camposFormulario[i];
    $(campo).removeClass("Error");
  }

  //Validar el select de forma independiente
  if (!validarNoVacio(campoTipoDocumento.val())) {
    esValido = false;
    campoTipoDocumento.addClass("Error");
    mensajeError += "- Debe seleccionar un tipo de documento.\n";
  }

  //Validar cada uno de los campos verificando que no estén vacíos.
  for (let i = 0; i < camposFormulario.length; i++) {
    const campo = camposFormulario[i];
    if (!validarNoVacio(campo.value)) {
      esValido = false;
      $(campo).addClass("Error");
      mensajeError += "- El campo " + campo.name + " no puede estar vacío.\n";
    }
  }

  if (!esValido) alert(mensajeError);
  return esValido;
}
