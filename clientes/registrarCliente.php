<?php
require_once("config.php");

if (isset($_POST["guardar"])) {
    $config = new Config();

    $config->setNombre($_POST["nombre"]);
    $config->setCelular($_POST["celular"]);
    $config->setCompañia($_POST["compañia"]);
    $config->insertData();

    echo "<script>alert('Los datos fueron guardados satisfactoriamente'); document.location = 'clientes.php';</script>";
}
?>
