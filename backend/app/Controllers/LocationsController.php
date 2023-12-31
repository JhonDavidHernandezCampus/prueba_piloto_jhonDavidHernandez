<?php
namespace App\Controllers;
use App\Models\LocationsModel;

class LocationsController{

    public function getLocations(){
        try {
            $obj = new LocationsModel();
            $res = $obj->getLocaltions();
            //print_r( ["Stado"=> 200, "Mensage"=> "Se muestras los datos"]);
            print_r($res);
            return $res;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function postLocations(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new LocationsModel($_DATA['id'],$_DATA['name_location']);
            $res = $obj->postLocaltions();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha agregado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function updateLocations(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new LocationsModel($_DATA['id'],$_DATA['name_location']);
            $res = $obj->updateLocaltions();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha actualizado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function deleteLocations(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new LocationsModel($_DATA['id']);
            $res = $obj->deleteLocaltions();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha eliminado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}


?>