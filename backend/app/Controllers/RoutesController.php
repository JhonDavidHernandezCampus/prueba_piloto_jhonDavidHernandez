<?php
namespace App\Controllers;
use App\Models\RoutesModel;

class RoutesController{


    public function getRoutes(){
        try {
            $obj = new RoutesModel();
            $res = $obj->getRoutes();
            //print_r( ["Stado"=> 200, "Mensage"=> "Se muestras los datos"]);
            print_r($res);
            return $res;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function postRoutes(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new RoutesModel($_DATA['id'],$_DATA['name_route'],$_DATA['start_date'],$_DATA['end_date'],$_DATA['description'],$_DATA['duration_month']);
            $res = $obj->postRoutes();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha agregado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function updateRoutes(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new RoutesModel($_DATA['id'],$_DATA['name_route'],$_DATA['start_date'],$_DATA['end_date'],$_DATA['description'],$_DATA['duration_month']);
            $res = $obj->updateRoutes();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha actualizado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function deleteRoutes(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new RoutesModel($_DATA['id']);
            $res = $obj->deleteRoutes();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha eliminado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}


?>