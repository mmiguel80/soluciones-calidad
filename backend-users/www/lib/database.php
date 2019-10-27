<?php

class Database{

    private static $connection_status = null;

    # Nos sirve para hacer test
    public function __construct(){
        echo "Server type: " .$_ENV['DBU_SERVER_TYPE'];
        echo "DB HostName: " .$_ENV['MYSQLU_HOST'];
        echo "DB Name: " .$_ENV['MYSQLU_DATABASE'];
        echo "DB User: " .$_ENV['MYSQLU_USER'];
    }

    public function connect()
    {
                if(self::$connection_status == null)
        try{
           self::$connection_status = new PDO($_ENV['DBU_SERVER_TYPE'].':host='.$_ENV['MYSQLU_HOST'].';dbname='.$_ENV['MYSQLU_DATABASE'].'', $_ENV['MYSQLU_USER'], $_ENV['MYSQLU_PASSWORD']);

        }catch(PDOException $e)
        {
            die($e->getMessage());
        }
        return self::$connection_status;
    }
    public static function disconnect()
    {
        self::$connection_status = null;
    }
}

?>
