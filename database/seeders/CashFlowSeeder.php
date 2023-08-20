<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CashFlow;

class CashFlowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 10; $i++) { 
            CashFlow::create(array(
                'orderId' => $faker->regexify('[A-Za-z0-9]{' . mt_rand(4, 20) . '}'),
                'amount' => $faker->numberBetween(50000, 100000),
                'isDeposit' => $i < 5 ? 1:0,
                'userId' => 1,
            ));
        }
    }
}
