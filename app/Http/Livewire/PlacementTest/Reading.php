<?php

namespace App\Http\Livewire\PlacementTest;

use App\Models\PlacementAnswer;
use App\Models\PlacementQuestion;
use Livewire\Component;

class Reading extends Component
{
    public $applicant, $paragraphs, $answers;

    private $limit = 10, $paragraphLimit = 2, $point = 1;

    public function mount($applicant)
    {
        $this->applicant = $applicant;

        $paragraphs = PlacementQuestion::where('skill', 'Reading')->whereNull('parent_id')
            ->with('children.answers')
            ->limit($this->paragraphLimit)->inRandomOrder()->get()->map(function ($para) {
                $para->setRelation('children', $para->children->take(5));
                return $para;
            });
        $this->paragraphs = $paragraphs;
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

        $this->applicant->update(['reading_score' => $score]);

        $this->emitUp('next');
    }

    public function render()
    {
        return view('livewire.placement-test.reading');
    }
}
