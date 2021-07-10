<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * Class Offer
 * @package App\Models
 * @version May 8, 2021, 3:01 pm UTC
 *
 * @property string $title
 */
class Offer extends Model
{
    use SoftDeletes;


    public $table = 'offers';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'fees',
        'start_date',
        'end_date',
        'payment_method_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function paymentMethod()
    {
        return $this->belongsTo(\App\Models\PaymentMethod::class);
    }

    /**
     * The disciplines that belong to the Offer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function disciplines(): BelongsToMany
    {
        return $this->belongsToMany(DisciplineCategory::class, 'offer_disciplines', 'offer_id', 'discipline_id');
    }

    /**
     * The items that belong to the Offer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function items(): BelongsToMany
    {
        return $this->belongsToMany(ExtraItem::class, 'offer_items', 'offer_id', 'item_id');
    }

    /**
     * The services that belong to the Offer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(ServiceFee::class, 'offer_services', 'offer_id', 'service_id');
    }

    /**
     * Get the installment.
     */
    public function installment()
    {
        return $this->morphOne(\App\Models\Installment::class, 'installmentable');
    }
}
