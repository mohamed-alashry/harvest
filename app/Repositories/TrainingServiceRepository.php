<?php

namespace App\Repositories;

use App\Models\TrainingService;
use App\Repositories\BaseRepository;

/**
 * Class TrainingServiceRepository
 * @package App\Repositories
 * @version May 8, 2021, 3:06 pm UTC
*/

class TrainingServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title'
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
        return TrainingService::class;
    }
}
