<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



/**
 * Class MakeupSession
 * @package App\Models
 * @version October 13, 2021, 1:48 pm EET
 *
 * @property \App\Models\GroupSession $groupSession
 * @property \App\Models\Branch $branch
 * @property \App\Models\Room $room
 * @property \App\Models\Employee $instructor
 * @property integer $group_session_id
 * @property string $date
 * @property string $time_from
 * @property string $time_to
 * @property integer $branch_id
 * @property integer $room_id
 * @property integer $instructor_id
 */
class MakeupSession extends Model
{


    public $table = 'makeup_sessions';




    public $fillable = [
        'group_session_id',
        'date',
        'time_from',
        'time_to',
        'branch_id',
        'room_id',
        'instructor_id'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'group_session_id' => 'required',
        'date' => 'required',
        'time_from' => 'required',
        'time_to' => 'required',
        // 'branch_id' => 'required',
        'room_id' => 'required',
        'instructor_id' => 'required'
    ];

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
    public function branch()
    {
        return $this->belongsTo(\App\Models\Branch::class);
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
     * The attendances that belong to the MakeupSession
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attendances(): BelongsToMany
    {
        return $this->belongsToMany(GroupSessionAttendance::class, 'makeup_session_attendances', 'makeup_session_id', 'attendance_id');
    }
}
