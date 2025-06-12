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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('search_id')
                ->nullable(false)
                ->references('id')
                ->on('search_history');
            $table->tinyInteger('question_index')->nullable(false);
            $table->text('question')->nullable(false);
            $table->text('submitted_answer')->nullable(false);
            $table->text('correct_answer')->nullable(false);
            $table->json('possible_answers')->nullable(false);
            $table->timestamps();

            $table->unique(['search_id', 'question_index']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
