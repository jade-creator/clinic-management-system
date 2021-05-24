<?php

namespace App\Http\Livewire\DocumentComponent;

use App\Models\Document;
use App\Traits\WithFilters;
use Livewire\Component;

class DocumentViewComponent extends Component
{
    use WithFilters;

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
        Document::search($this->search)
            ->with('patient.user')
            ->latest()
            ->get();
    }

    public function download($path, $fileName) 
    {
        return response()->download(storage_path('app/documents/' . $path . '/' . $fileName));
    }
}
