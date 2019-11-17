<?php
$modoDeSoloLectura = isset($modoDeSoloLectura) ? $modoDeSoloLectura : false;
?>
<form class="Formulario" id="formularioDetallePersona">
    <div>
        <label for="tipo_documento">Tipo Documento:</label>
        <input type="text" id="tipo_documento" <?= $modoDeSoloLectura ? 'readonly disabled' : '' ?> name="tipo_documento">
    </div>
    <div>
        <label for="numero_documento">Número Documento:</label>
        <input type="text" id="numero_documento" <?= $modoDeSoloLectura ? 'readonly disabled' : '' ?> name="numero_documento">
    </div>
    <div>
        <label for="primer_nombre">Primer Nombre:</label>
        <input type="text" id="primer_nombre" <?= $modoDeSoloLectura ? 'readonly disabled' : '' ?> name="primer_nombre">
    </div>
    <div>
        <label for="segundo_nombre">Segundo Nombre:</label>
        <input type="text" id="segundo_nombre" <?= $modoDeSoloLectura ? 'readonly disabled' : '' ?> name="segundo_nombre">
    </div>
    <div>
        <label for="primer_apellido">Primer Apellido:</label>
        <input type="text" id="primer_apellido" <?= $modoDeSoloLectura ? 'readonly disabled' : '' ?> name="primer_apellido">
    </div>
    <div>
        <label for="segundo_apellido">Segundo Apellido:</label>
        <input type="text" id="segundo_apellido" <?= $modoDeSoloLectura ? 'readonly disabled' : '' ?> name="segundo_apellido">
    </div>
    <div>
        <label for="cumpleanos">Cumpleaños:</label>
        <input type="date" id="cumpleanos" <?= $modoDeSoloLectura ? 'readonly disabled' : '' ?> name="cumpleanos">
    </div>
    <div>
        <label for="correoe">Correo-e:</label>
        <input type="email" id="correoe" <?= $modoDeSoloLectura ? 'readonly disabled' : '' ?> name="correoe">
    </div>
    <input type="hidden" id="id" name="id">
    <input type="hidden" id="avatar" name="avatar" value="avatar">
</form>