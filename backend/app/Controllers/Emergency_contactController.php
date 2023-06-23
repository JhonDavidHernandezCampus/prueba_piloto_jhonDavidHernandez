<?php
namespace App\Controllers;
use App\Models\Emergency_contactModel;

class Emergency_contactController{


    public function getEmergency_contact(){
        try {
            $obj = new Emergency_contactModel();
            $res = $obj->getEmergency_contact();
            print_r( ["Stado"=> 200, "Mensage"=> "Se muestras los datos"]);
            print_r($res);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function postEmergency_contact(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new Emergency_contactModel($_DATA['id'],$_DATA['id_staff'],$_DATA['cel_number'],$_DATA['relationship'],$_DATA['full_name'],$_DATA['email']);
            $res = $obj->postEmergency_contact();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha agregado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function updateEmergency_contact(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new Emergency_contactModel($_DATA['id'],$_DATA['full_name'],$_DATA['cel_number'],$_DATA['relationship'],$_DATA['occupation'],);
            $res = $obj->updateEmergency_contact();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha actualizado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function deleteEmergency_contact(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new Emergency_contactModel($_DATA['id']);
            $res = $obj->deleteEmergency_contact();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha eliminado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}


?>