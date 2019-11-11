<?php
const RUTA_PAGINAS = 'vista/paginas/';

//Obtener la página solicitada
$paginaParametro = isset($_GET['p']) ? $_GET['p'] : 'inicio';
$rutaPaginaParametro = RUTA_PAGINAS . '_' . $paginaParametro . '.php';

//La página solicitada por defecto será 404
$paginaSolicitada = RUTA_PAGINAS . '_404.php';

// Si existe la ruta de la página solicitada entonces reemplazamos la variable
// $paginaSolicitada para que renderice dicha página.
if(file_exists($rutaPaginaParametro)){
    $paginaSolicitada = $rutaPaginaParametro;
}

//Renderizar la plantilla
include 'vista/plantilla.php';