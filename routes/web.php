<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SiteManagementController;
use App\Http\Controllers\SiteSettingsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/project/{project:slug}', [FrontendController::class, 'show'])->name('project.show');

Auth::routes([
    'register' => false
]);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::middleware(['auth'])->group(function() {
    //Admin routes
    Route::prefix('admin')->as('admin.')->group(function() {
        //Admin index
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/trash', [AdminController::class, 'trashed'])->name('trashed');

        //Settings
        Route::get('/settings', [SiteSettingsController::class, 'index'])->name('settings');

        //Sections
        Route::get('/home', [SiteManagementController::class, 'home'])->name('home');
        Route::post('/home/store', [SiteManagementController::class, 'home_store'])->name('home_store');

        //Contact
        Route::resource('/contacts', ContactController::class)->except('store');
        Route::post('/contacts/{contact}/trash', [ContactController::class, 'trash'])->name('contact.trash');
        Route::post('/contacts/{contact}/restore', [ContactController::class, 'restore'])->name('contact.restore');


        //Category
        Route::resource('/category', CategoryController::class);

        //Project
        Route::post('/project/{project}/trash', [ProjectController::class, 'trash'])->name('project.trash');
        Route::post('/project/{project:id}/restore', [ProjectController::class, 'restore'])->name('project.restore');
        Route::resource('/project', ProjectController::class);

        //Trash
        Route::get('/trashed', [AdminController::class, 'trashed'])->name('trashed');
    });
});
