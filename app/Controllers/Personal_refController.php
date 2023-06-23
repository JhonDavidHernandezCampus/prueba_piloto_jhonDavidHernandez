<?php
namespace App\Controllers;
use App\Models\Personal_refModel;

class Personal_refController{


    public function getPersonal_ref(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'));
            $obj = new Personal_refModel();
            $res = $obj->getPersonal_ref();
            print_r($res);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}


?>