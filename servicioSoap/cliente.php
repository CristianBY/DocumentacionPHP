<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $cliente = new SoapClient(null, array('uri' => 'http://localhost/','location' => 'http://localhost/ExUD6/servicio.php'));
        $comerciales = $cliente->getComerciales();
        $productos = $cliente->getProducto();
        
    ?>
    <h1>Comerciales en Plantilla:</h1>
    <?php
        //Muestra nombre y código de los comerciales
        foreach ($comerciales as $codigo => $nombre) {
            echo $nombre.", ".$codigo."<br>";
        }
    ?>

    
    <h1>Productos en catálogo:</h1>
    <?php
        // Muestra los datos de los productos
        foreach ($productos as $referencia => $producto) {
            echo $producto."<br>";
        }
    ?>

    <h1>Consulta de ventas:</h1>

    <form action="" method="post">
        <label>Código comercial:</label>
        <input type="text" name="codComercial" id="codComercial">
        <input type="submit" value="Consultar por comercial" name="consultar">
    </form>
    <?php
        if (isset($_POST['consultar'])){
            $ventas = $cliente->getConsultaVentasComercial($_POST['codComercial']);
            // Muestra los datos de las ventas de un comercial en concreto
            foreach ($ventas as $key => $venta) {
                echo $venta."<br>";
            }
        }
    ?>


</body>
</html>