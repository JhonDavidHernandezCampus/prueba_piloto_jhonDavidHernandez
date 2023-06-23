<?php
namespace App\Controllers;

use App\Models\LocaltionsModel;
class LocationsController{

    public function getPersonal_ref(){
        try {
            $obj = new Personal_refModel();
            $res = $obj->getPersonal_ref();
            print_r( ["Stado"=> 200, "Mensage"=> "Se muestras los datos"]);
            print_r($res);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function postPersonal_ref(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new Personal_refModel($_DATA['id'],$_DATA['full_name'],$_DATA['cel_number'],$_DATA['relationship'],$_DATA['occupation'],);
            $res = $obj->postPersonal_ref();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha agregado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function updatePersonal_ref(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new Personal_refModel($_DATA['id'],$_DATA['full_name'],$_DATA['cel_number'],$_DATA['relationship'],$_DATA['occupation'],);
            $res = $obj->updatePersonal_ref();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha actualizado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function deletePersonal_ref(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new Personal_refModel($_DATA['id']);
            $res = $obj->deletePersonal_ref();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha eliminado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}


?>