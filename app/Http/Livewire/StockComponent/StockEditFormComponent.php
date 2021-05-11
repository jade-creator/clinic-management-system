<?php

namespace App\Http\Livewire\StockComponent;

use App\Models\Stock;
use App\Models\Treatment;
use Livewire\Component;

class StockEditFormComponent extends Component
{
    public $stockId;
    public $treatmentId;
    public $treatmentName;
    public $quantity;

    public function render() { return 
        view('livewire.stock-component.stock-edit-form-component', [
            'treatments' => $this->rows
        ]);
    }

    public function rules()
    {
        return [
            'quantity' => ['required', 'integer'],
            'treatmentId' => ['required', 'integer']
        ];
    }

    public function mount(Stock $stock)
    {
        $this->fill([
            $this->stockId = $stock->id,
            $this->treatmentId = $stock->treatment->id,
            $this->treatmentName = $stock->treatment->id,
            $this->quantity = $stock->quantity,
        ]);
    }

    public function update()
    {
        $this->validate();
        Stock::where('id', $this->stockId)->update([
            'quantity' => $this->quantity,
            'treatment_id' => $this->treatmentId
        ]);
    }

    public function getRowsProperty() { return
        Treatment::get(['id', 'name']);
    }
}
