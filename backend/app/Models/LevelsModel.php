<?php
namespace App\Models;

use Config\Conexion;
use Home\getInstance;
use PDO;

class LevelsModel{
    use getInstance;
    public $message;
    public function __construct(private $id=1,public $name_level=1,private $group_level=1) {
        $this->id = $id;
        $this->name_level = $name_level;
        $this->group_level = $group_level;
    }

    public function getLevels(){
        try {
            $conx = new Conexion;
            $query = 'SELECT * FROM levels';
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

    public function postLevels(){
        try {
            $conx = new Conexion;
            $query = 'INSERT INTO levels(id,name_level,group_level) VALUES (:id,:name_level,:group_level)';
            $res = $conx->connect()->prepare($query);
            $res->bindValue('id',$this->id);
            $res->bindValue('name_level', $this->name_level);
            $res->bindValue('group_level', $this->group_level);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function updateLevels(){
        try {
            $conx = new Conexion;
            $query = 'UPDATE levels SET id=:id,name_level=:name_level,group_level=:group_level WHERE id=:id';
            $res = $conx->connect()->prepare($query);
            $res->bindValue('id',$this->id);
            $res->bindValue('name_level', $this->name_level);
            $res->bindValue('group_level', $this->group_level);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function deleteLevels(){
        try {
            $conx = new Conexion;
            $query = 'DELETE FROM levels WHERE id=:id';
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
