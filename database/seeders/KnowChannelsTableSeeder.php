<?php

namespace Database\Seeders;

use App\Models\KnowChannel;
use Illuminate\Database\Seeder;

class KnowChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KnowChannel::create([
            'name' => 'Youtube'
        ]);
    }
}
