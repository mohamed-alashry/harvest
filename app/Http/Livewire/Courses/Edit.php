<?php

namespace App\Http\Livewire\Courses;

use App\Models\Track;
use Livewire\Component;
use Laracasts\Flash\Flash;

class Edit extends Component
{
    public $course,
        $tracks,
        $parent_id,
        $title,
        $levels = 0,
        $stages = [];

    public function mount($course)
    {
        $this->fill([
            'tracks' => Track::whereNull('parent_id')->pluck('title', 'id'),
            'parent_id' => $course->parent_id,
            'title' => $course->title,
            'levels' => $course->levels,
            'stages' => $course->stages->toArray(),
        ]);
    }

    protected function rules()
    {
        $rules = [
            'parent_id' => 'required',
            'title' => 'required',
            'levels' => '',
            'stages' => 'required|array',
            'stages.*.name' => 'required',
            'stages.*.levels.*.name' => 'required',
            'stages.*.levels.*.value' => 'required|integer',
        ];

        return $rules;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addStage()
    {
        $this->stages[]['levels'][] = ['name' => '', 'value' => ''];
        $this->levels += 1;
    }

    public function deleteStage($idx)
    {
        $stages = $this->stages;
        $levels_count = count($stages[$idx]['levels']);
        $this->levels -= $levels_count;
        unset($stages[$idx]);
        $this->stages = $stages;
    }

    public function addStageLevel($idx)
    {
        $this->stages[$idx]['levels'][] = ['name' => '', 'value' => ''];
        $this->levels += 1;
    }

    public function save()
    {
        $data = $this->validate();
        $course = $this->course;

        $course->update($data);
        $course->stages()->delete();

        foreach ($data['stages'] as $stageData) {
            $stage = $course->stages()->create($stageData);

            foreach ($stageData['levels'] as $levelData) {
                $stage->levels()->create($levelData);
            }
        }

        Flash::success('Sub Track saved successfully.');

        redirect(route('admin.courses.index'));
    }

    public function render()
    {
        return view('livewire.courses.edit');
    }
}
