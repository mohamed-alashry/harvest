<?php

namespace App\Repositories;

use App\Models\LeadCase;
use App\Repositories\BaseRepository;

/**
 * Class LeadCaseRepository
 * @package App\Repositories
 * @version May 9, 2021, 4:13 pm UTC
*/

class LeadCaseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'lead_id',
        'employee_id',
        'branch_id',
        'label_id',
        'label_type_id',
        'serial',
        'timeline',
        'details',
        'feedback',
        'action',
        'notes',
        'status',
        'date'
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
        return LeadCase::class;
    }
}
