<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('auth.login');
});


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard/create', [RecordController::class, 'create'])->name('create');
    Route::post('dashboard', [RecordController::class, 'store'])->name('store');
    Route::get('dashboard/{id}/edit', [RecordController::class, 'edit'])->name('edit');
    Route::put('dashboard/{id}', [RecordController::class, 'update'])->name('update');
    Route::delete('dashboard/{id}', [RecordController::class, 'destroy'])->name('destroy');
    
    Route::get('dashboard/view', [DashboardController::class, 'view'])->name('view');
    Route::get('dashboard/export', [DashboardController::class, 'export'])->name('export');
});
