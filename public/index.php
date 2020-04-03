<?php
//mostrmos todos los errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//mandamos llamar a la carpeta de composer
require_once '../vendor/autoload.php';
//mandamos llamar las instancias de slim framework
require_once '../app/main/app.php';
?>