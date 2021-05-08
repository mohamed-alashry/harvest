<?php

namespace App\Repositories;

use App\Models\Lead;
use App\Repositories\BaseRepository;

/**
 * Class LeadRepository
 * @package App\Repositories
 * @version May 8, 2021, 1:27 pm UTC
*/

class LeadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Lead::class;
    }
}
