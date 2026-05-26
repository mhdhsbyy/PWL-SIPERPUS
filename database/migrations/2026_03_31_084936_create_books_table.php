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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 64);
            $table->string('author', 64);
            $table->year('year');
            $table->string('publisher', 64);
            $table->string('city', 32);
            $table->string('cover')->nullable();
            //cara 1
            // $table->foreignId('bookshelf_id')->constrained();

            //cara 2
            $table->unsignedBigInteger('bookshelf_id');
            $table->foreign('bookshelf_id')
            ->references('id')
            ->on('bookshelves')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreignId('category_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
