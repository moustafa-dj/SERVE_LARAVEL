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
        Schema::table('admins', function (Blueprint $table) {
            $table->string('phone')->nullable();
            $table->string('full_name')->nullable();
            $table->text('about')->nullable();
            $table->string('adress')->nullable();
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('full_name');
            $table->dropColumn('about');
            $table->dropColumn('adress');
            $table->dropColumn('image');
        });
    }
};
