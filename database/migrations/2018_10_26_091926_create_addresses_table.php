<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('fname');
            $table->string('lname');
            $table->string('country')->default('New Zealand');
            $table->string('city');
            $table->string('suburb')->nullable();
            $table->string('address');
            $table->string('company')->nullable();
            $table->unsignedInteger('flat')->nullable();
            $table->string('phone')->comment('手机号码');
            $table->smallInteger('zipcode')->comment('邮编');
            $table->unsignedInteger('user_id')->comment('用户id');
            $table->tinyInteger('is_default')->default(0)->comment('是否默认');
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
        Schema::dropIfExists('addresses');
    }
}
