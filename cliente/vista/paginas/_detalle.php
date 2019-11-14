<?php
/**
 * Página de detalle
 */
$identificadorRegistro = isset($_GET['id']) ? $_GET['id'] : null;

if ($identificadorRegistro === null) {
    $dominio = $_SERVER['HTTP_HOST'];
    header("Location: $dominio");
}
?>
<div>
    <h2>Ver registro <?=$identificadorRegistro?></h2>
    <?php
    $modoDeSoloLectura = true;
    include 'componentes/_formulario.php'
    ?>
    <div class="Botones">
        <div class="BotonSecundario">
            <button onclick="history.back()" type="button">Volver</button>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        obtenerPersona(<?=$identificadorRegistro?>);

        $('#botonEnviarFormulario').bind("click", function() {
            const nuevaPersona = {
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
            crearPersona(nuevaPersona);
        });
    });
</script>