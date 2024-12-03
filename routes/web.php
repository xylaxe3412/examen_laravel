<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return redirect()->route('tasks.index');  
});


Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::get('/tasks', [TaskController::class, 'index']);
    Route::patch('/tasks', [TaskController::class, 'edit'])->name('edit');
    
});
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');    



require __DIR__.'/auth.php';
