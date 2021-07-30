<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Group
 * @package App\Models
 * @version July 30, 2021, 11:35 am UTC
 *
 * @property \App\Models\Round $round
 * @property \App\Models\DisciplineCategory $discipline
 * @property \App\Models\Branch $branch
 * @property \App\Models\Room $room
 * @property \App\Models\Employee $instructor
 * @property \App\Models\Interval $interval
 * @property \Illuminate\Database\Eloquent\Collection $stageLevels
 * @property string $title
 * @property integer $round_id
 * @property integer $discipline_id
 * @property integer $branch_id
 * @property integer $room_id
 * @property integer $instructor_id
 * @property integer $interval_id
 */
class Group extends Model
{
    use SoftDeletes;


    public $table = 'groups';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'round_id',
        'discipline_id',
        'branch_id',
        'room_id',
        'instructor_id',
        'interval_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'round_id' => 'integer',
        'discipline_id' => 'integer',
        'branch_id' => 'integer',
        'room_id' => 'integer',
        'instructor_id' => 'integer',
        'interval_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'round_id' => 'required',
        'discipline_id' => 'required',
        'branch_id' => 'required',
        'room_id' => 'required',
        'instructor_id' => 'required',
        'interval_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function round()
    {
        return $this->belongsTo(\App\Models\Round::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function discipline()
    {
        return $this->belongsTo(\App\Models\DisciplineCategory::class, 'discipline_id');
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function interval()
    {
        return $this->belongsTo(\App\Models\Interval::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function levels()
    {
        return $this->belongsToMany(\App\Models\StageLevel::class, 'group_levels', 'group_id', 'level_id');
    }
}
