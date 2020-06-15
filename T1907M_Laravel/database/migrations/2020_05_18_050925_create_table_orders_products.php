<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrdersProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_products', function (Blueprint $table) {
            //$table->id();
            $table->unsignedBigInteger("order_id");
            $table->unsignedBigInteger("products_id");
            $table->unsignedBigInteger("id");
            $table->decimal("price",12,4);
            $table->timestamps();
            $table->foreign("users_id")->references("id")->on("orders");
            $table->foreign("orders_id")->references("orders")->on("id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_products');
    }
}
