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
        Schema::table('abonent', function (Blueprint $table) {
            $table->integer('sum')->nullable()->change();
            $table->integer('test');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('abonent', function (Blueprint $table) {
            $table->integer('sum')->nullable(false)->change();
            $table->dropColumn('test');
        });
    }
};
