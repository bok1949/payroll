<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboard;
use App\Http\Controllers\PagesController;



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


Route::get('/', [PagesController::class, 'index']);
Route::get('/index', [PagesController::class, 'index'])->middleware('alreadyLoggedin');
Route::get('/logout', [PagesController::class, 'logout'])->name('logout');
Route::post('/authcheck', [PagesController::class, 'check'])->name('auth.check');


Route::get('/dashboard', [PagesController::class, 'dashBoard'])->middleware('islogged')->name('dashboard');
Route::get('/addsalesrepform', [UserDashboard::class, 'addSalesrepForm'])->middleware('islogged')->name('add-salesrep');
Route::post('/savesalesrepform', [UserDashboard::class, 'saveaddSalesrepForm'])->middleware('islogged')->name('savesalesrepform');
Route::get('/showallsalesrep', [UserDashboard::class, 'showAllSalesrep'])->middleware('islogged')->name('showallsalesrep');
Route::get('/createpayroll', [UserDashboard::class, 'createPayroll'])->middleware('islogged')->name('createpayroll');
Route::get('/createpayrollpdf', [UserDashboard::class, 'createPayrollPDF'])->middleware('islogged')->name('createpayrollpdf');



if (env('APP_ENV') === 'production') {
    URL::forceScheme('https');
}
