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
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha agregado el dato"]);
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
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha actualizado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    //funcion para obtener todos los registros 
    public function getWork_reference(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new Work_referenceModel();
            $datos = $obj->getWork_reference();
            //print_r( ["Stado"=> 200, "Mensage"=> "Se muestran todos los datos de la tabla"]);
            print_r( $datos);
            return $datos;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    //funcion para eliminar un registro por su id
    public function deleteWork_reference(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new Work_referenceModel($_DATA['id']);
            $datos = $obj->deleteWork_reference();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha Eliminado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

}
?>