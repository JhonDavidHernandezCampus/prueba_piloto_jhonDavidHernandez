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

//rutas para la tabla countries
$router->mount('/api/countries', function() use($router){
    $router->get('/get','App\Controllers\CountriesController@getCountries');
    $router->post('/post','App\Controllers\CountriesController@postCountries');
    $router->put('/put','App\Controllers\CountriesController@updateCountries');
    $router->delete('/delete','App\Controllers\CountriesController@deleteCountries');
});

//rutas para la tabla routes
$router->mount('/api/routes', function() use($router){
    $router->get('/get','App\Controllers\RoutesController@getRoutes');
    $router->post('/post','App\Controllers\RoutesController@postRoutes');
    $router->put('/put','App\Controllers\RoutesController@updateRoutes');
    $router->delete('/delete','App\Controllers\RoutesController@deleteRoutes');
});

//rutas para la tabla Team_educators
$router->mount('/api/team_educators', function() use($router){
    $router->get('/get','App\Controllers\Team_educatorsController@getTeam_educators');
    $router->post('/post','App\Controllers\Team_educatorsController@postTeam_educators');
    $router->put('/put','App\Controllers\Team_educatorsController@updateTeam_educators');
    $router->delete('/delete','App\Controllers\Team_educatorsController@deleteTeam_educators');
});

//Rutas para la tabla Levels
$router->mount('/api/levels', function() use($router){
    $router->get('/get','App\Controllers\LevelsController@getLevels');
    $router->post('/post','App\Controllers\LevelsController@postLevels');
    $router->put('/put','App\Controllers\LevelsController@updateLevels');
    $router->delete('/delete','App\Controllers\LevelsController@deleteLevels');
});


//Rutas para la tabla Locations
$router->mount('/api/locations', function() use($router){
    $router->get('/get','App\Controllers\LocationsController@getLocations');
    $router->post('/post','App\Controllers\LocationsController@postLocations');
    $router->put('/put','App\Controllers\LocationsController@updateLocations');
    $router->delete('/delete','App\Controllers\LocationsController@deleteLocations');
});

//Rutas para la tabla Regions
$router->mount('/api/regions', function() use($router){
    $router->get('/get','App\Controllers\RegionsController@getRegions');
    $router->post('/post','App\Controllers\RegionsController@postRegions');
    $router->put('/put','App\Controllers\RegionsController@updateRegions');
    $router->delete('/delete','App\Controllers\RegionsController@deleteRegions');
});













//rutas para la tabla emergency_contact
$router->mount('/api/emergency_contact', function() use($router){
    $router->get('/get','App\Controllers\Emergency_contactController@getEmergency_contact');
    $router->post('/post','App\Controllers\Emergency_contactController@postEmergency_contact');
    $router->put('/put','App\Controllers\Emergency_contactController@updateEmergency_contact');
    $router->delete('/delete','App\Controllers\Emergency_contactController@deleteEmergency_contact');
});







$router->run();

?>