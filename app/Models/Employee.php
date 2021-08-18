<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Employee
 * @package App\Models
 * @version May 8, 2021, 9:51 am UTC
 *
 * @property string $first_name
 * @property string $last_name
 * @property string $mobile
 * @property string $email
 * @property string $password
 * @property string $branch
 * @property string $position
 */
class Employee extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * Table name.
     *
     * @var string
     */
    public $table = 'employees';

    /**
     * Dates array.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'first_name',
        'last_name',
        'mobile',
        'email',
        'password',
        // 'branch_id',
        'department_id',
        'job_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'first_name' => 'string',
        'last_name' => 'string',
        'mobile' => 'string',
        'email' => 'string',
        // 'branch_id' => 'integer',
        'department_id' => 'integer',
        'job_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'mobile' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed',
        'department_id' => 'required',
        'job_id' => 'required',
        'branches' => 'required|array',
        'roles' => 'required|array'
    ];

    /**
     * Set password encryption.
     *
     * @param String $val
     * @return void
     */
    public function setPasswordAttribute($val)
    {
        if ($val) {
            $this->attributes['password'] = bcrypt($val);
        }
    }

    /**
     * Get employee name.
     *
     * @return void
     */
    public function getNameAttribute()
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

    /**
     * The branches that belong to the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function branches(): BelongsToMany
    {
        return $this->belongsToMany(Branch::class, 'branches_employees', 'employee_id', 'branch_id');
    }

    /**
     * Get the department that owns the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the job that owns the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }
}
