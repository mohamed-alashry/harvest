<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Job
 * @package App\Models
 * @version May 8, 2021, 4:03 pm UTC
 *
 * @property \App\Models\Department $department
 * @property integer $department_id
 * @property string $title
 */
class Job extends Model
{
    use SoftDeletes;


    public $table = 'jobs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'department_id',
        'title'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'department_id' => 'integer',
        'title' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'department_id' => 'required',
        'title' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function department()
    {
        return $this->belongsTo(\App\Models\Department::class);
    }
}
