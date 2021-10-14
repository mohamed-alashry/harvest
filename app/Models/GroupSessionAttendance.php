<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



/**
 * Class GroupSessionAttendance
 * @package App\Models
 * @version October 12, 2021, 6:31 pm EET
 *
 * @property integer $lead_id
 * @property integer $group_session_id
 * @property integer $attendance
 * @property integer $need_makeup
 */
class GroupSessionAttendance extends Model
{


    public $table = 'group_session_attendances';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;


    public $fillable = [
        'lead_id',
        'group_session_id',
        'group_id',
        'level_id',
        'attendance',
        'need_makeup'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'attendances' => 'required|array'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function lead()
    {
        return $this->belongsTo(\App\Models\Lead::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function groupSession()
    {
        return $this->belongsTo(\App\Models\GroupSession::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function interval()
    {
        return $this->belongsTo(\App\Models\Interval::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function level()
    {
        return $this->belongsTo(\App\Models\StageLevel::class, 'level_id');
    }

    /**
     * The makeup that belong to the MakeupSession
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function makeup()
    {
        return $this->belongsToMany(MakeupSession::class, 'makeup_session_attendances', 'attendance_id', 'makeup_session_id');
    }
}
