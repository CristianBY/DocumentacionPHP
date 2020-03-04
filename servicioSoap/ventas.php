<?php
    // genera el fichero wsdl
    require_once 'funciones.php';
    require_once 'WSDLDocument.php';

    $wsdl = new WSDLDocument(
            'Funciones',
            'http://localhost/ExUD6/servicio.php',
            'http://localhost/ExUD6');

    echo $wsdl->saveXML();
?>