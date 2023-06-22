<?php
namespace App\Controllers;
use App\Models\Work_referenceModel;

class Work_referenceController{
    //funcion de agregar datos
    public function postWork_reference(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new Work_referenceModel($_DATA['id'], $_DATA['full_name'], $_DATA['cel_number'], $_DATA['position'], $_DATA['company']);
            $datos = $obj->postWork_reference();
            print_r($datos);


        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }


    //funcion de actualizar
    public function updateWork_reference(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
        $obj = new Work_referenceModel($_DATA['id'],$_DATA['full_name'],$_DATA['cel_number'],$_DATA['position'],$_DATA['company']);
        $datos = $obj->updateWork_reference();
        print_r($datos);
        echo $_DATA['cel_number'];
        echo $_DATA['full_name'];
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }



}
?>