<?php

namespace App\Http\Livewire\Patient\DashboardComponent;

use App\Models\Appointment;
use App\Models\History;
use App\Models\Payment;
use App\Models\Prescription;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PatientDashboardComponent extends Component
{
    public function render() { return 
        view('livewire.patient.dashboard-component.patient-dashboard-component');
    }

    public function getTotalBillAmountProperty() { return
        Payment::where('patient_id', Auth::user()->patient->id)
            ->sum('grand_total');
    }

    public function getUpcomingAppointmentProperty() { return
        Appointment::where([
            ['patient_id', Auth::user()->patient->id],
            ['scheduled_at', '>', now()]
        ])
        ->get(['id']);
    }

    public function getPrescriptionsProperty() { return
        Prescription::where('patient_id', Auth::user()->patient->id)
            ->get(['id']);
    }

    public function getCaseHistoriesProperty() { return
        History::where('patient_id', Auth::user()->patient->id)
            ->get(['id']);
    }
}
