<?php
/**
 * Página de inicio
 */
?>
<div>
    <?php include 'componentes/_formulario.php'?>
    <?php include 'componentes/_tabla.php'?>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        obtenerPersonas();
    });
</script>