<?php

namespace App\Http\Livewire\CategoryComponent;

use App\Models\Category;
use Livewire\Component;

class CategoryEditFormComponent extends Component
{
    public Category $category;

    public function render() { return 
        view('livewire.category-component.category-edit-form-component');
    }

    public function rules()
    {
        return [
            'category.name' => ['required', 'string', 'max:255'],
            'category.description' => ['required', 'string']
        ];
    }

    public function update()
    {
        $this->validate();
     
        try {
            $this->category->update();
            session()->flash('message', 'Category updated successfully.');
        } catch (\Exception $e) {
            session()->flash('message', 'Updating category failed.');
        }

        return redirect(route('categories.view'));
    }
}