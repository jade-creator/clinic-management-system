<?php

namespace App\Http\Livewire\DocumentComponent;

use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class DocumentViewComponent extends Component
{
    public function render() { return 
        view('livewire.document-component.document-view-component', [
            'documents' => $this->rows
        ]);
    }

    public function getRowsProperty() { return
        Document::with('patient.user')->latest()->get();
    }

    public function download($path, $fileName) 
    {
        return response()->download(storage_path('app/documents/' . $path . '/' . $fileName));
    }
}
