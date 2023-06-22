<?php
namespace Routes;

use Bramus\Router\Router;//importamos la libreria para el enrrutamiento

$router = new Router();



//rutas para la tabla Work_reference

$router->get('/put','App\Controllers\Work_referenceController@updateWork_reference');
$router->get('/post','App\Controllers\Work_referenceController@postWork_reference');
$router->get('/get','App\Controllers\Work_referenceController@postWork_reference');
/*$router->get('/delete','App\Controllers\Work_referenceController@postWork_reference');
 */





$router->run();

?>