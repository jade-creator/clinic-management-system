<?php

namespace App\Http\Livewire\DocumentComponent;

use App\Models\Document;
use App\Models\Patient;
use Livewire\Component;
use Livewire\WithFileUploads;

class DocumentAddFormComponent extends Component
{
    use WithFileUploads;

    public Document $document;
    public $patient_name = '';
    public $document_file;

    public function render() { return 
        view('livewire.document-component.document-add-form-component');
    }

    public function mount() {
        $this->document = new Document();
    }

    public function rules() {
        return [
            'document.date' => ['required', 'date'],
            'document.description' => ['required', 'string'],
            'document.patient_id' => ['required', 'integer'],
            'document_file' => ['required', 'max:1024', 'mimes:jpg,png,pdf,docx,csv,txt']
        ];
    }

    public function create()
    {
        $this->validate();  

        try {
            $document = Document::create([
                'date' => $this->document->date,
                'description' => $this->document->description,
                'patient_id' => $this->document->patient_id
            ]);
    
            if ($this->document_file) {
                $document_file = $this->document_file->getClientOriginalName();
                $this->document_file->storeAs('documents', $document->patient_id . '/' . $document_file);
                $document->update([ 'name' => $document_file ]);
            }
    
            session()->flash('message', 'Document created successfully.');
        } catch (\Exception $e) {
            session()->flash('danger', 'Creating document failed.');
        }

        return redirect(route('documents.view'));
    }

    public function updatedDocumentPatientId($value)
    {
        $this->patient_name = $value;
    }

    public function updatedDocumentFile() 
    { 
        $this->dispatchBrowserEvent('swal:modal', [ 
            'type' => 'success',
            'title' => 'File Uploaded',
            'text' => '',
        ]);
    }

    public function updatedPatientName($value)
    {
        $this->document->patient_id = $value;
    }

    public function getPatientsProperty() { return
        Patient::with('user:id,name')->get(['id', 'user_id']);
    }
}