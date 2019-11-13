<?php 
/**
 * Página de detalle
 */
$identificadorRegistro = isset($_GET['id']) ? $_GET['id'] : null;

?>
<div>
    <?php include 'componentes/_formulario.php' ?>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        obtenerPersona(<?= $identificadorRegistro ?>);
    });
</script>