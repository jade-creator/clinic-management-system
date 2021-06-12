<?php

namespace App\Http\Livewire\CategoryComponent;

use App\Models\Category;
use App\Traits\WithFilters;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryViewComponent extends Component
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
        view('livewire.category-component.category-view-component', [
            'categories' => $this->rows
        ]);
    }

    public function getRowsProperty() { return 
        $this->rowsQuery->paginate($this->paginateValue);
    }

    public function getRowsQueryProperty()
    {
        return Category::search($this->search)
                ->select(['id', 'name', 'description', 'updated_at'])
                ->with('treatments:id,category_id')
                ->latest();
    }

    public function restore(int $category_id)
    {
        $category = Category::withTrashed()->find($category_id);

        if ($category && $category->trashed()) {
            $category->restore();
        } else {
            abort(404);
        }

        session()->flash('message', 'Category restored successfully.');
        return redirect(route('categories.view'));
    }

    public function destroy(Category $category)
    {
        if ($category->treatments->count()) {
            session()->flash('danger', 'Cannot delete: this category has treatments');
            return redirect(route('categories.view'));
        }

        $category->delete();

        session()->flash('message', 'Category deleted successfully. <a href="'.route('categories.restore', $category->id).'">Ooops! Undo</a>');
        return redirect(route('categories.view'));
    }

    public function updatedPaginateValue() { $this->resetPage(); }
}
