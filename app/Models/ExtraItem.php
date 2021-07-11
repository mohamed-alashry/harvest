<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class ExtraItem
 * @package App\Models
 * @version July 8, 2021, 9:20 pm UTC
 *
 * @property \App\Models\ItemCategory $itemCategory
 * @property \App\Models\PaymentMethod $paymentMethod
 * @property integer $item_category_id
 * @property integer $payment_plan_id
 * @property string $name
 * @property number $price
 */
class ExtraItem extends Model
{
    use SoftDeletes;


    public $table = 'extra_items';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'item_category_id',
        'payment_plan_id',
        'name',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'item_category_id' => 'integer',
        'payment_plan_id' => 'integer',
        'name' => 'string',
        'price' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'item_category_id' => 'required',
        'payment_plan_id' => 'required',
        'name' => 'required',
        'price' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function itemCategory()
    {
        return $this->belongsTo(\App\Models\ItemCategory::class);
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
