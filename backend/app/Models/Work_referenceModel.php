<?php
namespace App\Models;

use Config\Conexion;
use PDO;
use Home\getInstance;

class Work_referenceModel{
    use getInstance;
    public $message;
    public function __construct(private $id=1,public $full_name=1,private $cel_number=1,public $position =1,public $company=1){
        $this->id = $id;
        $this->full_name =$full_name;
        $this->cel_number =$cel_number;
        $this->position = $position;
        $this->company = $company;
    }
    

    public function postWork_reference(){
        try {
            $conx = new Conexion;
            $query = 'INSERT INTO work_reference(id,full_name,cel_number,position,company) VALUES (:id,:name,:cel,:positi,:company)';
            $res = $conx->connect()->prepare($query);
            $res->bindValue('id', $this->id);
            $res->bindValue('name', $this->full_name);
            $res->bindValue('cel', $this->cel_number);
            $res->bindValue('positi', $this->position);
            $res->bindValue('company', $this->company);
            $res->execute();
            $this->message = ["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            echo "Error en la insercion de datos" . $e;
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
        
    }


    public function updateWork_reference(){
        try {
            $conx = new Conexion;
            $query = 'UPDATE work_reference SET id=:id,full_name=:name,cel_number=:cel,position=:positi,company=:company WHERE id=:id';
            $res = $conx->connect()->prepare($query);
            $res->bindValue('id', $this->id);
            $res->bindValue('name', $this->full_name);
            $res->bindValue('cel', $this->cel_number);
            $res->bindValue('positi', $this->position);
            $res->bindValue('company', $this->company);
            $res->execute();
            $this->message = ["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            echo "Error en la insercion de datos" . $e;
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
        
    }

    public function getWork_reference(){
        try {
            $conx = new Conexion;
            $query = 'SELECT * FROM work_reference';
            $res = $conx->connect()->prepare($query);
            $res->execute();
            return json_encode($res->fetchAll(PDO::FETCH_ASSOC));
            $this->message = ["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            echo "Error en la insercion de datos" . $e;
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function deleteWork_reference(){
        try {
            $conx = new Conexion;
            $query = 'DELETE FROM work_reference WHERE id=:id';
            $res = $conx->connect()->prepare($query);
            $res->bindVAlue('id',$this->id);
            $res->execute();
            $this->message = ["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            echo "Error en la insercion de datos" . $e;
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }
}

?>