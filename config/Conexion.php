<?php
class Conexion {
    private static $host = "sql304.infinityfree.com";
    private static $db_name = "if0_37042095_eventos_db";
    private static $username = "if0_37042095";
    private static $password = "aIS6yvT3lj5";
    private static $con = null;

    public static function getConexion() {
        if (self::$con == null) {
            try {
                self::$con = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db_name, self::$username, self::$password);
                self::$con->exec("set names utf8");
            } catch(PDOException $exception) {
                echo "Connection error: " . $exception->getMessage();
            }
        }
        return self::$con;
    }
}


