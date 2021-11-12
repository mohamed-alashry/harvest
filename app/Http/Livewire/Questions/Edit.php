<?php

namespace App\Http\Livewire\Questions;

use Flash;
use App\Models\Track;
use App\Models\Answer;
use Livewire\Component;
use App\Models\Question;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $questionIns,
        $skill,
        $question,
        $parent_id,
        $track_id,
        $course_id,
        $level_id,
        $photo,
        $ideas,
        $answers,
        $is_correct,
        $tracks,
        $courses = [],
        $levels = [];

    public function mount($questionIns)
    {
        $this->fill([
            'skill' => $questionIns->skill,
            'question' => $questionIns->question,
            'parent_id' => $questionIns->parent_id,
            'track_id' => $questionIns->track_id,
            'course_id' => $questionIns->course_id,
            'level_id' => $questionIns->level_id,
            'courses' => Track::where('parent_id', $questionIns->track_id)->pluck('title', 'id')->toArray(),
            'levels' => Track::find($questionIns->course_id)->stageLevels->pluck('name', 'id')->toArray(),
            'ideas' => $questionIns->children->pluck('question', 'id')->toArray(),
            'answers' => $questionIns->answers->pluck('answer', 'id')->toArray(),
            'is_correct' => $questionIns->answers()->where('is_correct', 1)->first()->id ?? null,
        ]);

        $this->tracks = Track::whereNull('parent_id')->pluck('title', 'id')->toArray();
    }

    protected function rules()
    {
        $rules = [
            'question' => 'required',
            'photo' => 'nullable|file',
            'track_id' => 'required',
            'course_id' => 'required',
            'level_id' => 'required',
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

        if (in_array($this->skill, ['Reading', 'Listening']) && $this->parent_id) {
            $rules['answers'] = 'required|array|size:4';
            $rules['answers.*'] = 'required';
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
        } else {
            $data['photo'] = $this->questionIns->photo;
        }
        $this->questionIns->update($data);

        if ($this->skill == 'Writing') {
            foreach ($data['ideas'] as $key => $value) {
                $idea = Question::find($key);
                $idea->update([
                    'question' => $value
                ]);
            }
        }
        if (isset($data['answers'])) {
            foreach ($data['answers'] as $key => $value) {
                $answer = Answer::find($key);
                $answer->update([
                    'answer' => $value,
                    'is_correct' => $data['is_correct'] == $key
                ]);
            }
        }

        Flash::success(' Question saved successfully.');

        redirect(route('admin.questions.index'));
    }

    public function render()
    {
        return view('livewire.questions.edit');
    }
}
