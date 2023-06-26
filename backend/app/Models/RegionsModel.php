<?php
namespace App\Models;

use Config\Conexion;
use PDO;
use Home\getInstance;

class RegionsModel{
    use getInstance;
    public $message;

    public function __construct(private $id=1,public $name_region=1, private $id_country=1) {
        $this->id = $id;
        $this->name_region = $name_region;
        $this->id_country = $id_country;
    }

    public function getRegions(){
        try {
            $conx = new Conexion;
            $query = 'SELECT  regions.id AS id_regions,countries.*, regions.name_region FROM countries INNER JOIN regions ON countries.id = regions.id_country;';
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

    public function postRegions(){
        try {
            $conx = new Conexion;
            $query = 'INSERT INTO regions(id,name_region,id_country) VALUES (:id,:name_region,:id_country)';
            $res = $conx->connect()->prepare($query);
            $res->bindValue('id',$this->id);
            $res->bindValue('name_region', $this->name_region);
            $res->bindValue('id_country', $this->id_country);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function updateRegions(){
        try {
            $conx = new Conexion;
            $query = 'UPDATE regions SET id=:id,name_region=:name_region, id_country=:id_country WHERE id=:id';
            $res = $conx->connect()->prepare($query);
            $res->bindValue('id',$this->id);
            $res->bindValue('name_region', $this->name_region);
            $res->bindValue('id_country', $this->id_country);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function deleteRegions(){
        try {
            $conx = new Conexion;
            $query = 'DELETE FROM regions WHERE id=:id';
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