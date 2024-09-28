<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\TaskController;

Route::get('/companies', [CompanyController::class, 'index']);
Route::post('/task/create', [TaskController::class, 'createTask']);
