<?php

namespace App\Http\Livewire\StockComponent;

use App\Models\Stock;
use Livewire\Component;

class StockViewComponent extends Component
{
    public function render() { return 
        view('livewire.stock-component.stock-view-component', [
            'stocks' => $this->rows
        ]);
    }

    public function getRowsProperty() { return
        Stock::with('treatment')->latest()->get();
    }
}
