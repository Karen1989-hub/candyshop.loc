<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_order_products', function (Blueprint $table) {
            $table->id();
            $table->string('userOrderId');
            $table->string('productId');
            $table->string('productTitle');
            $table->string('productSinglPrice');
            $table->string('productAllPrice');
            $table->string('productCount');
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
        Schema::dropIfExists('user_order_products');
    }
}
