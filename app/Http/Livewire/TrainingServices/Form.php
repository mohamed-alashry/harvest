<?php

namespace App\Http\Livewire\TrainingServices;

use App\Models\Track;
use Livewire\Component;
use Laracasts\Flash\Flash;
use App\Models\TrainingService;

class Form extends Component
{
    public $trainingService,
        $track_id,
        $course_id = '',
        $title,
        $pattern,
        $levels,
        $tracks,
        $courses = [];

    public function mount($trainingService = null)
    {
        if ($trainingService) {
            $this->fill([
                'track_id' => $trainingService->track_id,
                'course_id' => $trainingService->course_id,
                'title' => $trainingService->title,
                'pattern' => $trainingService->pattern,
                'levels' => $trainingService->course->levels,
                'courses' => Track::where('parent_id', $trainingService->track_id)->pluck('title', 'id'),
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
            'pattern' => 'required',
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
        $this->levels = '';
    }

    public function updatedCourseId($value)
    {
        $this->levels = Track::find($value)->levels;
    }

    public function save()
    {
        $data = $this->validate();

        $trainingService = $this->trainingService;
        if ($trainingService) {
            $trainingService->update($data);
        } else {
            TrainingService::create($data);
        }

        Flash::success('TrainingService saved successfully.');

        redirect(route('admin.trainingServices.index'));
    }

    public function render()
    {
        return view('livewire.training-services.form');
    }
}
