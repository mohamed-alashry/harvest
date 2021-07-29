<?php

namespace Database\Seeders;

use App\Models\PaymentPlan;
use Illuminate\Database\Seeder;

class PaymentPlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                'title' => 'Installment'
            ],
            [
                'title' => 'Cash'
            ],
        ];

        PaymentPlan::insert($plans);
    }
}
