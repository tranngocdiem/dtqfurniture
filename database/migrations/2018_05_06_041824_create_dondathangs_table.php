<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDondathangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dondathang', function (Blueprint $table) {
            $table->increments('maddh');
            $table->datetime('ngaydat');
            $table->datetime('ngaygiao');
            $table->string('diachigiao');
            $table->integer('trangthai');
            $table->integer('matk')->unsigned();
            $table->foreign('matk')->references('matk')->on('taikhoan')->onDelete('cascade');
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
        Schema::dropIfExists('dondathangs');
    }
}