<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('projects', [ProjectController::class, 'index'])->name('projects');
Route::get('project/form', [ProjectController::class, 'createForm']);
Route::post('project/create', [ProjectController::class, 'create'])->name('project.create');
Route::get('project/delete/{id}', [ProjectController::class, 'delete'])->name('delete-project');
Route::get('project/update/{id}', [ProjectController::class, 'updateForm'])->name('update-updateForm');
Route::post('project/update-project', [ProjectController::class, 'update'])->name('update-project');

Route::get('tasks', [TaskController::class, 'index'])->name('tasks');
Route::get('task/form', [TaskController::class, 'createForm']);
Route::post('task/create', [TaskController::class, 'create'])->name('task.create');
Route::get('task/delete/{id}', [TaskController::class, 'delete'])->name('delete-task');
Route::get('task/update/{id}', [TaskController::class, 'updateForm'])->name('update-updateForm');
Route::post('task/update-task', [TaskController::class, 'update'])->name('update-task');





