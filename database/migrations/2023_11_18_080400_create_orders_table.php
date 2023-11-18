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
            $table->unsignedBigInteger('user_id');
            $table->string('user_name');
            $table->string('product_name');
            $table->string('product_image')->nullable();
            $table->string('product_description');
            $table->integer('product_quantity');
            $table->decimal('product_price', 8, 2)->default(0);
            $table->decimal('totalAmount', 8, 2)->default(0);
            $table->enum('payment_status', ['pending', 'completed'])->default('completed');
            $table->string('order_type')->default('no_select_order_type');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
