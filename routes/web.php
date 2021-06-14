<?php

use App\Http\Livewire\AppointmentComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\DashboardComponent;
use App\Http\Livewire\DepositComponent;
use App\Http\Livewire\Doctor;
use App\Http\Livewire\DoctorComponent\DoctorViewComponent;
use App\Http\Livewire\DocumentComponent;
use App\Http\Livewire\HistoryComponent;
use App\Http\Livewire\Patient;
use App\Http\Livewire\PatientComponent\PatientViewComponent;
use App\Http\Livewire\PaymentComponent;
use App\Http\Livewire\PrescriptionComponent;
use App\Http\Livewire\ProfileComponent;
use App\Http\Livewire\ReceptionistComponent\ReceptionistViewComponent;
use App\Http\Livewire\StockComponent;
use App\Http\Livewire\TreatmentComponent;
use App\Http\Livewire\UserComponent\UserViewComponent;
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
    Route::get('/profile', ProfileComponent\ProfileAddFormComponent::class)->name('profile.add');
    Route::get('/profile/{role}/{user_id}', ProfileComponent\ProfileEditFormComponent::class)->name('profile.view');

    //ADMIN, DOCTOR.
    Route::middleware('role:admin|doctor|receptionist')->group( function() {
        //DASHBOARD
        Route::get('/dashboard', DashboardComponent::class)->name('dashboard.view');

        //APPOINTMENTS
        Route::get('/appointments', AppointmentComponent\AppointmentViewComponent::class)->name('appointments.view');
        Route::get('/appointments/edit/{appointment}', AppointmentComponent\AppointmentEditFormComponent::class)->name('appointments.edit');
        Route::get('/appointments/restore/{appointment_id}', [AppointmentComponent\AppointmentViewComponent::class, 'restore'])->name('appointments.restore');

        //PRESCRIPTIONS
        Route::get('/prescriptions', PrescriptionComponent\PrescriptionViewComponent::class)->name('prescriptions.view');

        //CATEGORIES
        Route::get('/categories/add', CategoryComponent\CategoryAddFormComponent::class)->name('categories.add');
        Route::get('/categories', CategoryComponent\CategoryViewComponent::class)->name('categories.view');
        Route::get('/categories/edit/{category}', CategoryComponent\CategoryEditFormComponent::class)->name('categories.edit');
        Route::get('/categories/restore/{category_id}', [CategoryComponent\CategoryViewComponent::class, 'restore'])->name('categories.restore');

        //TREATMENTS
        Route::get('/treatments/add', TreatmentComponent\TreatmentAddFormComponent::class)->name('treatments.add');
        Route::get('/treatments', TreatmentComponent\TreatmentViewComponent::class)->name('treatments.view');
        Route::get('/treatments/edit/{treatment}', TreatmentComponent\TreatmentEditFormComponent::class)->name('treatments.edit');
        Route::get('/treatments/restore/{treatment_id}', [TreatmentComponent\TreatmentViewComponent::class, 'restore'])->name('treatments.restore');

        //STOCKS
        Route::get('/stocks/add', StockComponent\StockAddFormComponent::class)->name('stocks.add');
        Route::get('/stocks', StockComponent\StockViewComponent::class)->name('stocks.view');
        Route::get('/stocks/edit/{stock}', StockComponent\StockEditFormComponent::class)->name('stocks.edit');
        Route::get('/stocks/restore/{stock_id}', [StockComponent\StockViewComponent::class, 'restore'])->name('stocks.restore');

        //DEPOSITS
        Route::get('/deposits/add', DepositComponent\DepositAddFormComponent::class)->name('deposits.add');

        //PAYMENTS
        Route::get('/payments/add', PaymentComponent\PaymentAddFormComponent::class)->name('payments.add');
        Route::get('/payments', PaymentComponent\PaymentViewComponent::class)->name('payments.view');
        Route::get('/payments/{paymentId}/deposit/add', PaymentComponent\PaymentAddDepositFormComponent::class)->name('payments.deposit.add');

        //CASES
        Route::get('/case-histories/add', HistoryComponent\HistoryAddFormComponent::class)->name('histories.add');
        Route::get('/case-histories', HistoryComponent\HistoryViewComponent::class)->name('histories.view');
        Route::get('/case-histories/edit/{history}', HistoryComponent\HistoryEditFormComponent::class)->name('histories.edit');
        Route::get('/case-histories/restore/{history_id}', [HistoryComponent\HistoryViewComponent::class, 'restore'])->name('histories.restore');

        //DOCUMENTS
        Route::get('/documents/add', DocumentComponent\DocumentAddFormComponent::class)->name('documents.add');
        Route::get('/documents', DocumentComponent\DocumentViewComponent::class)->name('documents.view');
        Route::get('/documents/edit/{document}', DocumentComponent\DocumentEditFormComponent::class)->name('documents.edit');
        Route::get('/documents/restore/{document_id}', [DocumentComponent\DocumentViewComponent::class, 'restore'])->name('documents.restore');

        //DOCTORS
        Route::get('/doctors', DoctorViewComponent::class)->name('doctors.view');

        //RECEPTIONISTS
        Route::get('/receptionists', ReceptionistViewComponent::class)->name('receptionists.view');

        //PATIENTS
        Route::get('/patients', PatientViewComponent::class)->name('patients.view');

        //USERS
        Route::get('/users', UserViewComponent::class)->name('users.view');
    });

    //ADMIN
    Route::get('/prescriptions/add', PrescriptionComponent\PrescriptionAddFormComponent::class)->middleware('role:admin')->name('prescriptions.add');

    //ADMIN, DOCTOR
    Route::middleware('role:admin|doctor')->group( function() {
        //PRESCRIPTIONS
        Route::get('/prescriptions/edit/{prescription}', PrescriptionComponent\PrescriptionEditFormComponent::class)->name('prescriptions.edit');
        Route::get('/prescriptions/restore/{prescription_id}', [PrescriptionComponent\PrescriptionViewComponent::class, 'restore'])->name('prescriptions.restore');
    });

    //ADMIN, RECEPTIONIST
    Route::get('/appointments/add', AppointmentComponent\AppointmentAddFormComponent::class)->middleware('role:admin|receptionist')->name('appointments.add');

    //DOCTOR
    Route::middleware('role:doctor')->group( function() {
        //DOCUMENTS
        Route::get('/doctor/appointments/add', Doctor\AppointmentComponent\DoctorAppointmentAddFormComponent::class)->name('doctor.appointments.add');

        //PRESCRIPTIONS
        Route::get('/doctor/prescriptions/add', Doctor\PrescriptionComponent\DoctorPrescriptionAddFormComponent::class)->name('doctor.prescriptions.add');
    });

    //PATIENT
    Route::middleware('role:patient')->group( function() {
        //APPOINTMENTS
        Route::get('/patient/appointments/add', Patient\AppointmentComponent\PatientAppointmentAddFormComponent::class)->name('patient.appointments.add');
        Route::get('/patient/appointments', Patient\AppointmentComponent\PatientAppointmentViewComponent::class)->name('patient.appointments.view');
        Route::get('/patient/appointments/edit/{appointment}', Patient\AppointmentComponent\PatientAppointmentEditFormComponent::class)->name('patient.appointments.edit');

        //CASE-HISTORIES
        Route::get('/patient/case-histories', Patient\HistoryComponent\PatientHistoryViewComponent::class)->name('patient.histories.view');

        //PRESCRIPTIONS
        Route::get('/patient/prescriptions', Patient\PrescriptionComponent\PatientPrescriptionViewComponent::class)->name('patient.prescriptions.view');

        //PAYMENTS
        Route::get('/patient/payments', Patient\PaymentComponent\PatientPaymentViewComponent::class)->name('patient.payments.view');
        Route::get('/patient/payments/pdf', [Patient\PaymentComponent\PaymentPdfComponent::class, 'show'])->name('patient.payment.pdf');

        //DASHBOARD
        Route::get('/patient/dashboard', Patient\DashboardComponent\PatientDashboardComponent::class)->name('patient.dashboard.view');
    });
});