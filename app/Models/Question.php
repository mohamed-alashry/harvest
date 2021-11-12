<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Support\Str;



/**
 * Class Question
 * @package App\Models
 * @version November 12, 2021, 8:47 pm EET
 *
 * @property string $question
 */
class Question extends Model
{


    public $table = 'questions';




    public $fillable = [
        'skill',
        'question',
        'photo',
        'parent_id',
        'track_id',
        'course_id',
        'level_id',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['paragraph'];

    /**
     * Get the paragraph for reading skill.
     *
     * @return string
     */
    public function getParagraphAttribute()
    {
        return Str::limit($this->attributes['question'], 150, '...');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Question', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Question', 'parent_id')->inRandomOrder();
    }

    public function answers()
    {
        return $this->hasMany('App\Models\Answer')->inRandomOrder();
    }

    public function answersRandom()
    {
        return $this->hasMany('App\Models\Answer')->inRandomOrder();
    }
}
