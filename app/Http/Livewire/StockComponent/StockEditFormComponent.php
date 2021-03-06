<?php

namespace App\Http\Livewire\StockComponent;

use App\Models\Stock;
use App\Models\Treatment;
use Livewire\Component;

class StockEditFormComponent extends Component
{
    public Stock $stock;
    public $treatment_name;
    
    public function render() { return 
        view('livewire.stock-component.stock-edit-form-component', [
            'treatments' => $this->rows
        ]);
    }

    public function rules()
    {
        return [
            'stock.quantity' => ['required', 'integer'],
            'stock.treatment_id' => ['required', 'integer']
        ];
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function update()
    {
        $this->validate();
        
        try {
            $this->stock->update();
            session()->flash('message', 'Stock updated successfully.');
        } catch (\Exception $e) {
            session()->flash('message', 'Updating stock failed.');
        }

        return redirect(route('stocks.view'));
    }

    public function getRowsProperty() { return
        Treatment::get(['id', 'name']);
    }

    public function updatedStockTreatmentId() { return
        $this->treatment_name = $this->stock->treatment_id;
    }

    public function updatedTreatmentName() { return
        $this->stock->treatment_id = $this->treatment_name;
    }
}