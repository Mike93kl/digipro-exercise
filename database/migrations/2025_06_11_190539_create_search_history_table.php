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
        Schema::create('search_history', function (Blueprint $table) {
            $table->id();
            $table->string('key')->nullable(false)->unique();
            $table->string('full_name')->nullable(false);
            $table->string('email')->nullable(false);
            $table->tinyInteger('number_of_questions')->nullable(false );
            $table->enum('difficulty', array_column(\App\Enums\DifficultyEnum::cases(), 'value'))->nullable(false);
            $table->enum('type', array_column(\App\Enums\QuestionTypeEnum::cases(), 'value'))->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('search_history');
    }
};
