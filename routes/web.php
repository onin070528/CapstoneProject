<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\MapDirectoryController;
use App\Http\Controllers\PlanTripController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\EstablishmentController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/destinations', [DestinationsController::class, 'index'])->name('destinations');
Route::get('/map-directory', [MapDirectoryController::class, 'index'])->name('map-directory');
Route::get('/plan-trip', [PlanTripController::class, 'index'])->name('plan-trip');
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');

// Establishment Console
Route::get('/establishment/overview', [EstablishmentController::class, 'overview'])->name('establishment.overview');
Route::get('/establishment/record-arrivals', [EstablishmentController::class, 'recordArrivals'])->name('establishment.record-arrivals');
Route::get('/establishment/monthly-reports', [EstablishmentController::class, 'monthlyReports'])->name('establishment.monthly-reports');
Route::get('/establishment/guest-feedback', [EstablishmentController::class, 'guestFeedback'])->name('establishment.guest-feedback');

// PTO Admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/arrival-monitoring', [AdminController::class, 'arrivalMonitoring'])->name('admin.arrival-monitoring');
Route::get('/admin/report-validation', [AdminController::class, 'reportValidation'])->name('admin.report-validation');
Route::get('/admin/establishments', [AdminController::class, 'establishments'])->name('admin.establishments');
Route::get('/admin/sentiment-analytics', [AdminController::class, 'sentimentAnalytics'])->name('admin.sentiment-analytics');
Route::get('/admin/performance-ranking', [AdminController::class, 'performanceRanking'])->name('admin.performance-ranking');

