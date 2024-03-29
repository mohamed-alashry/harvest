<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = Employee::create([
            'first_name' => 'user',
            'last_name' => 'users',
            'mobile' => '01236547890',
            'email' => 'user@email.com',
            'password' => 'password',
            'department_id' => 1,
            'job_id' => 1,
        ]);

        $employee->branches()->sync([1]);
    }
}
