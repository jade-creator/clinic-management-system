<?php

namespace App\Http\Livewire\TreatmentComponent;

use App\Models\Category;
use App\Models\Treatment;
use Livewire\Component;

class TreatmentEditFormComponent extends Component
{
    public Treatment $treatment;

    public function render() { return 
        view('livewire.treatment-component.treatment-edit-form-component');
    }

    public function rules()
    {
        return [
            'treatment.name' => ['required', 'string', 'max:255'],
            'treatment.description' => ['required', 'string'],
            'treatment.purchase_price' => ['required', 'integer'],
            'treatment.selling_price' => ['required', 'integer'],
            'treatment.category_id' => ['required', 'integer']
        ];
    }

    public function getCategoriesProperty() { return
        Category::get(['id', 'name']);
    }

    public function create()
    {
        $this->validate();
       
        try {
            $this->treatment->update();
            session()->flash('message', 'Treatment updated successfully.');
        } catch (\Exception $e) {
            session()->flash('message', 'Updating treatment failed.');
        }

        return redirect(route('treatments.view'));
    }
}
