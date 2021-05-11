<?php

namespace App\Http\Livewire\TreatmentComponent;

use App\Models\Treatment;
use Livewire\Component;

class TreatmentViewComponent extends Component
{
    public function render() { return 
        view('livewire.treatment-component.treatment-view-component', [
            'treatments' => $this->rows
        ]);
    }

    public function getRowsProperty() { return
        Treatment::with('category')->get();
    }
}
