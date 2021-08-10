<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;


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
 * @property integer $payment_plan_id
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
        'payment_plan_id',
    ];

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
    public function paymentPlan()
    {
        return $this->belongsTo(\App\Models\PaymentPlan::class);
    }

    /**
     * Get all of the subPayments for the LeadPayment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subPayments(): HasMany
    {
        return $this->hasMany(SubPayment::class);
    }

    /**
     * Get the parent paymentable model (service fees or extra items or offers).
     */
    public function paymentable()
    {
        return $this->morphTo();
    }
}
