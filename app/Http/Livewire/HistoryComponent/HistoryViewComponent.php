<?php

namespace App\Http\Livewire\HistoryComponent;

use App\Models\History;
use App\Traits\WithFilters;
use Livewire\Component;
use Livewire\WithPagination;

class HistoryViewComponent extends Component
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
        view('livewire.history-component.history-view-component', [
            'histories' => $this->rows
        ]);
    }

    public function getRowsProperty() { return
        $this->rowsQuery->paginate($this->paginateValue);
    }

    public function getRowsQueryProperty()
    {
        return History::search($this->search)
                ->orWhereHas('patient.user', function($query) {
                    return $query->where('name', 'LIKE', '%'.$this->search.'%');
                })
                ->latest();
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}
