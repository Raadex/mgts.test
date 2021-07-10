<?php

namespace Database\Seeders;

use App\Models\Order\Status;
use App\Models\Order\Type;
use Illuminate\Database\Seeder;

class DataTypesStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //statuses orders
        Status::add(['name' => 'новый']);
        Status::add(['name' => 'в обработке']);
        Status::add(['name' => 'отменён']);
        Status::add(['name' => 'в эксплуатации']);

        //types orders
        Type::add(['name' => 'домашний телефон']);
        Type::add(['name' => 'мобильный телефон']);
        Type::add(['name' => 'интернет телефон']);
        Type::add(['name' => 'телевидение телефон']);
        Type::add(['name' => 'видеонаблюдение']);

        //types equipments
        \App\Models\Equipment\Type::add(['name' => 'роутер']);
        \App\Models\Equipment\Type::add(['name' => 'камера видеонаблюдения']);
        \App\Models\Equipment\Type::add(['name' => 'тв приставка']);
        \App\Models\Equipment\Type::add(['name' => 'мобильный телефон']);






    }
}
