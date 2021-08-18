<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Label
 * @package App\Models
 * @version May 9, 2021, 2:28 pm UTC
 *
 * @property string $name
 */
class Label extends Model
{
    use SoftDeletes;


    public $table = 'labels';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];
}
