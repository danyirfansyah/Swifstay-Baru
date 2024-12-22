<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('id_user'); // Foreign key to the users table
            $table->string('nama', 255);
            $table->enum('Jenis_Kelamin', ["Laki-Laki", "Perempuan","-"]);
            $table->date('Tanggal_lahir')->nullable();
            $table->string('Nomor_Telepon', 255)->nullable();
            $table->string('img_prof', 255)->nullable();
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('id_user')
                  ->references('id')->on('users')
                  ->onDelete('cascade')
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
        Schema::dropIfExists('profiles');
    }
}
