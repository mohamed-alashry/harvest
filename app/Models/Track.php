<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;


/**
 * Class Track
 * @package App\Models
 * @version May 20, 2021, 12:06 am UTC
 *
 * @property string $title
 * @property integer $status
 */
class Track extends Model
{
    use SoftDeletes;


    public $table = 'tracks';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'parent_id',
        'levels',
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
        'parent_id' => 'integer',
        'levels' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'status' => 'required'
    ];

    /**
     * Get all of the courses for the Track
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses(): HasMany
    {
        return $this->hasMany(Track::class, 'parent_id');
    }

    /**
     * Get the parent that owns the Track
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Track::class, 'parent_id');
    }

    /**
     * Get all of the stages for the Track
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stages(): HasMany
    {
        return $this->hasMany(Stage::class, 'track_id');
    }

    /**
     * Get all of the levels for the Track
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function stageLevels(): HasManyThrough
    {
        return $this->hasManyThrough(StageLevel::class, Stage::class);
    }
}
