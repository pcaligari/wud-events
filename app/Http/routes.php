<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


/**
 * My first route - simply return JSON object containing the statuses
 * stored in the DB.  If this were any more complicated then the code
 * would go into a controller.
 */
Route::get('/status', function () {
    $stati = App\Status::orderBy('seq','asc')->get();
    
    return json_encode($stati);
});

/**
 * Stub routes for restful claim management
 */
Route::resource('claim','ClaimController');