<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataUserOrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory()->has(
       \App\Models\Order\Order::factory()->count(rand(1,10))
   )->has(
       \App\Models\Document::factory()->count(rand(1,3))
   )->count(40)->create();
    }
}
