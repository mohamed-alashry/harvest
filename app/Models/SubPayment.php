<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class SubPayment
 * @package App\Models
 * @version July 11, 2021, 4:03 am UTC
 *
 * @property \App\Models\PaymentMethod $paymentMethod
 * @property integer $lead_id
 * @property integer $amount
 * @property integer $payment_plan_id
 * @property string $reference_num
 */
class SubPayment extends Model
{
    public $table = 'sub_payments';


    public $fillable = [
        'lead_payment_id',
        'amount',
        'payment_method_id',
        'reference_num',
        'due_date',
        'paid',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function leadPayment()
    {
        return $this->belongsTo(\App\Models\LeadPayment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function paymentMethod()
    {
        return $this->belongsTo(\App\Models\PaymentMethod::class);
    }
}
