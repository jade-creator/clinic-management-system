<?php

namespace App\Http\Livewire\HistoryComponent;

use App\Models\History;
use Livewire\Component;

class HistoryViewComponent extends Component
{
    public function render() { return 
        view('livewire.history-component.history-view-component', [
            'histories' => $this->rows
        ]);
    }

    public function getRowsProperty() { return
        History::with('patient', 'patient.user')->latest()->get();
    }
}
