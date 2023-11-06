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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('preview_image');
            $table->text('description');
            $table->text('content');
            $table->string('author_name');
            $table->unsignedBigInteger('likes')->default(0);
            $table->unsignedBigInteger('reposts')->default(0);
            $table->date('publish_date');
            $table->unsignedBigInteger('views')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
