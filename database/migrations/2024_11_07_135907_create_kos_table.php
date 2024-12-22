<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->string('Nama');
            $table->string('Lokasi');
            $table->text('Fasilitas');
            $table->text('Deskripsi')->nullable();
            $table->enum('Kelas', ['Ekonomi', 'Reguler', 'Eksklusif']);
            $table->string('Ukuran');
            $table->text('Akses_Kendaraan')->nullable();
            $table->integer('Harga');
            $table->string('No_telp')->nullable();
            $table->string('Gambar');

            // $table->foreign('id_user')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('id_user')
                  ->references('id')->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

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
        Schema::dropIfExists('kos');
    }
}
