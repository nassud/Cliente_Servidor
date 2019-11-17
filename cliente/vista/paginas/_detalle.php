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
    });
</script>