<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescriptionProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('description_product', function (Blueprint $table) {
            $table->increments("id");
            $table->string("time_used");
            $table->string("current_status");
            $table->string("material")->nullable();;
            $table->string("size")->nullable();;
            $table->string("color")->nullable();;
            $table->string("mass")->nullable();;
            $table->string("brand")->nullable();;
            $table->text("description_further")->nullable();;
            $table->integer("product_id")->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('description_product');
    }
}
