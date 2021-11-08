<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;


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
        'parent_id',
        'track_id',
        'course_id',
        'training_service_id',
        'round_id',
        'sub_round_id',
        'days',
        'discipline_id',
        'branch_id',
        'room_id',
        'instructor_id',
        'admin_id',
        'interval_id',
        'is_upgraded',
        'is_last',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['status'];

    /**
     * Get the status
     *
     * @param  string  $value
     * @return string
     */
    public function getStatusAttribute()
    {
        $subRound = $this->subRound;
        $startDate = Carbon::parse($subRound->start_date);
        $endDate = Carbon::parse($subRound->end_date);

        $today = today();
        $status = '';

        switch (true) {
            case ($today->gt($endDate)):
                $status = 'past';
                break;

            case ($today->lt($startDate)):
                $status = 'upcoming';
                break;

            default:
                $status = 'current';
                break;
        }

        return $status;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function parent()
    {
        return $this->belongsTo(\App\Models\Group::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function children()
    {
        return $this->belongsTo(\App\Models\Group::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function track()
    {
        return $this->belongsTo(\App\Models\Track::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function course()
    {
        return $this->belongsTo(\App\Models\Track::class, 'course_id');
    }

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
    public function subRound()
    {
        return $this->belongsTo(\App\Models\SubRound::class);
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
    public function admin()
    {
        return $this->belongsTo(\App\Models\Employee::class, 'admin_id');
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

    /**
     * Get all of the sessions for the Group
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sessions(): HasMany
    {
        return $this->hasMany(GroupSession::class);
    }

    /**
     * Get all of the students for the Group
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students(): HasMany
    {
        return $this->hasMany(GroupStudent::class, 'group_id');
    }
}
