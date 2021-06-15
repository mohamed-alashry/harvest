<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Track
 * @package App\Models
 * @version May 20, 2021, 12:06 am UTC
 *
 * @property string $title
 * @property integer $status
 */
class Track extends Model
{
    use SoftDeletes;


    public $table = 'tracks';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'parent_id',
        'levels',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'parent_id' => 'integer',
        'levels' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'status' => 'required'
    ];
}
