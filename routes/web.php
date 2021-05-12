<?php

use App\Http\Livewire\AppointmentComponent\AppointmentEditFormComponent;
use App\Http\Livewire\AppointmentComponent\AppointmentViewComponent;
use App\Http\Livewire\CategoryComponent\CategoryAddFormComponent;
use App\Http\Livewire\CategoryComponent\CategoryEditFormComponent;
use App\Http\Livewire\CategoryComponent\CategoryViewComponent;
use App\Http\Livewire\Doctor\AppointmentComponent\DoctorAppointmentAddFormComponent;
use App\Http\Livewire\Patient\AppointmentComponent\PatientAppointmentAddFormComponent;
use App\Http\Livewire\Patient\AppointmentComponent\PatientAppointmentViewComponent;
use App\Http\Livewire\PrescriptionComponent\PrescriptionAddFormComponent;
use App\Http\Livewire\PrescriptionComponent\PrescriptionEditFormComponent;
use App\Http\Livewire\PrescriptionComponent\PrescriptionViewComponent;
use App\Http\Livewire\ProfileComponent\ProfileAddFormComponent;
use App\Http\Livewire\ProfileComponent\ProfileEditFormComponent;
use App\Http\Livewire\Receptionist\AppointmentComponent\ReceptionistAppointmentAddFormComponent;
use App\Http\Livewire\StockComponent\StockAddFormComponent;
use App\Http\Livewire\StockComponent\StockEditFormComponent;
use App\Http\Livewire\StockComponent\StockViewComponent;
use App\Http\Livewire\TreatmentComponent\TreatmentAddFormComponent;
use App\Http\Livewire\TreatmentComponent\TreatmentEditFormComponent;
use App\Http\Livewire\TreatmentComponent\TreatmentViewComponent;
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
    //PROFILE
    Route::get('/profile', ProfileAddFormComponent::class)->name('profile.add');
    Route::get('/profile/{role}/{user_id}', ProfileEditFormComponent::class)->name('profile.view');

    // APPOINTMENTS
    Route::middleware('role:patient')->group( function() {
        Route::get('/patient/appointments/add', PatientAppointmentAddFormComponent::class)->name('patient.appointment.add');
        Route::get('/patient/appointments', PatientAppointmentViewComponent::class)->name('patient.appointment.view');
    });

    Route::middleware('role:receptionist')->group( function() {
        Route::get('/receptionist/appointments/add', ReceptionistAppointmentAddFormComponent::class)->name('receptionist.appointment.add');
    });

    Route::middleware('role:doctor')->group( function() {
        Route::get('/doctor/appointments/add', DoctorAppointmentAddFormComponent::class)->name('doctor.appointment.add');
    });

    Route::middleware('role:receptionist|doctor|admin')->group( function() {
        //APPOINTMENTS
        Route::get('/appointments', AppointmentViewComponent::class)->name('appointments.view');
        Route::get('/appointments/edit/{appointment}', AppointmentEditFormComponent::class)->name('appointment.edit');

        //PRESCRIPTIONS
        Route::get('/prescriptions', PrescriptionViewComponent::class)->name('prescriptions.view');

        //CATEGORIES
        Route::get('/categories/add', CategoryAddFormComponent::class)->name('categories.add');
        Route::get('/categories', CategoryViewComponent::class)->name('categories.view');
        Route::get('/categories/edit/{category}', CategoryEditFormComponent::class)->name('categories.edit');

        //TREATMENTS
        Route::get('/treatments/add', TreatmentAddFormComponent::class)->name('treatments.add');
        Route::get('/treatments', TreatmentViewComponent::class)->name('treatments.view');
        Route::get('/treatments/edit/{treatment}', TreatmentEditFormComponent::class)->name('treatments.edit');

        //STOCKS
        Route::get('/stocks/add', StockAddFormComponent::class)->name('stocks.add');
        Route::get('/stocks', StockViewComponent::class)->name('stocks.view');
        Route::get('/stocks/edit/{stock}', StockEditFormComponent::class)->name('stocks.edit');
    });

    Route::middleware('role:doctor|admin')->group( function() {
        //PRESCRIPTIONS
        Route::get('/prescriptions/add', PrescriptionAddFormComponent::class)->name('prescriptions.add');
        Route::get('/prescriptions/edit/{prescription}', PrescriptionEditFormComponent::class)->name('prescriptions.edit');
    });
});