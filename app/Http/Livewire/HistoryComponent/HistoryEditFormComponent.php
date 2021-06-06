<?php

namespace App\Http\Livewire\HistoryComponent;

use App\Models\History;
use App\Models\Patient;
use Carbon\Carbon;
use Livewire\Component;
class HistoryEditFormComponent extends Component
{
    public History $history;
    public $patient_name;

    public function render() { return 
        view('livewire.history-component.history-edit-form-component');
    }

    public function mount()
    {
        $this->fill([ 'patient_name' => $this->history->patient_id ]); 
    }

    public function rules() {
        return [
            'history.date' => ['required', 'date'],
            'history.description' => ['required', 'string'],
            'history.note' => ['required', 'string'],
            'history.patient_id' => ['required', 'integer'],
        ];
    }

    public function update()
    {
        $this->validate();
        $this->history->update();

        session()->flash('message', 'History updated successfully.');
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
