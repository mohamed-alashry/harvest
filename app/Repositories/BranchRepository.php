<?php

namespace App\Repositories;

use App\Models\Branch;
use App\Repositories\BaseRepository;

/**
 * Class BranchRepository
 * @package App\Repositories
 * @version May 8, 2021, 2:55 pm UTC
*/

class BranchRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'phone'
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
        return Branch::class;
    }
}
