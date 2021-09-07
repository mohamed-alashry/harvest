<?php

namespace App\Http\Livewire\PlacementTest;

use App\Models\Branch;
use App\Models\Lead;
use App\Models\PlacementApplicant;
use Livewire\Component;

class Applicant extends Component
{
    public $name, $email, $mobile, $branch_id, $gender, $job, $university, $branches;

    public function mount()
    {
        $this->branches = Branch::pluck('name', 'id')->toArray();
    }

    protected function rules()
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'branch_id' => 'required',
            'gender' => 'required',
            'job' => 'nullable',
            'university' => 'nullable',
        ];

        return $rules;
    }
    protected $messages = [
        'required' => 'يجب قبول هذا الحقل.',
        'email' => 'يجب أن يكون عنوان بريد إلكتروني صحيح.',

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $data = $this->validate();

        $applicant = PlacementApplicant::create($data);

        Lead::firstOrCreate([
            'mobile_1' => $data['mobile']
        ], [
            'name' => ['en' => $data['name'], 'ar' => $data['name']],
            'gender' => $data['gender'],
            'mobile_1' => $data['mobile'],
            'email' => $data['email'],
            'lead_source_id' => 1,
            'branch_id' => $data['branch_id'],
        ]);

        $this->emitUp('registered', $applicant->id);
    }

    public function render()
    {
        return view('livewire.placement-test.applicant');
    }
}
