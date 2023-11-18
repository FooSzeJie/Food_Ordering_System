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
        Schema::create('my_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('user_name');
            $table->string('product_name');
            $table->string('product_image')->nullable();
            $table->string('product_description');
            $table->integer('product_quantity');
            $table->decimal('product_price', 8, 2)->default(0);
            $table->decimal('totalAmount', 8, 2)->default(0);
            $table->integer('payment_status')->default(1);
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
        Schema::dropIfExists('my_orders');
    }
};
