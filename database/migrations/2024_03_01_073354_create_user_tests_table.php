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
        Schema::create('user_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->nullable();
            $table->unsignedBigInteger('test_id')->constrained('questions')->nullable();
            $table->foreignId('question_id')->constrained('questions')->nullable();
            $table->foreignId('result_id')->constrained('results')->nullable();
            $table->enum('option',['A', 'B', 'C']);
            $table->timestamps();
//             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_tests');
    }
};
