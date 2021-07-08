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
 * @property \App\Models\Timeframe $timeframe
 * @property \App\Models\PaymentMethod $paymentMethod
 * @property integer $training_service_id
 * @property integer $timeframe_id
 * @property integer $payment_method_id
 * @property number $fees
 */
class ServiceFee extends Model
{
    use SoftDeletes;


    public $table = 'service_fees';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'training_service_id',
        'timeframe_id',
        'payment_method_id',
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
        'timeframe_id' => 'integer',
        'payment_method_id' => 'integer',
        'fees' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'training_service_id' => 'required',
        'timeframe_id' => 'required',
        'payment_method_id' => 'required',
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
    public function timeframe()
    {
        return $this->belongsTo(\App\Models\Timeframe::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function paymentMethod()
    {
        return $this->belongsTo(\App\Models\PaymentMethod::class);
    }
}