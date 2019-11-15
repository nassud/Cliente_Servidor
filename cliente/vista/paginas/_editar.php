<?php
/**
 * Página de edición
 */
$identificadorRegistro = isset($_GET['id']) ? $_GET['id'] : null;

if($identificadorRegistro === null){
    $dominio = $_SERVER['HTTP_HOST'];
    header("Location: $dominio");
}
?>
<div>
    <h2>Editar registro <?=$identificadorRegistro?></h2>
    <?php include 'componentes/_formulario.php'?>
    <div class="Botones">
        <div class="Boton">
            <button id="botonEnviarFormulario" type="button">Editar</button>
        </div>
        <div class="BotonSecundario">
            <button onclick="history.back()" type="button" id="back">Volver</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        obtenerPersona(<?=$identificadorRegistro?>);

        $('#botonEnviarFormulario').bind("click", function() {
            const persona = {
                id: $("#formularioDetallePersona #id").val(),
                tipoDocumento: $("#formularioDetallePersona #tipo_documento").val(),
                numeroDocumento: $("#formularioDetallePersona #numero_documento").val(),
                primerNombre: $("#formularioDetallePersona #primer_nombre").val(),
                segundoNombre: $("#formularioDetallePersona #segundo_nombre").val(),
                primerApellido: $("#formularioDetallePersona #primer_apellido").val(),
                segundoApellido: $("#formularioDetallePersona #segundo_apellido").val(),
                correoElectronico: $("#formularioDetallePersona #correoe").val(),
                fechaNacimiento: $("#formularioDetallePersona #cumpleanos").val(),
                avatar: $("#formularioDetallePersona #avatar").val()
            }
            modificarPersona(persona);
        });
    });
</script>