<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\messageController;
use App\Http\Controllers\panelController;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
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

Route::get('/send', [indexController::class, 'mail']);


Route::get('/', [indexController::class, 'index']);

//          pay message
Route::post('/messageSend', [messageController::class, 'messagePay'])->name('message.send');

// pay
Route::post('pay', [indexController::class, 'pay'])->name('pay');
Route::post('/verify', [indexController::class, 'verify'])->name('verify');


Route::get('/register', [authController::class, 'register'])->name('register');
Route::post('/register', [authController::class, 'newRegister']);
Route::get('/login', [authController::class, 'loginForm'])->name('login');
Route::post('/login', [authController::class, 'login']);
Route::get('/logout', [authController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'panel', 'middleware' => ['role:admin']], function () {

    Route::get('/', [panelController::class, 'index'])->name('panel.users');
    Route::get('/changeAmount', [panelController::class, 'changeAmountCart'])->name('panel.changeAmount');
    Route::post('/changeAmount', [panelController::class, 'editAmount']);
    Route::post('/deleteUser', [panelController::class, 'delete']);
    Route::post('/editUser', [panelController::class, 'editUser']);
    Route::post('/goEditUser', [panelController::class, 'goEditUser']);
});
