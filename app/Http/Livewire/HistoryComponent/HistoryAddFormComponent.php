<?php

namespace App\Http\Livewire\HistoryComponent;

use App\Models\History;
use App\Models\Patient;
use Livewire\Component;

class HistoryAddFormComponent extends Component
{
    public History $history;
    public $patient_name;

    public function render() { return 
        view('livewire.history-component.history-add-form-component');
    }

    public function mount() {
        $this->history = new History();
    }

    public function rules() {
        return [
            'history.date' => ['required', 'date'],
            'history.description' => ['required', 'string'],
            'history.note' => ['required', 'string'],
            'history.patient_id' => ['required', 'integer'],
        ];
    }

    public function create()    
    {
        $this->validate();
        
        try {
            $this->history->save();
            session()->flash('message', 'History created successfully.');
        } catch (\Exception $e) {
            session()->flash('danger', 'Creating history failed.');
        }
        return redirect(route('histories.view'));
    }

    public function updatedHistoryPatientId($value)
    {
        $this->patient_name = $value;
    }

    public function updatedPatientName($value)
    {
        $this->history->patient_id = $value;
    }

    public function getPatientsProperty() { return
        Patient::with('user:id,name')->get(['id','user_id']);
    }
}
