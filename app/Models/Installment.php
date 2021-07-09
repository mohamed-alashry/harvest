<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'installmentable_type',
        'installmentable_id',
        'deposit',
        'first_payment',
        'first_due_date',
        'second_payment',
        'second_due_date',
        'third_payment',
        'third_due_date',
        'fourth_payment',
        'fourth_due_date',
    ];

    /**
     * Get the parent installmentable model (service fees or extra items or offers).
     */
    public function installmentable()
    {
        return $this->morphTo();
    }
}
