<?php

namespace App\Http\Livewire\StockComponent;

use App\Models\Stock;
use App\Models\Treatment;
use Livewire\Component;

class StockAddFormComponent extends Component
{
    public $treatment_id;
    public $treatment_name; 
    public $quantity;

    public function render() { return 
        view('livewire.stock-component.stock-add-form-component', [
            'treatments' => $this->rows
        ]);
    }

    public function rules()
    {
        return [
            'quantity' => ['required', 'integer'],
            'treatment_id' => ['required', 'integer', 'unique:stocks']
        ];
    }

    public function messages()
    {
        return [
            'treatment_id.unique' => 'Treatment is already in stock.',
        ];
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function create()
    {
        $this->validate();
        Stock::create([
            'quantity' => $this->quantity,
            'treatment_id' => $this->treatment_id
        ]);
    }

    public function getRowsProperty() { return
        Treatment::get(['id', 'name']);
    }

    public function updatedTreatmentId() { return
        $this->treatment_name = $this->treatment_id;
    }

    public function updatedTreatmentName() { return
        $this->treatment_id = $this->treatment_name;
    }
}
