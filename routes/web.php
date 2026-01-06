<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\QuoteController as AdminQuoteController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\Admin\ActualiteController as AdminActualiteController;

// Language Switcher
Route::get('/language/{locale}', [App\Http\Controllers\LanguageController::class, 'switch'])->name('language.switch');

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/a-propos', [HomeController::class, 'about'])->name('about');

// Services Routes
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

// Actualités Routes
Route::get('/actualites', [ActualiteController::class, 'index'])->name('actualites.index');
Route::get('/actualites/{slug}', [ActualiteController::class, 'show'])->name('actualites.show');

// Contact & Quote Routes (with rate limiting)
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');
Route::get('/demande-devis', [QuoteController::class, 'create'])->name('quote.create');
Route::post('/demande-devis', [QuoteController::class, 'store'])
    ->middleware('throttle:3,1')
    ->name('quote.store');

// Admin Routes (Protected by Auth)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    

    
    // Projects Management
    Route::resource('projects', ProjectController::class);
    
    // Actualités Management
    Route::resource('actualites', AdminActualiteController::class);
    Route::delete('actualites/images/{image}', [AdminActualiteController::class, 'deleteGalleryImage'])->name('actualites.images.delete');
    
    // Media Management
    Route::get('media', [MediaController::class, 'index'])->name('media.index');
    Route::post('media/upload', [MediaController::class, 'upload'])->name('media.upload');
    Route::delete('media/{id}', [MediaController::class, 'destroy'])->name('media.destroy');
    
    // Contacts Management
    Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{id}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::post('contacts/{id}/mark-read', [AdminContactController::class, 'markAsRead'])->name('contacts.markAsRead');
    
    // Quotes Management
    Route::get('quotes', [AdminQuoteController::class, 'index'])->name('quotes.index');
    Route::get('quotes/{id}', [AdminQuoteController::class, 'show'])->name('quotes.show');
    Route::post('quotes/{id}/mark-read', [AdminQuoteController::class, 'markAsRead'])->name('quotes.markAsRead');
    Route::post('quotes/{id}/update-status', [AdminQuoteController::class, 'updateStatus'])->name('quotes.updateStatus');
    
    // SEO Management
    Route::get('seo', [SeoController::class, 'index'])->name('seo.index');
    Route::put('seo/{page}', [SeoController::class, 'update'])->name('seo.update');
});
