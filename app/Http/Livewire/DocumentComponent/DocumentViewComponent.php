<?php

namespace App\Http\Livewire\DocumentComponent;

use App\Models\Document;
use App\Traits\WithFilters;
use Livewire\Component;
use Livewire\WithPagination;

class DocumentViewComponent extends Component
{
    use WithPagination, WithFilters;

    protected $listeners = ['download'];

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
                ->select(['id', 'date', 'description', 'name', 'patient_id', 'updated_at'])
                ->with([
                    'patient:id,user_id',
                    'patient.user:id,name'
                ])
                ->when(!empty($this->search), function($query) {
                    return $query->orWhereHas('patient.user', function($query) {
                        return $query->where('name', 'LIKE', '%'.$this->search.'%');
                    });
                })
                ->latest();
    }

    public function restore(int $document_id)
    {
        $document = Document::withTrashed()->find($document_id);

        if ($document && $document->trashed()) {
            $document->restore();
        } else {
            abort(403);
        }

        session()->flash('message', 'Document restored successfully');
        return redirect(route('documents.view'));
    }

    public function destroy(Document $document)
    {
        $document->delete();

        session()->flash('message', 'Document deleted successfully. <a href="'.route('documents.restore', $document->id).'">Ooops! Undo</a>');
        return redirect(route('documents.view'));
    }

    public function downloadFileConfirm($path, $fileName) 
    {
        $this->dispatchBrowserEvent('swal:download', [ 
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => 'Please confirm to download the file',
            'path' => $path,
            'fileName' => $fileName,
        ]);
    }

    public function download($path, $fileName) 
    {
        try {
            return response()->download(storage_path('app/documents/' . $path . '/' . $fileName));
        } catch (\Exception $e) {
            session()->flash('danger', 'Downloading document failed');
            return redirect(route('documents.view'));
        }
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}
