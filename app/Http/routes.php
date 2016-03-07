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

Route::get('/', function() {
    return view('welcome', [
        'carousel_imgs' => [
            (object) ['file' => 'https://scontent.xx.fbcdn.net/hphotos-xfa1/v/t1.0-9/11755657_846122522140524_8561063073405343122_n.jpg?oh=d0cada6070f89dc8aca91cd121f2b24d&oe=5727A143'],
            (object) ['file' => 'https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-xaf1/v/t1.0-9/11836869_856275071125269_6082088570319343477_n.jpg?oh=6aecc9ac5d269f404ee1000ed333f182&oe=572839F6&__gda__=1466188871_a821759de189c569e06c3a335cb1ee01'],
            (object) ['file' => 'https://fbcdn-sphotos-a-a.akamaihd.net/hphotos-ak-xap1/v/t1.0-9/10425494_722932117792899_4637318312161528780_n.jpg?oh=5f9bb95bf0f500a09b0e73db1d3f26bc&oe=575889E4&__gda__=1466032696_907062717528400e4e5a107dd2d24adb'],
            (object) ['file' => 'https://scontent.xx.fbcdn.net/hphotos-ash2/v/t1.0-9/10171714_721130214639756_3497489548159064083_n.jpg?oh=e9b362d0d7299720032f91ef872fade8&oe=57685A6A']
        ]
    ]);
});

Route::get('/nodriza', ['as' => 'nodriza', function() {
    return view('nodriza');
}]);

Route::get('/plataformas', ['as' => 'plataformas', function() {
    $title = 'Plataformas'; 
    $data = json_decode(file_get_contents('data/plataformas.json'));
    return view('plataformas', [
        'title' => $title,
        'types' => $data
    ]);
}]);

Route::get('/faq', ['as' => 'faq', function() {
    return view('faq');
}]);

Route::group(['middleware' => ['web']], function() {  

    Route::get('/nodriza/pedido', ['as' => 'nodriza-pedido', function() {
        die('hoaa');
        return view('nodriza_pedido');
    }]);

    Route::post('/nodriza/pedido', function() {
        return redirect()->route(
            'nodriza-pedido', 
            []
        );
    });

    Route::get('/auth/login', 'Auth\AuthController@getLogin');       
    Route::post('/auth/login', 'Auth\AuthController@postLogin');    
    Route::get('/auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

    Route::group([
        'namespace' => 'Admin',
        'middleware' => 'auth',
        'prefix' => 'admin'
    ], function() {
        Route::get('/', ['uses' => 'PostController@index']);
        Route::resource('post', 'PostController');
        Route::resource('tag', 'TagController');    
    });

});