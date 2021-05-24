<?php

namespace App\Http\Livewire\HistoryComponent;

use App\Models\History;
use App\Traits\WithFilters;
use Livewire\Component;

class HistoryViewComponent extends Component
{
    use WithFilters;

    public $queryString = [
        'search' => ['except' => '']
    ];

    public $updatesQueryString = [
        'search'
    ];  

    public function render() { return 
        view('livewire.history-component.history-view-component', [
            'histories' => $this->rows
        ]);
    }

    public function getRowsProperty() { return
        History::search($this->search)
            ->with('patient', 'patient.user')
            ->latest()
            ->get();
    }
}
