<?php

use App\Http\Livewire\AppointmentComponent\AppointmentEditFormComponent;
use App\Http\Livewire\AppointmentComponent\AppointmentViewComponent;
use App\Http\Livewire\CategoryComponent\CategoryAddFormComponent;
use App\Http\Livewire\CategoryComponent\CategoryEditFormComponent;
use App\Http\Livewire\CategoryComponent\CategoryViewComponent;
use App\Http\Livewire\Doctor\AppointmentComponent\DoctorAppointmentAddFormComponent;
use App\Http\Livewire\Doctor\AppointmentComponent\DoctorAppointmentEditFormComponent;
use App\Http\Livewire\DoctorComponent\DoctorViewComponent;
use App\Http\Livewire\DocumentComponent\DocumentAddFormComponent;
use App\Http\Livewire\DocumentComponent\DocumentEditFormComponent;
use App\Http\Livewire\DocumentComponent\DocumentViewComponent;
use App\Http\Livewire\HistoryComponent\HistoryAddFormComponent;
use App\Http\Livewire\HistoryComponent\HistoryEditFormComponent;
use App\Http\Livewire\HistoryComponent\HistoryViewComponent;
use App\Http\Livewire\Patient\AppointmentComponent\PatientAppointmentAddFormComponent;
use App\Http\Livewire\Patient\AppointmentComponent\PatientAppointmentViewComponent;
use App\Http\Livewire\PatientComponent\PatientViewComponent;
use App\Http\Livewire\PaymentComponent\PaymentAddFormComponent;
use App\Http\Livewire\PaymentComponent\PaymentViewComponent;
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
        Route::get('/patient/appointments/add', PatientAppointmentAddFormComponent::class)->name('patient.appointments.add');
        Route::get('/patient/appointments', PatientAppointmentViewComponent::class)->name('patient.appointments.view');
    });

    Route::middleware('role:receptionist')->group( function() {
        Route::get('/receptionist/appointments/add', ReceptionistAppointmentAddFormComponent::class)->name('receptionist.appointments.add');
    });

    Route::middleware('role:doctor')->group( function() {
        Route::get('/doctor/appointments/add', DoctorAppointmentAddFormComponent::class)->name('doctor.appointments.add');
    });

    Route::middleware('role:receptionist|doctor|admin')->group( function() {
        //APPOINTMENTS
        Route::get('/appointments', AppointmentViewComponent::class)->name('appointments.view');
        Route::get('/appointments/edit/{appointment}', AppointmentEditFormComponent::class)->name('appointments.edit');
        Route::get('/appointments/restore/{appointment_id}', [AppointmentViewComponent::class, 'restore'])->name('appointments.restore');

        //PRESCRIPTIONS
        Route::get('/prescriptions', PrescriptionViewComponent::class)->name('prescriptions.view');

        //CATEGORIES
        Route::get('/categories/add', CategoryAddFormComponent::class)->name('categories.add');
        Route::get('/categories', CategoryViewComponent::class)->name('categories.view');
        Route::get('/categories/edit/{category}', CategoryEditFormComponent::class)->name('categories.edit');
        Route::get('/categories/restore/{category_id}', [CategoryViewComponent::class, 'restore'])->name('categories.restore');

        //TREATMENTS
        Route::get('/treatments/add', TreatmentAddFormComponent::class)->name('treatments.add');
        Route::get('/treatments', TreatmentViewComponent::class)->name('treatments.view');
        Route::get('/treatments/edit/{treatment}', TreatmentEditFormComponent::class)->name('treatments.edit');
        Route::get('/treatments/restore/{treatment_id}', [TreatmentViewComponent::class, 'restore'])->name('treatments.restore');

        //STOCKS
        Route::get('/stocks/add', StockAddFormComponent::class)->name('stocks.add');
        Route::get('/stocks', StockViewComponent::class)->name('stocks.view');
        Route::get('/stocks/edit/{stock}', StockEditFormComponent::class)->name('stocks.edit');
        Route::get('/stocks/restore/{stock_id}', [StockViewComponent::class, 'restore'])->name('stocks.restore');

        //PAYMENTS
        Route::get('/payments/add', PaymentAddFormComponent::class)->name('payments.add');
        Route::get('/payments', PaymentViewComponent::class)->name('payments.view');

        //PATIENTS
        Route::get('/patients', PatientViewComponent::class)->name('patients.view');

        //CASES
        Route::get('/case-histories/add', HistoryAddFormComponent::class)->name('histories.add');
        Route::get('/case-histories', HistoryViewComponent::class)->name('histories.view');
        Route::get('/case-histories/edit/{history}', HistoryEditFormComponent::class)->name('histories.edit');
        Route::get('/case-histories/restore/{history_id}', [HistoryViewComponent::class, 'restore'])->name('histories.restore');

        //DOCUMENTS
        Route::get('/documents/add', DocumentAddFormComponent::class)->name('documents.add');
        Route::get('/documents', DocumentViewComponent::class)->name('documents.view');
        Route::get('/documents/edit/{document}', DocumentEditFormComponent::class)->name('documents.edit');
        Route::get('/documents/restore/{document_id}', [DocumentViewComponent::class, 'restore'])->name('documents.restore');

        //DOCTORS
        Route::get('/doctors', DoctorViewComponent::class)->name('doctors.view');
        
    });

    Route::middleware('role:doctor|admin')->group( function() {
        //PRESCRIPTIONS
        Route::get('/prescriptions/add', PrescriptionAddFormComponent::class)->name('prescriptions.add');
        Route::get('/prescriptions/edit/{prescription}', PrescriptionEditFormComponent::class)->name('prescriptions.edit');
        Route::get('/prescriptions/restore/{prescription_id}', [PrescriptionViewComponent::class, 'restore'])->name('prescriptions.restore');
    });
});