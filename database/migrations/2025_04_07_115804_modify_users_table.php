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
        Schema::table("users", function (Blueprint $table) {
            $table->after('name', function ($table) {
                $table->string('surname');
            });
            $table->after('email', function ($table) {
                $table->string('username')->unique();
                $table->string('location');
                $table->string('position');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("users", function (Blueprint $table) {
            $table->dropColumn(['surname', 'location', 'position']);
            $table->dropUnique(['username']);
        });
    }
};
