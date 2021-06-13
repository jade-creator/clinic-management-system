<?php

namespace App\Http\Livewire\CategoryComponent;

use App\Models\Category;
use Livewire\Component;

class CategoryAddFormComponent extends Component
{
    public Category $category;

    public function render() { return 
        view('livewire.category-component.category-add-form-component');
    }
    
    public function mount() 
    { 
        $this->category = new Category();
    }

    public function rules() 
    {
        return [
            'category.name' => ['required', 'string', 'max:255'],
            'category.description' => ['required', 'string']
        ];
    }

    public function create()
    {
        $this->validate();

        try {
            $this->category->save();
            session()->flash('message', 'Category created successfully.');
        } catch (\Exception $e) {
            session()->flash('danger', 'Creating category failed.');
        }

        return redirect(route('categories.view'));
    }
}