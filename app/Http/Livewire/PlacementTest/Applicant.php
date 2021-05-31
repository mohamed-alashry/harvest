<?php

namespace App\Http\Livewire\PlacementTest;

use App\Models\PlacementApplicant;
use Livewire\Component;

class Applicant extends Component
{
    public $name, $email, $mobile, $gender, $job, $university;

    protected function rules()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'gender' => 'required',
            'job' => 'nullable',
            'university' => 'nullable',
        ];

        return $rules;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $data = $this->validate();

        $applicant = PlacementApplicant::create($data);

        $this->emitUp('registered', $applicant->id);
    }

    public function render()
    {
        return view('livewire.placement-test.applicant');
    }
}
