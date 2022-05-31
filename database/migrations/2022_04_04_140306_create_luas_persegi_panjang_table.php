<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLuasPersegiPanjangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luas_persegi_panjang', function (Blueprint $table) {
            $table->id();
            $table->float('panjang', 8, 2);
            $table->float('lebar', 8, 2);
            $table->float('luas', 8, 2);
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
        Schema::dropIfExists('luas_persegi_panjang');
    }
}
