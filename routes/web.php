<?php

use App\Http\Livewire\AppointmentComponent\AppointmentAddFormComponent;
use App\Http\Livewire\AppointmentComponent\AppointmentViewComponent;
use App\Http\Livewire\CategoryComponent\CategoryAddFormComponent;
use App\Http\Livewire\CategoryComponent\CategoryEditFormComponent;
use App\Http\Livewire\CategoryComponent\CategoryViewComponent;
use App\Http\Livewire\ProfileComponent\ProfileAddFormComponent;
use App\Http\Livewire\ProfileComponent\ProfileEditFormComponent;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group( function() {
    Route::get('/profile', ProfileAddFormComponent::class)->name('profile.add');
    Route::get('/profile/{role}/{user_id}', ProfileEditFormComponent::class)->name('profile.view');

    Route::get('/appointments/add', AppointmentAddFormComponent::class)->name('appointment.add');
    Route::get('/appointments', AppointmentViewComponent::class)->name('appointment.view');

    Route::get('/categories/add', CategoryAddFormComponent::class)->name('categories.add');
    Route::get('/categories/edit/{category}', CategoryEditFormComponent::class)->name('categories.edit');
    Route::get('/categories', CategoryViewComponent::class)->name('categories.view');

    // Route::get('/categories/add', CategoryAddFormComponent::class)->name('categories.add');
    // Route::get('/categories/edit/{category}', CategoryEditFormComponent::class)->name('categories.edit');
    // Route::get('/categories', CategoryViewComponent::class)->name('categories.view');


});