<?php

namespace App\Http\Livewire\Exams;

use App\Models\Track;
use Livewire\Component;
use Laracasts\Flash\Flash;
use App\Models\Exam;

class Form extends Component
{
    public $exam,
        $track_id,
        $course_id = '',
        $title,
        $duration,
        $success_rate,
        $levels,
        $tracks,
        $courses = [],
        $stageLevels = [];

    public function mount($exam = null)
    {
        if ($exam) {
            $this->fill([
                'track_id' => $exam->track_id,
                'course_id' => $exam->course_id,
                'title' => $exam->title,
                'duration' => $exam->duration,
                'success_rate' => $exam->success_rate,
                'levels' => $exam->levels->pluck('id')->toArray(),
                'courses' => Track::where('parent_id', $exam->track_id)->pluck('title', 'id'),
                'stageLevels' => Track::find($exam->course_id)->stageLevels->pluck('name', 'id')->toArray(),
            ]);
        }
        $this->tracks = Track::whereNull('parent_id')->pluck('title', 'id');
    }

    protected function rules()
    {
        $rules = [
            'track_id' => 'required',
            'course_id' => 'required',
            'title' => 'required',
            'duration' => 'required|integer',
            'success_rate' => 'required|integer|max:100',
            'levels' => 'required|array',
        ];

        return $rules;
    }

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function updatedTrackId($value)
    {
        $this->courses = Track::where('parent_id', $value)->pluck('title', 'id');
        $this->course_id = '';
        $this->levels = [];
        $this->stageLevels = [];
    }

    public function updatedCourseId($value)
    {
        $this->stageLevels = Track::find($value)->stageLevels->pluck('name', 'id')->toArray();
    }

    public function save()
    {
        $data = $this->validate();

        $exam = $this->exam;
        if ($exam) {
            $exam->update($data);
        } else {
            $exam = Exam::create($data);
        }

        $exam->levels()->sync($data['levels']);

        Flash::success('Exam saved successfully.');

        redirect(route('admin.exams.index'));
    }

    public function render()
    {
        return view('livewire.exams.form');
    }
}
