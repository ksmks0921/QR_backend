<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });




      Auth::routes();
      Route::get('/', 'ProductController@showall');
      Route::get('/delete-item/{id}', 'ProductController@delete');
      Route::get('/edit-item/{id}', 'ProductController@edit');
      Route::post('/save/{id}', 'ProductController@save');
      Route::get('/new', 'ProductController@new');
      Route::post('/newsave', 'ProductController@newsave');
      Route::get('/get-users', 'ProductController@getUsers');

      Route::post('/update-product', 'ProductController@updateProduct');



      Route::get('qr-code-g', function () {
          \QrCode::size(500)
                    ->format('png')
                    ->generate('ItSolutionStuff.com', public_path('images/qrcode.png'));
            
          return view('home');
            
        });







