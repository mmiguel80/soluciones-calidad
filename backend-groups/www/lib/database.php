<?php

class Database{

    private static $connection_status = null;

    public function __construct(){
        die('Init function is not allowed');
    }

    public function user()
    {
        echo "Server type: " .$_ENV['DBG_SERVER_TYPE'];
        echo "DB HostName: " .$_ENV['MYSQLG_HOST'];
        echo "DB Name: " .$_ENV['MYSQLG_DATABASE'];
        echo "DB User: " .$_ENV['MYSQLG_USER'];

    }
    public function connect()
    {
                if(self::$connection_status == null)
        try{
           self::$connection_status = new PDO($_ENV['DBG_SERVER_TYPE'].':host='.$_ENV['MYSQLG_HOST'].';dbname='.$_ENV['MYSQLG_DATABASE'].'', $_ENV['MYSQLG_USER'], $_ENV['MYSQLG_PASSWORD']);

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
