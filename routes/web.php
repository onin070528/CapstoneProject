<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EstablishmentController;
use App\Http\Controllers\PTOAdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Public User Routes
Route::prefix('public')->name('public.')->group(function () {
    Route::get('/', [HomeController::class, 'publicHome'])->name('home');
    Route::get('/establishments', [HomeController::class, 'publicEstablishments'])->name('establishments');
    Route::get('/events', [HomeController::class, 'publicEvents'])->name('events');
    Route::get('/travel-guide', [HomeController::class, 'publicTravelGuide'])->name('travel-guide');
    Route::get('/emergency', [HomeController::class, 'publicEmergency'])->name('emergency');
});

// Establishment User Routes
Route::prefix('establishment')->name('establishment.')->group(function () {
    Route::get('/dashboard', [EstablishmentController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [EstablishmentController::class, 'profile'])->name('profile');
    Route::get('/qr-code', [EstablishmentController::class, 'qrCode'])->name('qr-code');
    Route::get('/registrations', [EstablishmentController::class, 'registrations'])->name('registrations');
    Route::get('/manual-encoding', [EstablishmentController::class, 'manualEncoding'])->name('manual-encoding');
    Route::get('/feedback', [EstablishmentController::class, 'feedback'])->name('feedback');
    Route::get('/reports', [EstablishmentController::class, 'reports'])->name('reports');
    Route::get('/notifications', [EstablishmentController::class, 'notifications'])->name('notifications');
});

// Admin (PTOAdmin) Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [PTOAdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/tourist-monitoring', [PTOAdminController::class, 'touristMonitoring'])->name('tourist-monitoring');
    Route::get('/experience-analytics', [PTOAdminController::class, 'experienceAnalytics'])->name('experience-analytics');
    Route::get('/establishments', [PTOAdminController::class, 'establishments'])->name('establishments');
    Route::get('/qr-generation', [PTOAdminController::class, 'qrGeneration'])->name('qr-generation');
    Route::get('/destinations', [PTOAdminController::class, 'destinations'])->name('destinations');
    Route::get('/approvals', [PTOAdminController::class, 'approvals'])->name('approvals');
    Route::get('/reports', [PTOAdminController::class, 'reports'])->name('reports');
    Route::get('/user-management', [PTOAdminController::class, 'userManagement'])->name('user-management');
    Route::get('/audit-logs', [PTOAdminController::class, 'auditLogs'])->name('audit-logs');
    Route::get('/system-settings', [PTOAdminController::class, 'systemSettings'])->name('system-settings');
});




