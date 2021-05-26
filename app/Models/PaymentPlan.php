<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class PaymentPlan
 * @package App\Models
 * @version May 21, 2021, 10:12 pm UTC
 *
 * @property string $title
 * @property integer $status
 */
class PaymentPlan extends Model
{
    use SoftDeletes;


    public $table = 'payment_plans';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
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
