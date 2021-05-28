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
 * @property number $general_score
 * @property number $reading_score
 * @property number $listening_score
 * @property number $speaking_score
 * @property number $writing_score
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
        'general_score',
        'reading_score',
        'listening_score',
        'speaking_score',
        'writing_score',
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
        'general_score' => 'decimal:1',
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
        'general_score' => 'numeric|between:0,99.5',
        'reading_score' => 'numeric|between:0,99.5',
        'listening_score' => 'numeric|between:0,99.5',
        'speaking_score' => 'numeric|between:0,99.5',
        'writing_score' => 'numeric|between:0,99.5',
        'level' => 'integer'
    ];
}
