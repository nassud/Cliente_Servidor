<?php
/**
 * Página de inicio
 */
?>
<div>
    <?php include 'componentes/_formulario.php'?>
    <div class="Botones">
        <div class="Boton">
            <button id="botonEnviarFormulario" type="button">Adicionar</button>
        </div>
    </div>
    <?php include 'componentes/_tabla.php'?>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        obtenerPersonas();
        $('#botonEnviarFormulario').bind("click", function() {

            if(!validarFormulario())
                return

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