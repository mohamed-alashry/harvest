<?php

namespace App\Repositories;

use App\Models\LeadSource;
use App\Repositories\BaseRepository;

/**
 * Class LeadSourceRepository
 * @package App\Repositories
 * @version May 8, 2021, 7:29 pm UTC
*/

class LeadSourceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return LeadSource::class;
    }
}
