<?php
echo "Hola";
class Database{

    

    public function __construct(){
        die('Init function is not allowed');
    }

    public function connect()
    {
                if(self::$connection_status == null)
        try{
           self::$connection_status = new PDO('mysql:host='.$_ENV['DATABASE_HOST'].';dbname='.$_ENV['DATABASE_NAME'].'', $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASS']);

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
