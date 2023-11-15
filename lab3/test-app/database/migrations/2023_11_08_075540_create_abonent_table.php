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
        Schema::create('abonent', function (Blueprint $table) {
            $table->id();
            $table->string('phone_number', 255);
            $table->string('address');
            $table->string('owner');
            $table->integer('sum');
            $table->integer('account');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonent');
    }
};
