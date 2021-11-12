<?php

namespace App\Http\Livewire\Questions;

use Flash;
use App\Models\Track;
use App\Models\Answer;
use Livewire\Component;
use App\Models\Question;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $skill,
        $question,
        $parent_id,
        $track_id,
        $course_id,
        $level_id,
        $photo,
        $ideas,
        $paragraphs,
        $answers,
        $is_correct,
        $tracks,
        $courses = [],
        $levels = [];

    public function mount()
    {
        $this->tracks = Track::whereNull('parent_id')->pluck('title', 'id')->toArray();
    }

    protected function rules()
    {
        $rules = [
            'skill' => 'required',
            'question' => 'required',
            'ideas' => 'nullable|required_if:skill,Writing|array|size:4',
            'parent_id' => 'nullable',
            'track_id' => 'required',
            'course_id' => 'required',
            'level_id' => 'required',
        ];

        if (in_array($this->skill, ['Vocabulary', 'Grammar'])) {
            $rules['answers'] = 'required|array|size:3';
            $rules['is_correct'] = 'required';
        }

        if (in_array($this->skill, ['Reading', 'Listening']) && $this->parent_id) {
            $rules['answers'] = 'required|array|size:4';
            $rules['is_correct'] = 'required';
        }

        if ($this->photo && $this->skill == 'Writing') {
            $rules['photo'] = 'image';
        }

        if ($this->photo && $this->skill == 'Listening') {
            $rules['photo'] = 'mimes:mp3';
        }

        return $rules;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedTrackId($value)
    {
        $this->courses = Track::where('parent_id', $value)->pluck('title', 'id')->toArray();
        $this->course_id = '';
        $this->level_id = '';
    }

    public function updatedCourseId($value)
    {
        $this->levels = Track::find($value)->stageLevels->pluck('name', 'id')->toArray();
        $this->level_id = '';
    }

    public function updatedSkill($value)
    {
        if ($value == 'Reading') {
            $this->paragraphs = Question::whereNull('parent_id')->where('skill', 'Reading')->get()->pluck('paragraph', 'id');
        }
        if ($value == 'Listening') {
            $this->paragraphs = Question::whereNull('parent_id')->where('skill', 'Listening')->get()->pluck('paragraph', 'id');
        }
    }

    public function save()
    {
        $data = $this->validate();

        if ($this->photo) {
            $file = $this->photo->store('/');
            $data['photo'] = $file;
            if (env('APP_ENV') == 'production') {
                rename(storage_path('app/' . $file), '/home/harvestc/sys.harvestcollege.co.uk/uploads/' . $file);
            } else {
                rename(storage_path('app/' . $file), public_path('uploads/' . $file));
            }
        }
        $question = Question::create($data);

        if ($data['skill'] == 'Writing') {
            foreach ($data['ideas'] as $idea) {
                Question::create([
                    'skill' => 'Writing',
                    'parent_id' => $question->id,
                    'question' => $idea
                ]);
            }
        }
        if (isset($data['answers'])) {
            foreach ($data['answers'] as $key => $answer) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer' => $answer,
                    'is_correct' => $data['is_correct'] == $key
                ]);
            }
        }

        Flash::success(' Question saved successfully.');

        redirect(route('admin.questions.index'));
    }

    public function render()
    {
        return view('livewire.questions.create');
    }
}
