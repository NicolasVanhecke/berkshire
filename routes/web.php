<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\App;

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

// Redirect / to /{locale}
Route::get('/', function () {
    return redirect( app()->getLocale() );
});

Route::get( '/setlocale/{locale}', [ BaseController::class, 'setlocale' ] );

Route::group( [ 'prefix' => '{locale}', 'middleware' => 'setlocale' ], function() {
    Route::get( '/', [ ArticleController::class, 'index' ] )->name( 'home' );
    Route::get( '/articles', [ ArticleController::class, 'index' ] );
    Route::get( '/articles/{article}', [ ArticleController::class, 'show' ] );
    Route::post( '/newsletter', [ BaseController::class, 'newsletter' ] );
});
