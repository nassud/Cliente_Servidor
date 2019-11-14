<?php
/**
 * Página de detalle
 */
$identificadorRegistro = isset($_GET['id']) ? $_GET['id'] : null;

?>
<div>
    <?php include 'componentes/_formulario.php'?>
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