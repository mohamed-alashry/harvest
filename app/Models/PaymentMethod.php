<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class PaymentMethod
 * @package App\Models
 * @version May 21, 2021, 10:15 pm UTC
 *
 * @property string $title
 * @property integer $has_transaction_number
 * @property integer $status
 */
class PaymentMethod extends Model
{
    use SoftDeletes;


    public $table = 'payment_methods';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'has_transaction_number',
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
        'has_transaction_number' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'has_transaction_number' => 'required',
        'status' => 'required'
    ];

    
}
