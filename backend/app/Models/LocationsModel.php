<?php
namespace App\Models;

use Config\Conexion;
use PDO;
use Home\getInstance;

class LocationsModel{
    use getInstance;
    public $message;

    public function __construct(private $id=1,public $name_location=1) {
        $this->id = $id;
        $this->name_location = $name_location;
    }

    public function getLocaltions(){
        try {
            $conx = new Conexion;
            $query = 'SELECT * FROM locations';
            $res = $conx->connect()->prepare($query);
            $res->execute();
            return json_encode($res->fetchAll(PDO::FETCH_ASSOC));
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
            $conx->desconet();
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function postLocaltions(){
        try {
            $conx = new Conexion;
            $query = 'INSERT INTO locations(id,name_location) VALUES (:id,:name_location)';
            $res = $conx->connect()->prepare($query);
            $res->bindValue('id',$this->id);
            $res->bindValue('name_location', $this->name_location);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function updateLocaltions(){
        try {
            $conx = new Conexion;
            $query = 'UPDATE locations SET id=:id,name_location=:name_location WHERE id=:id';
            $res = $conx->connect()->prepare($query);
            $res->bindValue('id',$this->id);
            $res->bindValue('name_location', $this->name_location);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function deleteLocaltions(){
        try {
            $conx = new Conexion;
            $query = 'DELETE FROM locations WHERE id=:id';
            $res = $conx->connect()->prepare($query);
            $res->bindValue('id',$this->id);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }
}

?>