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
        Schema::table('kostLocation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kos')->nullable();
            $table->foreign('id_kos')
                  ->references('id')->on('kos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 11, 7);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kostLocation', function (Blueprint $table) {
            $table->dropColumn('latitude');
            $table->dropColumn('longitude');
        });
    }
};
