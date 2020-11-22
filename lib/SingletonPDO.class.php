<?php
 
class SingletonPDO
{
    private $PDOInstance = null;
    private static $instance = null;
  
    const DEFAULT_SQL_HOST = 'sayefrancois64626.ipagemysql.com';
    const DEFAULT_SQL_DBN = 'bizlisting';
    const DEFAULT_SQL_USER = 'chefaide';
    const DEFAULT_SQL_PASS = 'sireta';
 
    private function __construct()
    {
        $this->PDOInstance = new PDO('mysql:host='.self::DEFAULT_SQL_HOST.';dbname='.self::DEFAULT_SQL_DBN,
                                     self::DEFAULT_SQL_USER,
                                     self::DEFAULT_SQL_PASS);
        $this->PDOInstance->exec("SET NAMES UTF8");
        $this->PDOInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
  
    private function __clone (){}

    public static function getInstance()
    {  
        if(is_null(self::$instance))
        {
            self::$instance = new SingletonPDO();
        }
        return self::$instance;
    }
 
    function __call($name, $params) {
        return $this->PDOInstance->{$name}(implode(',', $params));
    }

}
