<?php

namespace App\Repositories;

use App\Models\Offer;
use App\Repositories\BaseRepository;

/**
 * Class OfferRepository
 * @package App\Repositories
 * @version May 8, 2021, 3:01 pm UTC
*/

class OfferRepository extends BaseRepository
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
        return Offer::class;
    }
}
