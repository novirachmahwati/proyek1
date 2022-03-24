<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 75);
            $table->char('tahun_terbit', 4);
            $table->unsignedBigInteger('id_penerbit');
            $table->string('pengarang', 100);
            $table->integer('jumlah_hal');
            $table->string('sampul', 25);
            $table->timestamps();
            $table->integer('id_user');
            
        });
        
        Schema::table('buku', function($table) {
            $table->foreign('id_penerbit')
                  ->references('id')
                  ->on('penerbit')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
}
