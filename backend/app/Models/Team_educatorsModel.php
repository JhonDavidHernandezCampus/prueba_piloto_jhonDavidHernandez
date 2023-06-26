<?php
namespace App\Models;
use Config\Conexion;
use Home\getInstance;
use PDO;

class Team_educatorsModel{
    use getInstance;
    public $message;
    public function __construct(private $id=1,public $name_rol=1) {
        $this->id = $id;
        $this->name_rol = $name_rol;
    }

    public function getTeam_educators(){
        try {
            $conx = new Conexion;
            $query = 'SELECT * FROM team_educators';
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

    public function postTeam_educators(){
        try {
            $conx = new Conexion;
            $query = 'INSERT INTO team_educators(id,name_rol) VALUES (:id,:name_rol)';
            $res = $conx->connect()->prepare($query);
            $res->bindValue('id',$this->id);
            $res->bindValue('name_rol', $this->name_rol);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function updateTeam_educators(){
        try {
            $conx = new Conexion;
            $query = 'UPDATE team_educators SET id=:id,name_rol=:name_rol WHERE id=:id';
            $res = $conx->connect()->prepare($query);
            $res->bindValue('id',$this->id);
            $res->bindValue('name_rol', $this->name_rol);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function deleteTeam_educators(){
        try {
            $conx = new Conexion;
            $query = 'DELETE FROM team_educators WHERE id=:id';
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