<?php
    require_once 'funciones.php';
    $server = new SoapServer("http://localhost/ExUD6/ventas.wsdl"); 
    $server->setClass('Funciones');
    $server->handle();
?>