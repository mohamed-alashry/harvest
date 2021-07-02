<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * Class Stage
 * @package App\Models
 * @version June 13, 2021, 8:39 pm UTC
 *
 * @property \App\Models\Track $track
 * @property integer $track_id
 * @property string $name
 */
class Stage extends Model
{
    // use SoftDeletes;


    public $table = 'stages';


    // protected $dates = ['deleted_at'];



    public $fillable = [
        'track_id',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'track_id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function track()
    {
        return $this->belongsTo(\App\Models\Track::class);
    }

    /**
     * Get all of the levels for the Stage
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function levels(): HasMany
    {
        return $this->hasMany(StageLevel::class);
    }
}
