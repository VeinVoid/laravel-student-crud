<?php

use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home',[
        'title' => 'homePage'
    ]);
});

Route::get('/about', function () {
    return view('about',[
        'title' => 'aboutPage',
        'nama' => 'Vicko Amelino Syahputra',
        'kelas' => '11 PPLG 2',
        'image' => 'image/25B243D685BEECE929D7D93CC2E815C20BBB09389469C01728DC567C3AE4EC5F.jpeg'
    ]);
});

// Route::get('/students', [StudentsController::class, 'index']);

Route::get('/students', [StudentController::class, 'index'])->name('students.index');

Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');

Route::post('/students', [StudentController::class, 'store'])->name('student.store');

Route::get('/student/edit/{student}', [StudentController::class, 'edit'])->name('student.edit');

Route::put('/student/{student}', [StudentController::class, 'update'])->name('student.update');

Route::get('/student/{student}', [StudentController::class, 'show']);

Route::delete('/student/delete/{student}', [StudentController::class, 'destroy'])->name('students.destroy');