<?php

namespace App\Http\Livewire\PlacementTest;

use App\Models\PlacementApplicant;
use Livewire\Component;

class Index extends Component
{
    public $applicant, $type = 1;

    protected $listeners = ['registered', 'next'];

    public function registered($id)
    {
        $this->applicant = PlacementApplicant::find($id);

        $this->next();
    }

    public function next()
    {
        $this->type += 1;
    }

    public function render()
    {
        return view('livewire.placement-test.index')->layout('layouts.placement-base');
    }
}
