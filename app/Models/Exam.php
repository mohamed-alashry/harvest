<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Exam
 * @package App\Models
 * @version November 13, 2021, 1:15 am EET
 *
 * @property \App\Models\Track $track
 * @property \App\Models\Track $course
 * @property string $title
 * @property integer $track_id
 * @property integer $course_id
 * @property integer $duration
 * @property integer $success_rate
 */
class Exam extends Model
{


    public $table = 'exams';




    public $fillable = [
        'title',
        'track_id',
        'course_id',
        'duration',
        'success_rate'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function track()
    {
        return $this->belongsTo(\App\Models\Track::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function course()
    {
        return $this->belongsTo(\App\Models\Track::class, 'course_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function levels()
    {
        return $this->belongsToMany(\App\Models\StageLevel::class, 'exam_levels', 'exam_id', 'level_id');
    }
}
