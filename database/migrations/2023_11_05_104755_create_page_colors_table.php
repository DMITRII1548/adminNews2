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
        Schema::create('page_colors', function (Blueprint $table) {
            $table->id();
            $table->string('header')->default('#fff');
            $table->string('main')->default('#F7F4F4');
            $table->string('footer')->default('#EE6400');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_colors');
    }
};
