<?php

use Illuminate\Support\Facades\Route;

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
//     return redirect(route('dashboard.index'));
// });

Route::get('/', function () {
    return redirect(route('index'));
});



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        Route::namespace('Frontend')->group(function () {

            Route::get('/index', 'indexController@index')->name('index');
            Route::post('/indexComment', 'indexController@indexComment')->name('indexComment');

            /////////////////////////////////////////////////
            Route::middleware(['auth'])->group(function () {
    
                Route::get('/addmission', 'indexController@addmission')->name('addmission');
                Route::post('/addmissioncreate', 'indexController@addmissioncreate')->name('addmissioncreate');
                ////////////////////////////////////////////////////////
                Route::get('/profile', 'indexController@profile')->name('profile');


            });


            /////////////////////////////////////////////////
        
            Route::get('/about', 'indexController@about')->name('about');

            /////////////////////////////////////////////////
        
            Route::get('/contact', 'indexController@contact')->name('contact');
            Route::post('/contactComment', 'indexController@contactComment')->name('contactComment');

            /////////////////////////////////////////////////
        
            Route::get('/gallery', 'indexController@gallery')->name('gallery');

            /////////////////////////////////////////////////
        
            Route::get('/our_doctors', 'indexController@our_doctors')->name('our_doctors');

            /////////////////////////////////////////////////
        
            Route::get('/services', 'indexController@services')->name('services');

            ////////////////////////////////////////////////////////
            // Route::get('/login', 'indexController@login')->name('loginfront');

          
            ////////////////////////////////////////////////////////
            Route::get('/start_exam', 'indexController@startExam');
            Route::get('/next_question/{answer}', 'indexController@nextQuestion');


            
        });



    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
