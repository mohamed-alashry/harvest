<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
            'branch_id' => 1,
            'name' => 'A',
            'max_student' => 15,
            'status' => 1,
        ]);
    }
}
