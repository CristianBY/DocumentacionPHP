<?php
    abstract class DB {

	private static $server = 'localhost';
	private static $db = 'ventas_comerciales';
	private static $user = 'root'; // Tu usuario
	private static $password = 'password'; //Tu contraseña
	private static $port=3306;

	public static function connectDB() {
		try {
			$connection = new PDO("mysql:host=".self::$server.";dbname=".self::$db.";port=".self::$port.";charset=utf8", self::$user, self::$password);
		} 
		catch (PDOException $e) {
			echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
			die ("Error: " . $e->getMessage());
		}
		return $connection;
	}
	
    
}