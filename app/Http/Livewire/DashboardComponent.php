<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\Document;
use App\Models\History;
use App\Models\Payment;
use App\Models\Prescription;
use App\Models\Stock;
use App\Models\Treatment;
use App\Models\User;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Livewire\Component;

class DashboardComponent extends Component
{
    public function render() { 
        $chart_options = [
            'chart_title' => 'Sales by months',
            'chart_type' => 'bar',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Payment',

            'group_by_field' => 'created_at',
            'group_by_period' => 'month',

            'aggregate_function' => 'sum',
            'aggregate_field' => 'grand_total',

            'group_by_field_format' => 'Y-m-d g:ia'
        ];

        $barChart = new LaravelChart($chart_options);

        return view('livewire.dashboard-component', [
            'barChart' => $barChart
        ]);
    }

    public function getTotalAppointmentsProperty() { return
        Appointment::get(['id', 'scheduled_at'])
            ->where('scheduled_at', '>', now())
            ->count();
    }

    public function getTotalPrescriptionsProperty() { return
        Prescription::get('id')->count();
    }

    public function getTotalHistoriesProperty() { return
        History::get('id')->count();
    }

    public function getTotalDocumentsProperty() { return
        Document::get('id')->count();
    }

    public function getTotalPaymentsProperty() { return
        Payment::get('id')->count();
    }

    public function getTotalUsersProperty() { return
        User::get('id')->count();
    }

    public function getTotalStocksProperty() { return
        Stock::get(['id','quantity'])->sum('quantity');
    }

    public function getTotalTreatmentsProperty() { return
        Treatment::get('id')->count();
    }
}