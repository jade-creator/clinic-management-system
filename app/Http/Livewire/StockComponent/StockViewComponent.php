<?php

namespace App\Http\Livewire\StockComponent;

use App\Models\Stock;
use App\Traits\WithFilters;
use Livewire\Component;
use Livewire\WithPagination;

class StockViewComponent extends Component
{
    use WithPagination, WithFilters;

    protected $paginationTheme = 'bootstrap';
    public $paginateValue = 10;

    public $queryString = [
        'search' => ['except' => '']
    ];

    public $updatesQueryString = [
        'search'
    ];  

    public function render() { return 
        view('livewire.stock-component.stock-view-component', [
            'stocks' => $this->rows
        ]);
    }

    public function getRowsProperty() { return 
        $this->rowsQuery->paginate($this->paginateValue);
    }

    public function getRowsQueryProperty()
    {
        return Stock::search($this->search)
                    ->select(['id', 'quantity', 'updated_at', 'treatment_id'])
                    ->with('treatment:id,name')
                    ->when(!empty($this->search), function($query) {
                        return $query->orWhereHas('treatment', function($query) {
                                return $query->where('name', 'LIKE', '%'.$this->search.'%');
                        });
                    })
                    ->latest();
    }

    public function restore(int $stock_id)
    {
        $stock = Stock::withTrashed()->find($stock_id);

        if ($stock && $stock->trashed()) {
            $stock->restore();
        } else {
            abort(404);
        }

        session()->flash('message', 'Stock restored successfully.');
        return redirect(route('stocks.view'));
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();

        session()->flash('message', 'Stock deleted successfully. <a href="'.route('stocks.restore', $stock->id).'">Ooops! Undo</a>');
        return redirect(route('stocks.view'));
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}
