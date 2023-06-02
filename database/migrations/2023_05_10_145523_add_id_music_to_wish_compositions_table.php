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
        Schema::table('wish_compositions', function (Blueprint $table) {
            $table->foreignId('id_music')->constrained('compositions','id');
            $table->foreignId('id_user')->constrained('users', 'id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wish_compositions', function (Blueprint $table) {
            //
        });
    }
};
