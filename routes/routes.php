<?php
namespace Routes;

use Bramus\Router\Router;//importamos la libreria para el enrrutamiento

$router = new Router();



//rutas para la tabla Work_reference
$router->mount('/api/work_reference', function() use($router){
    $router->get('/get','App\Controllers\Work_referenceController@getWork_reference');
    $router->post('/post','App\Controllers\Work_referenceController@postWork_reference');
    $router->put('/put','App\Controllers\Work_referenceController@updateWork_reference');
    $router->delete('/delete','App\Controllers\Work_referenceController@deleteWork_reference');
});


//rutas para la tabla personal_ref
$router->mount('/api/personal_ref', function() use($router){
    $router->get('/get','App\Controllers\Personal_refController@getPersonal_ref');
    $router->post('/post','App\Controllers\Personal_refController@postPersonal_ref');
    $router->put('/put','App\Controllers\Personal_refController@updatePersonal_ref');
    $router->delete('/delete','App\Controllers\Personal_refController@deletePersonal_ref');
});






$router->run();

?>