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
    });
</script>