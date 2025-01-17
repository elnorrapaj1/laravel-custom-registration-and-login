<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CustomTableController;
use App\Http\Controllers\ArketimController;
use App\Http\Controllers\ShpenzimController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Models\Application;

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

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('register', [AuthController::class, 'registerIndex'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
    Route::get('login', [AuthController::class, 'loginIndex'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/settings', function () {
        return view('settings');
    });

    // CustomTable routes within auth middleware
    Route::resource('customTables', CustomTableController::class);
    // Application Routes
    Route::resource('applications', ApplicationController::class);
    Route::get('custom-table-data/{id}', [ApplicationController::class, 'getCustomTableData']);
    Route::get('/application', function () {
        $applications = Application::all();
        return view('application', compact('applications'));
    });

    Route::post('/arketim/store', [ArketimController::class, 'store'])->name('arketim.store');
    Route::post('/shpenzim/store', [ShpenzimController::class, 'store'])->name('shpenzim.store');

    Route::resource('clients', ClientController::class);
});
