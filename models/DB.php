<?php

class DBConnection{
    private static $connection;

    public static function getConnection(){
        if(self::$connection == null){
            //crear objeto de conexion
            self::$connection = new PDO('mysql:host=localhost; dbname=mgp; chartset=utf8', 'root', '');

            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            self::$connection->SetAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }

        return self::$connection;
    }
}

?>