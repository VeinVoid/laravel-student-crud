<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SchoolsController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\SecurityRouteMiddleware;
use App\Models\Students;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('home',[
//         'title' => 'homePage'
//     ]);
// });

Route::get('/about', function () {
    return view('about',[
        'title' => 'aboutPage',
        'nama' => 'Vicko Amelino Syahputra',
        'kelas' => '11 PPLG 2',
        'image' => 'image/25B243D685BEECE929D7D93CC2E815C20BBB09389469C01728DC567C3AE4EC5F.jpeg'
    ]);
});

// Route::get('/students', [StudentsController::class, 'index']);

Route::get('/', [DashboardController::class, 'homeView'])->name('dashboard.home');

Route::group(['prefix' => '/school'], function () {
    Route::get('/', [SchoolsController::class, 'index'])->name('schools.index');

    Route::group(['middleware' => SecurityRouteMiddleware::class], function () {
        Route::get('/create', [SchoolsController::class, 'store'])->name('student.create');
        Route::post('/', [SchoolsController::class, 'store'])->name('student.store');
        Route::get('/edit/{student}', [SchoolsController::class, 'update'])->name('student.edit');
        Route::put('/put/{student}', [SchoolsController::class, 'update'])->name('student.update');
        Route::delete('/delete/{student}', [SchoolsController::class, 'destroy'])->name('students.destroy');
    });
});

Route::group(['prefix' => '/students'], function () {
    Route::get('/', [StudentController::class, 'index'])->name('students.index');
    Route::get('/create', [StudentController::class, 'store'])->name('student.create');
    Route::post('/', [StudentController::class, 'store'])->name('student.store');
    Route::get('/edit/{student}', [StudentController::class, 'update'])->name('student.edit');
    Route::put('/put/{student}', [StudentController::class, 'update'])->name('student.update');
    Route::get('/{student}', [StudentController::class, 'show']);
    Route::delete('/delete/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
});

Route::group(['prefix' => '/kelas'], function () {
    Route::get('/', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/create', [KelasController::class, 'store'])->name('kelas.create');
    Route::post('/', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/edit/{kelas}', [KelasController::class, 'update'])->name('kelas.edit');
    Route::put('/put/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
    Route::get('/{kelas}', [KelasController::class, 'show']);
    Route::delete('/delete/{kelas}', [KelasController::class, 'destroy'])->name('kelas.destroy');
});

Route::group(['prefix' => '/auth'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});