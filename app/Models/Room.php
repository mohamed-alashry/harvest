<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Room
 * @package App\Models
 * @version May 19, 2021, 7:27 pm UTC
 *
 * @property \App\Models\Branch $branch
 * @property integer $branch_id
 * @property string $name
 * @property integer $max_student
 * @property integer $status
 */
class Room extends Model
{
    use SoftDeletes;


    public $table = 'rooms';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'branch_id',
        'name',
        'max_student',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'branch_id' => 'integer',
        'name' => 'string',
        'max_student' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'branch_id' => 'required',
        'name' => 'required',
        'max_student' => 'required|integer',
        'status' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function branch()
    {
        return $this->belongsTo(\App\Models\Branch::class);
    }
}
