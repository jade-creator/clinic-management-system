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
        $this->document_file = $this->document->name ? $this->document->name : 'file attached';
    }

    public function rules() {
        return [
            'document.date' => ['required', 'date'],
            'document.patient_id' => ['required', 'integer'],
            'document.description' => ['required', 'string']
        ];
    }

    public function update() 
    {
        $this->validate();
        $this->document->update();

        session()->flash('message', 'Document updated successfully.');
        return redirect(route('documents.view'));
    }

    public function getPatientsProperty() { return
        Patient::with('user:id,name')->get(['id', 'user_id']);
    }
}
