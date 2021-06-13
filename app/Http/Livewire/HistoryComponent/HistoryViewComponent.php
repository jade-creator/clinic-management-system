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
                ->select(['id', 'date', 'description', 'note', 'updated_at', 'patient_id'])
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

    public function restore(int $history_id)
    {
        $history = History::withTrashed()->find($history_id);

        if ($history && $history->trashed()) {
            $history->restore();
        } else {
            abort(403);
        }

        session()->flash('message', 'History restored successfully.');
        return redirect(route('histories.view'));
    }

    public function destroy(History $history)
    {
        $history->delete();

        session()->flash('message', 'History deleted successfully. <a href="'.route('histories.restore', $history->id).'">Ooops! Undo</a>');
        return redirect(route('histories.view'));
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}
