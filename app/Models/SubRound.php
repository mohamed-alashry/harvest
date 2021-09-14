<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


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
    public $table = 'sub_rounds';

    public $fillable = [
        'round_id',
        'days',
        'start_date',
        'end_date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'subRounds' => 'required|array',
        'subRounds.*.start_date' => 'required|unique:sub_rounds,start_date',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function round()
    {
        return $this->belongsTo(\App\Models\Round::class);
    }

    /**
     * Get all of the sessions for the SubRound
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sessions(): HasMany
    {
        return $this->hasMany(GroupSession::class, 'sub_round_id');
    }
}
