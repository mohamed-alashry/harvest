<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class LeadPayment
 * @package App\Models
 * @version July 11, 2021, 4:03 am UTC
 *
 * @property \App\Models\PaymentMethod $paymentMethod
 * @property integer $lead_id
 * @property integer $paymentable_type
 * @property integer $paymentable_id
 * @property integer $amount
 * @property integer $payment_method_id
 * @property string $reference_num
 */
class LeadPayment extends Model
{
    use SoftDeletes;


    public $table = 'lead_payments';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'lead_id',
        'paymentable_type',
        'paymentable_id',
        'amount',
        'payment_method_id',
        'reference_num'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'lead_id' => 'integer',
        'paymentable_type' => 'string',
        'paymentable_id' => 'integer',
        'amount' => 'integer',
        'payment_method_id' => 'integer',
        'reference_num' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function lead()
    {
        return $this->belongsTo(\App\Models\Lead::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function paymentMethod()
    {
        return $this->belongsTo(\App\Models\PaymentMethod::class);
    }

    /**
     * Get the parent paymentable model (service fees or extra items or offers).
     */
    public function paymentable()
    {
        return $this->morphTo();
    }
}
