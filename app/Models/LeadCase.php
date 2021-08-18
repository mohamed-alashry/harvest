<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class LeadCase
 * @package App\Models
 * @version May 9, 2021, 4:13 pm UTC
 *
 * @property \App\Models\Lead $lead
 * @property \App\Models\Employee $employee
 * @property \App\Models\Branch $branch
 * @property \App\Models\Label $label
 * @property \App\Models\LabelType $labelType
 * @property integer $lead_id
 * @property integer $employee_id
 * @property integer $branch_id
 * @property integer $label_id
 * @property integer $label_type_id
 * @property string $serial
 * @property string $timeline
 * @property string $details
 * @property string $feedback
 * @property string $other_feedback
 * @property string $action
 * @property string $other_action
 * @property string $notes
 * @property string $status
 * @property string $date
 */
class LeadCase extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'lead_cases';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'lead_id',
        'branch_id',
        'employee_id',
        'label_id',
        'label_type_id',
        'serial',
        'feedback',
        'other_feedback',
        'action',
        'other_action',
        'notes',
        // 'status',
        'date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'lead_id' => 'integer',
        'employee_id' => 'integer',
        'label_id' => 'integer',
        'label_type_id' => 'integer',
        'serial' => 'string',
        'feedback' => 'string',
        'other_feedback' => 'string',
        'action' => 'string',
        'other_action' => 'string',
        'notes' => 'string',
        // 'status' => 'string',
        'date' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'lead_id' => 'required',
        // 'employee_id' => 'required',
        'branch_id' => 'required',
        'label_id' => 'required',
        'label_type_id' => 'required',
        'feedback' => 'required',
        'other_feedback' => 'required_if:feedback,other',
        'action' => 'required',
        'other_action' => 'required_if:action,other',
        'notes' => 'required',
        // 'status' => 'required',
        'date' => 'required|date_format:Y-m-d'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function lead()
    {
        return $this->belongsTo(\App\Models\Lead::class);
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
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function label()
    {
        return $this->belongsTo(\App\Models\Label::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function labelType()
    {
        return $this->belongsTo(\App\Models\LabelType::class);
    }
}
