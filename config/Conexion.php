<?php
namespace Config;

error_reporting(E_ALL);
ini_set('display_errors', '1');

\Home\variables();
use PDO;
use PDOException;


class Conexion{
    private $host ;
    private $dbname; 
    private $user ;
    private $password ;
    private $conx;
    public  $message;

    public function __construct(){
        $this->host = $_ENV['HOST'];
        $this->dbname = $_ENV['DATABASE'];
        $this->user = $_ENV['USER'];
        $this->password = $_ENV['PASSWORD'];
        
    }
    public function connect(){
        try {
            $this->conx = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user, $this->password);
            $this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->message = ["Code"=> 200, "Message"=> "Se ha conectado "];
            return $this->conx;
        } catch (\PDOException $e) {
            $this->message = ["Code"=> "error", "Message"=> "Error al copnectarse"];
            
        }finally{
            print_r($this->message);
        }
    }
    public function desconet(){
        $this->conx=null;
        return $this->conx;
    }
}



?>