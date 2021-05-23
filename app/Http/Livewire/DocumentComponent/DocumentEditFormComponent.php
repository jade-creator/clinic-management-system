<?php

namespace App\Http\Livewire\DocumentComponent;

use App\Models\Document;
use App\Models\Patient;
use Livewire\Component;

class DocumentEditFormComponent extends Component
{
    public Document $document;
    public $patient_name;
    public $document_file;

    public function render() { return 
        view('livewire.document-component.document-edit-form-component');
    }

    public function mount() 
    {
        $this->document_file = $this->document->name ? $this->document->name : 'N/A';
    }

    public function rules() {
        return [
            'document.date' => ['required', 'date'],
            'document.description' => ['required', 'string']
        ];
    }

    public function update() 
    {
        $this->validate();
    }

    public function getPatientsProperty() { return
        Patient::with('user')->get();
    }
}
