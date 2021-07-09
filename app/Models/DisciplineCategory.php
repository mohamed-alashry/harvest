<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


/**
 * Class DisciplineCategory
 * @package App\Models
 * @version July 9, 2021, 12:56 pm UTC
 *
 * @property string $name
 * @property integer $max_student
 * @property integer $status
 */
class DisciplineCategory extends Model
{
    use SoftDeletes;


    public $table = 'discipline_categories';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'max_student',
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
        'max_student' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'max_student' => 'required',
        'status' => 'required',
        'items' => 'required|array',
    ];

    /**
     * The items that belong to the DisciplineCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function items(): BelongsToMany
    {
        return $this->belongsToMany(ExtraItem::class, 'discipline_items', 'discipline_id', 'item_id');
    }
}
