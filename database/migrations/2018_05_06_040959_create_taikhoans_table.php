<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaikhoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taikhoan', function (Blueprint $table) {
            $table->increments('matk');
            $table->string('tentk')->unique();
            $table->string('matkhau');
            $table->integer('loaitk')->default('1');
            $table->integer('mattcn')->unsigned();
            $table->foreign('mattcn')->references('mattcn')->on('thongtincanhan')->onDelete('cascade');
            $table->integer('isDeleted')->default('0');
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
        Schema::dropIfExists('taikhoan');
    }
}
