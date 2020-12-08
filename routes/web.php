<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});




$router->get('/welcome', function () use ($router) {
    return "Hello World";
});

$router->post('/register', 'UsersController@register');

$router->get('/seeallprojects', 'ProjectsController@index');
$router->get('/seeallsubprojects', 'Sub_ProjectsController@index');


$router->group(['middleware' => 'auth'], function () use ($router) {
    // get user information using bearer token
    
    $router->get('/api/user', function (Request $request) {
        $user = $request->user();
        return $user->toArray();
    });
    $router->get('/getUserData', 'UsersController@index');

    $router->get('/logout', 'UsersController@logout');
    $router->delete('/delete-user', 'UsersController@delete');

    $router->get('projects/{user_id}', 'ProjectsController@filter');
    $router->get('sub_projects/{project_id}', 'Sub_ProjectsController@filter');
    
    $router->post('/add-project', 'ProjectsController@create');
    $router->post('/add-sub-project', 'Sub_ProjectsController@create');

    $router->put('edit-project/{id}', 'ProjectsController@update');
    $router->put('edit-subproject/{id}', 'Sub_ProjectsController@update');
    
    $router->delete('/delete-project', 'ProjectsController@delete');
    $router->delete('/delete-sub-project', 'Sub_ProjectsController@delete');





});
// $router->get('/show-sub-project/{id}', 'Sub_ProjectsController@show');
