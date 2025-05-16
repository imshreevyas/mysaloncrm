<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SalonController;
use App\Http\Controllers\SalonProfileController;
use App\Http\Controllers\PlansController;

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

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function(){

    // ================ Strting Basic without AUTH REQUESTS ==============================

    Route::get('/login',[AdminController::class, 'index'])->name('login');
    Route::get('/forgot-password',[AdminController::class, 'index'])->name('forgot-password');
    Route::post('/login',[AdminController::class, 'adminLoginPost'])->name('adminLoginPost');

    Route::middleware('admin.auth')->group(function () {

        // ================ GET REQUESTS ==============================

            Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

            // Subscription Plans Routes
            Route::get('/plans/all', [PlansController::class, 'index'])->name('plans_all');
            Route::get('/plans/add', [PlansController::class, 'create'])->name('plans_add');
            Route::get('/plans/edit', [PlansController::class, 'edit'])->name('plans_edit');
            Route::get('/plans/export', [PlansController::class, 'export_data'])->name('plans_export');


            // Salons Routes
            Route::get('/salons/all', [SalonController::class, 'index'])->name('salon_all');
            Route::get('/salons/add', [SalonController::class, 'create'])->name('salon_add');
            Route::get('/salons/edit', [SalonController::class, 'edit'])->name('salon_edit');
            Route::get('/salons/dashboard/{salon_uid}', [SalonController::class, 'salon_dashboard'])->name('salon_dashboard');
            Route::get('/salons/export', [SalonController::class, 'export_data'])->name('salon_export');


        // ================ POST REQUESTS ==============================
    });
});


// Salon Routes

// Admin Routes
Route::prefix('salon')->name('salon.')->group(function(){

    // ================ Strting Basic without AUTH REQUESTS ==============================

    // Google Login Routes
    Route::get('/auth/google/redirect',[SalonController::class, 'google_redirect'])->name('auth.google.redirect');
    Route::get('/auth/google/callback',[SalonController::class, 'google_callback'])->name('auth.google.callback');
    
    Route::get('/login',[SalonController::class, 'index'])->name('login');
    Route::get('/',[SalonController::class, 'index'])->name('login');
    Route::get('/register',[SalonController::class, 'register'])->name('register');
    Route::get('/forgot-password',[SalonController::class, 'index'])->name('forgot-password');

    Route::post('/login',[SalonController::class, 'salonLoginPost'])->name('salonLoginPost');
    Route::post('/submit_register',[SalonController::class, 'submit_register'])->name('submit_register');
    
    Route::middleware(['salon.auth'])->group(function () {

        Route::get('/dashboard',[SalonController::class, 'salonDashboard'])->name('dashboard');
        // Salon Profile Routes
        Route::get('/profile',[SalonProfileController::class, 'index'])->name('profile');
        Route::get('/edit-profile',[SalonProfileController::class, 'edit'])->name('edit-profile');
        Route::post('/update-salon-banner',[SalonProfileController::class, 'update_salon_banner'])->name('update-salon-banner');
        Route::post('/update-salon-social-media',[SalonProfileController::class, 'update_salon_social_media'])->name('update-salon-social-media');

        // Salon Basic Routes
        Route::get('/logout',[SalonController::class, 'logout'])->name('logout');
        
        // POST Requests
        Route::post('/update_password',[SalonProfileController::class, 'update_password'])->name('update_password');
        Route::post('/profile/update',[SalonProfileController::class, 'update'])->name('submit_profile');
    });
});


// Main Website Routes

Route::get('/',[AdminController::class, 'index'])->name('home');
Route::get('/home',[AdminController::class, 'index'])->name('home');




