<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BranchesTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(JobsTableSeeder::class);
        $this->call(EmployeesTableSeeder::class);
        $this->call(KnowChannelsTableSeeder::class);
        $this->call(LeadSourcesTableSeeder::class);
        $this->call(PaymentPlansTableSeeder::class);
        $this->call(PaymentMethodsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
    }
}
