<?php

namespace App\Models;

use Eloquent as Model;


/**
 * Class Stage
 * @package App\Models
 * @version June 13, 2021, 8:39 pm UTC
 *
 * @property \App\Models\Track $track
 * @property integer $stage_id
 * @property string $name
 */
class StageLevel extends Model
{

    public $table = 'stage_levels';


    public $fillable = [
        'stage_id',
        'name',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'stage_id' => 'integer',
        'name' => 'string',
        'value' => 'integer',
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
    public function stage()
    {
        return $this->belongsTo(\App\Models\Stage::class);
    }
}
