<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class ServiceFee
 * @package App\Models
 * @version July 8, 2021, 8:38 pm UTC
 *
 * @property \App\Models\TrainingService $trainingService
 * @property \App\Models\PaymentMethod $paymentMethod
 * @property integer $training_service_id
 * @property integer $payment_plan_id
 * @property number $fees
 */
class ServiceFee extends Model
{
    use SoftDeletes;


    public $table = 'service_fees';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'training_service_id',
        'payment_plan_id',
        'fees'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'training_service_id' => 'integer',
        'payment_plan_id' => 'integer',
        'fees' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'training_service_id' => 'required',
        'payment_plan_id' => 'required',
        'fees' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function trainingService()
    {
        return $this->belongsTo(\App\Models\TrainingService::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function paymentPlan()
    {
        return $this->belongsTo(\App\Models\PaymentPlan::class);
    }

    /**
     * Get the installment.
     */
    public function installment()
    {
        return $this->morphOne(\App\Models\Installment::class, 'installmentable');
    }

    /**
     * Get the leadPayments.
     */
    public function leadPayments()
    {
        return $this->morphMany(\App\Models\LeadPayment::class, 'paymentable');
    }
}
