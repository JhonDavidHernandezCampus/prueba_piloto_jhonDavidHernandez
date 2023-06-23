<?php
namespace App\Controllers;
use App\Models\CountriesModel;

class CountriesController{


    public function getCountries(){
        try {
            $obj = new CountriesModel();
            $res = $obj->getCountries();
            print_r( ["Stado"=> 200, "Mensage"=> "Se muestras los datos"]);
            print_r($res);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function postCountries(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new CountriesModel($_DATA['id'],$_DATA['name_country']);
            $res = $obj->postCountries();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha agregado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function updateCountries(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new CountriesModel($_DATA['id'],$_DATA['name_country']);
            $res = $obj->updateCountries();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha actualizado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function deleteCountries(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new CountriesModel($_DATA['id']);
            $res = $obj->deleteCountries();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha eliminado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}


?>