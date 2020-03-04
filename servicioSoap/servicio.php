<?php
    require_once 'funciones.php';
    $uri = 'http://localhost/ExUD6';
    $server = new SoapServer(null, array('uri'=>$uri));
    $server->setClass('Funciones');
    $server->handle();
?>