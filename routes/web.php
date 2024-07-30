<?php

use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return view('welcome');
});


Route::middleware('auth', 'verified')
->name('admin.')
->prefix('admin')
->group(function(){
Route::get('/',[DashboardController::class,'index'])->name('dashboard');

    Route::resource('Projects', ProjectController::class)->parameters([
        'Projects'=>'project:slug',
    ]);
});

require __DIR__.'/auth.php';
