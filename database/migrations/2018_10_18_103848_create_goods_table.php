<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gname')->comment('商品名称');
            $table->decimal('price',8,2)->comment('商品价格');
            $table->text('images')->comment('商品图片');
            $table->string('category_id')->comment('商品分类id');
            $table->text('description')->comment('商品详情');
            $table->string('is_recommend')->default(0)->comment('是否推荐');
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
        Schema::dropIfExists('goods');
    }
}
