<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->unsinged();
            $table->integer('brand_id')->unsinged();
            $table->string('title');
            $table->text('description');
            $table->string('slug');
            $table->integer('quantity')->default(1);
            $table->integer('price');
            $table->integer('offer_price')->nullable();
            $table->tinyInteger('stauts')->default(0);
            $table->integer('admin_id')->unsinged();
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
        Schema::dropIfExists('products');
    }
}
