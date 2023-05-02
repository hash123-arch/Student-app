<?php


use App\Http\Controllers\StudentController;
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
Route::get('/',function(){
    return view('Layouts.app');
});

Route::prefix('/Student')->group(function (){

    Route::get('/', [StudentController::class, "index"])->name('Student');
  
    Route::post('/store', [StudentController::class, "store"])->name('Student.store');
  
    Route::get('/{task_id}/delete', [StudentController::class, "delete"])->name('Student.delete');
    
    Route::get('/edit', [StudentController::class, "edit"])->name('Student.edit');

    Route::post('/{task_id}/update', [StudentController::class, "update"])->name('Student.update');

    Route::get('/{task_id}/done', [StudentController::class, "done"])->name('Student.done');
});

