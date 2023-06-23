<?php
namespace App\Models;
use App\controllers\RoutesController;
use Config\Conexion;
use Home\getInstance;
use PDO;

class RoutesModel{
    use getInstance;
    public $message;
    public function __construct(private $id=1,public $name_route=1,private $start_date=1,public $end_date =1,public $description=1, public $duration_month=1 ) {
        $this->id = $id;
        $this->name_route = $name_route;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->description = $description;
        $this->duration_month = $duration_month;
    }

    public function getRoutes(){
        try {
            $conx = new Conexion;
            $query = 'SELECT * FROM routes';
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

    public function postRoutes(){
        try {
            $conx = new Conexion;
            $query = 'INSERT INTO routes(id,name_route,start_date,end_date,description,duration_month) VALUES (:id,:name_route,:start_date,:end_date,:description,:duration_month)';
            $res = $conx->connect()->prepare($query);
            $res->bindValue('id',$this->id);
            $res->bindValue('name_route', $this->name_route);
            $res->bindValue('start_date', $this->start_date);
            $res->bindValue('end_date', $this->end_date);
            $res->bindValue('description', $this->description);
            $res->bindValue('duration_month', $this->duration_month);

            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function updateRoutes(){
        try {
            $conx = new Conexion;
            $query = 'UPDATE routes SET id=:id,name_route=:name_route,start_date=:start_date,end_date=:end_date,description=:description,duration_month=:duration_month WHERE id=:id';
            $res = $conx->connect()->prepare($query);
            $res->bindValue('id',$this->id);
            $res->bindValue('name_route', $this->name_route);
            $res->bindValue('start_date', $this->start_date);
            $res->bindValue('end_date', $this->end_date);
            $res->bindValue('description', $this->description);
            $res->bindValue('duration_month', $this->duration_month);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function deleteRoutes(){
        try {
            $conx = new Conexion;
            $query = 'DELETE FROM routes WHERE id=:id';
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