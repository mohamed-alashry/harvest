<?php

namespace App\Http\Livewire\PlacementTest;

use App\Models\PlacementAnswer;
use App\Models\PlacementQuestion;
use Livewire\Component;

class Grammar extends Component
{
    public $applicant, $questions, $answers;

    private $limit = 20, $point = 0.5;

    public function mount($applicant)
    {
        $this->applicant = $applicant;

        $questions = PlacementQuestion::where('skill', 'Grammar')->with('answers')->limit($this->limit)->inRandomOrder()->get();
        $this->questions = $questions;
    }

    protected function rules()
    {
        return [
            'answers' => 'array|size:' . $this->limit
        ];
    }

    protected $messages = [
        'size' => 'يجب إجابة كل الاسئلة',
    ];

    public function save()
    {
        $this->validate();

        $correctCount = PlacementAnswer::whereIn('id', array_values($this->answers))->sum('is_correct', 1);

        $score = $correctCount * $this->point;

        $this->applicant->update(['grammar_score' => $score]);

        $this->emitUp('next');
    }

    public function render()
    {
        return view('livewire.placement-test.grammar');
    }
}
