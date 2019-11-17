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
            let flag = false;
            for(const item in nuevaPersona)
            {
                if(nuevaPersona[item] == ''){
                    alert(`El campo ${item} no puede estar vacio`);
                    flag = true;
                    break;
                }
            }
            if(flag != true){
                crearPersona(nuevaPersona);
            }
        });
    });
</script>