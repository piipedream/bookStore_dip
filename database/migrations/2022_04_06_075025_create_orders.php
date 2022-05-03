<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->text('cart');
            $table->string('name');
            $table->string('last_name');
            $table->string('login');
            $table->string('email');
            $table->string('address');
            $table->string('country');
            $table->string('city');
            $table->string('zip_code');
            $table->string('user_id');
            $table->smallInteger('delivery');
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
};
