<?php
class Property {
    private $properties = array () ;
    private static $instance ;

    private function __construct(){}

    public static function getInstance()
    {
        if(empty(self::$instance)){
            self::$instance = new Property();
        }
        return self::$instance;
    }

    public function setProperty($key, $value){
        $this->properties[$key] = $value;
    }

    public function getProperty($key){
        return $this->properties[$key];
    }
}






