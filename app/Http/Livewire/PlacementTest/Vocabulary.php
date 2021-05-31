<?php

namespace App\Http\Livewire\PlacementTest;

use App\Models\PlacementAnswer;
use App\Models\PlacementQuestion;
use Livewire\Component;

class Vocabulary extends Component
{
    public $applicant, $questions, $answers;

    private $limit = 1, $point = 2;

    public function mount($applicant)
    {
        $this->applicant = $applicant;

        $questions = PlacementQuestion::where('skill', 'Vocabulary')->with('answers')->limit($this->limit)->inRandomOrder()->get();
        $this->questions = $questions;
    }

    protected function rules()
    {
        return [
            'answers' => 'array|size:' . $this->limit
        ];
    }

    protected $messages = [
        'answers.array' => 'You Must Answer All Questions',
        'answers.size' => 'You Must Answer All Questions',
    ];

    public function save()
    {
        $this->validate();

        $correctCount = PlacementAnswer::whereIn('id', array_values($this->answers))->sum('is_correct', 1);

        $score = $correctCount * $this->point;

        $this->applicant->update(['vocabulary_score' => $score]);

        $this->emitUp('next');
    }

    public function render()
    {
        return view('livewire.placement-test.vocabulary');
    }
}
