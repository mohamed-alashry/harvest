<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Round
 * @package App\Models
 * @version July 30, 2021, 1:27 am UTC
 *
 * @property \App\Models\ServiceFee $serviceFee
 * @property integer $service_fee_id
 * @property string $title
 */
class Round extends Model
{
    use SoftDeletes;


    public $table = 'rounds';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'service_fee_id',
        'title'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'service_fee_id' => 'integer',
        'title' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'service_fee_id' => 'required',
        'title' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function serviceFee()
    {
        return $this->belongsTo(\App\Models\ServiceFee::class);
    }

    /**
     * Get all of the subRound for the Round
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subRounds()
    {
        return $this->hasMany(SubRound::class);
    }
}
