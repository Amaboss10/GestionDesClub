<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    echo '<h1>Bonjour !</h1>';
});

Route::get('/bonjour/{nom}', function ($nom) {
    echo "Bonjour " . $nom;
});

Route::get('nouvellepage', 'App\Http\Controllers\MonControleur@retourneNouvellePage');

Route::get('exemple', 'App\Http\Controllers\MonControleur@retournePageExemple');

Route::get('membres', 'App\Http\Controllers\ControleurMembres@index');

Route::get('membre/{numero}', 'App\Http\Controllers\ControleurMembres@afficher');
Route::get('creer', 'App\Http\Controllers\ControleurMembres@creer');
Route::post('creation/membre', 'App\Http\Controllers\ControleurMembres@enregistrer');
Route::get('modifier/{id}', 'App\Http\Controllers\ControleurMembres@editer');
Route::patch('miseAJour/{id}', 'App\Http\Controllers\ControleurMembres@miseAJour');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/identite', 'App\Http\Controllers\ControleurMembres@identite');
Route::get('/protege', 'App\Http\Controllers\ControleurMembres@acces_protege')
->middleware('auth');

Route::get('/admin/users', 'AdminUserController@index')->name('admin.users.index');

Route::post('/admin/users/approve/{id}', 'AdminUserController@approve')->name('admin.users.approve');




