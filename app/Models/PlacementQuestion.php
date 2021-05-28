<?php

namespace App\Models;

use Eloquent as Model;



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
     * Set the photo.
     *
     * @param  object  $file
     * @return void
     */
    public function setPhotoAttribute($file)
    {
        if ($file) {
            $originalName = $file->getClientOriginalName();

            $fileName = time() . '_' . $originalName;

            $file->move('uploads/', $fileName);

            $this->attributes['photo'] = $fileName;
        }
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\PlacementQuestion', 'parent_id');
    }
}
