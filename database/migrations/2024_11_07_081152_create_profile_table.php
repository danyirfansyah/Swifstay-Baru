<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_user"); // Foreign key
            $table->string("nama");
            $table->enum("Jenis_Kelamin", ["Laki-Laki", "Perempuan"]);
            $table->date("Tanggal_lahir");
            $table->string("Nomor_Telepon");
            $table->string("img_prof")->nullable(); // Boleh null jika belum ada gambar
            $table->timestamps();

            // Tambahkan foreign key constraint
            $table->foreign("id_user")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
