<?php

namespace App\Repositories;

use App\Models\LabelType;
use App\Repositories\BaseRepository;

/**
 * Class LabelTypeRepository
 * @package App\Repositories
 * @version May 9, 2021, 2:29 pm UTC
*/

class LabelTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'label_id'
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
        return LabelType::class;
    }
}
