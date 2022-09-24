<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\ClientController;

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

Route::get('/', [ClientController::class, 'home'])->name('client.home');
Route::get('/map', [ClientController::class, 'map'])->name('client.map');
Route::get('/map/{lat}/{long}', [ClientController::class, 'current_map']);
Route::get('/category', [ClientController::class, 'category'])->name('client.category');
Route::get('/aboutus', [ClientController::class, 'aboutus'])->name('client.aboutus');
Route::get('/contactus', [ClientController::class, 'contactus'])->name('client.contactus');

Route::redirect('/console', 'login');

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::prefix('console')->middleware('auth')->group(function(){
    Route::redirect('/console', '/console/index');

    Route::get('dashboard', [ConsoleController::class, 'dashboard'])->name('console.dashboard');

    Route::get('manageaccount', [ConsoleController::class, 'manageaccount'])->name('console.manageaccount');
    Route::post('manageaccount', [ConsoleController::class, 'manageaccount_save']);

    Route::get('madrasah', [ConsoleController::class, 'madrasah'])->name('console.madrasah');
    Route::get('madrasah/new', [ConsoleController::class, 'madrasah_new'])->name('console.madrasah_new');
    Route::get('madrasah/{id}/edit', [ConsoleController::class, 'madrasah_edit']);
    Route::post('madrasah/{id}/edit', [ConsoleController::class, 'madrasah_edit_save']);
    Route::get('madrasah/{id}/delete', [ConsoleController::class, 'madrasah_delete']);
    Route::post('madrasah', [ConsoleController::class, 'madrasah_save']);

    Route::get('setting/console', [ConsoleController::class, 'setting_console'])->name('console.setting_console');
    Route::post('setting/console', [ConsoleController::class, 'setting_console_save']);
});
