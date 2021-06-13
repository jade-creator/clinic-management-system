<?php

namespace App\Http\Livewire\TreatmentComponent;

use App\Models\Treatment;
use App\Traits\WithFilters;
use Livewire\Component;
use Livewire\WithPagination;

class TreatmentViewComponent extends Component
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
        view('livewire.treatment-component.treatment-view-component', [
            'treatments' => $this->rows
        ]);
    }
    
    public function getRowsProperty() { return 
        $this->rowsQuery->paginate($this->paginateValue);
    }

    public function getRowsQueryProperty()
    {
        return Treatment::search($this->search)
                ->select(['id', 'name', 'description', 'purchase_price', 'selling_price', 'updated_at', 'category_id'])
                ->with(['category:id,name', 'stock:id,treatment_id'])
                ->when(!empty($this->search), function($query) {
                    return $query->orWhereHas('category', function($query) {
                            return $query->where('name', 'LIKE', '%'.$this->search.'%');
                    });
                })
                ->latest();
    }

    public function restore(int $treatment_id)
    {
        $treatment = Treatment::withTrashed()->find($treatment_id);

        if ($treatment && $treatment->trashed()) {
            $treatment->restore();
        } else {
            abort(403);
        }

        session()->flash('message', 'Treatment restored successfully.');
        return redirect(route('treatments.view'));
    }

    public function destroy(Treatment $treatment)
    {
        if ($treatment->stock) {
            session()->flash('danger', 'Cannot delete: this treatment has stock record');
            return redirect(route('treatments.view'));
        }

        $treatment->delete();

        session()->flash('message', 'Treatment deleted successfully. <a href="'.route('treatments.restore', $treatment->id).'">Ooops! Undo</a>');
        return redirect(route('treatments.view'));
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}