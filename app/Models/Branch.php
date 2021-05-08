<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Branch
 * @package App\Models
 * @version May 8, 2021, 2:55 pm UTC
 *
 * @property string $name
 * @property string $address
 * @property string $phone
 */
class Branch extends Model
{
    use SoftDeletes;


    public $table = 'branches';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'address',
        'phone'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'address' => 'string',
        'phone' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'address' => 'required',
        'phone' => 'required',
    ];
}
