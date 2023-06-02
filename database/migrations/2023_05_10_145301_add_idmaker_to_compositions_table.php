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
        Schema::table('compositions', function (Blueprint $table) {
            $table->foreignId('id_maker')->constrained('users', 'id')->after('maker');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('compositions', function (Blueprint $table) {
            //
        });
    }
};
