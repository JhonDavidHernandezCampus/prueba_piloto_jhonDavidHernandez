<?php
namespace App\Controllers;
use App\Models\LevelsModel;

class LevelsController{


    public function getLevels(){
        try {
            $obj = new LevelsModel();
            $res = $obj->getLevels();
            //print_r( ["Stado"=> 200, "Mensage"=> "Se muestras los datos"]);
            print_r($res);
            return $res;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function postLevels(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new LevelsModel($_DATA['id'],$_DATA['name_level'],$_DATA['group_level']);
            $res = $obj->postLevels();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha agregado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function updateLevels(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new LevelsModel($_DATA['id'],$_DATA['name_level'],$_DATA['group_level']);
            $res = $obj->updateLevels();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha actualizado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function deleteLevels(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new LevelsModel($_DATA['id']);
            $res = $obj->deleteLevels();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha eliminado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}


?>