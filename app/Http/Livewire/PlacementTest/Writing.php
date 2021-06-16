<?php

namespace App\Http\Livewire\PlacementTest;

use App\Models\ApplicantAnswer;
use App\Models\PlacementAnswer;
use App\Models\PlacementQuestion;
use Livewire\Component;

class Writing extends Component
{
    public $applicant, $questions, $answers;

    private $limit = 2;

    public function mount($applicant)
    {
        $this->applicant = $applicant;

        $questions = PlacementQuestion::where('skill', 'Writing')->whereNull('parent_id')
            ->with('children')
            ->limit($this->limit)->inRandomOrder()->get();
        $this->questions = $questions;
    }

    protected function rules()
    {
        return [
            'answers' => 'array|size:' . $this->limit,
            'answers.*' => 'string|min:50'
        ];
    }

    protected $messages = [
        'array' => 'يجب إجابة كل الاسئلة',
        'size' => 'يجب إجابة كل الاسئلة',
        'answers.*.min' => 'الاجابة يجب ان تكون اكثر من ٥٠ حرف',
    ];

    public function save()
    {
        $this->validate();

        foreach ($this->answers as $key => $value) {
            ApplicantAnswer::create([
                'placement_applicant_id' => $this->applicant->id,
                'placement_question_id' => $key,
                'type' => 'text',
                'answer' => $value
            ]);
        }


        $this->emitUp('next');
    }

    public function render()
    {
        return view('livewire.placement-test.writing');
    }
}
