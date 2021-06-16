<?php

namespace App\Http\Livewire\PlacementQuestions;

use App\Models\PlacementAnswer;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PlacementQuestion;
use Flash;

class Create extends Component
{
    use WithFileUploads;

    public $skill, $question, $parent_id, $photo, $ideas, $paragraphs, $answers, $is_correct;

    protected function rules()
    {
        $rules = [
            'skill' => 'required',
            'question' => 'required',
            'photo' => 'nullable|file',
            'ideas' => 'nullable|required_if:skill,Writing|array|size:4',
            'parent_id' => 'nullable',
        ];

        if (in_array($this->skill, ['Vocabulary', 'Grammar'])) {
            $rules['answers'] = 'required|array|size:3';
            $rules['is_correct'] = 'required';
        }

        if (in_array($this->skill, ['Reading', 'Listening']) && $this->parent_id) {
            $rules['answers'] = 'required|array|size:4';
            $rules['is_correct'] = 'required';
        }

        return $rules;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedSkill($value)
    {
        if ($value == 'Reading') {
            $this->paragraphs = PlacementQuestion::whereNull('parent_id')->where('skill', 'Reading')->get()->pluck('paragraph', 'id');
        }
        if ($value == 'Listening') {
            $this->paragraphs = PlacementQuestion::whereNull('parent_id')->where('skill', 'Listening')->get()->pluck('paragraph', 'id');
        }
    }

    public function save()
    {
        $data = $this->validate();

        if ($this->photo) {
            $file = $this->photo->store('/');
            $data['photo'] = $file;
            if (env('APP_ENV') == 'production') {
                rename(storage_path('app/' . $file), '/home/harvestc/public_html/sys/uploads/' . $file);
            } else {
                rename(storage_path('app/' . $file), public_path('uploads/' . $file));
            }
        }
        $placementQuestion = PlacementQuestion::create($data);

        if ($data['skill'] == 'Writing') {
            foreach ($data['ideas'] as $idea) {
                PlacementQuestion::create([
                    'skill' => 'Writing',
                    'parent_id' => $placementQuestion->id,
                    'question' => $idea
                ]);
            }
        }
        if (isset($data['answers'])) {
            foreach ($data['answers'] as $key => $answer) {
                PlacementAnswer::create([
                    'placement_question_id' => $placementQuestion->id,
                    'answer' => $answer,
                    'is_correct' => $data['is_correct'] == $key
                ]);
            }
        }

        Flash::success('Placement Question saved successfully.');

        redirect(route('admin.placementQuestions.index'));
    }

    public function render()
    {
        return view('livewire.placement-questions.create');
    }
}
