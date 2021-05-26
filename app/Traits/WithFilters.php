<?php

namespace App\Traits;

trait WithFilters
{
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }
}