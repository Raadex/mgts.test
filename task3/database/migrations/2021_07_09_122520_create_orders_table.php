<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('phone');
            $table->timestamps();

            //$table->unsignedInteger('type_id');
            //$table->unsignedInteger('status_id');
            //$table->unsignedInteger('equipment_id');
            //$table->unsignedInteger('tariff_id');

            $table->foreignId('type_id')->references('id')->on('types_orders');
            $table->foreignId('status_id')->references('id')->on('statuses_orders');
            $table->foreignId('equipment_id')->references('id')->on('equipments');
            $table->foreignId('tariff_id')->references('id')->on('tariffs');
            $table->foreignId('user_id')->references('id')->on('users');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
