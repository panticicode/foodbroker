<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('user_id');
            $table->string('company')->nullable();
            $table->integer('country_id');
            $table->string('address');
            $table->string('apartment')->nullable();
            $table->date('delivery_date');
            $table->time('delivery_time');
            $table->string('city');
            $table->string('postal_code', 5);
            $table->string('phone');
            $table->string('email');
            $table->text('content')->nullable();
            $table->timestamps();
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
