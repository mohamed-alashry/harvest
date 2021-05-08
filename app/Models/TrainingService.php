<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


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
        'title'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    
}
