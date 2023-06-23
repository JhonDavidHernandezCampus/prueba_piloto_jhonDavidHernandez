<?php
namespace App\Models;
use App\Controllers\Emergency_contactController;
use Config\Conexion;
use Home\getInstance;
use PDO;

class Emergency_contactModel{
    use getInstance;
    public $message;
    public function __construct(private $id=1,public $id_staff=1,private $cel_number=1,public $relationship =1,public $full_name=1,public $email=1) {
        $this->id = $id;
        $this->id_staff = $id_staff;
        $this->cel_number = $cel_number;
        $this->relationship = $relationship;
        $this->full_name = $full_name;
        $this->email = $email;
    }

    public function getEmergency_contact(){
        try {
            $conx = new Conexion;
            $query = 'SELECT * FROM emergency_contact';
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

    public function postEmergency_contact(){
        try {
            $conx = new Conexion;
            $query = 'INSERT INTO emergency_contact(id,id_staff,cel_number,relationship,full_name,email) VALUES (:id,:id_staff,:cel,:relations,:name,:email)';
            $res = $conx->connect()->prepare($query);
            $res->bindValue('id',$this->id);
            $res->bindValue('id_staff',$this->id_staff);
            $res->bindValue('cel', $this->cel_number);
            $res->bindValue('relations', $this->relationship);
            $res->bindValue('name', $this->full_name);
            $res->bindValue('email', $this->email);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function updateEmergency_contact(){
        try {
            $conx = new Conexion;
            $query = 'UPDATE emergency_contact SET id=:id,full_name=:name,cel_number=:cel,relationship=:relations,occupation=:occupation WHERE id=:id';
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

    public function deleteEmergency_contact(){
        try {
            $conx = new Conexion;
            $query = 'DELETE FROM emergency_contact WHERE id=:id';
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