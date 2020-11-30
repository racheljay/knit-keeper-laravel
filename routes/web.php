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

$router->get('/api/user', function(Request $request) {
    $user = $request->user();
    return $user->toArray();
});

$router->get('/welcome', function () use ($router){
    return "Hello World";
});

$router->post('/register','UsersController@register');

// $router->get('/allstories', 'StoriesController@index');