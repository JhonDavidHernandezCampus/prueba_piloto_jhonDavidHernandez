<?php
namespace App\Controllers;
use App\Models\RegionsModel;

class RegionsController{

    public function getRegions(){
        try {
            $obj = new RegionsModel();
            $res = $obj->getRegions();
            //print_r( ["Stado"=> 200, "Mensage"=> "Se muestras los datos"]);
            print_r($res);
            return $res;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function postRegions(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new RegionsModel($_DATA['id'],$_DATA['name_region'],$_DATA['id_country']);
            $res = $obj->postRegions();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha agregado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function updateRegions(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new RegionsModel($_DATA['id'],$_DATA['name_region'],$_DATA['id_country']);
            $res = $obj->updateRegions();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha actualizado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function deleteRegions(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new RegionsModel($_DATA['id']);
            $res = $obj->deleteRegions();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha eliminado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}


?>