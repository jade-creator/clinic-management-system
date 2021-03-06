<?php

namespace App\Http\Livewire\StockComponent;

use App\Models\Stock;
use App\Models\Treatment;
use Livewire\Component;

class StockAddFormComponent extends Component
{
    public Stock $stock;
    public $treatment_name;

    public function render() { return 
        view('livewire.stock-component.stock-add-form-component', [
            'treatments' => $this->rows
        ]);
    }

    public function rules()
    {
        return [
            'stock.quantity' => ['required', 'integer'],
            'stock.treatment_id' => ['required', 'integer', 'unique:stocks,treatment_id']
        ];
    }

    public function messages()
    {
        return [
            'stock.treatment_id.unique' => 'Treatment is already in stock.',
        ];
    }

    public function mount()
    {
        $this->stock = new Stock();
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function create()
    {
        $this->validate();
        
        try {
            $this->stock->save();
            session()->flash('message', 'Stock created successfully.');
        } catch (\Exception $e) {
            session()->flash('message', 'Creating stock failed.');
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