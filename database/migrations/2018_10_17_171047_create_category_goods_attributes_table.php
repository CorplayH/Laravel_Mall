<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryGoodsAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_goods_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id')->comment('类别ID');
            $table->unsignedInteger('attribute_id')->comment('属性ID');
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
        Schema::dropIfExists('category_goods_attributes');
    }
}
