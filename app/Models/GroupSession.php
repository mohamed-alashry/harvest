<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class GroupSession
 * @package App\Models
 * @version September 14, 2021, 8:13 am UTC
 *
 * @property \App\Models\Group $group
 * @property \App\Models\SubRound $subRound
 * @property integer $group_id
 * @property integer $sub_round_id
 * @property string $date
 * @property integer $level
 */
class GroupSession extends Model
{


    public $table = 'group_sessions';
    



    public $fillable = [
        'group_id',
        'sub_round_id',
        'date',
        'level'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'group_id' => 'integer',
        'sub_round_id' => 'integer',
        'date' => 'date',
        'level' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function group()
    {
        return $this->belongsTo(\App\Models\Group::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function subRound()
    {
        return $this->belongsTo(\App\Models\SubRound::class);
    }
}
