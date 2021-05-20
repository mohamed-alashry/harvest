<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class CustomerJob
 * @package App\Models
 * @version May 20, 2021, 12:19 am UTC
 *
 * @property string $name
 * @property integer $status
 */
class CustomerJob extends Model
{
    use SoftDeletes;


    public $table = 'customer_jobs';
    

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
        'name' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'status' => 'required'
    ];

    
}
