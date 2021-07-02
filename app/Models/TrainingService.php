<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * Class TrainingService
 * @package App\Models
 * @version May 8, 2021, 3:06 pm UTC
 *
 * @property string $title
 */
class TrainingService extends Model
{
    use SoftDeletes;


    public $table = 'training_services';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'track_id',
        'course_id',
        'title',
        'pattern',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'track_id' => 'integer',
        'course_id' => 'integer',
        'title' => 'string',
        'pattern' => 'string',
    ];

    /**
     * Get the track that owns the TrainingService
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function track(): BelongsTo
    {
        return $this->belongsTo(Track::class, 'track_id');
    }

    /**
     * Get the course that owns the TrainingService
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Track::class, 'course_id');
    }
}
