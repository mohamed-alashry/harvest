<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * Class Timeframe
 * @package App\Models
 * @version July 2, 2021, 7:32 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $intervals
 * @property string $title
 * @property integer $total_hours
 * @property integer $session_hours
 * @property integer $week_session
 * @property string $days
 * @property integer $status
 */
class Timeframe extends Model
{
    use SoftDeletes;


    public $table = 'timeframes';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'total_hours',
        'session_hours',
        'week_session',
        'days',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'total_hours' => 'integer',
        'session_hours' => 'integer',
        'week_session' => 'integer',
        'days' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];

    /**
     * Get all of the leads for the Timeframe
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function intervals()
    {
        return $this->belongsToMany(\App\Models\Interval::class, 'interval_timeframe');
    }
}
