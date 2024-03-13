<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/hello', function() {
//     return response("<h1>Hello User</h1>", 200)
//     ->header('Content-Type', 'text/plain');
// });

// Route::get('/post/{id}', function($id) {
//     return response(('Post ' . $id));
// })->where('id', '[0-9]+');

// Route::get('/search', function(Request $request) {
//     return $request->name;
// });

Route::get('/', function() {
    return view('listings', [
        'heading' => 'Latest Listings', // here, when we create an array, the array name is considered as a variable
        'listings' => Listing::all()
    ]);
});


Route::get('/listings/{id}', function($id) {
    return view('listing', [
        'listing' => Listing::find($id)
    ]);
});

// to create a migration of a new table, we run the code: php aritsan make:migration create_listings_table
// to seed a database, we run the code: php artisan db:seed
// to refresh a database and also seed (meaning to reset a table), we run the code: php artisan migrate:refresh --seed