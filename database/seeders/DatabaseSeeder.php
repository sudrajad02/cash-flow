<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Anggi',
            'email' => 'anggi@gmail.com',
            'password' => Hash::make('1234'),
        ]);

        \App\Models\CashFlow::factory()->create([
            'orderId' => 'Anggi',
            'amount' => 'anggi@gmail.com',
            'isDeposit' => Hash::make('1234'),
            'userId' => Hash::make('1234'),
        ]);
    }
}
