<?php
namespace App\Models;
use Config\Conexion;
use Home\getInstance;
use PDO;

class Personal_refModel{
    use getInstance;
    public $message;

    public function __construct(private $id=1,public $full_name=1,private $cel_number=1,public $relationship =1,public $occupation=1) {
        $this->id = $id;
        $this->full_name = $full_name;
        $this->cel_number = $cel_number;
        $this->relationship = $relationship;
        $this->occupation = $occupation;
    }

    public function getPersonal_ref(){
        try {
            $conx = new Conexion;
            $query = 'SELECT * FROM personal_ref';
            $res = $conx->connect()->prepare($query);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
            return $res;
            $conx->desconet();
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function postPersonal_ref(){
        try {
            $conx = new Conexion;
            $query = 'INSERT INTO personal_ref(id,full_name,cel_number,relationship,occupation) VALUES (:id,:name,:cel,:relations,:occupation)';
            $res = $conx->connect()->prepare($query);
            $res->bindValue('id',$this->id);
            $res->bindValue('name', $this->full_name);
            $res->bindValue('cel', $this->cel_number);
            $res->bindValue('relations', $this->relationship);
            $res->bindValue('occupation', $this->occupation);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function updatePersonal_ref(){
        try {
            $conx = new Conexion;
            $query = 'UPDATE personal_ref SET id=:id,full_name=:name,cel_number=:cel,relationship=:relations,occupation=:occupation WHERE id=:id';
            $res = $conx->connect()->prepare($query);
            $res->bindValue('id',$this->id);
            $res->bindValue('name', $this->full_name);
            $res->bindValue('cel', $this->cel_number);
            $res->bindValue('relations', $this->relationship);
            $res->bindValue('occupation', $this->occupation);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function deletePersonal_ref(){
        try {
            $conx = new Conexion;
            $query = 'DELETE FROM personal_ref WHERE id=:id';
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