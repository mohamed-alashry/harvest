<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class SubRound
 * @package App\Models
 * @version July 30, 2021, 2:21 am UTC
 *
 * @property \App\Models\Round $round
 * @property integer $round_id
 * @property string $start_date
 */
class SubRound extends Model
{
    use SoftDeletes;


    public $table = 'sub_rounds';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'round_id',
        'start_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'round_id' => 'integer',
        // 'start_date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'start_date' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function round()
    {
        return $this->belongsTo(\App\Models\Round::class);
    }
}
