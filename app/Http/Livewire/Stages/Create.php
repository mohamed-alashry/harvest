<?php

namespace App\Http\Livewire\Stages;

use Livewire\Component;

class Create extends Component
{
    public $track_id, $title, $levels_num;

    protected function rules()
    {
        $rules = [
            'track_id' => 'required',
            'title' => 'required',
            'levels_num' => 'required|integer',
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
        return view('livewire.stages.create');
    }
}
