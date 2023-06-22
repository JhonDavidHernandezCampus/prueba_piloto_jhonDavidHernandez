<?php
namespace Home;

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once './vendor/autoload.php';
require_once './routes/routes.php';
use Config\Conexion;
use Dotenv\Dotenv;



function variables(){
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}


trait getInstance{
    public static $instance;
    public static function getInstance() {
        $arg = func_get_args();
        $arg = array_pop($arg);
        print_r($arg);
        //var_dump( $arg);
        return (!(self::$instance instanceof self) || !empty($arg)) ? self::$instance = new static(...(array) $arg) : self::$instance;
    }
    function __set($name, $value){
        $this->$name = $value;
    }
    function __get($name){
        return $this->$name;
    }
}


/* 
$_DATA = file_get_contents('php://input');



print_r( $_DATA); */


?>