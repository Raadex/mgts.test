<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataAuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Author::factory(30)->create();

    }
}
