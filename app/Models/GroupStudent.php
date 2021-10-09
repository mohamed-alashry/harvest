<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class GroupStudent
 * @package App\Models
 * @version October 9, 2021, 10:32 pm EET
 *
 * @property \App\Models\Group $group
 * @property \App\Models\Lead $lead
 * @property integer $group_id
 * @property integer $lead_id
 * @property integer $payment
 * @property integer $books
 * @property integer $activation
 * @property integer $certification
 * @property integer $abcence_per
 * @property integer $exam_per
 */
class GroupStudent extends Model
{


    public $table = 'group_students';




    public $fillable = [
        'group_id',
        'lead_id',
        'payment',
        'books',
        'activation',
        'certification',
        'abcence_per',
        'exam_per'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function group()
    {
        return $this->belongsTo(\App\Models\Group::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function lead()
    {
        return $this->belongsTo(\App\Models\Lead::class);
    }
}
