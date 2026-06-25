<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\MapDirectoryController;
use App\Http\Controllers\PlanTripController;
use App\Http\Controllers\FeedbackController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/destinations', [DestinationsController::class, 'index'])->name('destinations');
Route::get('/map-directory', [MapDirectoryController::class, 'index'])->name('map-directory');
Route::get('/plan-trip', [PlanTripController::class, 'index'])->name('plan-trip');
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
