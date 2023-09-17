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
        Schema::create('tododo', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->date('deadline');
            $table->string('tag');
            $table->enum('status', ['todo', 'progress', 'done']);
        });
        }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tododo');
    }
};
