<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Support\Str;

/**
 * Class PlacementQuestion
 * @package App\Models
 * @version May 28, 2021, 2:56 pm UTC
 *
 * @property string $skill
 * @property string $question
 * @property string $photo
 * @property integer $parent_id
 */
class PlacementQuestion extends Model
{


    public $table = 'placement_questions';




    public $fillable = [
        'skill',
        'question',
        'photo',
        'parent_id'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['paragraph'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'skill' => 'string',
        'question' => 'string',
        'photo' => 'string',
        'parent_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'skill' => 'required',
        'question' => 'required',
        'photo' => 'image'
    ];

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
        return $this->belongsTo('App\Models\PlacementQuestion', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\PlacementQuestion', 'parent_id');
    }

    public function answers()
    {
        return $this->hasMany('App\Models\PlacementAnswer');
    }
}
