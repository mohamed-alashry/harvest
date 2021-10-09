<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubRoundSession extends Model
{
    public $table = 'sub_round_sessions';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;


    public $fillable = [
        'sub_round_id',
        'date',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function subRound()
    {
        return $this->belongsTo(\App\Models\SubRound::class);
    }
}
