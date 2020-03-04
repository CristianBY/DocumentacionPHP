<?php
    require_once('DB.php');
    /**
     * Funciones para usar en el servicio para ventas comerciales
     */
    class Funciones{
        
        /**
         * Obiene Comerciales
         *
         * Obtiene los datos nombre y códigos de los comerciales
         *
         * 
         * @return array
         * 
         **/
        public function getComerciales(){
            try{
                $dwes = DB::connectDB();
                $sql = "SELECT * FROM Comerciales";
                $resultado = $dwes->query($sql);
                if($resultado) {
                    $row = $resultado->fetch();
                    while ($row != null) {
                        $comercial[$row['codigo']] = $row['nombre'];
                        $row = $resultado->fetch();
                    }
                }
            }catch (PDOException $e) {
                $comercial = -($e->getCode());
                return $comercial;
            }
            return $comercial;
        }

        /**
         * Obtiene Productos
         *
         * Obtiene todos los datos de todos los productos
         *
         * @return array
         * 
         **/
        public function getProducto(){
            try{
                $dwes = DB::connectDB();
                $sql = "SELECT * FROM Productos";
                $resultado = $dwes->query($sql);
                if($resultado) {
                    $row = $resultado->fetch();
                    while ($row != null) {
                        $producto[$row['referencia']] = $row['nombre'].", ".$row['descripcion'].", ".$row['precio'].", ".$row['descuento'];
                        $row = $resultado->fetch();
                    }
                }
            }catch (PDOException $e) {
                $producto = -($e->getCode());
                return $producto;
            }
            return $producto;
        }

        /**
         * Consulta Ventas
         *
         * Consulta las ventas de un comercial en concreto y devuelve la información de todas las ventas
         *
         * @param string $codComercial Código de identificación de un comercial
         * @return array
         * 
         **/
        public function getConsultaVentasComercial($codComercial){
            try{
                $dwes = DB::connectDB();
                $sql = "SELECT * FROM Ventas WHERE codComercial = '$codComercial'";
                $resultado = $dwes->query($sql);
                if($resultado) {
                    $row = $resultado->fetch();
                    while ($row != null) {
                        $venta[] = $row['refProducto'].", ".$row['cantidad'].", ".$row['fecha'];
                        $row = $resultado->fetch();
                    }
                }
            }catch (PDOException $e) {
                $venta = -($e->getCode());
                return $venta;
            }
            return $venta;
        }
    }
    

?>