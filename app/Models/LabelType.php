<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class LabelType
 * @package App\Models
 * @version May 9, 2021, 2:29 pm UTC
 *
 * @property \App\Models\Label $label
 * @property string $name
 * @property integer $label_id
 */
class LabelType extends Model
{
    use SoftDeletes;


    public $table = 'label_types';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'label_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'label_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'label_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function label()
    {
        return $this->belongsTo(\App\Models\Label::class);
    }
}
