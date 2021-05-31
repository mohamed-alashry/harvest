<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class PlacementApplicant
 * @package App\Models
 * @version May 28, 2021, 1:51 pm UTC
 *
 * @property string $name
 * @property string $email
 * @property string $mobile
 * @property string $gender
 * @property string $job
 * @property string $university
 * @property number $vocabulary_score
 * @property number $grammar_score
 * @property number $reading_score
 * @property number $writing_score
 * @property number $listening_score
 * @property number $speaking_score
 * @property integer $level
 * @property string $notes
 * @property integer $status
 */
class PlacementApplicant extends Model
{


    public $table = 'placement_applicants';




    public $fillable = [
        'name',
        'email',
        'mobile',
        'gender',
        'job',
        'university',
        'vocabulary_score',
        'grammar_score',
        'reading_score',
        'writing_score',
        'listening_score',
        'speaking_score',
        'level',
        'notes',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'mobile' => 'string',
        'gender' => 'string',
        'job' => 'string',
        'university' => 'string',
        'vocabulary_score' => 'decimal:1',
        'grammar_score' => 'decimal:1',
        'reading_score' => 'decimal:1',
        'listening_score' => 'decimal:1',
        'speaking_score' => 'decimal:1',
        'writing_score' => 'decimal:1',
        'level' => 'integer',
        'notes' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'vocabulary_score' => 'numeric|between:0,99.5',
        // 'grammar_score' => 'numeric|between:0,99.5',
        // 'reading_score' => 'numeric|between:0,99.5',
        'writing_score' => 'numeric|between:0,99.5',
        'listening_score' => 'numeric|between:0,99.5',
        'speaking_score' => 'numeric|between:0,99.5',
        'level' => 'integer'
    ];

    public function answers()
    {
        return $this->hasMany('App\Models\ApplicantAnswer', 'placement_applicant_id');
    }
}
