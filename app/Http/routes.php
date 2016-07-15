<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function() {  

    Route::get('/', ['as' => 'home', function() {
        return view('welcome', [
            'carousel_imgs' => [
                (object) ['file' => 'carousel_1.jpg'],
                (object) ['file' => 'carousel_2.jpg'],
                (object) ['file' => 'carousel_3.jpg'],
                (object) ['file' => 'carousel_4.jpg'],
                (object) ['file' => 'carousel_5.jpg'],
            ]
        ]);
    }]);

    Route::get('/nodriza', ['as' => 'nodriza', function() {
        $data = json_decode(file_get_contents('data/nodriza.json'));
        return view('nodriza', [
            'data' => $data
        ]);        
    }]);

    Route::get('/plataformas', ['as' => 'plataformas', function() {
        $data = json_decode(file_get_contents('data/plataformas.json'));
        return view('plataformas', [
            'types' => $data
        ]);
    }]);

    Route::get('/artistas', ['as' => 'artists', function() {
        return view('faq');
    }]);    

    Route::get('/preguntas-frecuentes', ['as' => 'faq', function() {
        return view('faq');
    }]);

    Route::get('/comprar', ['as' => 'buy', 'uses' => 'BuyController@getIndex']);

    Route::get('/checkout/{result}', ['as' => 'checkout', 'uses' => 'CheckoutController@getIndex'])
        ->where('result', '(success|failure|pending)');

    Route::get('/auth/login', 'Auth\AuthController@getLogin');       
    Route::post('/auth/login', 'Auth\AuthController@postLogin');    
    Route::get('/auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

    Route::group([
        'namespace' => 'Admin',
        'middleware' => 'auth',
        'prefix' => 'admin'
    ], function() {
        Route::get('/', ['as' => 'welcome', function() {
            return view('admin.welcome');
        }]);        
    });

});