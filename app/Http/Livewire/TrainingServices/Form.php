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
        $courses = [],
        $stageLevels = [];

    public function mount($trainingService = null)
    {
        if ($trainingService) {
            $this->fill([
                'track_id' => $trainingService->track_id,
                'course_id' => $trainingService->course_id,
                'title' => $trainingService->title,
                'pattern' => $trainingService->pattern,
                'levels' => $trainingService->levels->pluck('id')->toArray(),
                'courses' => Track::where('parent_id', $trainingService->track_id)->pluck('title', 'id'),
                'stageLevels' => Track::find($trainingService->course_id)->stageLevels->pluck('name', 'id')->toArray(),
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

        $trainingService = $this->trainingService;
        if ($trainingService) {
            $trainingService->update($data);
        } else {
            $trainingService = TrainingService::create($data);
        }

        $trainingService->levels()->sync($data['levels']);

        Flash::success('TrainingService saved successfully.');

        redirect(route('admin.trainingServices.index'));
    }

    public function render()
    {
        return view('livewire.training-services.form');
    }
}
