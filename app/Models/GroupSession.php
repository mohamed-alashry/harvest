<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class GroupSession
 * @package App\Models
 * @version October 10, 2021, 11:47 am EET
 *
 * @property \App\Models\Group $group
 * @property \App\Models\Room $room
 * @property \App\Models\Employee $instructor
 * @property \App\Models\Interval $interval
 * @property integer $group_id
 * @property string $date
 * @property integer $room_id
 * @property integer $instructor_id
 * @property integer $interval_id
 * @property integer $status
 */
class GroupSession extends Model
{


    public $table = 'group_sessions';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;


    public $fillable = [
        'group_id',
        'date',
        'interval_id',
        'instructor_id',
        'room_id',
        'level_id',
        'status'
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
    public function room()
    {
        return $this->belongsTo(\App\Models\Room::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function instructor()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'instructor_id');
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
     * Get all of the attendances for the GroupSession
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendances(): HasMany
    {
        return $this->hasMany(GroupSessionAttendance::class);
    }

    /**
     * Get the makeup associated with the GroupSession
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function makeup(): HasOne
    {
        return $this->hasOne(MakeupSession::class);
    }
}
