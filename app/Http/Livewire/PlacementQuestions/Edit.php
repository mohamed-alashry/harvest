<?php

namespace App\Http\Livewire\PlacementQuestions;

use App\Models\PlacementAnswer;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PlacementQuestion;
use Flash;

class Edit extends Component
{
    use WithFileUploads;

    public $placementQuestion, $skill, $question, $parent_id, $photo, $ideas, $answers, $is_correct;

    public function mount($placementQuestion)
    {
        $this->fill([
            'skill' => $placementQuestion->skill,
            'question' => $placementQuestion->question,
            'parent_id' => $placementQuestion->parent_id,
            'ideas' => $placementQuestion->children->pluck('question', 'id')->toArray(),
            'answers' => $placementQuestion->answers->pluck('answer', 'id')->toArray(),
            'is_correct' => $placementQuestion->answers()->where('is_correct', 1)->first()->id ?? null,
        ]);
    }

    protected function rules()
    {
        $rules = [
            'question' => 'required',
            'photo' => 'nullable|image',
        ];

        if ($this->skill == 'Writing') {
            $rules['ideas'] = 'required|array|size:4';
            $rules['ideas.*'] = 'required';
        }

        if (in_array($this->skill, ['Vocabulary', 'Grammar'])) {
            $rules['answers'] = 'required|array|size:3';
            $rules['answers.*'] = 'required';
            $rules['is_correct'] = 'required';
        }

        if ($this->skill == 'Reading' && $this->parent_id) {
            $rules['answers'] = 'required|array|size:4';
            $rules['answers.*'] = 'required';
            $rules['is_correct'] = 'required';
        }

        return $rules;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $data = $this->validate();

        if ($this->photo) {
            $file = $this->photo->store('/');
            $data['photo'] = $file;
            rename(storage_path('app/' . $file), public_path('uploads/' . $file));
        } else {
            $data['photo'] = $this->placementQuestion->photo;
        }
        $this->placementQuestion->update($data);

        if ($this->skill == 'Writing') {
            foreach ($data['ideas'] as $key => $value) {
                $idea = PlacementQuestion::find($key);
                $idea->update([
                    'question' => $value
                ]);
            }
        }
        if (isset($data['answers'])) {
            foreach ($data['answers'] as $key => $value) {
                $answer = PlacementAnswer::find($key);
                $answer->update([
                    'answer' => $value,
                    'is_correct' => $data['is_correct'] == $key
                ]);
            }
        }

        Flash::success('Placement Question saved successfully.');

        redirect(route('admin.placementQuestions.index'));
    }

    public function render()
    {
        return view('livewire.placement-questions.edit');
    }
}
