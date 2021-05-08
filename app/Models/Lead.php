<?php

namespace App\Models;

use Eloquent as Model;
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
 * @property string $lead_source
 * @property string $know_from
 * @property string $preferred_time
 * @property string $preferred_offer
 * @property string $preferred_branch
 * @property string $preferred_training_service
 * @property string $notes
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
        'gender',
        'mobile_1',
        'mobile_2',
        'email',
        'lead_source',
        'know_from',
        'preferred_time',
        'preferred_offer',
        'preferred_branch',
        'preferred_training_service',
        'notes',
        'nationality',
        'identification',
        'dob',
        'country',
        'governorate',
        'city',
        'university',
        'customer_job',
        'workplace',
        'full_address'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'gender' => 'string',
        'mobile_1' => 'string',
        'mobile_2' => 'string',
        'email' => 'string',
        'lead_source' => 'string',
        'know_from' => 'string',
        'preferred_time' => 'string',
        'preferred_offer' => 'string',
        'preferred_branch' => 'string',
        'preferred_training_service' => 'string',
        'notes' => 'string',
        'nationality' => 'string',
        'identification' => 'string',
        'dob' => 'date',
        'country' => 'string',
        'governorate' => 'string',
        'city' => 'string',
        'university' => 'string',
        'customer_job' => 'string',
        'workplace' => 'string',
        'full_address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'gender' => 'required',
        'mobile_1' => 'required',
        'email' => 'email',
        'lead_source' => 'required',
        'know_from' => 'required',
        'preferred_time' => 'required',
        'preferred_offer' => 'required',
        'preferred_branch' => 'required',
        'preferred_training_service' => 'required'
    ];

    
}
