<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Interval
 * @package App\Models
 * @version May 19, 2021, 11:50 pm UTC
 *
 * @property string $name
 * @property string $time
 * @property string $pattern
 * @property integer $sort
 * @property integer $status
 */
class Interval extends Model
{
    use SoftDeletes;


    public $table = 'intervals';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'time_from',
        'time_to',
        'pattern',
        'sort',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'time_from' => 'string',
        'time_to' => 'string',
        'pattern' => 'string',
        'sort' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'time_from' => 'required',
        'time_to' => 'required|after:time_from',
        'pattern' => 'required|in:AM,PM',
        'sort' => 'required|integer',
        'status' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function timeframes()
    {
        return $this->belongsToMany(\App\Models\Timeframe::class, 'interval_timeframe');
    }
}
