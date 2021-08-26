<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Lead
 * @package App\Models
 * @version May 8, 2021, 1:27 pm UTC
 *
 * @property string $name
 * @property string $gender
 * @property string $mobile_1
 * @property string $mobile_2
 * @property string $email
 * @property string $preferred_time
 * @property integer $lead_source_id
 * @property integer $know_channel_id
 * @property integer $offer_id
 * @property integer $branch_id
 * @property integer $training_service_id
 * @property string $notes
 * @property integer $assigned_employee_id
 * @property string $nationality
 * @property string $identification
 * @property string $dob
 * @property string $country
 * @property string $governorate
 * @property string $city
 * @property string $university
 * @property string $customer_job
 * @property string $workplace
 * @property string $full_address
 */
class Lead extends Model
{
    use SoftDeletes;


    public $table = 'leads';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'type',
        'gender',
        'mobile_1',
        'mobile_2',
        'email',
        'preferred_time',
        'lead_source_id',
        'know_channel_id',
        'offer_id',
        'branch_id',
        'training_service_id',
        'notes',
        'assigned_employee_id',
        // 'nationality',
        // 'identification',
        // 'dob',
        // 'country',
        // 'governorate',
        // 'city',
        // 'university',
        // 'customer_job',
        // 'workplace',
        // 'full_address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'array',
        'type' => 'integer',
        'gender' => 'string',
        'mobile_1' => 'string',
        'mobile_2' => 'string',
        'email' => 'string',
        'preferred_time' => 'string',
        'lead_source_id' => 'integer',
        'know_channel_id' => 'integer',
        'offer_id' => 'integer',
        'branch_id' => 'integer',
        'training_service_id' => 'integer',
        'notes' => 'string',
        'assigned_employee_id' => 'integer',
        // 'nationality' => 'string',
        // 'identification' => 'string',
        // 'dob' => 'date',
        // 'country' => 'string',
        // 'governorate' => 'string',
        // 'city' => 'string',
        // 'university' => 'string',
        // 'customer_job' => 'string',
        // 'workplace' => 'string',
        // 'full_address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name.en' => 'required',
        'name.ar' => 'required',
        'gender' => 'required',
        'mobile_1' => 'required|unique:leads,mobile_1',
        'email' => 'nullable|email|unique:leads,email',
        'lead_source_id' => 'required',
        'know_channel_id' => 'required',
        'preferred_time' => 'required',
        'offer_id' => 'required',
        'branch_id' => 'required',
        'training_service_id' => 'required'
    ];

    /**
     * Get the lead source that owns the Lead
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lead_source(): BelongsTo
    {
        return $this->belongsTo(LeadSource::class);
    }

    /**
     * Get the know channel that owns the Lead
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function know_channel(): BelongsTo
    {
        return $this->belongsTo(KnowChannel::class);
    }

    /**
     * Get the offer that owns the Lead
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function offer(): BelongsTo
    {
        return $this->belongsTo(Offer::class);
    }

    /**
     * Get the branch that owns the Lead
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Get the training service that owns the Lead
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function training_service(): BelongsTo
    {
        return $this->belongsTo(TrainingService::class);
    }

    /**
     * Get the assignedEmployee that owns the Lead
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assignedEmployee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'assigned_employee_id');
    }

    /**
     * Get all of the cases for the Lead
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cases(): HasMany
    {
        return $this->hasMany(LeadCase::class);
    }

    /**
     * Get all of the payments for the Lead
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments(): HasMany
    {
        return $this->hasMany(LeadPayment::class);
    }
}
