<?php

namespace App\Http\Livewire\DocumentComponent;

use App\Models\Document;
use App\Traits\WithFilters;
use Livewire\Component;
use Livewire\WithPagination;

class DocumentViewComponent extends Component
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
        view('livewire.document-component.document-view-component', [
            'documents' => $this->rows
        ]);
    }

    public function getRowsProperty() { return 
        $this->rowsQuery->paginate($this->paginateValue);
    }

    public function getRowsQueryProperty()
    {
        return Document::search($this->search)
                ->orWhereHas('patient.user', function($query) {
                    return $query->where('name', 'LIKE', '%'.$this->search.'%');
                })
                ->latest();
    }

    public function download($path, $fileName) 
    {
        return response()->download(storage_path('app/documents/' . $path . '/' . $fileName));
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}
