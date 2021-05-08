<?php

namespace App\Repositories;

use App\Models\KnowChannel;
use App\Repositories\BaseRepository;

/**
 * Class KnowChannelRepository
 * @package App\Repositories
 * @version May 8, 2021, 7:35 pm UTC
*/

class KnowChannelRepository extends BaseRepository
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
        return KnowChannel::class;
    }
}
