<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
           
                $table->id(); 
                $table->string('nama_produk');
                $table->text('deskripsi_produk'); 
                $table->integer('harga_produk'); 
                $table->unsignedBigInteger('id_kategori');
                $table->foreign('id_kategori')->references('id')->on('kategori_produks')->onDelete('cascade');
                $table->string('image');
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
        Schema::dropIfExists('produks');
    }
}
