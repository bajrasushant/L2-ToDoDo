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
        Schema::create('projects', function (Blueprint $table) {
					$table->id();
					$table->string('name');// name of the project
					$table->unsignedBigInteger('owner_id');// id of the user who owns the project
					$table->text('description');// description of the project
					$table->enum('status', ['todo', 'ongoing', 'done'])->default('todo');// status of the project
					$table->enum('priority', ['low', 'medium', 'high'])->default('low');// priority of the project
					$table->date('deadline')->nullable();// deadline of the project
					$table->timestamps();
				});

				Schema::table('projects', function (Blueprint $table) {
					$table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
				});
      }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
					$table->dropForeign(['owner_id']);
					$table->dropColumn('owner_id');
					Schema::dropIfExists('projects');
        });
    }
};
