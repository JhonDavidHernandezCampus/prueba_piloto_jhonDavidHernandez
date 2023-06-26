<?php
namespace App\Controllers;
use App\Models\Team_educatorsModel;

class Team_educatorsController{


    public function getTeam_educators(){
        try {
            $obj = new Team_educatorsModel();
            $res = $obj->getTeam_educators();
            //print_r( ["Stado"=> 200, "Mensage"=> "Se muestras los datos"]);
            print_r($res);
            return $res;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function postTeam_educators(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new Team_educatorsModel($_DATA['id'],$_DATA['name_rol']);
            $res = $obj->postTeam_educators();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha agregado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function updateTeam_educators(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new Team_educatorsModel($_DATA['id'],$_DATA['name_rol']);
            $res = $obj->updateTeam_educators();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha actualizado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function deleteTeam_educators(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new Team_educatorsModel($_DATA['id']);
            $res = $obj->deleteTeam_educators();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha eliminado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}


?>